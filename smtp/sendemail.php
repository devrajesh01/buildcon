<?php
// PHPMailer namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer autoloader
require 'vendor/autoload.php';

/**
 * Lightweight .env loader (no extra package needed).
 */
function loadEnvFile($filePath)
{
    if (!file_exists($filePath) || !is_readable($filePath)) {
        return;
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);

        if ($line === '' || strpos($line, '#') === 0) {
            continue;
        }

        $parts = explode('=', $line, 2);
        if (count($parts) !== 2) {
            continue;
        }

        $key = trim($parts[0]);
        $value = trim($parts[1]);

        if ($value !== '' && (
            ($value[0] === '"' && substr($value, -1) === '"') ||
            ($value[0] === "'" && substr($value, -1) === "'")
        )) {
            $value = substr($value, 1, -1);
        }

        if (getenv($key) === false) {
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

function envValue($key, $default = null)
{
    $value = getenv($key);
    return $value === false ? $default : $value;
}

loadEnvFile(__DIR__ . '/.env');

// Securely check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.html");
    exit();
}

// Log the submission
file_put_contents(__DIR__ . '/form_submissions.log', '[' . date('Y-m-d H:i:s') . '] Form submitted: ' . json_encode($_POST) . PHP_EOL, FILE_APPEND);

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
    $bodyContent .= "<h2 style='color: #1a1a2e; border-bottom: 2px solid #c9a96e; padding-bottom: 10px;'>New Enquiry - Request a Call Back</h2>";
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
$smtpDebugBuffer = [];

try {
    $smtpHost = envValue('SMTP_HOST', 'smtp.gmail.com');
    $smtpPort = (int) envValue('SMTP_PORT', 465);
    $smtpEncryption = envValue('SMTP_ENCRYPTION', 'ssl');
    $smtpUsername = envValue('SMTP_USERNAME', 'development.tcongsinfotech@gmail.com');
    $smtpPassword = envValue('SMTP_PASSWORD', 'mdwgdfaqcrlkrgcc');
    $mailFrom = envValue('MAIL_FROM_ADDRESS', 'development.tcongsinfotech@gmail.com');
    $mailFromName = envValue('MAIL_FROM_NAME', 'PS Civil Website');
    $mailToName = envValue('MAIL_TO_NAME', 'PS Civil Group');
    $mailToList = envValue('MAIL_TO_LIST', '');
    if (trim($mailToList) === '') {
        $mailToList = envValue(
            'MAIL_TO_ADDRESS',
            'info.pscivilgroup@gmail.com,Info@pscivil.com,development.tcongsinfotech@gmail.com'
        );
    }
    $smtpDebug = (int) envValue('SMTP_DEBUG', 0);
    $disableTlsVerify = filter_var(envValue('SMTP_DISABLE_TLS_VERIFY', '1'), FILTER_VALIDATE_BOOLEAN);

    if (empty($smtpHost) || empty($smtpUsername) || empty($smtpPassword) || empty($mailToList)) {
        throw new Exception('Missing SMTP configuration. Set required values in smtp/.env or defaults.');
    }

    $smtpSecureMap = [
        'ssl' => PHPMailer::ENCRYPTION_SMTPS,
        'tls' => PHPMailer::ENCRYPTION_STARTTLS,
        'starttls' => PHPMailer::ENCRYPTION_STARTTLS,
    ];
    $smtpSecureKey = strtolower($smtpEncryption);
    $smtpSecure = $smtpSecureMap[$smtpSecureKey] ?? PHPMailer::ENCRYPTION_SMTPS;

    // Server settings
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUsername;
    $mail->Password   = $smtpPassword;
    $mail->SMTPSecure = $smtpSecure;
    $mail->Port       = $smtpPort;
    $mail->SMTPDebug  = $smtpDebug;
    $mail->Debugoutput = function ($str, $level) use (&$smtpDebugBuffer) {
        $smtpDebugBuffer[] = "[$level] $str";
    };
    if ($disableTlsVerify) {
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];
    }

    // Recipients
    $mail->setFrom($mailFrom, $mailFromName);
    $recipients = array_filter(array_map('trim', explode(',', $mailToList)));
    foreach ($recipients as $recipient) {
        $mail->addAddress($recipient, $mailToName);
    }

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
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $bodyContent;
    $mail->AltBody = $altBody;

    $mail->send();

    header("Location: ../thank-you.html");
    exit();

} catch (\Throwable $e) {
    $errorMessage = trim($mail->ErrorInfo);
    if ($errorMessage === '') {
        $errorMessage = $e->getMessage();
    }
    if ($errorMessage === '') {
        $errorMessage = 'Unknown error. Set SMTP_DEBUG=2 in smtp/.env to inspect SMTP conversation.';
    }

    $debugText = '';
    if (!empty($smtpDebugBuffer)) {
        $debugText = implode(PHP_EOL, $smtpDebugBuffer);
    }

    // Persist diagnostics for local debugging.
    $logText = '[' . date('Y-m-d H:i:s') . "] " . $errorMessage;
    if ($debugText !== '') {
        $logText .= PHP_EOL . $debugText;
    }
    $logText .= PHP_EOL . str_repeat('-', 80) . PHP_EOL;
    @file_put_contents(__DIR__ . '/mail_error.log', $logText, FILE_APPEND);

    echo "Message could not be sent. Error: " . htmlspecialchars($errorMessage);
    if ($debugText !== '') {
        echo "<pre style='white-space:pre-wrap;background:#f5f5f5;padding:10px;border:1px solid #ddd;'>" .
            htmlspecialchars($debugText) .
            "</pre>";
    }
}
?>
