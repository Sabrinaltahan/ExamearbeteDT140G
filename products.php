<?php
$pageTitle = "Products - ARAK Wood";
require_once 'db.php';
include("includes/header.php");

/* Filters */
$serviceFilter = $_GET['service'] ?? '';
$statusFilter = $_GET['status'] ?? '';
$materialFilter = $_GET['material'] ?? '';
$lippingFilter = $_GET['lipping'] ?? '';
$veneerFilter = $_GET['veneer'] ?? '';
$chipboardsFilter = $_GET['chipboards'] ?? '';
$highPressureFilter = $_GET['high_pressure'] ?? '';

/* Query */
$limit = 10;
$offset = 0;

$sql = "SELECT * FROM products WHERE 1=1";
$params = [];

if ($serviceFilter) {
    $sql .= " AND service = ?";
    $params[] = $serviceFilter;
}

if ($statusFilter) {
    $sql .= " AND status = ?";
    $params[] = $statusFilter;
}

if ($materialFilter) {
    $sql .= " AND material = ?";
    $params[] = $materialFilter;
}

if ($lippingFilter) {
    $sql .= " AND lipping = ?";
    $params[] = $lippingFilter;
}

if ($veneerFilter) {
    $sql .= " AND veneer = ?";
    $params[] = $veneerFilter;
}

if ($chipboardsFilter) {
    $sql .= " AND chipboards = ?";
    $params[] = $chipboardsFilter;
}

if ($highPressureFilter) {
    $sql .= " AND high_pressure = ?";
    $params[] = $highPressureFilter;
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

      <select name="service">
        <option value="">All Services</option>
        <option value="CNC Cutting" <?= $serviceFilter=="CNC Cutting"?"selected":"" ?>>CNC Cutting</option>
        <option value="Laser Cutting" <?= $serviceFilter=="Laser Cutting"?"selected":"" ?>>Laser Cutting</option>
        <option value="Pressing Services" <?= $serviceFilter=="Pressing Services"?"selected":"" ?>>Pressing</option>
        <option value="Sanding & Calibrating" <?= $serviceFilter=="Sanding & Calibrating"?"selected":"" ?>>Sanding</option>
      </select>

      <select name="status">
        <option value="">Status</option>
        <option value="Available" <?= $statusFilter=="Available"?"selected":"" ?>>Available</option>
        <option value="Sold" <?= $statusFilter=="Sold"?"selected":"" ?>>Sold</option>
      </select>

      <select name="material">
        <option value="">Material</option>
        <option value="Wood" <?= $materialFilter=="Wood"?"selected":"" ?>>Wood</option>
        <option value="MDF" <?= $materialFilter=="MDF"?"selected":"" ?>>MDF</option>
      </select>

      <select name="lipping">
        <option value="">Lipping</option>
        <option value="Yes" <?= $lippingFilter=="Yes"?"selected":"" ?>>Yes</option>
        <option value="No" <?= $lippingFilter=="No"?"selected":"" ?>>No</option>
      </select>

      <select name="veneer">
        <option value="">Veneer</option>
        <option value="Natural Veneer" <?= $veneerFilter=="Natural Veneer"?"selected":"" ?>>Natural</option>
        <option value="Recon Veneer" <?= $veneerFilter=="Recon Veneer"?"selected":"" ?>>Recon</option>
      </select>

      <select name="chipboards">
        <option value="">Chipboards</option>
        <option value="Yes" <?= $chipboardsFilter=="Yes"?"selected":"" ?>>Yes</option>
        <option value="No" <?= $chipboardsFilter=="No"?"selected":"" ?>>No</option>
      </select>

      <select name="high_pressure">
        <option value="">High Pressure</option>
        <option value="HPL" <?= $highPressureFilter=="HPL"?"selected":"" ?>>HPL</option>
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
              <img src="assets/images/<?= htmlspecialchars($product['image']) ?>">
            </a>

            <h3><?= htmlspecialchars($product['name']) ?></h3>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <p>No products found</p>
      <?php endif; ?>

    </div>

    <div class="load-more-wrapper">
  <button id="loadMoreBtn">Load More</button>
</div>

  </div>
</section>

<?php include("includes/footer.php"); ?>