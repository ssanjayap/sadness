
<html lang="en">
<head>
<title>Add Data</title>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>available books</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap-grid.min.css">
</head>
<body>



<html lang="en">
<head>
<title>Add Data</title>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap-grid.min.css">
</head>
<body>

<?php

include_once("connect.php");

if(isset($_POST['submit'])) {  
   
    $name = $_POST['name'];
    $author = $_POST['author'];
    $year = $_POST['year'];	
    $price = $_POST['price'];
    $image = $_POST['image'];
	
    if(empty($name) || empty($author) || empty($year) || empty($price)  ) { 
	
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }        
		
		 if(empty($author)) {
            echo "<font color='red'>E-mail field is empty.</font><br/>";
        }
				
		 if(empty($year)) {
            echo "<font color='red'>Join_date field is empty.</font><br/>";
        }
		
				
		 if(empty($price)) {
            echo "<font color='red'>Enter Price.</font><br/>";

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";}
		
    } else { 
	
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($conn, "INSERT INTO books (image,name,author,year,price) VALUES('$image','$name','$author','$year','$price')");
       
        //display success message
        // echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
else {
	
	 echo "submit is not set";

}
?>

</body>
</html>