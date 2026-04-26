<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit;
}

$id = $_GET['id'] ?? 0;

// جلب المنتج
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Product not found";
    exit;
}

$success = false;
$errors = [];

// القيم الحالية
$name = $product['name'];
$category = $product['category'];
$description = $product['description'];
$wood_type = $product['wood_type'];
$status = $product['status'];
$service = $product['service'];
$currentImage = $product['image'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $category = trim($_POST["category"]);
    $description = trim($_POST["description"]);
    $wood_type = trim($_POST["wood_type"]);
    $status = trim($_POST["status"]);
    $service = trim($_POST["service"]);

    if (empty($name)) $errors[] = "Name is required.";
    if (empty($category)) $errors[] = "Category is required.";
    if (empty($description)) $errors[] = "Description is required.";
    if (empty($wood_type)) $errors[] = "Wood type is required.";
    if (empty($status)) $errors[] = "Status is required.";
    if (empty($service)) $errors[] = "Service is required.";

    $newImageName = $currentImage;

    // إذا رفع صورة جديدة
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
        $fileType = $_FILES['image']['type'];

        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Only JPG, PNG, WEBP allowed.";
        } else {

            $uploadDir = "assets/images/";

            $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $newImageName = time() . "_" . rand(1000,9999) . "." . $extension;

            $targetFile = $uploadDir . $newImageName;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

                // حذف القديمة
                if (!empty($currentImage) && file_exists($uploadDir . $currentImage)) {
                    unlink($uploadDir . $currentImage);
                }

            } else {
                $errors[] = "Image upload failed.";
            }
        }
    }

    if (empty($errors)) {

        $stmt = $pdo->prepare("
            UPDATE products 
            SET name=?, category=?, description=?, image=?, wood_type=?, status=?, service=? 
            WHERE id=?
        ");

        $stmt->execute([
            $name,
            $category,
            $description,
            $newImageName,
            $wood_type,
            $status,
            $service,
            $id
        ]);

        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Product</title>
<link rel="stylesheet" href="assets/css/style.css?v=11">
</head>

<body>

<section class="quote-page">
<div class="container">

<h1>Edit Product</h1>

<?php if (!empty($errors)): ?>
<div class="error-message">
<?php foreach ($errors as $error): ?>
<p><?php echo htmlspecialchars($error); ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php if ($success): ?>
<div class="success-message">Product updated successfully.</div>
<?php endif; ?>

<form method="POST" class="quote-form" enctype="multipart/form-data">

<input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

<input type="text" name="category" value="<?php echo htmlspecialchars($category); ?>" required>

<textarea name="description" required><?php echo htmlspecialchars($description); ?></textarea>

<input type="text" name="wood_type" value="<?php echo htmlspecialchars($wood_type); ?>" required>

<select name="status" required>
  <option value="">Select Status</option>
  <option value="Available" <?php if ($status=="Available") echo "selected"; ?>>Available</option>
  <option value="Sold" <?php if ($status=="Sold") echo "selected"; ?>>Sold</option>
</select>

<select name="service" required>
  <option value="">Select Service</option>
  <option value="CNC Cutting" <?php if ($service=="CNC Cutting") echo "selected"; ?>>CNC Cutting</option>
  <option value="Laser Cutting" <?php if ($service=="Laser Cutting") echo "selected"; ?>>Laser Cutting</option>
  <option value="Press Service" <?php if ($service=="Press Service") echo "selected"; ?>>Press Service</option>
  <option value="Custom Design" <?php if ($service=="Custom Design") echo "selected"; ?>>Custom Design</option>
</select>

<p>Current Image:</p>
<img src="assets/images/<?php echo htmlspecialchars($currentImage); ?>" class="admin-thumb">

<label>Change Image (optional)</label>
<input type="file" name="image">

<button type="submit">Update Product</button>

</form>

<br>
<a href="admin-products.php" class="btn">Back</a>

</div>
</section>

</body>
</html>