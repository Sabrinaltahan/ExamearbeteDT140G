<?php
// تشغيل الجلسة حتى نقدر نستخدم بيانات الأدمن المسجل دخوله
session_start();

// استدعاء ملف الاتصال بقاعدة البيانات
require_once 'db.php';

// حماية الصفحة: إذا الأدمن غير مسجل دخول يرجع لصفحة تسجيل الدخول
if (!isset($_SESSION["admin_id"])) {
    header("Location: admin-login.php");
    exit;
}

// جلب جميع طلبات عرض السعر من قاعدة البيانات، الأحدث أولاً
$stmt = $pdo->query("SELECT * FROM quote_requests ORDER BY created_at DESC");

// تحويل النتائج إلى مصفوفة
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - ARAK Wood</title>

  <!-- ربط ملف التنسيق -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<section class="quote-page">
  <div class="container">

    <!-- شريط أعلى لوحة التحكم -->
    <div class="admin-top-bar">
      <div>
        <h1>Admin Dashboard</h1>

        <!-- عرض اسم الأدمن -->
        <p>
          Welcome, <?php echo htmlspecialchars($_SESSION["admin_username"]); ?>
        </p>
      </div>

      <!-- زر تسجيل الخروج -->
      <a href="admin-logout.php" class="delete-btn">Logout</a>
    </div>

    <!-- جدول عرض طلبات عرض السعر -->
    <div class="admin-table-wrapper">
      <table class="admin-table">

        <!-- عناوين الأعمدة -->
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Product</th>
            <th>Service</th>
            <th>Dimensions</th>
            <th>Details</th>
            <th>Image</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>

        <tbody>

          <!-- التحقق إذا كان يوجد طلبات -->
          <?php if (!empty($requests)): ?>

            <!-- المرور على كل طلب وعرضه في صف داخل الجدول -->
            <?php foreach ($requests as $request): ?>
              <tr>

                <!-- بيانات العميل -->
                <td><?php echo htmlspecialchars($request["full_name"]); ?></td>
                <td><?php echo htmlspecialchars($request["phone"]); ?></td>
                <td><?php echo htmlspecialchars($request["email"]); ?></td>

                <!-- اسم المنتج إذا كان الطلب مرتبط بمنتج -->
                <td>
                  <?php echo htmlspecialchars($request["product_name"] ?? ""); ?>
                </td>

                <!-- نوع الخدمة المختارة -->
                <td><?php echo htmlspecialchars($request["service_type"]); ?></td>

                <!-- أبعاد المشروع -->
                <td>
                  <?php echo htmlspecialchars($request["width"]); ?> ×
                  <?php echo htmlspecialchars($request["height"]); ?> ×
                  <?php echo htmlspecialchars($request["depth"]); ?> cm
                </td>

                <!-- تفاصيل المشروع -->
                <td><?php echo htmlspecialchars($request["project_details"]); ?></td>

                <!-- صورة مرجعية إذا قام المستخدم برفع صورة -->
                <td>
                  <?php if (!empty($request["reference_image"])): ?>
                    <a 
                      href="uploads/<?php echo htmlspecialchars($request["reference_image"]); ?>" 
                      target="_blank"
                    >
                      <img 
                        src="uploads/<?php echo htmlspecialchars($request["reference_image"]); ?>" 
                        alt="Reference Image" 
                        class="admin-thumb"
                      >
                    </a>
                  <?php else: ?>
                    No image
                  <?php endif; ?>
                </td>

                <!-- حالة الطلب -->
                <td><?php echo htmlspecialchars($request["status"]); ?></td>

                <!-- تاريخ إرسال الطلب -->
                <td><?php echo htmlspecialchars($request["created_at"]); ?></td>

              </tr>
            <?php endforeach; ?>

          <!-- إذا لا يوجد طلبات -->
          <?php else: ?>
            <tr>
              <td colspan="10">No quote requests found.</td>
            </tr>
          <?php endif; ?>

        </tbody>
      </table>
    </div>

  </div>
</section>

</body>
</html>