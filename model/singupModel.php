<?php

/**
 *
 */
require_once 'config.php';
class singupModel {
	function __construct() {
		$this -> conset = new config();
	}

	public function openDB() {
		$this -> conn = new mysqli($this -> conset -> servername, $this -> conset -> username, $this -> conset -> password, $this -> conset -> dbname);
		if ($this -> conn -> connect_error) {
			die("Connection failed: " . $this -> conn -> connect_error);
			}
			}

	public function closeDB() {
		$this -> conn -> close();
	}

	public function singup($email, $fname, $lname, $mno, $pass) {

		$ccn = mysqli_connect("localhost","root","")or die("connecton error");
		mysqli_select_db($ccn,"bidding")or die("selection error");
			
		$sql = "SELECT * FROM user WHERE email= '$email'";
		$rs = mysqli_query($ccn,$sql) or die("query error");
			

		$sig = 0;

		while ($row = mysqli_fetch_array($rs)) {
				if ($email == $row["email"])
				$sig = 1;
		}


		if($sig==0){
			$sqll = "INSERT INTO user (email, first_name, last_name, mobile, password) VALUES ('$email', '$fname', '$lname', '$mno', '$pass')";
			$rs = mysqli_query($ccn,$sqll) or die("Insertion error");		
			echo "<script type='text/javascript'>alert('successfull')</script>";
			
		}else {
			echo "<script type='text/javascript'>alert('Already Exist!')</script>";
			
		}					

	}

	public function login($email, $pass) {
		$this -> openDB();
		$stmt = $this -> conn -> prepare("SELECT * FROM user WHERE email=? AND password=?");

		$stmt -> bind_param("ss", $email, $pass);
		if ($stmt -> execute()) {
			$res = $stmt -> get_result();
			$this -> closeDB();
			return $res -> fetch_object();

		} else {
			return FALSE;
		}
	}
	
	public function logout() {

		session_start();
		session_destroy();
	}

}
?>