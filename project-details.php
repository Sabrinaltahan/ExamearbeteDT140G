<?php
$pageTitle = "Project Details - ARAK Wood";

//header
include("includes/header.php");
?>


<section class="product-details-page">
  <div class="container product-details-layout">

    <div class="product-details-image-box">
      <img 
        src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
        alt="<?php echo htmlspecialchars($product['name']); ?>"
      >
    </div>

    <div class="product-details-content">
      <div class="product-badges">
        <?php if (!empty($product['category'])): ?>
          <span><?php echo htmlspecialchars($product['category']); ?></span>
        <?php endif; ?>

        <?php if (!empty($product['wood_type'])): ?>
          <span><?php echo htmlspecialchars($product['wood_type']); ?></span>
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

      <h1><?php echo htmlspecialchars($product['name']); ?></h1>

      <p class="product-description">
        <?php echo nl2br(htmlspecialchars($product['description'])); ?>
      </p>

      <div class="product-info-list">
        <div class="product-info-item">
          <strong>Category:</strong>
          <span><?php echo htmlspecialchars($product['category'] ?: 'N/A'); ?></span>
        </div>

        <div class="product-info-item">
          <strong>Wood Type:</strong>
          <span><?php echo htmlspecialchars($product['wood_type'] ?: 'N/A'); ?></span>
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