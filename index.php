<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ARAK Wood</title>

   <!------icons link------->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
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



  <footer class="site-footer" id="footer">
  <div class="container footer-grid">

    <!-- Company Info -->
    <div class="footer-col">
      <img src="assets/images/logo.png" alt="ARAK Wood Logo" class="footer-logo">
      <h3>ARAK Wood</h3>
      <p>
        We provide custom woodwork, furniture solutions, CNC cutting, and interior design services
        with quality and precision.
      </p>

      <!-- Social Icons -->
      <div class="social-icons">
        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

    <!-- Quick Links -->
    <div class="footer-col">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div class="footer-col">
      <h4>Contact Info</h4>
      <p>Email: info@arakwood.com</p>
      <p>Phone: +971 55 841 0400</p>
      <p>Location: Sharjah, UAE</p>
      <br>
 <h3>Working Hours</h3>
          <p>Monday - Thursday: 8:00 AM - 6:00 PM</p>
          <p>Friday: Closed</p>
          <p> Saturday + Sunday: 9:00AM - 04:00 PM </P>
    </div>

  </div>

  <div class="footer-bottom">
    <p>&copy; 2026 ARAK Wood. All rights reserved.</p>
  </div>
</footer>


  <!------java script------>
  <script src="assets/js/main.js"></script>
</body>
</html>