<?php
session_start();

// الاتصال بقاعدة البيانات
require_once 'db.php';

// حماية الصفحة (إذا مو مسجل دخول)
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit;
}


// 🔍 جلب قيمة البحث
$search = trim($_GET['search'] ?? "");


// 📦 جلب المنتجات (مع أو بدون بحث)
if (!empty($search)) {

    $stmt = $pdo->prepare("
        SELECT * FROM products 
        WHERE name LIKE ? 
        OR description LIKE ? 
        OR category LIKE ?
        ORDER BY created_at DESC
    ");

    $stmt->execute([
        "%$search%",
        "%$search%",
        "%$search%"
    ]);

} else {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
}

// تحويل النتائج إلى array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <!-- Responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Admin Products - ARAK Wood</title>

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/style.css?v=22">
</head>
<body>

<section class="quote-page">
  <div class="container">

    <!-- العنوان -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap;">
      <div>
        <h1>Products Management</h1>
        <p>Manage your products here</p>
      </div>

      <div>
        <a href="admin-add-product.php" class="btn">+ Add Product</a>
        <a href="admin-dashboard.php" class="btn">Dashboard</a>
      </div>
    </div>

   
    <!--  SEARCH -->
    <form method="GET" style="margin-bottom:20px; display:flex; gap:10px; flex-wrap:wrap;">
      
      <input 
        type="text" 
        name="search" 
        placeholder="Search products..." 
        value="<?php echo htmlspecialchars($search); ?>"
        style="padding:10px; border:1px solid #ccc; border-radius:6px; min-width:250px;"
      >

      <button type="submit" class="btn">Search</button>

      <!-- زر إعادة -->
      <?php if (!empty($search)): ?>
        <a href="admin-products.php" class="btn" style="background:#999;">
          Reset
        </a>
      <?php endif; ?>

    </form>

    <!-- رسائل -->
    <?php if (isset($_GET['deleted'])): ?>
      <div class="success-message">Product deleted successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['updated'])): ?>
      <div class="success-message">Product updated successfully.</div>
    <?php endif; ?>

    <!-- 📋 جدول المنتجات -->
    <div class="admin-table-wrapper">
      <table class="admin-table">

        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Wood</th>
            <th>Status</th>
            <th>Service</th>
            <th>Description</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>

          <!-- إذا في منتجات -->
          <?php if (!empty($products)): ?>

            <?php foreach ($products as $product): ?>
              <tr>

                <!-- الصورة -->
                <td>
                  <?php if (!empty($product['image'])): ?>
                    <img 
                      src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
                      class="admin-thumb"
                    >
                  <?php else: ?>
                    <span style="color:#777;">No image</span>
                  <?php endif; ?>
                </td>

                <!-- البيانات -->
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['category'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($product['wood_type'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($product['status'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($product['service'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td><?php echo htmlspecialchars($product['created_at']); ?></td>

                <!-- العمليات -->
                <td>
                  <a href="edit-product.php?id=<?php echo $product['id']; ?>" class="btn admin-action-btn">
                    Edit
                  </a>

                  <br><br>

                  <a 
                    href="delete-product.php?id=<?php echo $product['id']; ?>" 
                    class="delete-btn"
                    onclick="return confirm('Are you sure you want to delete this product?');"
                  >
                    Delete
                  </a>
                </td>

              </tr>
            <?php endforeach; ?>

          <?php else: ?>

            <!-- إذا ما في نتائج -->
            <tr>
              <td colspan="9" style="text-align:center;">
                No products found
              </td>
            </tr>

          <?php endif; ?>

        </tbody>

      </table>
    </div>

  </div>
</section>

</body>
</html>