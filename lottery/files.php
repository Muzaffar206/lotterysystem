<?php
session_start();
include ("config/connection.php"); 


if (isset($_POST['submit'])) {
    $number = intval($_POST['number']);
    $data = $_SESSION['data'];
    $header = $_SESSION['header'];
    $scheme = $_SESSION['scheme'];


    if ($number > count($data)) {
        die("Number of beneficiaries to select exceeds the available beneficiaries.");
    }

    // Randomly select beneficiaries
    $selectedBeneficiaries = array_rand($data, $number);

    // Ensure $selectedBeneficiaries is an array
    if ($number == 1) {
        $selectedBeneficiaries = [$selectedBeneficiaries];
    }

    $selectedData = [];
    foreach ($selectedBeneficiaries as $index) {
        $selectedData[] = $data[$index];
    }

    // Add the header back to the selected data
    array_unshift($selectedData, $header);

    // Create a new CSV file
    $outputFileName = 'selected_beneficiaries_' . date('Ymd_His') . '.csv';
    $outputFilePath = 'uploads/' . $outputFileName;

    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $output = fopen($outputFilePath, 'w');
    foreach ($selectedData as $row) {
        fputcsv($output, $row);
    }
    fclose($output);


    $stmt = $conn->prepare("INSERT INTO lottery_results (file_name, file_path, scheme) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $outputFileName, $outputFilePath, $scheme);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Provide a download link
    echo "Lottery completed successfully.<br>";
    echo "Download the selected beneficiaries: <a href='$outputFilePath' download>Download CSV</a>";
}
?>
<h1>View the past lottery</h1>
<a href="result.php">here</a>
