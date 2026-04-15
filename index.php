
<?php
$pageTitle = "Home - ARAK Wood";
include("includes/header.php");
?>


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



   <!------wood features section------->
    <section class="wood-features-section">
  <div class="container">

    <div class="section-heading">
      <h2>Wood Features</h2>
      <p>Our materials are designed to meet the highest standards of quality and durability.</p>
    </div>

    <div class="features-grid">

  <div class="feature-item">
    <i class="fas fa-fire"></i>
    <p>Fire-resistant</p>
  </div>

  <div class="feature-item">
    <i class="fas fa-tint"></i>
    <p>Water-resistant</p>
  </div>

  <div class="feature-item">
    <i class="fas fa-thermometer-half"></i>
    <p>Heat-resistant</p>
  </div>

  <div class="feature-item">
    <i class="fas fa-flask"></i>
    <p>Chemical-resistant</p>
  </div>

  <div class="feature-item">
    <i class="fas fa-palette"></i>
    <p>Colorful</p>
  </div>

  <div class="feature-item">
    <i class="fas fa-broom"></i>
    <p>Easy to Clean</p>
  </div>

</div>
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
            <a href="service.php#cnc-cutting" class="read-more-btn">Read More</a>
          </div>
        </div>

        <div class="service-card scroll-right">
          <img src="assets/images/service2.jpg" alt="Laser Service">
          <div class="service-card-content">
            <h3>Laser Cutting</h3>
            <a href="service.php#laser-cutting" class="read-more-btn">Read More</a>
          </div>
        </div>

        <div class="service-card scroll-left">
          <img src="assets/images/service3.jpg" alt="Press Service">
          <div class="service-card-content">
            <h3>Press Service</h3>
            <a href="service.php#press-service" class="read-more-btn">Read More</a>
          </div>
        </div>

        <div class="service-card scroll-right">
          <img src="assets/images/service4.jpg" alt="Custom Design">
          <div class="service-card-content">
            <h3>Custom Design</h3>
            <a href="service.php#custom-design" class="read-more-btn">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>



   <!-- Why Choose ARAK -->
  <section class="why-choose-section" id="why-arak">
    <div class="container">
      <div class="section-heading">
        <h2 class="scroll-animate">Why Choose ARAK?</h2>
        <p class="scroll-animate">We combine craftsmanship, quality, and custom solutions to bring every project to life.</p>
      </div>

      <div class="why-grid">
        <div class="why-card scroll-left">
          <h3>High Quality</h3>
          <p>
            We focus on durable materials, precise finishing, and professional woodwork in every project.
          </p>
          <a href="about.php" class="read-more-btn">Read More</a>
        </div>

        <div class="why-card scroll-animate">
          <h3>Custom Solutions</h3>
          <p>
            Every client has different needs, so we create custom designs and tailored wood solutions.
          </p>
          <a href="about.php" class="read-more-btn">Read More</a>
        </div>

        <div class="why-card scroll-right">
          <h3>Experienced Team</h3>
          <p>
            Our team has practical experience in furniture, CNC work, and interior wood design.
          </p>
          <a href="about.php" class="read-more-btn">Read More</a>
        </div>
      </div>
    </div>
  </section>


   <!-- Brands Section -->
  <section class="brands-section" id="brands">
    <div class="container">
      <div class="section-heading">
        <h2 class="scroll-animate">Brands</h2>
        <p class="scroll-animate">Companies and partners we have worked with.</p>
      </div>

      <div class="brands-grid">
        <div class="brand-card scroll-left">
          <img src="assets/images/brand1.png" alt="Brand 1">
        </div>

        <div class="brand-card scroll-animate">
          <img src="assets/images/brand2.png" alt="Brand 2">
        </div>

        <div class="brand-card scroll-animate">
          <img src="assets/images/brand3.png" alt="Brand 3">
        </div>

        <div class="brand-card scroll-right">
          <img src="assets/images/brand4.png" alt="Brand 4">
        </div>

        <div class="brand-card scroll-left">
          <img src="assets/images/brand5.png" alt="Brand 5">
        </div>

        <div class="brand-card scroll-right">
          <img src="assets/images/brand6.png" alt="Brand 6">
        </div>
      </div>
    </div>
  </section>


<?php include("includes/footer.php"); ?>