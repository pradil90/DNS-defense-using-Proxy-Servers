<?php
extract($_POST);
// Make a MySQL Connection
mysql_connect("localhost:/tmp/mysql.sock", "root", "") or die(mysql_error());
mysql_select_db("historyDB") or die(mysql_error());

$cookie_value = "Username";
   setcookie($cookie_value, $Username, time()+3600, "/","", 0);



// Check if username is already present
$query="SELECT * FROM usertable WHERE Username='$Username' and Password='$password';";

$result = mysql_query($query) 
or die(mysql_error()); 


if($row = mysql_fetch_array( $result )) {

 header("Location:http://localhost/DNS2/Theme/index.php");
} else{
	 header("Location:http://localhost/DNS2/Theme/login.php");
}




?>





