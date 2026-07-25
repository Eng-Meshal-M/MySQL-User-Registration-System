<?php
/**
 * db.php
 * -----------------------------------------------------------------
 * مكان واحد فقط لبيانات الاتصال بقاعدة البيانات.
 * يستخدمه كل من save.php و count.php، فلا داعي تكتب بياناتك
 * إلا مرة وحدة هنا.
 * -----------------------------------------------------------------
 */

// TODO: عدّل القيم الأربع التالية ببيانات قاعدة بياناتك
$DB_HOST     = "localhost";
$DB_NAME     = "your_database";
$DB_USER     = "your_username";
$DB_PASSWORD = "your_password";

// TODO: اسم الجدول وأسماء الأعمدة (لازم تطابق save.php)
$TABLE_NAME   = "registry_entries";
$COLUMN_NAME  = "name";
$COLUMN_AGE   = "age";

function get_pdo($host, $dbname, $user, $password) {
    return new PDO(
        "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}
