 <?php

/*if(isset($_POST["submit"])) {
	$to = "mysnative@gmail.com";
	$from = $_POST["email"];
    $name = $_POST["name"];
   // $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $toEmail = "mysnative@gmail.com";
    $mailHeaders = "From: " . $name . "<". $from .">\r\n";
    if(mail($to, $subject, $message, $mailHeaders)) {
        $message = "Your contact information is received successfully.";
        $type = "success";
		

    }
}

			ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", 25);
ini_set("sendmail_from", "mysnative@gmail.com");


//require_once "contact-view.php";*/


  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'mysnative@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

  $contact->smtp = array(
    'host' => 'mysnative@gmail.com',
    'username' => 'mysnative',
    'password' => 'Umashatakam@2021',
    'port' => '587'
  );


  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
