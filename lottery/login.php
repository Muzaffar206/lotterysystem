<?php include ("config/connection.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "<script type='text/javascript'>alert('Login successful!');</script>"; header('Location: register.php');
        } else {
            echo "<script type='text/javascript'>alert('Invalid username or password.');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Invalid username or password.');</script>";
    }

    $stmt->close();
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
<h2>Login</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
<script src="assest/js/bootstrap.bundle.min.js"></script>
</body>
</html>


