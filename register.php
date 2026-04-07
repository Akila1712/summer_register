<?php

include "db.php";

$student_name = $_POST['student_name'];
$class = $_POST['class'];
$parent_name = $_POST['parent_name'];
$contact_number = $_POST['contact_number'];
$course = $_POST['course'];
$branch = $_POST['branch'];

$sql = "INSERT INTO students
(student_name,class,parent_name,contact_number,course,branch)
VALUES
('$student_name','$class','$parent_name','$contact_number','$course','$branch')";

if(mysqli_query($conn,$sql)){

echo "<script>
alert('Registration Successful');
window.location='index.html';
</script>";

}
else{

echo "Error: " . mysqli_error($conn);

}

?>