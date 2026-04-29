<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: admin-dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - ARAK Wood</title>
  <link rel="stylesheet" href="assets/css/style.css?v=6">
</head>
<body>

<section class="quote-page">
  <div class="container">
    <h1>Admin Login</h1>
    <p>Please log in to access the dashboard.</p>

    <?php if (isset($_GET['error'])): ?>
      <div class="error-message">Invalid username or password.</div>
    <?php endif; ?>

    <form action="admin-login-process.php" method="POST" class="quote-form">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</section>

</body>
</html>