<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;
use Aws\Exception\AwsException;

/**
 * Uses the AWS SDK default credential provider chain.
 * On EC2, attach an IAM instance profile with least-privilege dynamodb:Scan
 * permission for the StudentSkills table. Do not put access keys in this file.
 */
function getPortfolioItems(): array
{
    $region = getenv('AWS_REGION') ?: 'us-east-1';
    $tableName = getenv('DYNAMODB_TABLE') ?: 'StudentSkills';

    $client = new DynamoDbClient([
        'version' => 'latest',
        'region' => $region,
    ]);

    $result = $client->scan([
        'TableName' => $tableName,
    ]);

    $items = [];
    foreach (($result['Items'] ?? []) as $item) {
        $decoded = [];
        foreach ($item as $key => $attribute) {
            if (isset($attribute['S'])) {
                $decoded[$key] = $attribute['S'];
            } elseif (isset($attribute['N'])) {
                $decoded[$key] = $attribute['N'];
            } elseif (isset($attribute['BOOL'])) {
                $decoded[$key] = $attribute['BOOL'];
            }
        }
        $items[] = $decoded;
    }

    usort($items, static fn(array $a, array $b): int => strcmp((string)($a['name'] ?? ''), (string)($b['name'] ?? '')));
    return $items;
}
