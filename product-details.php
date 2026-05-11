<?php
$pageTitle = "Product Details - ARAK Wood";

// connect database
require_once 'db.php';
//header
include("includes/header.php");

// جلب id من الرابط
$id = $_GET['id'] ?? 0;

// تجهيز استعلام المنتج
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// إذا ما في منتج
if (!$product) {
    echo "<section class='products-page'><div class='container'><p>Product not found.</p></div></section>";
    include("includes/footer.php");
    exit;
}
?>

<section class="product-details-page">
  <div class="container product-details-layout">

    <!-- product image-->
    <div class="product-details-image-box">
      <img 
        src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
        alt="<?php echo htmlspecialchars($product['name']); ?>"
      >
    </div>

    <!-- product description  -->
    <div class="product-details-content">

      <!-- تصنيفات صغيرة فوق -->
      <div class="product-badges">
        <?php if (!empty($product['category'])): ?>
          <span><?php echo htmlspecialchars($product['category']); ?></span>
        <?php endif; ?>

        <?php if (!empty($product['service'])): ?>
          <span><?php echo htmlspecialchars($product['service']); ?></span>
        <?php endif; ?>

        <?php if (!empty($product['status'])): ?>
          <span class="status-badge <?php echo strtolower(str_replace(' ', '-', $product['status'])); ?>">
            <?php echo htmlspecialchars($product['status']); ?>
          </span>
        <?php endif; ?>
      </div>

      <!-- product name -->
      <h1><?php echo htmlspecialchars($product['name']); ?></h1>

      <!-- اdescription -->
      <p class="product-description">
        <?php echo nl2br(htmlspecialchars($product['description'])); ?>
      </p>

      <!-- details  -->
      <div class="product-info-list">
        <div class="product-info-item">
          <strong>Category:</strong>
          <span><?php echo htmlspecialchars($product['category'] ?: 'N/A'); ?></span>
        </div>

        <div class="product-info-item">
          <strong>Service:</strong>
          <span><?php echo htmlspecialchars($product['service'] ?: 'N/A'); ?></span>
        </div>

        <div class="product-info-item">
          <strong>Status:</strong>
          <span><?php echo htmlspecialchars($product['status'] ?: 'N/A'); ?></span>
        </div>
      </div>

      <!-- buttons-->
      <div class="product-details-actions">
        <a href="request-quote.php?product=<?php echo urlencode($product['name']); ?>&service=<?php echo urlencode($product['service']); ?>" class="btn">
          Request a Quote
        </a>

        <a href="products.php" class="secondary-btn">
          Back to Products
        </a>
      </div>

    </div>
  </div>
</section>

<?php include("includes/footer.php"); ?>