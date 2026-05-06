<?php
require_once 'db.php';

$limit = 10;
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

$sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($products as $product) {
  echo '
  <div class="product-item">
    <a href="product-details.php?id=' . $product['id'] . '">
      <img src="assets/images/' . htmlspecialchars($product['image']) . '">
    </a>
    <h3>' . htmlspecialchars($product['name']) . '</h3>
  </div>';
}