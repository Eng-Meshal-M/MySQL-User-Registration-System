<?php
/**
 * count.php
 * -----------------------------------------------------------------
 * يرجّع عدد الصفوف الحالي فعليًا في الجدول (مو عدّاد وهمي).
 * الصفحة (index.html) تناديه كل ما تفتح، عشان رقم القيد يطابق
 * البيانات الحقيقية في قاعدة البيانات — لو حذفت صف، الرقم ينقص
 * تلقائيًا في المرة الجاية اللي تفتح فيها الصفحة.
 * -----------------------------------------------------------------
 */

require __DIR__ . '/db.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $pdo = get_pdo($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM {$TABLE_NAME}");
    $row  = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'count'   => (int) $row['total']
    ], JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'count'   => 0
    ], JSON_UNESCAPED_UNICODE);
}
