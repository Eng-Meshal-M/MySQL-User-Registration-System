<?php
/**
 * save.php
 * -----------------------------------------------------------------
 * هذا الملف يستقبل الاسم والعمر من الصفحة (index.html) ويحفظهم في
 * جدول داخل قاعدة بيانات MySQL.
 *
 * بيانات الاتصال بقاعدة البيانات صارت في ملف db.php (مكان واحد
 * فقط) — عدّل هناك، مو هنا.
 * -----------------------------------------------------------------
 */

require __DIR__ . '/db.php';

header('Content-Type: application/json; charset=utf-8');

// مثال SQL لإنشاء جدول متوافق مع هذا الملف (نفّذه مرة واحدة فقط):
//
// CREATE TABLE registry_entries (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(100) NOT NULL,
//   age INT NOT NULL,
//   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );

function respond($success, $message = '', $extra = []) {
    echo json_encode(array_merge([
        'success' => $success,
        'message' => $message
    ], $extra), JSON_UNESCAPED_UNICODE);
    exit;
}

// قراءة البيانات المرسلة من الصفحة (JSON)
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
    // في بيئة الإنتاج لا تعرض $e->getMessage() للمستخدم لأسباب أمنية
    respond(false, 'تعذر الاتصال بقاعدة البيانات');
}

