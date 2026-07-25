<?php
/**
 * db.php
 * Database configuration and connection setup.
 */

// Database credentials
$DB_HOST     = "sql104.infinityfree.com";
$DB_NAME     = "if0_42431086_userform";
$DB_USER     = "if0_42431086";
$DB_PASSWORD = "Mm0504717525Mm";

// Table schema configuration
$TABLE_NAME    = "userform";
$COLUMN_ID     = "id";
$COLUMN_NAME   = "name";
$COLUMN_AGE    = "age";
$COLUMN_STATUS = "status";

/**
 * Establish a PDO database connection.
 */
function get_pdo($host, $dbname, $user, $password) {
    return new PDO(
        "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}