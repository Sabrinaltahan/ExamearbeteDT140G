<?php
session_start();
require_once 'db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    } else {
        $error = "Invalid username or password.";
    }
}
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

    <?php if (!empty($error)): ?>
      <div class="error-message">
        <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="quote-form">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</section>

</body>
</html>