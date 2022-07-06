<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data); //remove whitespaces
	   $data = stripslashes($data); //remove backslashes
	   $data = htmlspecialchars($data); //converts predefined characters to HTML entities
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) { header("Location: index.php?error=Email Address is Required"); exit(); }
	else if(empty($pass)){ header("Location: index.php?error=Password is Required"); exit(); }
	else{
        
		$sql = "SELECT * FROM adminn WHERE Email='$uname' AND User_Password='$pass'";
		$result = mysqli_query($conn, $sql);
	

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $uname && $row['User_Password'] === $pass) {
				$_SESSION['info'] = null;
				$_SESSION['info2'] = null;
            	header("Location: mypage.php"); exit();
            }
			else{ header("Location: index.php?error=Incorect Email Address or Password"); exit(); }
		}
		else{ header("Location: index.php?error=Incorect Email Address or Password"); exit(); }
	}
}else{ header("Location: index.php"); exit(); }