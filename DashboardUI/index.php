<?php header('Refresh: 10'); ?>
<?php $Username=$_COOKIE["Username"]; ?>
<?php if ($Username): ?> 

<!doctype html>
  


<?php
mysql_connect("localhost:/tmp/mysql.sock", "root", "") or die(mysql_error());
mysql_select_db("historyDB") or die(mysql_error());

$query="SELECT * FROM prop WHERE id='1'";
$query1="SELECT * FROM prop WHERE id='2'";
$query2="SELECT * FROM alerts";
$query3="SELECT * FROM masteralerts";
$result = mysql_query($query) 
or die(mysql_error()); 
$result1 = mysql_query($query1) 
or die(mysql_error());
$result2 = mysql_query($query2) 
or die(mysql_error());
$result3 = mysql_query($query3) 
or die(mysql_error());
$i=0;
$j=0;

$t=time();



$num_rows = mysql_num_rows($result2);
//For server side data fetch
while($row = mysql_fetch_array( $result )) {

	 $Uptime=$row['uptime'];
	 $serverreq=$row['serverrequests'];// server req for ANS server
	
}


//For client side data fetch
while($row1 = mysql_fetch_array( $result1 )) {

	 $Uptimeclient=$row1['uptime'];
	 $serverrequest=$row1['serverrequests'];// server req for RNS server
	 $localcache=$row1['localcache'];
	 $SRQreq=$row1['SRQrequest'];
	 $pending=$row1['pendingreq'];
	 $approved=$row1['approvedreq'];
	 $clientreq=$row1['clientrequest'];
     $maxreq=$row1['maxreq'];



	 $clientbusy=($clientreq*$localcache)/100;
		
}

$num_rows_alerts = mysql_num_rows($result3);
// while($row3 = mysql_fetch_array( $result3 )) {

	 // $masteralert=$row3['masteralert'];
	
// }

$progress=($clientreq/$maxreq)*100;
$serverproxybusy=($serverreq*100)/1000

?>

<html><head>
    <meta charset="utf-8">
    <title>DNS Defense</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-style.css" rel="stylesheet">
    <link href="assets/css/flexslider.css" rel="stylesheet">
    
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

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

  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script type="text/javascript">
$(document).ready(function () {

    $("#btn-blog-next").click(function () {
      $('#blogCarousel').carousel('next')
    });
     $("#btn-blog-prev").click(function () {
      $('#blogCarousel').carousel('prev')
    });

     $("#btn-client-next").click(function () {
      $('#clientCarousel').carousel('next')
    });
     $("#btn-client-prev").click(function () {
      $('#clientCarousel').carousel('prev')
    });
    
});

 $(window).load(function(){

    $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
    });  
});

</script>

<script>
                            function loadXMLDoc1()
                            {
                                    var xmlhttp;
                                    if (window.XMLHttpRequest)
                                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                                      xmlhttp=new XMLHttpRequest();
                                      }
                                    else
                                      {// code for IE6, IE5
                                      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                      }
                                    xmlhttp.onreadystatechange=function()
                                      {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                        {
                                        document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
                                        }
                                      }
                                    xmlhttp.open("GET","truncateprop.php",true);
                                    xmlhttp.send();
                            }



                            function loadXMLDoc2()
                            {
                                    var xmlhttp;
                                    if (window.XMLHttpRequest)
                                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                                      xmlhttp=new XMLHttpRequest();
                                      }
                                    else
                                      {// code for IE6, IE5
                                      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                      }
                                    xmlhttp.onreadystatechange=function()
                                      {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                        {
                                        document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
                                        }
                                      }
                                    xmlhttp.open("GET","truncatemasteralerts.php",true);
                                    xmlhttp.send();
                            }


                            function loadXMLDoc3()
                            {
                                    var xmlhttp;
                                    if (window.XMLHttpRequest)
                                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                                      xmlhttp=new XMLHttpRequest();
                                      }
                                    else
                                      {// code for IE6, IE5
                                      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                      }
                                    xmlhttp.onreadystatechange=function()
                                      {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                        {
                                        document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
                                        }
                                      }
                                    xmlhttp.open("GET","tuncatealerts.php",true);
                                    xmlhttp.send();
                            }

    </script>



