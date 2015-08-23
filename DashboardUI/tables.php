<!doctype html>
<?php
// $row=include 'selectfetch.php';

// echo $Dname=$row['Dname'];
   
//     echo $resolved=$row['IP'];
      
//         echo $timed=$row['Time'];
// Make a MySQL Connection
mysql_connect("localhost:/tmp/mysql.sock", "root", "") or die(mysql_error());
mysql_select_db("historyDB") or die(mysql_error());

// Get all the data from the "example" table
$result = mysql_query("SELECT * FROM history;") 
or die(mysql_error());  


?>


<html><head>
    <meta charset="utf-8">
    <title>BLOCKS - Bootstrap Dashboard Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- DATA TABLE CSS -->
    <link href="assets/css/table.css" rel="stylesheet">



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  	<!-- Google Fonts call. Font Used Open Sans -->
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

  	<!-- DataTables Initialization -->
    <script type="text/javascript" src="assets/js/datatables/jquery.dataTables.js"></script>
  			<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#dt1').dataTable();
			} );
	</script>

    
  </head>
  <body>
  
  	<!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="assets/img/logo30.png" alt=""> BLOCKS Dashboard</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php"><i class="icon-home icon-white"></i> Home</a></li>
              
              
              <li class="active"><a href="tables.php"><i class="icon-th icon-white"></i> Tables</a></li>
              <li><a href="login.php"><i class="icon-lock icon-white"></i> Login</a></li>
              <li><a href="user.php"><i class="icon-user icon-white"></i> User</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

      <!-- CONTENT -->


	<div class="row">
		<div class="col-sm-12 col-lg-12">
			<h4><strong>Basic Table</strong></h4>
			  <table class="display" id="dt1">
	          <thead>
	            <tr>
	              <th>Database ID</th>
	              <th>Domain Name</th>
	              <th>IP Address</th>
                <th>Timestamp</th>
	              
	            </tr>
	          </thead>
	          <tbody>
               <?php while($row = mysql_fetch_array( $result )) { ?>
	            <tr class="odd">
                <td class="center"><?php echo $DBid=$row['id'];?></td>
	              <td><?php echo $Dname=$row['Dname']?></td>
	              <td><?php echo $resolved=$row['IP'];?></td>
	              <td><?php echo $timed=$row['Time'];?></td>
	              
	              
	            </tr>

<?php } ?> 
	            
	          </tbody>
	         </table><!--/END First Table -->
			 <br>
			 <!--SECOND Table -->


		
	
		</div><!--/span12 -->
      </div><!-- /row -->
     </div> <!-- /container -->
    	<br>	

    
      	<br>
	<!-- FOOTER -->	
	<div id="footerwrap">
      	<footer class="clearfix"></footer>
      	<div class="container">
      		<div class="row">
      			<div class="col-sm-12 col-lg-12">
      			<p><img src="assets/img/logo.png" alt=""></p>
      			<p>DNS security Proxy Dashboard - Crafted for Security - Copyright 2014</p>
      			</div>

      		</div><!-- /row -->
      	</div><!-- /container -->		
	</div><!-- /footerwrap -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/admin.js"></script>

  
</body></html>