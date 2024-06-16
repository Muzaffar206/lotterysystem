<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lottery System</title>
</head>
<body>
    <form action="lottery.php" method="post" enctype="multipart/form-data">
        <label for="file">Upload CSV File:</label>
        <input type="file" name="file" id="file" accept=".csv" required>
        <br>
        <label for="scheme">Select Scheme:</label>
        <select name="scheme" id="scheme" required>
            <option value="">Select any one</option>
            <option value="Education">Education</option>
            <option value="Sewing Machine">Sewing Machine</option>
        </select>
        <br>
        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>
