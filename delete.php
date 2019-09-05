<?php
//database connection file
include_once("connect.php");

//getting id of the data from url
$id = $_POST['name'];

//deleting the  row from table
$result= mysqli_query($conn, "DELETE FROM books WHERE name='$id'");

//redirecting to the display page (idex.php in our case)
header("location:index.php");

?>