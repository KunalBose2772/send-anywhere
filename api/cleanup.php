<?php
// api/cleanup.php - Clean up expired transfers and candidates
header('Content-Type: application/json');

require_once __DIR__ . '/../db.php';

try {
    // Expire transfers older than 10 minutes
    $expiry_time = date('Y-m-d H:i:s', time() - 600);
    
    // First update expired ones
    $stmt1 = $pdo->prepare("UPDATE transfers SET status = 'expired' WHERE created_at < ? AND status IN ('waiting', 'ready', 'active')");
    $stmt1->execute([$expiry_time]);
    $expired_count = $stmt1->rowCount();
    
    // Delete transfers (and cascade delete candidates) older than 20 minutes to keep db clean
    $delete_time = date('Y-m-d H:i:s', time() - 1200);
    $stmt2 = $pdo->prepare("DELETE FROM transfers WHERE created_at < ?");
    $stmt2->execute([$delete_time]);
    $deleted_count = $stmt2->rowCount();
    
    echo json_encode([
        'success' => true,
        'expired' => $expired_count,
        'deleted' => $deleted_count
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Cleanup failed: ' . $e->getMessage()]);
}
