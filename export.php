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

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.time().'.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Name', 'Email'));
    if (count($files) > 0) {
        foreach ($files as $file) {
            $data = [
                'name' => $file['name'],
                'email' => $file['email'],
            ];
            fputcsv($output, $data);
        }
    }
?>