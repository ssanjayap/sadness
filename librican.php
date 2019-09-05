<?php
//
include_once("connect.php");
//FETCHING DATA IN DECENDING ORDER (LAST ENTRY FIRST)
$result = mysqli_query($conn, "SELECT * FROM books ORDER BY `name` DESC ");
?>
<html>

<head>
	<title>Homepage</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>available books</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="style2.css">
</head>

<body>
	<div class="container-fluid">
		<div class="row" style="height: 8%" opacity="50%">
			<div class="col-md-2">
				<a href="services.html"><button id="btn">Home</button></a><br></div>
			<div class="col-md-2">
				<a href="services.html"><button id="btn" onclick="services.html">Services</button></a><br></div>
			<div class="col-md-2">
				<a href="about.html"><button id="btn" link="about.html">About</button></a><br><br></div>
			<div class="col-md-2">
				<a href="contact.html"><button id="btn" link="about.html">Contact Us</button></a><br><br></div>
			<div class="col-md-2">
				<button id="btn" action="logout.php">Logout</button><br><br></div>
			<div class="col-md-2">
				<form>
				<input id="search" type="text" name="search" placeholder="Search..">
			</form></div>
		</div>
		<?php
		while ($res = mysqli_fetch_array($result)) {
			echo "<div class='col-md-2'>";
			echo "<div class='card'>";
			echo "<div class='card-body'>";
			echo "<center><h5 class='card-title'>" . $res['name'] . "</h5></center>";
			echo "<center><img src='./ts-book-icon.png' class='card-img' style='width:100%'><br></center>";
			echo "<center><a>" . $res['author'] . "</a><BR></center>";
			echo "<center><A>" . $res['year'] . "</A><br></center>";
			//  echo "<button>Book Now $".$res['price']."</button></center>";
			//	echo "<div class='card-text'>".$res['comment']."</div>";
			//	echo "<div class='card-text'>".$res['gender']."</div>";
			// 	echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> |<a href=\"delete.php?id=$res[id]\" onclick\"return confirm('are you sure you want to delete?')\">Delete</a></td>";
			echo  "</div>";
			echo  "</div>";
			echo  "</div>";
		}
		?>
	</div>
</body>

</html>