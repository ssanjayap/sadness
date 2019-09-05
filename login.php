<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "library");

$email = $_POST['email'];
$pass = $_POST['password'];

$s = "select `title` from users where email = '$email' and password = '$pass'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);

if($num == 1 ){
    $role="";
    while ($type = mysqli_fetch_assoc($result)){
      $_SESSION["userType"] =  $type["title"];
    }
    if( $_SESSION["userType"]=="librican"){
      header('location:librican.php');
    }else{
      header('location:student.php');

    }
    echo $role;
    // header('location:add.html');
    
}
else{
    echo "incorrect password";
    header('refresh:2;url=login.html');

}
?>
