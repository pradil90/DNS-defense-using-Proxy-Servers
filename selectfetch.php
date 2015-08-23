<?php
// Make a MySQL Connection
mysql_connect("localhost:/tmp/mysql.sock", "root", "") or die(mysql_error());
mysql_select_db("historyDB") or die(mysql_error());

// Get all the data from the "example" table
$result = mysql_query("SELECT * FROM history;") 
or die(mysql_error());  

echo "<center>";
echo "<table border='1'>";
echo "<tr> <th>First Name</th><th>Last Name</th><th>Gender</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table
echo "<tr><td>"; 
		echo $Dname=$row['Dname'];
		echo "</td><td>";
		echo $resolved=$row['IP'];
        echo "</td><td>";
        echo $timed=$row['Time'];
       	echo "</td></tr>"; 

echo "</center>";


 
} 

echo "</table>";
return $row;
?>










