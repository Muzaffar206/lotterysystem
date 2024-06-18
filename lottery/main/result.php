<?php
session_start();
if (!isset($_SESSION["user"])) {
    header ("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lottery Results</title>
</head>
<body>
    <h1>Lottery Results</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>File Name</th>
                <th>Created At</th>
                <th>Scheme</th>
                <th>Download</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            include ("../config/connection.php"); 
            // Retrieve the lottery results
            $result = $conn->query("SELECT id, file_name, file_path, scheme, created_at FROM lottery_results ORDER BY created_at DESC");

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["file_name"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "<td>" . $row["scheme"] . "</td>";
                    echo "<td><a href='" . $row["file_path"] . "' download>Download</a></td>";
                    echo "<td>
                            <form method='POST' action='delete_lottery_result.php' onsubmit='return confirm(\"Are you sure you want to delete this item?\");'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <input type='submit' value='Delete'>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No results found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
