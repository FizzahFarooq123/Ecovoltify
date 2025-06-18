<?php
session_start();

// Your secret key from Chatbase — DO NOT expose this in frontend
$secret = 'your_chatbase_secret_key'; // Replace with your actual secret

$userId = $_SESSION['userid'] ?? null;

if (!$userId) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

// Generate the HMAC hash
$userHash = hash_hmac('sha256', $userId, $secret);

// Return both to frontend as JSON
header('Content-Type: application/json');
echo json_encode([
    'userId' => $userId,
    'userHash' => $userHash
]);
?>
