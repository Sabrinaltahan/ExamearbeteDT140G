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
            'kitchen5.jpg',
            'about2.jpg',
            'kitchen6.jpg',
            'kitchen7.jpg',
            'kitchen8.jpg',
            'kitchen9.jpg'
        ]
    ],

    'bedroom' => [
        'title' => 'Bedroom Interior',
        'images' => [
            'bedroom1.jpg',
            'bedroom2.jpg',
             'bedroom3.jpg',
              'bedroom4.jpg',
               'bedroom5.jpg'
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
            'cnc3.jpg',
            'cnc5.jpg',
            'about3.jpg'
        ]
    ],

    'display' => [
        'title' => 'Wood Display',
        'images' => [
            'display1.jpg',
            'display2.jpg',
            'display3.jpg',
            'display4.jpg',
            'about1.jpg'
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

    <!-- Image Popup -->
<div class="image-popup" id="imagePopup">
  <span class="close-popup">&times;</span>

  <img id="popupImage" src="" alt="">
</div>

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


<script>

const galleryImages = document.querySelectorAll('.gallery-item img');
const popup = document.getElementById('imagePopup');
const popupImage = document.getElementById('popupImage');
const closePopup = document.querySelector('.close-popup');

galleryImages.forEach(img => {

  img.addEventListener('click', () => {

    popup.style.display = 'flex';
    popupImage.src = img.src;

  });

});

closePopup.addEventListener('click', () => {

  popup.style.display = 'none';

});

popup.addEventListener('click', (e) => {

  if(e.target === popup){
    popup.style.display = 'none';
  }

});

</script>

<?php include("includes/footer.php"); ?>