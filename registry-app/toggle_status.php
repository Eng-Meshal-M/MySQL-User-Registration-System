<?php
/**
 * toggle_status.php
 * Toggles status (0 or 1) for a specific record ID.
 */

require __DIR__ . '/db.php';

header('Content-Type: application/json; charset=utf-8');

// Read JSON input
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

    // Get current status
    $stmt = $pdo->prepare("SELECT {$COLUMN_STATUS} FROM {$TABLE_NAME} WHERE {$COLUMN_ID} = :id");
    $stmt->execute([':id' => $id]);
    $current = $stmt->fetchColumn();

    if ($current === false) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'القيد غير موجود'], JSON_UNESCAPED_UNICODE);
        exit;
    }

    // Toggle status value
    $newStatus = ((int) $current === 1) ? 0 : 1;

    // Update row in database
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