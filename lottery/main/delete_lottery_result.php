<?php
session_start();
if (!isset($_SESSION["user"])) {
    header ("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = $_POST['id'];

        // Connect to the database
        include ("../config/connection.php"); 

        // Prepare and execute the delete statement
        $stmt = $conn->prepare("DELETE FROM lottery_results WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirect to the lottery results page with a success message
            echo "<script type='text/javascript'>alert('Lottery deleted successfully');</script>"; header('Location: result.php');
        } else {
            // Redirect to the lottery results page with an error message
            echo "<script type='text/javascript'>alert('Something went wrong');</script>"; header('Location: result.php');
        }

        $stmt->close();
        $conn->close();
    } else {
        // Redirect to the lottery results page with an error message
        echo "<script type='text/javascript'>alert('Error in submition');</script>"; header('Location: result.php');
    }
}
?>

