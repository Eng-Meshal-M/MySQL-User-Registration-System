<?php
/**
 * save.php
 * Saves name and age inputs into the database.
 */

require __DIR__ . '/db.php';

header('Content-Type: application/json; charset=utf-8');

function respond($success, $message = '', $extra = []) {
    echo json_encode(array_merge([
        'success' => $success,
        'message' => $message
    ], $extra), JSON_UNESCAPED_UNICODE);
    exit;
}

// Read JSON payload from request
$raw  = file_get_contents('php://input');
$body = json_decode($raw, true);

if (!$body || !isset($body['name']) || !isset($body['age'])) {
    http_response_code(400);
    respond(false, 'بيانات ناقصة');
}

$name = trim($body['name']);
$age  = filter_var($body['age'], FILTER_VALIDATE_INT);

if ($name === '' || $age === false || $age < 1 || $age > 120) {
    http_response_code(422);
    respond(false, 'بيانات غير صحيحة');
}

try {
    // Insert record into table
    $pdo = get_pdo($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);

    $sql = "INSERT INTO {$TABLE_NAME} ({$COLUMN_NAME}, {$COLUMN_AGE}) VALUES (:name, :age)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':age'  => $age,
    ]);

    respond(true, 'تم الحفظ بنجاح', ['id' => $pdo->lastInsertId()]);

} catch (PDOException $e) {
    http_response_code(500);
    respond(false, 'تعذر الاتصال بقاعدة البيانات');
}