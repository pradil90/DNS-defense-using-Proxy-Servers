<?php
// extract($_POST);
// Make a MySQL Connection
mysql_connect("localhost:/tmp/mysql.sock", "root", "") or die(mysql_error());
mysql_select_db("historyDB") or die(mysql_error());


$result = mysql_query("TRUNCATE TABLE prop") 
or die(mysql_error());  



mysql_query("INSERT INTO prop 
(id) VALUES('1') ")
or die(mysql_error());

mysql_query("INSERT INTO prop 
(id) VALUES('2') ")
or die(mysql_error());


echo 'Monitor reset Complete!'
?>