<script type="text/javascript">


$(function () {

    $('#container1').highcharts({

        chart: {
            type: 'gauge',
            plotBackgroundColor: null ,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: null
        },

        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 200,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: 'CPU %'
            },
            plotBands: [{
                from: 0,
                to: 120,
                color: '#55BF3B' // green
            }, {
                from: 120,
                to: 160,
                color: '#DDDF0D' // yellow
            }, {
                from: 160,
                to: 200,
                color: '#DF5353' // red
            }]
        },

        series: [{
            name: 'CPU%',
            data: [10],
            tooltip: {
                valueSuffix: 'CPU%'
            }
        }]

    },
        // Add some life
        function (chart) {
            if (!chart.renderer.forExport) {
                setInterval(function () {
                    var point = chart.series[0].points[0],
                        newVal,
                        inc = <?php echo $clientbusy?>;
                        // inc = Math.round((Math.random() - 0.5) * 20);

                    newVal = point.y + inc;
                    if (newVal < 0 || newVal > 200) {
                        newVal = point.y - inc;
                    }

                    point.update(newVal);

                }, 10000);
            }
        });
});

$(function () {

    $('#container').highcharts({

        chart: {
            type: 'gauge',
            plotBackgroundColor: null ,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: null
        },

        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 200,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: 'CPU %'
            },
            plotBands: [{
                from: 0,
                to: 120,
                color: '#55BF3B' // green
            }, {
                from: 120,
                to: 160,
                color: '#DDDF0D' // yellow
            }, {
                from: 160,
                to: 200,
                color: '#DF5353' // red
            }]
        },

        series: [{
            name: 'CPU%',
            data: [5],
            tooltip: {
                valueSuffix: 'CPU%'
            }
        }]

    },
        // Add some life
        function (chart) {
            if (!chart.renderer.forExport) {
                setInterval(function () {
                    var point = chart.series[0].points[0],
                        newVal,
                        inc = <?php echo $serverproxybusy?>;
                        // inc = Math.round((Math.random() - 0.5) * 20);

                    newVal = point.y + inc;
                    if (newVal < 0 || newVal > 200) {
                        newVal = point.y - inc;
                    }

                    point.update(newVal);

                }, 10000);
            }
        });
});

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
          <a class="navbar-brand" href="index.php"><img src="assets/img/logo30.png" alt=""> Proxy server Dashboard</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php"><i class="icon-home icon-white"></i> Home</a></li>
              
              
              <li><a href="tables.php"><i class="icon-th icon-white"></i> Tables</a></li>
              <li><a href="login.php"><i class="icon-lock icon-white"></i> Login</a></li>
              <li><a href="signout.php"><i class="icon-user icon-white"></i>Sign out</a></li>
              

            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

	  <!-- FIRST ROW OF BLOCKS -->     
      <div class="row">

      <!-- USER PROFILE BLOCK -->
		        <div class="col-sm-3 col-lg-3">
		      		<div class="dash-unit">
			      		<dtitle>User Profile</dtitle>
			      		<hr>
						<div class="thumbnail">
							<img src="assets/img/face80x80.png" alt="Admin" class="img-circle">
						</div><!-- /thumbnail -->
						<h1>Security Admin</h1>
						<h3>Security proxy Server</h3>
						<br>
							
						</div>
		        </div>


      <!-- DONUT CHART BLOCK -->
		        <div class="col-sm-3 col-lg-3">
		      		<div class="dash-unit">
				  		<dtitle>RNS proxy server utilization</dtitle>
				  		<hr>
			        	<div id="container1" style="min-width: 200px; max-width: 260px; height: 250px; margin: 0 auto"></div>
			        	<!-- <h2><?php echo $clientbusy ?>%</h2> -->
					</div>
		        </div>

      <!-- DONUT CHART BLOCK -->
		        <div class="col-sm-3 col-lg-3">
		      		<div class="dash-unit">
				  		<dtitle>ANS SERVER UTILIZATION</dtitle>
				  		<hr>
			        	<!-- <div id="container"></div> -->
			        	<!-- <div id="container" style="min-width: 200px; height: 250px; max-width: 260px; margin: 0 auto"></div> -->
			        	<!-- <h2>3%</h2> -->
			        	<div id="container" style="min-width: 200px; max-width: 260px; height: 250px; margin: 0 auto"></div>
					</div>
		        </div>
        
        <div class="col-sm-3 col-lg-3">

      <!-- LOCAL TIME BLOCK -->
	      		<div class="half-unit">
		      		<dtitle>Local Time</dtitle>
		      		<hr>
			      		<div class="clockcenter">
				      		<digiclock>12:45:25</digiclock>
			      		</div>
				</div>

      <!-- SERVER UPTIME -->
				<div class="half-unit">
		      		<dtitle>ANS Server Uptime</dtitle>
		      		<hr>
		      		<div class="cont">
                        <?php if ($Uptime): ?> 
                            <p><img src="assets/img/up.png" alt=""> <bold>Up</bold> |<?php echo $Uptime?></p>
                            <?php else: ?>
                            <p><img src="assets/img/down-small.png" alt=""> Remote Server down!</p>
                            <?php endif ?>
						
					</div>
				</div>

        </div>
      </div><!-- /row -->
      
      
	  
 
	  <!-- SECOND ROW OF BLOCKS -->     
      <div class="row">
      	<div class="col-sm-3 col-lg-3">
	  
	  <!-- BARS CHART - lineandbars.js file -->     
	      		<div class="half-unit">
		      		<dtitle>ANS Proxy Server Requests</dtitle>
		      		<hr>
		      		<div class="cont">
	      			<p><bold><?php echo $serverreq ?></bold></p>

                    <?php if ($Uptimeclient): ?> 
                            <p><img src="assets/img/up-small.png" alt=""> Server Listening| recieving request</p>
                            <?php else: ?>
                            <p><img src="assets/img/down-small.png" alt=""> Server Down| <img src="assets/img/down-small.png" alt="">No requests</p>
                            <?php endif ?>
	      			
		      		</div>
	      		</div>

	  <!-- TO DO LIST -->     
	      		<div class="half-unit">
		      		<dtitle>Load status</dtitle>
		      		<hr>
		      		<div class="cont">
						<p>Task progress...</p>
					</div>
			             <div class="progress">
					        <div class="progress-bar" role="progressbar" aria-valuenow=<?php echo $progress ?> aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress ?>%;"><span class="sr-only"><?php echo $progress ?>% Complete</span>
						        
					        </div>
					     </div>
	      		</div>
      	</div>


      	<div class="col-sm-3 col-lg-3">

	  <!-- SERVER REQ BLOCK -->     
		      		<div class="half-unit">
			      		<dtitle>RNS SRQ Load</dtitle>
			      		<hr>
			      		<div class="cont">
		      			<p><bold><?php echo $SRQreq ?></bold></p>
		      			<?php if ($Uptimeclient): ?> 
                            <p><img src="assets/img/up-small.png" alt=""> In the queue</p>
                            <?php else: ?>
                            <p><img src="assets/img/down-small.png" alt=""> No Requests| <img src="assets/img/down-small.png" alt="">Queue empty!</p>
                            <?php endif ?>
			      		</div>
		      		</div>
      		
	  <!-- PAGE VIEWS BLOCK -->     
		      		<div class="half-unit">
			      		<dtitle>total alerts</title>
			      		<hr>
			      		<div class="cont">
		      			<p><bold><?php echo $num_rows ?></bold></p>
		      			<p><img src="assets/img/down-small.png" alt=""><font color="red">Alerts Found!!</font></p>
			      		</div>
		      		</div>
      	</div>

      	<div class="col-sm-3 col-lg-3">
	  <!-- TOTAL CLIENT BLOCK -->     
		      		<div class="half-unit">
			      		<dtitle>Total Client Requests</dtitle>
			      		<hr>
			      		<div class="cont">
		      			<p><bold><?php echo $clientreq ?></bold></p>
                        <?php if ($Uptimeclient): ?> 
                            <p><img src="assets/img/up-small.png" alt=""> <?php echo $localcache ?> served by Local cache</p>
                            <?php else: ?>
                            <p><img src="assets/img/down-small.png" alt=""> Client Server down! | No requests</p>
                            <?php endif ?>
		      			
			      		</div>
		      		</div>
      		
	  <!-- FOLLOWERS BLOCK -->     
		      		<div class="half-unit">
			      		<dtitle>Master Alert</dtitle>
			      		<hr>
			      		<div class="cont">
		      			<p><bold><?php echo $num_rows_alerts ?></bold></p>
		      			<p><img src="assets/img/down-small.png" alt=""><font color="red">Master Caution!!</font></p>
			      		</div>
		      		</div>
      	</div>

 

      	<div class="col-sm-3 col-lg-3">
	  <!-- RNS SERVER UPTIME BLOCK -->     
		      		<div class="half-unit">
			      		<dtitle>RNS Server Uptime</dtitle>
			      		<hr>
			      		<div class="cont">

                    <?php if ($Uptimeclient): ?> 
                            <p><img src="assets/img/up.png" alt=""> <bold>Up</bold> |<?php echo $Uptimeclient?></p>
                            <?php else: ?>
                            <p><img src="assets/img/down-small.png" alt=""> Client Server down!</p>
                            <?php endif ?>
						
						</div>
					</div>
      		
	  <!-- FOLLOWERS BLOCK -->     
		      		<div class="half-unit">
			      		<dtitle>Proxy server Link status</dtitle>
			      		<hr>
			      		<div class="cont">
			      			<?php if ($Uptimeclient): ?> 
							<p><img src="assets/img/up.png" alt=""> <bold>Uplink Healthy</bold></p>
							<?php else: ?>
							<p><img src="assets/img/down.png" alt=""> <bold>Uplink Failed!</bold></p>
							<?php endif ?>
						</div>
					</div>
      	</div>
	    
	    
      	<!-- /row -->

      <!-- THIRD ROW OF BLOCKS -->     
      <div class="row">
        <div class="col-sm-3 col-lg-3">
       <!-- MAIL BLOCK -->
      		<div class="dash-unit">
		      		<dtitle>Alert Board</dtitle>
		      		<hr>
		      		<div class="framemail">
    			<div class="window">
			        <ul class="mail">

			        	
							
							
							
			        	<?php while($row2 = mysql_fetch_array( $result2 )) { ?>
			        	<?php if ($i<5): ?>
			            <li>
			                <i class="unread"></i>
			                <!-- <img class="avatar" src="assets/img/photo01.jpeg alt="avatar"" > -->
			                <p class="sender">Alert!!</p>
			                <p class="message"><strong><?php echo $Alert=$row2['alertmessage']?></strong> - This is the last...</p>
			                <div class="actions">
			                    <a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>
			                    <a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>
			                    <a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>
			                    <a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a>
			                </div>
			            </li>
			            <?php else: ?>
			            <?php endif ?>
			            <?php $i=$i+1 ?>
						<?php } ?> 
			            
			        </ul>
    			</div>
			</div>
					</div><!-- /dash-unit -->
		    		</div><!-- /span3 -->

	  <!-- GRAPH CHART - lineandbars.js file -->     
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
		      		<dtitle>Attacked Domain names</dtitle>
		      		<hr>
		      		
			        
	
			        	<?php while($row4 = mysql_fetch_array( $result3 )) { ?>
			        	<?php if ($j<6): ?>
			           
			               
			                <!-- <img class="avatar" src="assets/img/photo01.jpeg alt="avatar"" > -->
			               <p><?php echo $Alert1=$row4['alerthost']?>| <font color="red"><?php echo $Alert2=$row4['alertip']?></font></bad></p>
			               
			            
			            <?php else: ?>
			            <?php endif ?>
			            <?php $j=$j+1 ?>
						<?php } ?> 
			 </div>           
        </div>

	  <!-- LAST MONTH REVENUE -->     
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
	      		<dtitle>Last Month Revenue</dtitle>
	      		<hr>
	      		<div class="cont">
					<p><bold><?php echo $pending ?></bold> | <ok>Approved</ok></p>
					<br>
					<p><bold><?php echo $approved ?></bold> | Pending</p>
					<br>
					<p><bold><?php echo $num_rows_alerts ?></bold> | <bad>Denied</bad></p>
					<br>
					<!-- <p><img src="assets/img/up-small.png" alt=""> 12% Compared Last Month</p> -->

				</div>

			</div>
        </div>
        
	  <!-- 30 DAYS STATS - CAROUSEL FLEXSLIDER -->     
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
	      		<dtitle>Last 30 Days Stats</dtitle>
	      		<hr>
	      		<br>
	      		<br>
	            <div class="flexslider">
					<ul class="slides">
						<li><img src="assets/img/slide01.png" alt="slider"></li>
						<li><img src="assets/img/slide02.png" alt="slider"></li>
					</ul>
            </div>
				<div class="cont">
					<p>StatCounter Information</p>
				</div>   
			</div>
        </div>
      </div><!-- /row -->
     
      
	  <!-- FOURTH ROW OF BLOCKS -->     
	<div class="row">
	
	  <!-- TWITTER WIDGET BLOCK -->     
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
	      		<dtitle>Login details</dtitle>
	      		<hr>
				<div class="info-user">
					<span aria-hidden="true" class="li_megaphone fs2"></span>
				</div>
				<br>
		 		<div id="jstwitter" class="clearfix">
					<ul id="twitter_update_list"></ul>
				</div>
				<script src="http://twitter.com/javascripts/blogger.js"></script><!-- Script Needed to load the Tweets -->
				<script src="http://api.twitter.com/1/statuses/user_timeline/wrapbootstrap.json?callback=twitterCallback2&amp;count=1"></script>
				<!-- To show your tweets replace "wrapbootstrap", in the line above, with your user. -->
				<div class="text">
				<p><grey>Logged in as <?php echo $Username ?></grey></p>
                <p><grey>Timestamp logged as: <?php echo (date("Y-m-d",$t)); ?></grey></p>
                <p><grey>Admin Log:</grey></p>
                <p><grey><div id="myDiv1"></div></grey></p>
                </div>
			</div>
		</div>

	  <!-- NOTIFICATIONS BLOCK -->     
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
	      		<dtitle>Notifications</dtitle>
	      		<hr>
	      		<div class="info-user">
					<span aria-hidden="true" class="li_bubble fs2"></span>
				</div>
	      		<div class="cont">
	      			<!-- <p><button class="btnnew noty" data-noty-options="{&quot;text&quot;:&quot;This is a success notification&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}">Top Right</button></p> -->
	      			<!-- <p><button class="btnnew noty" data-noty-options="{&quot;text&quot;:&quot;This is an informaton notification&quot;,&quot;layout&quot;:&quot;topLeft&quot;,&quot;type&quot;:&quot;information&quot;}">Top Left</button></p> -->
                    <p><button onclick="redirect()" class="btnnew noty" data-noty-options="{&quot;text&quot;:&quot;Your Download will start in 2 sec....&quot;,&quot;layout&quot;:&quot;topCenter&quot;,&quot;type&quot;:&quot;alert&quot;,&quot;animateOpen&quot;: {&quot;opacity&quot;: &quot;show&quot;}}"> Setup Manual</button></p>
                    <p><button onclick="redirect1()" class="btnnew noty" data-noty-options="{&quot;text&quot;:&quot;Your Download will start in 2 sec.....&quot;,&quot;layout&quot;:&quot;topCenter&quot;,&quot;type&quot;:&quot;alert&quot;,&quot;animateOpen&quot;: {&quot;opacity&quot;: &quot;show&quot;}}"> IEEE report</button></p>
	      			<p><button onclick="redirect2()" class="btnnew noty" data-noty-options="{&quot;text&quot;:&quot;Your Download will start in 2 sec.....&quot;,&quot;layout&quot;:&quot;topCenter&quot;,&quot;type&quot;:&quot;alert&quot;,&quot;animateOpen&quot;: {&quot;opacity&quot;: &quot;show&quot;}}"> Refernce paper</button></p>
	      		</div>
			</div>
		</div>
