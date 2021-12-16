<?php
session_start();
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="bidding"; 
$tbl_name="customer"; 


$conn = new mysqli($host, $username, $password, $db_name);


$myusername=$_POST['email']; 
$mypassword=$_POST['password']; 



$sql="SELECT * FROM admin WHERE email='$myusername' and password='$mypassword'";
$result=$conn->query($sql);
if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc()) {
		$_SESSION["Id"] =$row["id"] ;
		
	}

    $_SESSION["IdValidation"] = $myusername;
    header('Location: '.'index.php');


}
else {
    $_SESSION["error"] = "Wrong Username or Password";
    header('Location: '.'login.php');
}
?>