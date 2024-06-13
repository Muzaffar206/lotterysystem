<?php include ("config/connection.php"); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check for duplicate username or email
    $sql_check = "SELECT COUNT(*) AS count FROM users WHERE username = ? OR email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ss", $username, $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Username or email already exists
        $error = "Username or email already exists.";
        echo "<script type='text/javascript'>alert('$error');</script>";
    } else {
        // Proceed with registration
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $email);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Registration successful!');</script>"; header('Location: login.php');
        } else {
            echo "<script type='text/javascript'>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
</head>
<body>
<form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Email: <input type="email" name="email" required><br>
        <input type="submit" value="Register">
    </form>
    <script src="assest/js/bootstrap.bundle.min.js"></script>
</body>
</html>
