<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: admin-login.php");
    exit;
}

$username = trim($_POST["username"] ?? "");
$password = trim($_POST["password"] ?? "");

$stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
$stmt->execute([$username]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin && password_verify($password, $admin["password"])) {
    $_SESSION["admin_id"] = $admin["id"];
    $_SESSION["admin_username"] = $admin["username"];

    header("Location: admin-dashboard.php");
    exit;
}

header("Location: admin-login.php?error=invalid");
exit;