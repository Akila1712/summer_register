<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

$student_name = $_POST['student_name'];
$class = $_POST['class'];
$parent_name = $_POST['parent_name'];
$contact = $_POST['contact_number'];
$course = $_POST['course'];
$branch = $_POST['branch'];

mysqli_query($conn, "UPDATE students SET
student_name='$student_name',
class='$class',
parent_name='$parent_name',
contact_number='$contact',
course='$course',
branch='$branch'
WHERE id=$id");

echo "<script>
alert('Updated Successfully');
window.location='view.php';
</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Student</title>

<style>

body{
margin:0;
font-family:Arial;
background:#cfe8f6;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

/* BOX */

.edit-box{
background:white;
padding:25px;
width:350px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.2);
text-align:center;
}

h2{
margin-bottom:15px;
}

/* INPUT */

input{
width:90%;
padding:10px;
margin:8px 0;
border:1px solid #ccc;
border-radius:6px;
}

/* BUTTON */

button{
width:100%;
padding:10px;
background:#28a745;
color:white;
border:none;
border-radius:6px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#218838;
}

/* BACK BUTTON */

.back{
display:block;
margin-top:10px;
text-decoration:none;
color:#1a73e8;
}

/* MOBILE */

@media(max-width:480px){
.edit-box{
width:90%;
}
}

</style>

</head>

<body>

<div class="edit-box">

<h2>Edit Student</h2>

<form method="POST">

<input type="text" name="student_name" value="<?php echo $row['student_name']; ?>" required>

<input type="text" name="class" value="<?php echo $row['class']; ?>" required>

<input type="text" name="parent_name" value="<?php echo $row['parent_name']; ?>" required>

<input type="text" name="contact_number" value="<?php echo $row['contact_number']; ?>" required>

<input type="text" name="course" value="<?php echo $row['course']; ?>" required>

<input type="text" name="branch" value="<?php echo $row['branch']; ?>" required>

<button name="update">Update</button>

</form>

<a href="view.php" class="back">← Back to List</a>

</div>

</body>
</html>