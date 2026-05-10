<?php
$pageTitle = "Products - ARAK Wood";
require_once 'db.php';
include("includes/header.php");

/* Filters */
$categoryFilter = $_GET['category'] ?? '';
$serviceFilter  = $_GET['service'] ?? '';
$statusFilter   = $_GET['status'] ?? '';

$limit = 10;
$offset = 0;

$sql = "SELECT * FROM products WHERE 1=1";
$params = [];

/* Category filter */
if ($categoryFilter) {
    $sql .= " AND category = ?";
    $params[] = $categoryFilter;
}

/* Service filter */
if ($serviceFilter) {
    $sql .= " AND service = ?";
    $params[] = $serviceFilter;
}

/* Status filter */
if ($statusFilter) {
    $sql .= " AND status = ?";
    $params[] = $statusFilter;
}

$sql .= " ORDER BY created_at DESC LIMIT $limit OFFSET $offset";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="products-page">
  <div class="container">

    <div class="section-heading">
      <h1>Our Products</h1>
      <p>Explore our wood products and custom solutions.</p>
    </div>

    <!-- Filters -->
    <form method="GET" class="products-filter">

      <select name="category">
        <option value="">All Categories</option>
        <option value="Veneer" <?= $categoryFilter == "Veneer" ? "selected" : "" ?>>Veneer</option>
        <option value="Chipboard" <?= $categoryFilter == "Chipboard" ? "selected" : "" ?>>Chipboard</option>
        <option value="Lipping" <?= $categoryFilter == "Lipping" ? "selected" : "" ?>>Lipping</option>
        <option value="High Pressure" <?= $categoryFilter == "High Pressure" ? "selected" : "" ?>>High Pressure</option>
      </select>

      <select name="status">
        <option value="">All Status</option>
        <option value="Available" <?= $statusFilter == "Available" ? "selected" : "" ?>>Available</option>
        <option value="Sold" <?= $statusFilter == "Sold" ? "selected" : "" ?>>Sold</option>
      </select>

      <select name="service">
        <option value="">All Services</option>
        <option value="CNC" <?= $serviceFilter == "CNC" ? "selected" : "" ?>>CNC</option>
        <option value="Laser" <?= $serviceFilter == "Laser" ? "selected" : "" ?>>Laser</option>
        <option value="Pressing" <?= $serviceFilter == "Pressing" ? "selected" : "" ?>>Pressing</option>
        <option value="Sanding" <?= $serviceFilter == "Sanding" ? "selected" : "" ?>>Sanding</option>
      </select>

      <button type="submit">Filter</button>
      <a href="products.php" class="reset-btn">Reset</a>

    </form>

    <!-- Products -->
    <div class="products-grid">

      <?php if ($products): ?>
        <?php foreach ($products as $product): ?>

          <div class="product-item">
            <a href="product-details.php?id=<?= $product['id'] ?>">
              <img 
                src="assets/images/<?= htmlspecialchars($product['image']) ?>" 
                alt="<?= htmlspecialchars($product['name']) ?>"
              >
            </a>

            <h3><?= htmlspecialchars($product['name']) ?></h3>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <p class="no-products">No products found</p>
      <?php endif; ?>

    </div>

    <div class="load-more-wrapper">
      <button id="loadMoreBtn">Load More</button>
    </div>

  </div>
</section>

<?php include("includes/footer.php"); ?>