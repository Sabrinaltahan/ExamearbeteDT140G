<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit;
}

$success = false;
$errors = [];

$name = "";
$category = "";
$description = "";
$wood_type = "";
$status = "";
$service = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $category = trim($_POST["category"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $wood_type = trim($_POST["wood_type"] ?? "");
    $status = trim($_POST["status"] ?? "");
    $service = trim($_POST["service"] ?? "");
    $uploadedFileName = null;

    if (empty($name)) {
        $errors[] = "Product name is required.";
    }

    if (empty($category)) {
        $errors[] = "Category is required.";
    }

    if (empty($description)) {
        $errors[] = "Product description is required.";
    }

    if (empty($wood_type)) {
        $errors[] = "Wood type is required.";
    }

    if (empty($status)) {
        $errors[] = "Status is required.";
    }

    if (empty($service)) {
        $errors[] = "Service is required.";
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
        $fileType = $_FILES['image']['type'];

        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Only JPG, PNG, and WEBP images are allowed.";
        } else {
            $uploadDir = "assets/images/";

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $originalName = basename($_FILES["image"]["name"]);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newName = time() . "_" . rand(1000, 9999) . "." . $extension;
            $targetFile = $uploadDir . $newName;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $uploadedFileName = $newName;
            } else {
                $errors[] = "Image upload failed.";
            }
        }
    } else {
        $errors[] = "Product image is required.";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("
            INSERT INTO products (name, category, description, image, wood_type, status, service) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $name,
            $category,
            $description,
            $uploadedFileName,
            $wood_type,
            $status,
            $service
        ]);

        $success = true;

        $name = "";
        $category = "";
        $description = "";
        $wood_type = "";
        $status = "";
        $service = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product - ARAK Wood</title>
  <link rel="stylesheet" href="assets/css/style.css?v=10">
</head>
<body>

<section class="quote-page">
  <div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:15px;">
      <div>
        <h1>Add Product</h1>
        <p>Create a new product for the website.</p>
      </div>
      <div style="display:flex; gap:10px; flex-wrap:wrap;">
        <a href="admin-dashboard.php" class="btn">Dashboard</a>
        <a href="admin-products.php" class="btn">Manage Products</a>
      </div>
    </div>

    <?php if (!empty($errors)): ?>
      <div class="error-message">
        <?php foreach ($errors as $error): ?>
          <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success-message">Product added successfully.</div>
    <?php endif; ?>

    <form method="POST" class="quote-form" enctype="multipart/form-data">
      <input 
        type="text" 
        name="name" 
        placeholder="Product Name" 
        value="<?php echo htmlspecialchars($name); ?>" 
        required
      >

      <input 
        type="text" 
        name="category" 
        placeholder="Category" 
        value="<?php echo htmlspecialchars($category); ?>" 
        required
      >

      <textarea 
        name="description" 
        placeholder="Product Description" 
        required
      ><?php echo htmlspecialchars($description); ?></textarea>

  

      <select name="status" required>
        <option value="">Select Status</option>
        <option value="Available" <?php if ($status === "Available") echo "selected"; ?>>Available</option>
        <option value="Sold" <?php if ($status === "Sold") echo "selected"; ?>>Sold</option>
      </select>

      <select name="service" required>
        <option value="">Select Service</option>
        <option value="CNC Cutting" <?php if ($service === "CNC Cutting") echo "selected"; ?>>CNC Cutting</option>
        <option value="Laser Cutting" <?php if ($service === "Laser Cutting") echo "selected"; ?>>Laser Cutting</option>
        <option value="Pressing Service" <?php if ($service === "Pressing Service") echo "selected"; ?>>Pressing Service</option>
        <option value="Sanding" <?php if ($service === "Sanding") echo "selected"; ?>>Sanding</option>
      </select>

      <label class="file-label">Upload Product Image</label>
      <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp,image/*" required>

      <button type="submit">Add Product</button>
    </form>
  </div>
</section>

</body>
</html>