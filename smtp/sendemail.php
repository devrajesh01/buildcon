<?php
// PHPMailer namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer autoloader
require 'vendor/autoload.php';

// Securely check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.html");
    exit();
}

// Identify which form was submitted
$form_type = isset($_POST['form_type']) ? strip_tags(trim($_POST['form_type'])) : 'unknown';

// ============================================================
// FORM 1: Header Enquiry Form (Request a Call Back)
// ============================================================
if ($form_type === 'enquiry') {
    $name    = isset($_POST['name'])    ? strip_tags(trim($_POST['name']))    : '';
    $email   = isset($_POST['email'])   ? strip_tags(trim($_POST['email']))   : '';
    $phone   = isset($_POST['phone'])   ? strip_tags(trim($_POST['phone']))   : '';
    $country = isset($_POST['country']) ? strip_tags(trim($_POST['country'])) : '';
    $city    = isset($_POST['city'])    ? strip_tags(trim($_POST['city']))    : '';

    // Validation
    if (empty($name) || empty($email) || empty($phone)) {
        header("Location: ../index.html?error=fields");
        exit();
    }

    $subject = "New Enquiry - Request a Call Back: $name";

    $bodyContent  = "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>";
    $bodyContent .= "<div style='background: #1a1a2e; padding: 20px; text-align: center;'>";
    $bodyContent .= "<h1 style='color: #c9a96e; margin: 0; font-size: 22px;'>IM BUILDCON</h1>";
    $bodyContent .= "</div>";
    $bodyContent .= "<div style='background: #f8f8f8; padding: 30px; border: 1px solid #e0e0e0;'>";
    $bodyContent .= "<h2 style='color: #1a1a2e; border-bottom: 2px solid #c9a96e; padding-bottom: 10px;'>📞 New Enquiry - Request a Call Back</h2>";
    $bodyContent .= "<table style='width: 100%; border-collapse: collapse; margin-top: 15px;'>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; width: 40%; border-bottom: 1px solid #eee;'>Name:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$name</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>Email:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$email</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>Phone:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$phone</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>Country:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$country</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333;'>City:</td><td style='padding: 10px; color: #555;'>$city</td></tr>";
    $bodyContent .= "</table>";
    $bodyContent .= "</div>";
    $bodyContent .= "<div style='background: #1a1a2e; padding: 15px; text-align: center;'>";
    $bodyContent .= "<p style='color: #888; margin: 0; font-size: 12px;'>Sent from IM Buildcon Website - Enquiry Form</p>";
    $bodyContent .= "</div></div>";

    $altBody = "New Enquiry - Request a Call Back\nName: $name\nEmail: $email\nPhone: $phone\nCountry: $country\nCity: $city";
}

// ============================================================
// FORM 2: Careers Form
// ============================================================
elseif ($form_type === 'careers') {
    $name  = isset($_POST['name'])  ? strip_tags(trim($_POST['name']))  : '';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    $phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
    $role  = isset($_POST['role'])  ? strip_tags(trim($_POST['role']))  : '';

    // Validation
    if (empty($name) || empty($email) || empty($phone)) {
        header("Location: ../careers.html?error=fields");
        exit();
    }

    $subject = "New Career Application: $name";

    $bodyContent  = "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>";
    $bodyContent .= "<div style='background: #1a1a2e; padding: 20px; text-align: center;'>";
    $bodyContent .= "<h1 style='color: #c9a96e; margin: 0; font-size: 22px;'>IM BUILDCON</h1>";
    $bodyContent .= "</div>";
    $bodyContent .= "<div style='background: #f8f8f8; padding: 30px; border: 1px solid #e0e0e0;'>";
    $bodyContent .= "<h2 style='color: #1a1a2e; border-bottom: 2px solid #c9a96e; padding-bottom: 10px;'>💼 New Career Application</h2>";
    $bodyContent .= "<table style='width: 100%; border-collapse: collapse; margin-top: 15px;'>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; width: 40%; border-bottom: 1px solid #eee;'>Name:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$name</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>Email:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$email</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>Phone:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$phone</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333;'>Current Role / Experience:</td><td style='padding: 10px; color: #555;'>$role</td></tr>";
    $bodyContent .= "</table>";

    // Check if resume file was attached
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $bodyContent .= "<p style='margin-top: 15px; color: #c9a96e; font-weight: bold;'>📎 Resume attached to this email</p>";
    }

    $bodyContent .= "</div>";
    $bodyContent .= "<div style='background: #1a1a2e; padding: 15px; text-align: center;'>";
    $bodyContent .= "<p style='color: #888; margin: 0; font-size: 12px;'>Sent from IM Buildcon Website - Careers Form</p>";
    $bodyContent .= "</div></div>";

    $altBody = "New Career Application\nName: $name\nEmail: $email\nPhone: $phone\nRole/Experience: $role";
}

