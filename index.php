<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ARAK Wood</title>
  
 <!------css style------>
  <link rel="stylesheet" href="assets/css/style.css?v=31">
</head>
<body>

  <!-- Header -->
  <header class="site-header">
    <div class="container header-container">

      <!-- Logo -->
      <a href="index.php" class="logo">
        <img src="assets/images/logo.png" alt="ARAK Wood Logo">
      </a>

      <!-- Navigation -->
      <nav class="navbar" id="navbar">
        <ul class="nav-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#projects">Products</a></li>
          <li><a href="service.php">Services</a></li>
          <li><a href="#why-arak">About Us</a></li>
          <li><a href="#footer">Contact</a></li>
        </ul>
      </nav>

      <!-- CTA -->
      <a href="#" class="header-btn">Request a Quote</a>

      <!-- Mobile Menu -->
      <button class="menu-toggle" id="menuToggle">&#9776;</button>
    </div>
  </header>

   <!-- Hero Section -->
  <section class="hero" id="home">
    <video autoplay muted loop playsinline class="hero-video">
      <source src="assets/videos/hero-video.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <div class="hero-overlay"></div>

    <div class="hero-content">
      <h1>Crafting Quality Woodwork</h1>
      <p>
        Custom furniture, CNC cutting, and interior wood solutions
        designed with quality and precision.
      </p>
      <a href="request-quote.php" class="btn">Request a Quote</a>
    </div>
  </section>



   <!-- Recent Projects -->
  <section class="recent-projects-modern" id="projects">
    <div class="projects-wrapper">
      <button class="scroll-btn left" id="scrollLeft">&#10094;</button>

      <div class="projects-row" id="projectsRow">
        <a href="project-details.php?id=1" class="project-modern-card scroll-animate">
          <img src="assets/images/project1.jpg" alt="Modern Kitchen">
          <div class="project-modern-overlay">
            <h3>Modern Kitchen</h3>
          </div>
        </a>

        <a href="project-details.php?id=2" class="project-modern-card scroll-animate">
          <img src="assets/images/project2.jpg" alt="Bedroom Interior">
          <div class="project-modern-overlay">
            <h3>Bedroom Interior</h3>
          </div>
        </a>

        <a href="project-details.php?id=3" class="project-modern-card scroll-animate">
          <img src="assets/images/project3.jpg" alt="Office Solutions">
          <div class="project-modern-overlay">
            <h3>Office Solutions</h3>
          </div>
        </a>

        <a href="project-details.php?id=4" class="project-modern-card scroll-animate">
          <img src="assets/images/project4.jpg" alt="CNC Design">
          <div class="project-modern-overlay">
            <h3>CNC Design</h3>
          </div>
        </a>

        <a href="project-details.php?id=5" class="project-modern-card scroll-animate">
          <img src="assets/images/project5.jpg" alt="Wood Display">
          <div class="project-modern-overlay">
            <h3>Wood Display</h3>
          </div>
        </a>
      </div>

      <button class="scroll-btn right" id="scrollRight">&#10095;</button>
    </div>
  </section>




  <!-- Services Section -->
  <section class="services-section" id="services">
    <div class="container">
      <div class="section-heading">
        <h2 class="scroll-animate">Our Services</h2>
        <p class="scroll-animate">We provide a range of professional woodwork and finishing services.</p>
      </div>

      <div class="services-grid">
        <div class="service-card scroll-left">
          <img src="assets/images/service1.jpg" alt="CNC Service">
          <div class="service-card-content">
            <h3>CNC Cutting</h3>
            <a href="services.php#cnc-cutting" class="read-more-btn">Read More</a>
          </div>
        </div>

        <div class="service-card scroll-right">
          <img src="assets/images/service2.jpg" alt="Laser Service">
          <div class="service-card-content">
            <h3>Laser Cutting</h3>
            <a href="services.php#laser-cutting" class="read-more-btn">Read More</a>
          </div>
        </div>

        <div class="service-card scroll-left">
          <img src="assets/images/service3.jpg" alt="Press Service">
          <div class="service-card-content">
            <h3>Press Service</h3>
            <a href="services.php#press-service" class="read-more-btn">Read More</a>
          </div>
        </div>

        <div class="service-card scroll-right">
          <img src="assets/images/service4.jpg" alt="Custom Design">
          <div class="service-card-content">
            <h3>Custom Design</h3>
            <a href="services.php#custom-design" class="read-more-btn">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!------java script------>
  <script src="assets/js/main.js"></script>
</body>
</html>