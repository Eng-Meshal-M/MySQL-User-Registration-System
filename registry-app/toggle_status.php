<?php
/**
 * toggle_status.php
 * -----------------------------------------------------------------
 * يستقبل id من الصفحة، يقرأ حالته الحالية من قاعدة البيانات،
 * يعكسها (0 يصير 1 والعكس)، ويحدّث الصف. يرجّع الحالة الجديدة
 * عشان الصفحة تحدّث الزر مباشرة بدون ما تعمل refresh.
 * -----------------------------------------------------------------
 */

require __DIR__ . '/db.php';

header('Content-Type: application/json; charset=utf-8');

$raw  = file_get_contents('php://input');
$body = json_decode($raw, true);

if (!$body || !isset($body['id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'بيانات ناقصة'], JSON_UNESCAPED_UNICODE);
    exit;
}

$id = filter_var($body['id'], FILTER_VALIDATE_INT);

if ($id === false) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'معرّف غير صحيح'], JSON_UNESCAPED_UNICODE);
    exit;
}

try {
    $pdo = get_pdo($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);

    // 1) نقرأ الحالة الحالية
    $stmt = $pdo->prepare("SELECT {$COLUMN_STATUS} FROM {$TABLE_NAME} WHERE {$COLUMN_ID} = :id");
    $stmt->execute([':id' => $id]);
    $current = $stmt->fetchColumn();

    if ($current === false) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'القيد غير موجود'], JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 2) نعكسها: 0 <-> 1
    $newStatus = ((int) $current === 1) ? 0 : 1;

    // 3) نحدّث الصف
    $update = $pdo->prepare("UPDATE {$TABLE_NAME} SET {$COLUMN_STATUS} = :status WHERE {$COLUMN_ID} = :id");
    $update->execute([':status' => $newStatus, ':id' => $id]);

    echo json_encode([
        'success' => true,
        'id'      => $id,
        'status'  => $newStatus
    ], JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'تعذر تحديث الحالة'], JSON_UNESCAPED_UNICODE);
}
