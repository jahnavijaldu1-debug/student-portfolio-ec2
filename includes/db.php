<?php
declare(strict_types=1);

/**
 * Configure these environment variables on EC2 (do not commit real passwords):
 * DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASSWORD
 */
function getPdoConnection(): PDO
{
    $host = getenv('DB_HOST') ?: '';
    $port = getenv('DB_PORT') ?: '3306';
    $name = getenv('DB_NAME') ?: 'studentdb';
    $user = getenv('DB_USER') ?: '';
    $password = getenv('DB_PASSWORD') ?: '';

    if ($host === '' || $user === '' || $password === '') {
        throw new RuntimeException('Database environment variables are not configured.');
    }

    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', $host, $port, $name);
    return new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
}
