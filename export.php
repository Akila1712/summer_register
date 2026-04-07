<?php
include "db.php";

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="students.csv"');

$output = fopen("php://output", "w");

// Column headers
fputcsv($output, ['ID','Name','Class','Parent','Contact','Course','Branch']);

$result = mysqli_query($conn, "SELECT * FROM students");

while($row = mysqli_fetch_assoc($result)){

fputcsv($output, [
$row['id'],
$row['student_name'],
$row['class'],
$row['parent_name'],
$row['contact_number'],
$row['course'],
$row['branch']
]);

}

fclose($output);
?>