<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
// trimming whitespaces, filtering and sanitizing the form inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
	$email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
	$details = trim(filter_input(INPUT_POST,"details",FILTER_SANITIZE_SPECIAL_CHARS)); 

	// Validating the form fields
	if ($name == "" || $email == "" || $details == "") {
		echo "Please fill the required fields: Name, Email and Details";
		exit;
	}
	if ($_POST["address"] != "") {
		echo "Bad form input";
		exit;
	}

	require 'includes/phpmailer/Exception.php';
	require 'includes/phpmailer/PHPMailer.php';
	require 'includes/phpmailer/SMTP.php';

	// require("includes/phpmailer/PHPMailer.php");

	$mail = new PHPMailer(true);
	if(!$mail->ValidateAddress($email)) {
		echo "Invalid EMail Address";
		exit;
	}

	$email_body = "";
	$email_body .= "Name " . $name . "\n";
	$email_body .= "Email " . $email . "\n";
	$email_body .= "Details " . $details . "\n";

	// Send Email
	try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    // $mail->isSMTP();                                            // Send using SMTP
    // $mail->Host       = 'smtp1.example.com';                    // Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    // $mail->Username   = 'user@example.com';                     // SMTP username
    // $mail->Password   = 'secret';                               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    // $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('idowufestustemiloluwa@gmail.com', 'Festus Idowu');     // Add a recipient

    // Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = 'Mcnoble Media Library Suggestion from' . $name;
    $mail->Body    = $email_body;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

	header("location:suggest.php?status=thanks");
}

$pageTitle = "Suggest a Media Item";
$section = "suggest";

include("includes/header.php"); ?>

<section class="section page"> 
	<div class="wrapper"> 
		<h1>Suggest a Media Item</h1>
		<?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
			echo "<p>Thanks for the email! I&rsquo;ll check your suggestion shortly!</p>";
		} else { ?>
		<p>If you think there is something I&rsquo;m missing, let me know! Complete the form to send me an email.</p> 
	</div> 
	<form method="post" action="suggest.php"> 
		<table>
			<tr>
				<th><label for="name">Name</label></th>
				<td><input type="text" id="name" name="name" /></td>
			</tr>
			<tr>
				<th><label for="email">Email</label></th>
				<td><input type="text" id="email" name="email" /></td>
			</tr>
			<tr>
				<th><label for="details">Suggest Item Details</label></th>
				<td><textarea name="details" id="details"></textarea></td>
			</tr>
			<!-- spam honey pot field -->
			<tr style="display: none;">
				<th><label for="address">Address</label></th>
				<td><input type="text" id="address" name="address"/>Please leave this form blank</td>
			</tr>
		</table>
		<input type="submit" value="send" />
	</form>
	<?php } ?>
</section>

<?php include("includes/footer.php"); ?>