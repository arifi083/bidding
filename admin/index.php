<?php
session_start();

if(empty($_SESSION["IdValidation"])){
	header('Location:'.'login.php');
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Bidding Zone | Admin</title>
<link href="../view/css/bootstrap.min.css" rel="stylesheet">
<script src="../view/js/jquery.min.js"></script>
<script src="../view/js/bootstrap.min.js"></script>
<style>
	table, th, td {

		font-family: Georgia, 'Times New Roman', Times, serif;
		font-style:italic;
		border: 2px solid black;
		padding: 5px;
	}
		</style>
</head>

<body>
<div align="center">

  <a href="index.php"><h1 class="style2" style="font-family:Georgia, 'Times New Roman', Times, serif">Admin Dashboard</h1></a>
  <a href="logout.php"><button>Logout</button></a>
  <p>&nbsp;</p>
  <form id="form1" name="form1" method="post" action="">
  	
    <table class="table table-striped table-bordered table-hover table-condensed" style="width: 50%">
      <tr>
        <th><div>Delete Product: </div></th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th>
          <input type="text" class="form-control" name="product_id" placeholder="Enter product ID" />
        </th>
        <td><input class="form-control" name="dltpr" type="submit" id="dltpr" value="Delete Product" /></td>
      </tr>
      <tr>
        <th><div>Delete User: </div></th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th><div>
          <input type="text" class="form-control" name="uid" placeholder="Enter user ID" />
        </div></th>
        <td><input class="form-control" name="dltuser" type="submit" id="dltuser" value="Delete User" /></td>
      </tr>
      <tr>
        <th><div>Bidding time for Product </div></th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th><div>
          <label>Product ID:&nbsp; &nbsp; 
          <input type="text" class="form-control" name="prid" placeholder="Enter product ID" style="width: 215px" />
          </label>
          <label>Date &amp; Time:
            <input type="text" class="form-control" name="bidtime" placeholder="YYYY-MM-DD hh:mm:ss" style="width: 305px" />
           </label>
          
        </div></th>
        <td><input class="form-control" name="bid_time" type="submit" id="bid_time" value="Update Time" /></td>
      </tr>
    </table>
  </form>
  <hr>
</div>
<div style="width: 100%">
<?php

$conn = new mysqli("localhost", "root", "", "bidding");
if ($conn -> connect_error) {
die("Connection failed:" . $conn -> connect_error);
}

//------------------delete product----------------------

if (isset($_POST['dltpr'])) {
	echo '<div style="width:49%; float:left;"><h2>Product Table</h2>';
	$id=$_REQUEST['product_id'];
	$sql = "DELETE FROM products WHERE product_id=$id";
	$conn -> query($sql);
	
	$sql = "SELECT product_id,title,price,bid_time FROM products ORDER BY product_id";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
	echo '
	<table class="table table-striped table-bordered table-hover table-condensed" align="center" style="width:50%">
	<tr class="info">
	<th>ID</th>
	<th>Title</th>
	<th>Price</th>
	<th>Bidtime</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["product_id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["price"] . "</td><td>" . $row["bid_time"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 results";
	}
}

//--------------------delete user----------------------

elseif (isset($_POST['dltuser'])) {
	echo '<div style="width=49%; float:left;"><h2>User Table</h2>';
	$id=$_REQUEST['uid'];
	$sql = "DELETE FROM user WHERE user_id=$id";
	$result = $conn -> query($sql);
	
	$sql = "SELECT user_id,email,password FROM user ORDER BY user_id";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
	echo '
	<table class="table table-striped table-bordered table-hover table-condensed" align="center" style="width:50%">
	<tr class="info">
	<th>ID</th>
	<th>Username</th>
	<th>Password</th>	
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["user_id"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 results";
	}
	
}

//-----------------------update bid time------------------------

elseif (isset($_POST['bid_time' ])) {
	echo '<div style="width:49%; float:left;"><h2>Product Table</h2>';
	$id=$_REQUEST['prid'];
	$bid_time=$_REQUEST['bidtime'];	
	
	$sql = "UPDATE products SET bid_time='$bid_time' WHERE product_id=$id";
	$result = $conn -> query($sql);
	
	$sql = "SELECT product_id,title,price,bid_time FROM products ORDER BY product_id";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
	echo '
	<table class="table table-striped table-bordered table-hover table-condensed" align="center" style="width:50%">
	<tr class="info">
	<th>ID</th>
	<th>Title</th>
	<th>Price</th>
	<th>Bidtime</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["product_id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["price"] . "</td><td>" . $row["bid_time"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 results";
	}
	}
	
	
else {
	
	//--------------------------product---------------------------
	
	echo '<div style="width:50%; float:left;"><h2>Product Table</h2>';
	$sql = "SELECT product_id,title,price,bid_time FROM products ORDER BY product_id";
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table table-striped table-bordered table-hover table-condensed" align="center" style="width:50%">
	<tr class="info">
	<th>ID</th>
	<th>Title</th>
	<th>Price</th>
	<th>Bidtime</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["product_id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["price"] . "</td><td>" . $row["bid_time"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 results";
	}
	
	//------------------user----------------------------
	
	echo '<div style="width:50%; float:left;"><h2>User Table</h2>';
	$sql = "SELECT user_id,email,first_name,last_name,mobile FROM user ORDER BY user_id";
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table table-striped table-bordered table-hover table-condensed" align="center" style="width:50%">
	<tr class="info">
	<th>ID</th>
	<th>Username</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Mobile</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["user_id"] . "</td><td>" . $row["email"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["mobile"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 results";
	}
	}
?>
</div>
</body>
</html>