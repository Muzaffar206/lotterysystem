<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Username or Password</title>
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
</head>
<body>
    <h2>Forgot Username or Password</h2>
    <form method="post" action="forgot_credentials.php">
        Email: <input type="email" name="email" required><br>
        <input type="submit" value="Submit">
    </form>
    <script src="assest/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    include("config/connection.php");

    $sql = "SELECT username FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $username = $user['username'];
        // Send email with username
        echo "<script type='text/javascript'>alert('Your username is: $username');</script>";
    } else {
        echo "<script type='text/javascript'>alert('No account found with that email.');</script>";
    }

    // Generate a reset token for password reset
    $reset_token = bin2hex(random_bytes(16));
    $reset_token_expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
    $stmt->bind_param("sss", $reset_token, $reset_token_expiry, $email);
    $stmt->execute();

    // Send password reset email 
    $reset_link = "http://localhost/lottery/reset_password.php?token=$reset_token";
    echo "<script type='text/javascript'>alert('Password reset link: $reset_link');</script>";

    $stmt->close();
    $conn->close();
}
?>
<script>
function sendEmail($to, $subject, $message) {
    $headers = "From:muzaffar.shaikh@mescotrust.org\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    if (mail($to, $subject, $message, $headers)) {
        return true;
    } else {
        return false;
    }
}
</script>