// ============================================================
// FORM 3: Contact Us Form
// ============================================================
elseif ($form_type === 'contact') {
    $name    = isset($_POST['name'])    ? strip_tags(trim($_POST['name']))    : '';
    $email   = isset($_POST['email'])   ? strip_tags(trim($_POST['email']))   : '';
    $phone   = isset($_POST['phone'])   ? strip_tags(trim($_POST['phone']))   : '';
    $country = isset($_POST['country']) ? strip_tags(trim($_POST['country'])) : '';
    $city    = isset($_POST['city'])    ? strip_tags(trim($_POST['city']))    : '';
    $message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

    // Validation
    if (empty($name) || empty($email) || empty($phone)) {
        header("Location: ../contactUs.html?error=fields");
        exit();
    }

    $subject = "New Contact Us Enquiry: $name";

    $bodyContent  = "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>";
    $bodyContent .= "<div style='background: #1a1a2e; padding: 20px; text-align: center;'>";
    $bodyContent .= "<h1 style='color: #c9a96e; margin: 0; font-size: 22px;'>IM BUILDCON</h1>";
    $bodyContent .= "</div>";
    $bodyContent .= "<div style='background: #f8f8f8; padding: 30px; border: 1px solid #e0e0e0;'>";
    $bodyContent .= "<h2 style='color: #1a1a2e; border-bottom: 2px solid #c9a96e; padding-bottom: 10px;'>✉️ New Contact Us Enquiry</h2>";
    $bodyContent .= "<table style='width: 100%; border-collapse: collapse; margin-top: 15px;'>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; width: 40%; border-bottom: 1px solid #eee;'>Name:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$name</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>Email:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$email</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>Phone:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$phone</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>Country:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$country</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333; border-bottom: 1px solid #eee;'>City:</td><td style='padding: 10px; color: #555; border-bottom: 1px solid #eee;'>$city</td></tr>";
    $bodyContent .= "<tr><td style='padding: 10px; font-weight: bold; color: #333;'>Message:</td><td style='padding: 10px; color: #555;'>$message</td></tr>";
    $bodyContent .= "</table>";
    $bodyContent .= "</div>";
    $bodyContent .= "<div style='background: #1a1a2e; padding: 15px; text-align: center;'>";
    $bodyContent .= "<p style='color: #888; margin: 0; font-size: 12px;'>Sent from IM Buildcon Website - Contact Us Form</p>";
    $bodyContent .= "</div></div>";

    $altBody = "New Contact Us Enquiry\nName: $name\nEmail: $email\nPhone: $phone\nCountry: $country\nCity: $city\nMessage: $message";
}

// ============================================================
// Unknown form
// ============================================================
else {
    header("Location: ../index.html");
    exit();
}

// ============================================================
// Send the Email via PHPMailer
// ============================================================
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'digitalimbuildcon@gmail.com';
    $mail->Password   = 'hfsthldejwdtatqm';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom('digitalimbuildcon@gmail.com', 'IM Buildcon Website');
    $mail->addAddress('rajesh.kumar.dev23@gmail.com', 'IM Buildcon');

    // Reply-to the person who submitted the form (if email available)
    if (!empty($email)) {
        $mail->addReplyTo($email, $name);
    }

    // Attach resume file for careers form
    if ($form_type === 'careers' && isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $mail->addAttachment(
            $_FILES['resume']['tmp_name'],
            $_FILES['resume']['name']
        );
    }

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $bodyContent;
    $mail->AltBody = $altBody;

    $mail->send();

    header("Location: ../thank-you.html");
    exit();

} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>