<?php
$pageTitle = "Request a Quote - ARAK Wood";
require_once 'db.php';
include("includes/header.php");

$success = false;
$errors = [];

// إذا المستخدم جاي من صفحة منتج
$selectedProduct = $_GET['product'] ?? "";
$preselectedService = $_GET['service'] ?? "";

// قيم الحقول
$name = "";
$phone = "";
$email = "";
$service = $preselectedService;
$width = "";
$height = "";
$depth = "";
$message = "";
$productName = $selectedProduct;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // جلب القيم من الفورم
    $name = trim($_POST["name"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $service = trim($_POST["service"] ?? "");
    $width = trim($_POST["width"] ?? "");
    $height = trim($_POST["height"] ?? "");
    $depth = trim($_POST["depth"] ?? "");
    $message = trim($_POST["message"] ?? "");
    $productName = trim($_POST["product_name"] ?? "");

    $uploadedFileName = null;

    // Validation
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($phone)) $errors[] = "Phone number is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email address.";
    if (empty($service)) $errors[] = "Please select a service.";
    if (!is_numeric($width) || $width <= 0) $errors[] = "Width must be a positive number.";
    if (!is_numeric($height) || $height <= 0) $errors[] = "Height must be a positive number.";
    if (!is_numeric($depth) || $depth <= 0) $errors[] = "Depth must be a positive number.";
    if (empty($message)) $errors[] = "Project details are required.";

    // تحقق بسيط من رقم الهاتف
    if (!preg_match('/^[0-9+\s()-]{7,20}$/', $phone)) {
        $errors[] = "Invalid phone number format.";
    }

    // رفع صورة إذا وجدت
    if (isset($_FILES['reference_image']) && $_FILES['reference_image']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
        $fileType = $_FILES['reference_image']['type'];
        $fileSize = $_FILES['reference_image']['size'];

        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Only JPG, PNG, and WEBP images are allowed.";
        } elseif ($fileSize > 2 * 1024 * 1024) {
            $errors[] = "Image size should be less than 2MB.";
        } else {
            $uploadDir = "uploads/";

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $originalName = basename($_FILES["reference_image"]["name"]);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newName = time() . "_" . rand(1000, 9999) . "." . $extension;
            $targetFile = $uploadDir . $newName;

            if (move_uploaded_file($_FILES["reference_image"]["tmp_name"], $targetFile)) {
                $uploadedFileName = $newName;
            } else {
                $errors[] = "Image upload failed.";
            }
        }
    }

    // حفظ في قاعدة البيانات
    if (empty($errors)) {
        $stmt = $pdo->prepare("
            INSERT INTO quote_requests 
            (full_name, phone, email, service_type, width, height, depth, project_details, reference_image, product_name)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $name,
            $phone,
            $email,
            $service,
            $width,
            $height,
            $depth,
            $message,
            $uploadedFileName,
            $productName
        ]);

        $success = true;

        // تفريغ الحقول بعد النجاح
        $name = "";
        $phone = "";
        $email = "";
        $service = $preselectedService;
        $width = "";
        $height = "";
        $depth = "";
        $message = "";
        $productName = $selectedProduct;
    }
}
?>

<section class="quote-page">
  <div class="container">
    <h1>Request a Quote</h1>
    <p>Fill in the form below and we will contact you shortly.</p>

    <?php if (!empty($errors)): ?>
      <div class="error-message">
        <?php foreach ($errors as $error): ?>
          <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success-message">
        Your request has been sent successfully!
      </div>
    <?php endif; ?>

    <form method="POST" class="quote-form" enctype="multipart/form-data">
      <input 
        type="text" 
        name="name" 
        placeholder="Full Name" 
        value="<?php echo htmlspecialchars($name); ?>" 
        required
      >

      <input 
        type="text" 
        name="phone" 
        placeholder="Phone Number" 
        value="<?php echo htmlspecialchars($phone); ?>" 
        required
      >

      <input 
        type="email" 
        name="email" 
        placeholder="Email Address" 
        value="<?php echo htmlspecialchars($email); ?>" 
        required
      >

      <?php if (!empty($selectedProduct)): ?>
        <input 
          type="text" 
          name="product_name" 
          value="<?php echo htmlspecialchars($selectedProduct); ?>" 
          readonly
        >
      <?php endif; ?>

      <select name="service" required>
        <option value="">Select Service</option>
        <option value="CNC Cutting" <?php if ($service === "CNC Cutting") echo "selected"; ?>>CNC Cutting</option>
        <option value="Laser Cutting" <?php if ($service === "Laser Cutting") echo "selected"; ?>>Laser Cutting</option>
        <option value="Press Service" <?php if ($service === "Press Service") echo "selected"; ?>>Press Service</option>
        <option value="Custom Design" <?php if ($service === "Custom Design") echo "selected"; ?>>Custom Design</option>
      </select>

      <div class="dimensions-grid">
        <input type="number" name="width" placeholder="Width (cm)" value="<?php echo htmlspecialchars($width); ?>" required min="1">
        <input type="number" name="height" placeholder="Height (cm)" value="<?php echo htmlspecialchars($height); ?>" required min="1">
        <input type="number" name="depth" placeholder="Depth (cm)" value="<?php echo htmlspecialchars($depth); ?>" required min="1">
      </div>

      <textarea 
        name="message" 
        placeholder="Project Details..." 
        required
      ><?php echo htmlspecialchars($message); ?></textarea>

      <label class="file-label">Upload Reference Image</label>
      <input type="file" name="reference_image" accept=".jpg,.jpeg,.png,.webp,image/*">

      <button type="submit">Send Request</button>
    </form>
  </div>
</section>

<?php include("includes/footer.php"); ?>