<?php
// api/join.php - Retrieve a transfer offer by its PIN
header('Content-Type: application/json');

require_once __DIR__ . '/../db.php';

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['pin']) || empty($input['pin'])) {
    echo json_encode(['success' => false, 'error' => 'PIN is required.']);
    exit;
}

$pin = trim($input['pin']);

try {
    // Find active transfers matching the PIN
    $stmt = $pdo->prepare("SELECT id, sender_offer FROM transfers WHERE pin = ? AND status = 'waiting' LIMIT 1");
    $stmt->execute([$pin]);
    $transfer = $stmt->fetch();
    
    if ($transfer) {
        echo json_encode([
            'success' => true,
            'transfer_id' => $transfer['id'],
            'offer' => $transfer['sender_offer']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Invalid or expired 6-digit key. Please check the key and try again.'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
