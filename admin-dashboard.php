<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM quote_requests ORDER BY created_at DESC");
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - ARAK Wood</title>
  <link rel="stylesheet" href="assets/css/style.css?v=7">
</head>
<body>

<section class="quote-page">
  <div class="container">
   <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:15px;">
  <div>
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></p>
  </div>
  <div style="display:flex; gap:10px; flex-wrap:wrap;">
    <a href="admin-products.php" class="btn">Manage Products</a>
    <a href="admin-logout.php" class="btn">Logout</a>
  </div>
</div>

    <?php if (isset($_GET['deleted'])): ?>
      <div class="success-message">Request deleted successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['updated'])): ?>
      <div class="success-message">Status updated successfully.</div>
    <?php endif; ?>

    <div class="admin-table-wrapper">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Service</th>
            <th>Width</th>
            <th>Height</th>
            <th>Depth</th>
            <th>Details</th>
            <th>Image</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($requests as $request): ?>
            <tr>
              <td><?php echo htmlspecialchars($request['full_name']); ?></td>
              <td><?php echo htmlspecialchars($request['phone']); ?></td>
              <td><?php echo htmlspecialchars($request['email']); ?></td>
              <td><?php echo htmlspecialchars($request['service_type']); ?></td>
              <td><?php echo htmlspecialchars($request['width']); ?> cm</td>
              <td><?php echo htmlspecialchars($request['height']); ?> cm</td>
              <td><?php echo htmlspecialchars($request['depth']); ?> cm</td>
              <td><?php echo htmlspecialchars($request['project_details']); ?></td>
              <td>
  <?php if (!empty($request['reference_image'])): ?>
    <a href="uploads/<?php echo htmlspecialchars($request['reference_image']); ?>" target="_blank">
      <img 
        src="uploads/<?php echo htmlspecialchars($request['reference_image']); ?>" 
        alt="Reference Image" 
        class="admin-thumb"
      >
    </a>
  <?php else: ?>
    No image
  <?php endif; ?>
</td>
              <td>
                <form action="update-status.php" method="POST" class="status-form">
                  <input type="hidden" name="id" value="<?php echo $request['id']; ?>">
                  <select name="status" onchange="this.form.submit()">
                    <option value="Pending" <?php if ($request['status'] === 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="In Progress" <?php if ($request['status'] === 'In Progress') echo 'selected'; ?>>In Progress</option>
                    <option value="Completed" <?php if ($request['status'] === 'Completed') echo 'selected'; ?>>Completed</option>
                  </select>
                </form>
              </td>
              <td><?php echo htmlspecialchars($request['created_at']); ?></td>
              <td>
                <a href="delete-request.php?id=<?php echo $request['id']; ?>" 
                   class="delete-btn"
                   onclick="return confirm('Are you sure you want to delete this request?');">
                   Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</section>

</body>
</html>