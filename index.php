<?php
require("con.php");

if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$files = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $files[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSV</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <td>Nama</td>
                <td>Email</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $file): ?>
            <tr>
                <td><?= $file['name'] ?></td>
                <td><?= $file['email'] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <a href="export.php">Export</a>
</body>
</html>