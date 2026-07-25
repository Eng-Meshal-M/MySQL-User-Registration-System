<?php
/**
 * records.php
 * Fetch all existing database records as JSON for frontend display.
 */

require __DIR__ . '/db.php';

header('Content-Type: application/json; charset=utf-8');

try {
    // Connect to database and retrieve stored users
    $pdo = get_pdo($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);

    $sql = "SELECT {$COLUMN_ID} AS id, {$COLUMN_NAME} AS name, {$COLUMN_AGE} AS age, {$COLUMN_STATUS} AS status
            FROM {$TABLE_NAME}
            ORDER BY {$COLUMN_ID} DESC";

    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'records' => $rows
    ], JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'records' => []
    ], JSON_UNESCAPED_UNICODE);
}