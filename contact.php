<?php
$pageTitle = "Contact - ARAK Wood";
include("includes/header.php");
?>



   <div class="contact-layout">

      <!-- Contact Info -->
      <div class="contact-info-box">
        <h2>Get in Touch</h2>

        <div class="contact-info-item">
          <h3>Email</h3>
          <p>info@arakwood.com</p>
        </div>

        <div class="contact-info-item">
          <h3>Phone</h3>
          <p>+971 55 841 0400</p>
        </div>

        <div class="contact-info-item">
          <h3>Location</h3>
          <p>Sharjah, United Arab Emirates,
             near National paints</p>
        </div>

        <div class="contact-info-item">
          <h3>Working Hours</h3>
          <p>Monday - Thursday: 8:00 AM - 6:00 PM</p>
          <p>Friday: Closed</p>
          <p> Saturday + Sunday: 9:00AM - 04:00 PM </P>
        </div>
      </div>




       <!-- Contact Form -->
      <div class="contact-form-box">
        <h2>Send a Message</h2>

        <form method="POST" class="contact-form">
          <input
            type="text"
            name="name"
            placeholder="Full Name"
            value="<?php echo htmlspecialchars($name); ?>"
            required
          >

          <input
            type="email"
            name="email"
            placeholder="Email Address"
            value="<?php echo htmlspecialchars($email); ?>"
            required
          >

          <input
            type="text"
            name="subject"
            placeholder="Subject"
            value="<?php echo htmlspecialchars($subject); ?>"
            required
          >

          <textarea
            name="message"
            placeholder="Write your message..."
            required
          ><?php echo htmlspecialchars($message); ?></textarea>

          <button type="submit" class="btn">Send Message</button>
        </form>
      </div>

    </div>