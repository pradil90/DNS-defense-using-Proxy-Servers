<?php
// extract($_POST);
// Make a MySQL Connection
mysql_connect("localhost:/tmp/mysql.sock", "root", "") or die(mysql_error());
mysql_select_db("historyDB") or die(mysql_error());


$result = mysql_query("TRUNCATE TABLE masteralerts") 
or die(mysql_error());  


echo 'Masteralerts reset Completed!'


?>





