<?php

include_once("connect.php");

//sql to create table

$sql= "CREATE TABLE Persons(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
join_date timestamp,
comment VARCHAR(200),
gender VARCHAR(15),
age INT
)";

if (mysqli_query($conn,$sql)) {
	echo "Table Persons created successfully";
} else{
 	echo "Error creating table: " . mysqli_error($conn);	
}

mysqli_close($conn);

?>