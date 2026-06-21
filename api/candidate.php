<?php
// api/candidate.php - Send or receive ICE candidates
header('Content-Type: application/json');

require_once __DIR__ . '/../db.php';

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    echo json_encode(['success' => false, 'error' => 'Invalid JSON input.']);
    exit;
}

$action = isset($input['action']) ? $input['action'] : '';
$transfer_id = isset($input['transfer_id']) ? (int)$input['transfer_id'] : 0;

if ($transfer_id <= 0) {
    echo json_encode(['success' => false, 'error' => 'Valid transfer_id is required.']);
    exit;
}

try {
    if ($action === 'send') {
        if (!isset($input['sender']) || !isset($input['candidate']) || empty($input['candidate'])) {
            echo json_encode(['success' => false, 'error' => 'sender and candidate are required.']);
            exit;
        }
        
        $sender = (int)$input['sender']; // 1 = sender, 0 = receiver
        $candidate = json_encode($input['candidate']);
        
        $stmt = $pdo->prepare("INSERT INTO ice_candidates (transfer_id, sender, candidate) VALUES (?, ?, ?)");
        $stmt->execute([$transfer_id, $sender, $candidate]);
        
        echo json_encode(['success' => true]);
        
    } elseif ($action === 'get') {
        // If the sender is calling get, it wants receiver candidates (sender = 0).
        // If receiver is calling get, it wants sender candidates (sender = 1).
        if (!isset($input['sender'])) {
            echo json_encode(['success' => false, 'error' => 'sender parameter is required to identify whose candidates to retrieve.']);
            exit;
        }
        
        $target_sender = (int)$input['sender'];
        
        $stmt = $pdo->prepare("SELECT id, candidate FROM ice_candidates WHERE transfer_id = ? AND sender = ? ORDER BY id ASC");
        $stmt->execute([$transfer_id, $target_sender]);
        $rows = $stmt->fetchAll();
        
        $candidates = [];
        foreach ($rows as $row) {
            $candidates[] = [
                'id' => $row['id'],
                'candidate' => json_decode($row['candidate'], true)
            ];
        }
        
        echo json_encode([
            'success' => true,
            'candidates' => $candidates
        ]);
        
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid action. Must be "send" or "get".']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
