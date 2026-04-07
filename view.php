<?php
session_start();
include "db.php";

/* SEARCH */

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query = "SELECT * FROM students 
              WHERE student_name LIKE '%$search%' 
              OR class LIKE '%$search%' 
              OR course LIKE '%$search%'";
} else {
    $query = "SELECT * FROM students ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student List</title>

<style>

body{
font-family:Arial;
background:#cfe8f6;
margin:0;
padding:20px;
}

/* CONTAINER */

.container{
max-width:1000px;
margin:auto;
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.2);
}

h2{
text-align:center;
margin-bottom:10px;
}

/* TOP BAR */

.top-bar{
display:flex;
justify-content:space-between;
flex-wrap:wrap;
gap:10px;
}

/* SEARCH */

.search-box input{
padding:8px;
width:200px;
border-radius:5px;
border:1px solid #ccc;
}

.search-box button{
padding:8px 12px;
background:#1a73e8;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

/* BUTTON */

.btn{
display:inline-block;
padding:8px 12px;
background:#28a745;
color:white;
text-decoration:none;
border-radius:5px;
}

/* TABLE */

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

th,td{
padding:10px;
border:1px solid #ccc;
text-align:center;
font-size:14px;
}

th{
background:#1a73e8;
color:white;
}

/* ACTION BUTTONS */

.edit{
color:blue;
text-decoration:none;
}

.delete{
color:red;
text-decoration:none;
}

/* MOBILE */

@media(max-width:600px){

table,thead,tbody,th,td,tr{
display:block;
}

tr{
margin-bottom:10px;
background:#f9f9f9;
padding:10px;
border-radius:8px;
}

td{
border:none;
text-align:left;
padding:5px;
}

th{
display:none;
}

}

</style>
</head>

<body>

<div class="container">

<h2>Student List</h2>

<div class="top-bar">

<!-- SEARCH -->
<form method="GET" class="search-box">
<input type="text" name="search" placeholder="Search..." value="<?php echo $search; ?>">
<button type="submit">Search</button>
</form>

<!-- EXPORT -->
<a href="export.php" class="btn">Export CSV</a>

</div>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Class</th>
<th>Parent</th>
<th>Contact</th>
<th>Course</th>
<th>Branch</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['class']; ?></td>
<td><?php echo $row['parent_name']; ?></td>
<td><?php echo $row['contact_number']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['branch']; ?></td>

<td>
<a href="edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a> |
<a href="delete.php?id=<?php echo $row['id']; ?>" 
class="delete"
onclick="return confirm('Are you sure to delete?')">Delete</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>