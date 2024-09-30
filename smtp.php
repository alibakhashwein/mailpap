<?php
session_start(); // Ensure session is started

// Assuming $user_id is the ID of the logged-in user, retrieved from the session
$user_id = $_SESSION['user_id'];

// Fetch SMTP settings from the database for the logged-in user
$query = "SELECT smtp_host, smtp_username, smtp_password, smtp_secure, smtp_port, smtp_from_email, smtp_from_name FROM smtp_settings WHERE user_id = :user_id LIMIT 1";
$stmt = $connect->prepare($query);
$stmt->execute(['user_id' => $user_id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if settings were found
if ($result) {
    // Store the fetched email and name in variables
    $smtp_from_email = $result['smtp_from_email'];
    $smtp_from_name = $result['smtp_from_name'];
    $smtp_host = $result['smtp_host'];
    $smtp_username = $result['smtp_username'];
    $smtp_password = $result['smtp_password']; // Be cautious with displaying this
    $smtp_secure = $result['smtp_secure'];
    $smtp_port = $result['smtp_port'];
} else {
    echo "No SMTP settings found for this user.";
    exit; // Exit if no settings are found
}

// PHPMailer configuration
$mail->isSMTP();
$mail->Host = $smtp_host; // Use the user's SMTP host
$mail->SMTPAuth = true;
$mail->Username = $smtp_username; // Use the user's SMTP username
$mail->Password = $smtp_password; // Use the user's SMTP password
$mail->SMTPSecure = $smtp_secure; // Use the user's SMTP secure type
$mail->Port = $smtp_port; // Use the user's SMTP port

// Set sender email and name using the fetched values
$mail->setFrom($smtp_from_email, $smtp_from_name);
$mail->addReplyTo($smtp_from_email, $smtp_from_name);
?>
