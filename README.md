# Student Portfolio — EC2 + RDS MySQL + DynamoDB

This PHP project is structured to meet the assignment requirements:
- `academic.php` reads structured academic records from Amazon RDS for MySQL using PDO.
- `skills.php` reads skills and certification items from Amazon DynamoDB using AWS SDK for PHP.
- `index.php` is the home page.
- CSS and JavaScript are separated into `assets/css/style.css` and `assets/js/main.js`.

## Project tree

```text
student_portfolio_ec2/
├── index.php
├── academic.php
├── skills.php
├── composer.json
├── .gitignore
├── README.md
├── includes/
│   ├── header.php
│   ├── footer.php
│   ├── db.php
│   └── dynamodb.php
├── assets/
│   ├── css/style.css
│   └── js/main.js
└── database/
    ├── schema.sql
    ├── seed.sql
    └── dynamodb-seed.json
```

## A. AWS resources

Use the same AWS Region for EC2, RDS, and DynamoDB (this project defaults to `us-east-1`).

### EC2
Launch Amazon Linux 2023. In the EC2 security group allow:
- HTTP TCP 80 from `0.0.0.0/0`
- SSH TCP 22 only from your own IP, or use EC2 Instance Connect if available.

Do not open database port 3306 to the internet.

### Install Apache, PHP, Composer prerequisites, and MySQL extension

```bash
sudo dnf update -y
sudo dnf install -y httpd php php-cli php-mysqlnd php-mbstring php-xml php-json unzip git mariadb105
sudo systemctl enable --now httpd
```

Install Composer using the official Composer instructions for your OS, then check:

```bash
php -v
composer --version
```

### RDS MySQL
Create a MySQL RDS instance in the same VPC as EC2. Set Public access to **No**. On the RDS security group, allow inbound TCP 3306 **from the EC2 security group**, not from all IPs.

Import `database/schema.sql` and `database/seed.sql` from a client that can reach RDS. For example, after placing the files on EC2:

```bash
mysql -h YOUR_RDS_ENDPOINT -P 3306 -u YOUR_DB_USER -p < database/schema.sql
mysql -h YOUR_RDS_ENDPOINT -P 3306 -u YOUR_DB_USER -p studentdb < database/seed.sql
```

The seed file includes only the eight courses for which course codes/types/credits/grades were provided. Update the data to match your official transcript before presenting it as official.

### Set environment variables for PHP
For a quick lab setup, Apache environment variables can be set in a root-owned environment configuration. Do not put passwords in a publicly served file or commit them to Git.

Example `/etc/portfolio.env` (replace placeholders):

```bash
DB_HOST=YOUR_RDS_ENDPOINT
DB_PORT=3306
DB_NAME=studentdb
DB_USER=YOUR_DB_USER
DB_PASSWORD=YOUR_DB_PASSWORD
AWS_REGION=us-east-1
DYNAMODB_TABLE=StudentSkills
```

Restrict access:

```bash
sudo chown root:root /etc/portfolio.env
sudo chmod 600 /etc/portfolio.env
```

How Apache receives environment variables depends on the Apache/PHP setup. One straightforward Amazon Linux/Apache option is to add the variables to `/etc/httpd/conf.d/portfolio.conf` using `SetEnv` directives (ensure the file is root-owned and mode 600); restart Apache after editing. Example:

```apache
SetEnv DB_HOST YOUR_RDS_ENDPOINT
SetEnv DB_PORT 3306
SetEnv DB_NAME studentdb
SetEnv DB_USER YOUR_DB_USER
SetEnv DB_PASSWORD YOUR_DB_PASSWORD
SetEnv AWS_REGION us-east-1
SetEnv DYNAMODB_TABLE StudentSkills
```

Then:

```bash
sudo systemctl restart httpd
```

For a real deployment, prefer a managed secret store such as AWS Secrets Manager rather than placing passwords in a configuration file.

### DynamoDB
Create a DynamoDB table:
- Table name: `StudentSkills`
- Partition key: `skill_id` (String)

Add the items from `database/dynamodb-seed.json` using DynamoDB Console → Explore table items → Create item, or use AWS CLI commands after creating the table. The JSON file uses DynamoDB low-level attribute format.

Attach an EC2 IAM role/instance profile to the instance. Grant only the required access to the table. For this sample `Scan` implementation, a least-privilege policy is:

```json
{
  "Version": "2012-10-17",
  "Statement": [{
    "Effect": "Allow",
    "Action": ["dynamodb:Scan"],
    "Resource": "arn:aws:dynamodb:us-east-1:YOUR_ACCOUNT_ID:table/StudentSkills"
  }]
}
```

The code uses the AWS SDK default credential provider chain and the EC2 role; do not place access keys in PHP source code.

## B. Install the AWS SDK and deploy the PHP files

Put the project under the web root, for example:

```bash
sudo mkdir -p /var/www/html
# Copy the project files into /var/www/html, preserving subfolders.
cd /var/www/html
sudo composer install --no-dev --optimize-autoloader
sudo chown -R apache:apache /var/www/html
```

`composer install` uses `composer.json` and creates the `vendor/` folder. Do not upload a local `vendor/` folder unless you know it matches the EC2 PHP environment.

## C. Test

Open these paths using the EC2 public IPv4/DNS:
- `http://YOUR_EC2_PUBLIC_IP/`
- `http://YOUR_EC2_PUBLIC_IP/academic.php`
- `http://YOUR_EC2_PUBLIC_IP/skills.php`

A successful page shows a green connection message and data from the corresponding AWS service. If not:
- RDS: verify endpoint, DB environment variables, VPC/security group rule, schema, and PHP MySQL extension.
- DynamoDB: verify region/table name, table items, Composer `vendor/`, and EC2 instance profile permissions.
- Check server logs: `sudo tail -n 80 /var/log/httpd/error_log`

Do not leave PHP errors, credentials, or debug `phpinfo()` pages publicly accessible.

## D. Implementation report checklist

Include:
1. Project objective and architecture diagram.
2. EC2 instance details and active URL (fill in your real public URL after launch).
3. RDS table schema and a short PDO connection/query snippet.
4. DynamoDB table key, IAM role policy, and AWS SDK snippet.
5. Screenshot of `academic.php` with its green RDS status and rows.
6. Screenshot of `skills.php` with its green DynamoDB status and skill/certification cards.
7. Conclusion and any limitations.

The EC2 URL and screenshots must be captured from your actual deployed application; this project package does not fabricate a live URL or runtime screenshots.
