<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $allowedStatuses = ['Pending', 'In Progress', 'Completed'];

    if (in_array($status, $allowedStatuses)) {
        $stmt = $pdo->prepare("UPDATE quote_requests SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
    }
}

header("Location: admin-dashboard.php?updated=1");
exit;
?>