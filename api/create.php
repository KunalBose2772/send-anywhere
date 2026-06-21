<?php
// api/create.php - Register a new transfer offer
header('Content-Type: application/json');

require_once __DIR__ . '/../db.php';

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['offer']) || empty($input['offer'])) {
    echo json_encode(['success' => false, 'error' => 'Offer SDP is required.']);
    exit;
}

$offer = $input['offer'];

// Generate a unique 6-digit PIN
$pin = '';
$max_attempts = 10;
$attempt = 0;

while ($attempt < $max_attempts) {
    $temp_pin = str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT);
    
    // Check if PIN is already in use
    $stmt = $pdo->prepare("SELECT id FROM transfers WHERE pin = ? AND status != 'expired' AND status != 'completed'");
    $stmt->execute([$temp_pin]);
    if (!$stmt->fetch()) {
        $pin = $temp_pin;
        break;
    }
    $attempt++;
}

if (empty($pin)) {
    echo json_encode(['success' => false, 'error' => 'Failed to generate a unique PIN. Please try again.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO transfers (pin, sender_offer, status) VALUES (?, ?, 'waiting')");
    $stmt->execute([$pin, $offer]);
    $transfer_id = $pdo->lastInsertId();
    
    echo json_encode([
        'success' => true,
        'pin' => $pin,
        'transfer_id' => $transfer_id
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to register transfer: ' . $e->getMessage()]);
}
