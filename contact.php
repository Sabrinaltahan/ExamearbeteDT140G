<?php
$pageTitle = "Contact - ARAK Wood";
include("includes/header.php");

$success = false;
$error = "";

$name = "";
$email = "";
$subject = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    // Validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {

        // Email address to receive the contact messages
        $to = "info@arakwood.com";

        // عنوان الإيميل
        $mailSubject = "New Contact Message: " . $subject;
        

        //Email body
        $body = "You have received a new message from the website contact form.\n\n";
        $body .= "Name: " . $name . "\n";
        $body .= "Email: " . $email . "\n";
        $body .= "Subject: " . $subject . "\n\n";
        $body .= "Message:\n" . $message;

        //header for the email
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";

        //send the email
        if (mail($to, $mailSubject, $body, $headers)) {
            $success = true;
 

            // clear fields after successful submission
            $name = "";
            $email = "";
            $subject = "";
            $message = "";
        } else {
            $error = "Failed to send the message. Please try again later.";
        }
    }
}
?>

<!----contact page content----->
<section class="contact-page">
  <div class="container">

    <div class="section-heading">
      <h1>Contact Us</h1>
      <p>
        We would be happy to hear from you. Get in touch with ARAK Wood for inquiries,
        custom projects, and professional woodwork services.
      </p>
    </div>

    <?php if ($success): ?>
      <div class="success-message">Your message has been sent successfully.</div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

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
          <p>Monday - Thursday: 8:00 AM - 01:00 PM / 02:00PM - 06:00 PM</p>
          <p>Friday: Closed</p>
          <p> Saturday + Sunday:  8:00 AM - 01:00 PM / 02:00PM - 06:00 PM</p>
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


        <!-- Map -->
    <div class="contact-map-box">
      <h2>Our Location</h2>
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.0015170634897!2d55.439047200000005!3d25.304153099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5edd75b82b09%3A0x84c07bb211132967!2sARAK%20WOODS%20TRADING!5e0!3m2!1sar!2sae!4v1775572112378!5m2!1sar!2sae"
       width="100%" 
       height="350" 
       style="border:0;" 
       allowfullscreen="" 
       loading="lazy" 
       referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>

  </div>
</section>

<?php include("includes/footer.php"); ?>