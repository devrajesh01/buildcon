<?php
// Test email script
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

/**
 * Lightweight .env loader
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

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from Buildcon Website';
    $mail->Body    = '<h1>Test Email</h1><p>This is a test email to check SMTP configuration.</p>';
    $mail->AltBody = 'Test Email\nThis is a test email to check SMTP configuration.';

    $mail->send();

    echo "Test email sent successfully!";

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

    echo "Message could not be sent. Error: " . htmlspecialchars($errorMessage);
    if ($debugText !== '') {
        echo "<pre style='white-space:pre-wrap;background:#f5f5f5;padding:10px;border:1px solid #ddd;'>" .
            htmlspecialchars($debugText) .
            "</pre>";
    }
}
?>