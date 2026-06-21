<?php
// api/get_answer.php - Polling endpoint for the sender to retrieve the receiver's answer
header('Content-Type: application/json');

require_once __DIR__ . '/../db.php';

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['transfer_id']) || empty($input['transfer_id'])) {
    echo json_encode(['success' => false, 'error' => 'transfer_id is required.']);
    exit;
}

$transfer_id = (int)$input['transfer_id'];

try {
    $stmt = $pdo->prepare("SELECT status, receiver_answer FROM transfers WHERE id = ?");
    $stmt->execute([$transfer_id]);
    $transfer = $stmt->fetch();
    
    if ($transfer) {
        if (!empty($transfer['receiver_answer'])) {
            echo json_encode([
                'success' => true,
                'status' => $transfer['status'],
                'answer' => $transfer['receiver_answer']
            ]);
        } else {
            echo json_encode([
                'success' => true,
                'status' => $transfer['status'],
                'answer' => null
            ]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Transfer session not found.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