<script>
function redirect(){
location.href = "http://localhost/DNS2/Theme/IEEE_report.docx";

}

function redirect1(){
location.href = "http://localhost/DNS2/Theme/IEEE_report.docx";

}
function redirect2(){
location.href = "http://localhost/DNS2/Theme/IEEE_report.docx";

}
</script>
	  <!-- RESET PANEL BLOCK -->     
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
	      		<dtitle>Admin Reset panel</dtitle>
	      		<hr>
	      		<div class="info-user">
					<span aria-hidden="true" class="li_params fs2"></span>
				</div>
				<br>
                
                 
				<div class="switch">
					<input type="radio" onclick="loadXMLDoc1()" class="switch-input" name="view" value="on" id="on" checked="">
					<label for="on" class="switch-label switch-label-off">Reset</label>
					<input type="radio" onclick="loadXMLDoc1()" class="switch-input" name="view" value="off" id="off">
					<label for="off" class="switch-label switch-label-on">Monitor</label>
					<span class="switch-selection"></span>
				</div>
				<div class="switch switch-blue">
					<input type="radio" onclick="loadXMLDoc2()" class="switch-input" name="view2" value="week2" id="week2" checked="">
                    
					<label for="week2" class="switch-label switch-label-off">Reset</label>
					<input type="radio" onclick="loadXMLDoc2()" class="switch-input" name="view2" value="month2" id="month2">
					<label for="month2" class="switch-label switch-label-on">Master</label>
					<span class="switch-selection"></span>
				</div>
				
				<div class="switch switch-yellow">
					<input type="radio" onclick="loadXMLDoc3()" class="switch-input" name="view3" value="Reset Alerts" id="yes" checked="">
					<label for="yes" class="switch-label switch-label-off">Reset</label>
					<input type="radio" onclick="loadXMLDoc3()" class="switch-input" name="view3" value="" id="no">
					<label for="no" class="switch-label switch-label-on">Alerts</label>
					<span class="switch-selection"></span>
				</div>
              
			</div>
		</div>

	 
	

 	  		<!-- INFORMATION BLOCK -->     
			<div class="col-sm-3 col-lg-3">
				<div class="dash-unit">
	      		<dtitle>Block Dashboard</dtitle>
	      		<hr>
	      		<div class="info-user">
					<span aria-hidden="true" class="li_display fs2"></span>
				</div>
				<br>
				<div class="text">
				<p>Security proxy Server Dashboard</p>
                <p>By Team: 17</p>
				<p>Special Thanks to Prof.Younghee Park for guiding us throughout.</p>
				</div>

				</div>
			</div>

		</div><!--/row -->
    </div> 
      
      
	</div> <!-- /container -->
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
	<script type="text/javascript" src="assets/js/lineandbars.js"></script>
    
	<script type="text/javascript" src="assets/js/dash-charts.js"></script>
	<script type="text/javascript" src="assets/js/gauge.js"></script>
	
	<!-- NOTY JAVASCRIPT -->
	<script type="text/javascript" src="assets/js/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/top.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topLeft.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topRight.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topCenter.js"></script>
	
	<!-- You can add more layouts if you want -->
	<script type="text/javascript" src="assets/js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
	<script src="assets/js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="assets/js/admin.js"></script>
  
</body></html>


<?php else: ?>
             
              <script type="text/javascript">
            window.location.href = "http://localhost/DNS2/Theme/login.php"
        </script>
                                                            
                                    <?php endif ?>