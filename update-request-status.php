<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION["admin_id"])) {
    header("Location: admin-login.php");
    exit;
}

$id = $_POST["id"] ?? 0;
$status = $_POST["status"] ?? "Pending";

$allowedStatuses = ["Pending", "In Progress", "Completed"];

if (in_array($status, $allowedStatuses)) {
    $stmt = $pdo->prepare("UPDATE quote_requests SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
}

header("Location: admin-dashboard.php");
exit;