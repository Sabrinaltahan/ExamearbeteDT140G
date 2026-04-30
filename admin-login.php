<?php
session_start();

if (isset($_SESSION["admin_id"])) {
    header("Location: admin-dashboard.php");
    exit;
}

$error = $_GET["error"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - ARAK Wood</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<section class="quote-page">
  <div class="container">
    <h1>Admin Login</h1>

    <?php if ($error === "invalid"): ?>
      <div class="error-message">Invalid username or password.</div>
    <?php endif; ?>

    <form method="POST" action="admin-login-process.php" class="quote-form">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</section>

</body>
</html>