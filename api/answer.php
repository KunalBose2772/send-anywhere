<?php
// api/answer.php - Save WebRTC answer from receiver
header('Content-Type: application/json');

require_once __DIR__ . '/../db.php';

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['transfer_id']) || !isset($input['answer']) || empty($input['transfer_id']) || empty($input['answer'])) {
    echo json_encode(['success' => false, 'error' => 'transfer_id and answer SDP are required.']);
    exit;
}

$transfer_id = (int)$input['transfer_id'];
$answer = $input['answer'];

try {
    $stmt = $pdo->prepare("UPDATE transfers SET receiver_answer = ?, status = 'ready' WHERE id = ? AND status = 'waiting'");
    $stmt->execute([$answer, $transfer_id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Transfer record not found or already connected.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
