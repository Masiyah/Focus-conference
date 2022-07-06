<?php
$sname= "localhost";
$uname= "id17910208_username";
$password = "VJb{M!)%x=@v1l45";
$db_name = "id17910208_conference";

$conn = mysqli_connect($sname, $uname, $password, $db_name) or die;

if (!$conn) {
    	echo "Connection failed!";
 //header("Location: login.php?error=Not Connected"); exit();
}else{
  //   header("Location: login.php?error=Connected"); exit();
}

/*<?php
$sname= "localhost";
$uname= "id17910208_username";
$password = "3O@)7~Iu@rMkXwZz";
$db_name = "id17910208_conference";

$conn = mysqli_connect($sname, $uname, $password, $db_name) or die;

if (!$conn) {
    
	echo "Connection failed!";
}*/

