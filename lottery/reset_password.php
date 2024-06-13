<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
</head>
<body>
    <h2>Reset Password</h2>
    <form method="post" action="reset_password.php">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>"><br>
        New Password: <input type="password" name="new_password" required><br>
        <input type="submit" value="Reset Password">
    </form>
    <script src="assest/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    include("config/connection.php");

    $sql = "SELECT id FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE id = ?");
        $stmt->bind_param("si", $new_password, $user_id);
        $stmt->execute();

        echo "<script type='text/javascript'>alert('Password reset successful!');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Invalid or expired token.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
