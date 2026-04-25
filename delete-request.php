<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // أول شي نجيب الصورة إذا موجودة
    $stmt = $pdo->prepare("SELECT reference_image FROM quote_requests WHERE id = ?");
    $stmt->execute([$id]);
    $request = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($request) {
        if (!empty($request['reference_image']) && file_exists("uploads/" . $request['reference_image'])) {
            unlink("uploads/" . $request['reference_image']);
        }

        $deleteStmt = $pdo->prepare("DELETE FROM quote_requests WHERE id = ?");
        $deleteStmt->execute([$id]);
    }
}

header("Location: admin-dashboard.php?deleted=1");
exit;
?>