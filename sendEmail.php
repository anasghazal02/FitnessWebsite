<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $recipient = $_POST["recipient"];
  $subject = $_POST["subject"];
  $body = $_POST["body"];

  // Additional headers
  $headers = "From: killer@yahoo.com" . "\r\n" .
             "Reply-To: sender@example.com" . "\r\n" .
             "X-Mailer: PHP/" . phpversion();

  // Send the email
  if (mail($recipient, $subject, $body, $headers)) {
    // Email sent successfully
    http_response_code(200);
  } else {
    // Error occurred while sending email
    http_response_code(500);
  }
} else {
  // Invalid request
  http_response_code(400);
}
?>
