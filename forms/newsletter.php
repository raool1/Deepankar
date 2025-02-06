<?php
  /**
   * Requires the "PHP Email Form" library
   * The "PHP Email Form" library is available only in the pro version of the template
   * The library should be uploaded to: vendor/php-email-form/php-email-form.php
   * For more info and help: https://bootstrapmade.com/php-email-form/
   */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'info@snichein.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  // The recipient email
  $contact->to = $receiving_email_address;

  // The sender's email address
  $contact->from_name = $_POST['email'];
  $contact->from_email = $_POST['email'];
  
  // The subject of the email
  $contact->subject = "New Subscription: " . $_POST['email'];

  // SMTP configuration (if needed)
  /*
  $contact->smtp = array(
    'host' => 'smtp.example.com',
    'username' => 'your-smtp-username',
    'password' => 'your-smtp-password',
    'port' => '587'
  );
  */

  // Adding the email message with the content submitted from the form
  $contact->add_message($_POST['email'], 'Email'); 

  // Sending the email
  if ($contact->send()) {
      echo 'Thank you for subscribing! You will receive a confirmation email shortly.';
  } else {
      echo 'Oops! Something went wrong, and we couldn’t process your subscription. Please try again.';
  }
?>

