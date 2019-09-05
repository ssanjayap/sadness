<?php
// including the database connection file
include_once("connect.php");
 
if(isset($_POST['update']))
{    echo "update set";
     //Inputs from the from	
	 
	$id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $join_date = $_POST['join_date'];	
	$comment = $_POST['comment'];
	
	// Check if the Radio button is really selected, to avoid the "Undefined index" error.
	if(isset($_POST['gender']))
	{	
		$gender = $_POST['gender'];
	}
	$age = $_POST['age'];
    
    // checking empty fields
     //Checking empty fields	
    if(empty($name) || empty($email) || empty($join_date) || empty($gender) ||  empty($age)  ) { 
	
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }        
		
		 if(empty($email)) {
            echo "<font color='red'>E-mail field is empty.</font><br/>";
        }
				
		 if(empty($join_date)) {
            echo "<font color='red'>Join_date field is empty.</font><br/>";
        }
		
				
		 if(empty($gender)) {
            echo "<font color='red'>Please select a Gender.</font><br/>";
        }
		
		 if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
	      		
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE persons SET name='$name',email='$email',join_date='$join_date',comment='$comment',gender='$gender',age='$age' WHERE id=$id");
				
		//redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
	
	echo "end of update";
}

echo "update not set";

?>

<?php

//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM persons WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
   
	$name = $res['name'];
    $email = $res['email'];
    $join_date = $res['join_date'];	
	$comment = $res['comment'];
	$gender = $res['gender'];
	$age = $res['age'];
		
}

?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
	
	
	 <form method = "post" action = "edit.php">
         <table>
		 
		 
		 <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>" ></td>
		 
		 </tr>
		 
            <tr>
               <td>Name:</td> 
			   <!-- This value above is required and must be filled -->
               <td><input type = "text" name = "name" required placeholder="Please ente your Name" value="<?php echo $name;?>"></td> 			   
            </tr>
            
            <tr>
               <td>E-mail:</td>
			   <!-- The email is requird value and must be filled -->
               <td><input type = "text" name = "email" required placeholder="Please ente your E-mail address" value="<?php echo $email;?>">  </td>
            </tr>
            
            <tr>
               <td>Join Date:</td>
               <td><input type = "date" name = "join_date" value="<?php echo $join_date;?>"></td>
            </tr>
            
            <tr>
               <td>Class details:</td>
               <td><textarea name = "comment" rows = "5" cols = "40"><?php echo $comment;?> </textarea></td>
            </tr>
            
            <tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value="female" <?php echo ($gender=='female')?'checked':'' ?> >Female
                  <input type = "radio" name = "gender" value="male" <?php echo ($gender=='male')?'checked':'' ?> >Male
               </td>
            </tr>
			
			  <tr>
               <td>Age:</td> 
               <td><input type="number" name="age" min="18" max="99" value="<?php echo $age;?>" > </td> <!-- This is limited between 18 and 99 -->
            </tr>
            
            <tr>
               <td>
                  <input type = "submit" name = "update" value = "Update"> 
               </td>
            </tr>
         </table>
      </form>	
 
</body>
</html>