<?php
$pageTitle = "Products - ARAK Wood";
require_once 'db.php';
include("includes/header.php");

// جلب كل المنتجات من قاعدة البيانات
$stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="products-page">
  <div class="container">

    <div class="section-heading">
      <h1>Our Products</h1>
      <p>
        Explore a selection of our wood products and custom solutions designed
        with quality, functionality, and attention to detail.
      </p>
    </div>

    <div class="products-grid">

      <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
          <div class="product-card">
            <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">

            <div class="product-card-content">
              <h3><?php echo htmlspecialchars($product['name']); ?></h3>

              <p>
                <?php echo htmlspecialchars($product['description']); ?>
              </p>

              <a href="product-details.php?id=<?php echo $product['id']; ?>" class="btn">View Details</a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No products found.</p>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php include("includes/footer.php"); ?>