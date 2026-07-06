<?php
/**
 * Contact form mail handler for evermorebrand.com
 * Deploy this file in the SAME folder as index.html on your cPanel hosting.
 * It receives the "Send Message" form submission and emails it to info@evermorebrand.com
 */

header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// ---- CONFIG ----
$to = 'info@evermorebrand.com';
$siteName = 'Evermore Sourcing';

// ---- COLLECT & SANITIZE INPUT ----
function clean($str) {
    $str = str_replace(["\r", "\n"], ' ', $str); // prevent header injection
    return trim(htmlspecialchars($str, ENT_QUOTES, 'UTF-8'));
}

$name    = isset($_POST['name']) ? clean($_POST['name']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone   = isset($_POST['phone']) ? clean($_POST['phone']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// ---- VALIDATION ----
$errors = [];
if ($name === '') $errors[] = 'Name is required.';
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
if ($message === '') $errors[] = 'Message is required.';

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

$messageClean = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// ---- HANDLE OPTIONAL FILE ATTACHMENT ----
$hasAttachment = isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK;
$attachmentData = '';
$attachmentName = '';
$attachmentType = '';

if ($hasAttachment) {
    // Limit file size to 10MB
    if ($_FILES['attachment']['size'] > 10 * 1024 * 1024) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Attachment is too large (max 10MB).']);
        exit;
    }
    $attachmentName = basename($_FILES['attachment']['name']);
    $attachmentType = $_FILES['attachment']['type'] ?: 'application/octet-stream';
    $attachmentData = file_get_contents($_FILES['attachment']['tmp_name']);
}

// ---- BUILD EMAIL ----
$subject = "New Contact Form Message from $name — $siteName";
$boundary = md5(uniqid((string)time(), true));

// Plain text body
$body  = "You have a new message from the contact form on $siteName website:\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Phone: " . ($phone !== '' ? $phone : 'Not provided') . "\n\n";
$body .= "Message:\n$message\n";

// Headers
$headers  = "From: \"$siteName Website\" <noreply@" . preg_replace('/^www\./', '', $_SERVER['HTTP_HOST'] ?? 'evermorebrand.com') . ">\r\n";
$headers .= "Reply-To: $name <$email>\r\n";
$headers .= "MIME-Version: 1.0\r\n";

if ($hasAttachment) {
    // Multipart email with attachment
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

    $emailBody  = "--$boundary\r\n";
    $emailBody .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $emailBody .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $emailBody .= $body . "\r\n\r\n";

    $emailBody .= "--$boundary\r\n";
    $emailBody .= "Content-Type: $attachmentType; name=\"$attachmentName\"\r\n";
    $emailBody .= "Content-Transfer-Encoding: base64\r\n";
    $emailBody .= "Content-Disposition: attachment; filename=\"$attachmentName\"\r\n\r\n";
    $emailBody .= chunk_split(base64_encode($attachmentData)) . "\r\n";
    $emailBody .= "--$boundary--";
} else {
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $emailBody = $body;
}

// ---- SEND ----
$sent = @mail($to, $subject, $emailBody, $headers);

if ($sent) {
    echo json_encode(['success' => true, 'message' => 'Message sent successfully.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Sorry, the message could not be sent. Please try again later or email us directly.']);
}