<?php
$pageTitle = "Project Gallery - ARAK Wood";
include("includes/header.php");

$category = $_GET['category'] ?? 'kitchen';

$galleries = [

    'kitchen' => [
        'title' => 'Modern Kitchen',
        'images' => [
            'kitchen1.jpg',
            'kitchen2.jpg',
            'kitchen3.jpg',
            'kitchen4.jpg'
        ]
    ],

    'bedroom' => [
        'title' => 'Bedroom Interior',
        'images' => [
            'bedroom1.jpg',
            'bedroom2.jpg'
        ]
    ],

    'office' => [
        'title' => 'Office Solutions',
        'images' => [
            'office1.jpg',
            'office2.jpg',
            'office3.jpg'
        ]
    ],

    'cnc' => [
        'title' => 'CNC Design',
        'images' => [
            'cnc1.jpg',
            'cnc2.jpg',
            'cnc3.jpg'
        ]
    ],

    'display' => [
        'title' => 'Wood Display',
        'images' => [
            'display1.jpg',
            'display2.jpg',
            'display3.jpg',
            'display4.jpg'
        ]
    ]

];

$currentGallery = $galleries[$category];
?>

<section class="project-details-page">
  <div class="container">

    <h1 class="gallery-title">
      <?php echo $currentGallery['title']; ?>
    </h1>

    <div class="project-gallery">

      <?php foreach($currentGallery['images'] as $image): ?>

  <div class="gallery-item">
    <img 
      src="assets/images/<?php echo htmlspecialchars($image); ?>" 
      alt="<?php echo htmlspecialchars($currentGallery['title']); ?>"
    >
  </div>

<?php endforeach; ?>

    </div>

  </div>
</section>

<?php include("includes/footer.php"); ?>