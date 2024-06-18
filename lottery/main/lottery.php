<?php
session_start();
if (!isset($_SESSION["user"])) {
    header ("Location: ../index.php");
}
?>

<?php
if (isset($_POST['upload'])) {
    $file = $_FILES['file']['tmp_name'];
    $scheme = $_POST['scheme'];

    // Read the CSV file
    $data = [];
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $data[] = $row;
        }
        fclose($handle);
    } else {
        die('Failed to open the CSV file.');
    }

    // Remove the header row if present
    $header = array_shift($data);

    $totalBeneficiaries = count($data);
    session_start();
    $_SESSION['file'] = $_FILES['file'];
    $_SESSION['data'] = $data;
    $_SESSION['header'] = $header;
    $_SESSION['scheme'] = $scheme;

    echo "Total number of beneficiaries in the uploaded CSV file: " . $totalBeneficiaries . "<br>";
    echo '<form action="files.php" method="post">
            <label for="number">Number of Beneficiaries to Select:</label>
            <input type="number" name="number" id="number" required>
            <br>
            <input type="submit" name="submit" value="Make Lottery">
          </form>';
}
?>
