<!DOCTYPE HTML>
<?php

$Username=$_COOKIE["Username"]; 

$load = sys_getloadavg();

$cpuload=$load[0];


$result1=include 'checkrepli.php';



$flag1=$result1['Alice'];
$flagthree=$result1['Christ'];


 $dir_name="/project/".$Username;
// echo $dfree = disk_free_space($dir_name/1024);
echo $Free_size= round((disk_free_space($dir_name) / 1073741824),2) ;
// print “Directory $dir_name size : $total_size MB”;
echo "<br>";
echo $total_size= round((disk_total_space($dir_name) / 1073741824),2) 

// $size=include 'directorysize.php';
// $user_utilization=$size['user_utilization'];
// $files=$size['files'];

?>

<html>
<head>


	 
    <meta charset="utf-8">
    <title>PhotoFire- Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Html5TemplatesDreamweaver.com">

    <link href="../photoui/scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../photoui/scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icons -->
    <link href="../photoui/scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
    <link href="../photoui/scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
        <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="stylesheet" href="../photoui/scripts/fontawesome/css/font-awesome.min.css">
    <!--[if IE 7]>
        <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
    <![endif]-->

    <link href="../photoui/scripts/carousel/style.css" rel="stylesheet" type="text/css" /><link href="../photoui/scripts/camera/css/camera.css" rel="stylesheet" type="text/css" />
	<link href="../photoui/scripts/wookmark/css/style.css" rel="stylesheet" type="text/css" />	<link href="../photoui/scripts/yoxview/yoxview.css" rel="stylesheet" type="text/css" />

    <link href="http://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <link href="../photoui/styles/custom.css" rel="stylesheet" type="text/css" />	
    <link rel="stylesheet" href="../photoui/switch.css">



    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="http://code.highcharts.com/highcharts.js" type="text/javascript"></script>
    <script src="http://code.highcharts.com/modules/exporting.js" type="text/javascript"></script>
   
    <script src="http://code.highcharts.com/highcharts-more.js"></script>

    <!-- //for the gauge script// -->

    <script src="http://code.highcharts.com/modules/solid-gauge.js"></script>

<script type="text/javascript">

        $(function () {

    var gaugeOptions = {

        chart: {
            type: 'solidgauge'
        },

        title: null,

        pane: {
            center: ['50%', '85%'],
            size: '140%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },

        tooltip: {
            enabled: false
        },

        // the value axis
        yAxis: {
            stops: [
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            lineWidth: 0,
            minorTickInterval: null,
            tickPixelInterval: 400,
            tickWidth: 0,
            title: {
                y: -70
            },
            labels: {
                y: 16
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };

    // The speed gauge
    $('#container-speed').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 200,
            title: {
                text: 'Speed'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Speed',
            data: [80],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                       '<span style="font-size:12px;color:silver">km/h</span></div>'
            },
            tooltip: {
                valueSuffix: ' km/h'
            }
        }]

    }));

    // The RPM gauge
    $('#container-rpm').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 5,
            title: {
                text: 'RPM'
            }
        },

        series: [{
            name: 'RPM',
            data: [1],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
                       '<span style="font-size:12px;color:silver">* 1000 / min</span></div>'
            },
            tooltip: {
                valueSuffix: ' revolutions/min'
            }
        }]

    }));

    // Bring life to the dials
    setInterval(function () {
        // Speed
        var chart = $('#container-speed').highcharts(),
            point,
            newVal,
            inc;

        if (chart) {
            point = chart.series[0].points[0];
            inc = Math.round((Math.random() - 0.5) * 100);
            newVal = point.y + inc;

            if (newVal < 0 || newVal > 200) {
                newVal = point.y - inc;
            }

            point.update(newVal);
        }

        // RPM
        chart = $('#container-rpm').highcharts();
        if (chart) {
            point = chart.series[0].points[0];
            inc = Math.random() - 0.5;
            // inc = Math.round(("<?php echo $dfree ?>"));
            // newVal = point.y + inc;
            newVal = inc;

            if (newVal < 0 || newVal > 5) {
                newVal = point.y - inc;
            }

            point.update(newVal);
        }
    }, 2000);


});

</script>


    <script type="text/javascript">
       $(function () {

    $('#container-chart').highcharts({

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: 'Server CPU Utilization'
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
            max: 100,

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
                text: 'CPU%'
            },
            plotBands: [{
                from: 0,
                to: 80,
                color: '#55BF3B' // green
            }, {
                from: 80,
                to: 90,
                color: '#DDDF0D' // yellow
            }, {
                from: 90,
                to: 100,
                color: '#DF5353' // red
            }]
        },

        series: [{
            name: 'CPU Utilization',
            data: [25],
            tooltip: {
                valueSuffix: ' CPU %'
            }
        }]

    },
        // Add some life
        function (chart) {
            if (!chart.renderer.forExport) {
                setInterval(function () {
                    var point = chart.series[0].points[0],
                        newVal,
                         inc = Math.round(("<?php echo $cpuload ?>")*5);
                        // inc = Math.round((Math.random() - "<?php echo $cpuload ?>") * 20);
                        // inc=<?php echo $$cpuload ?>;

                newVal = inc;
                    // newVal = point.y + inc;
                    if (newVal < 0 || newVal > 100) {
                        newVal = point.y - inc;
                    }

                    point.update(newVal);

                }, 3000);
            }
        });
});
    </script>

<script>
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Space<br>Utilization',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            innerSize: '50%',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                ['Chrome', 12.8],
                ['Safari',    8.5],
                ['Opera',     6.2],
                {
                    name: 'Others',
                    y: 0.7,
                    dataLabels: {
                        enabled: false
                    }
                }
            ]
        }]
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
                                    xmlhttp.open("GET","replication.php",true);
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
                                        document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;
                                        }
                                      }
                                    xmlhttp.open("GET","replication_Alice.php",true);
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
                                        document.getElementById("myDiv3").innerHTML=xmlhttp.responseText;
                                        }
                                      }
                                    xmlhttp.open("GET","replication_rad.php",true);
                                    xmlhttp.send();
                            }



                            function loadXMLDoc4()
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
                                        document.getElementById("myDiv4").innerHTML=xmlhttp.responseText;
                                        }
                                      }
                                    xmlhttp.open("GET","replication_Christ.php",true);
                                    xmlhttp.send();
                            }

        </script>
	
</head>

<!-- <body id="pageBody"> -->
<body background="http://www.modestoradiomuseum.org/images/abstract_colour_background_vb13_3.jpg">

<div id="divBoxed" class="container">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>

    <div class="divPanel notop nobottom">
            <div class="row-fluid">
                <div class="span12">					

                    <!--Edit Site Name and Slogan here-->
					<div id="divLogo">

                <a href="../photoui/index.html" id="divSiteTitle"><?php echo $Username ?></a><br />

                        <a href="../photoui/index.html" id="divTagLine">Share your memories !!!!</a>
                    </div>

	            </div>
            </div> 
			
            <div class="row-fluid">
                <div class="span12">				
                    <div class="centered_menu">                      
                    <!--Edit Navigation Menu here-->
					<div class="navbar">
                        <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                            NAVIGATION <span class="icon-chevron-down icon-white"></span>
                        </button>
                        <div class="nav-collapse collapse">
                            <ul class="nav nav-pills ddmenu">
                                <li><a href="clientpage.php">Home</a></li>  
                                <li><a href="uploadForm.php">Uploads</a></li>	
                                <li><a href="replicatepage.php">Data replication</a></li>							
								<li><a href="galleryset.php">Gallery</a></li>
                                <li><a href="index.html">Sign Out</a></li>  
                              </ul>
                        </div>
                    </div>                     
                    </div>
	            </div>
            </div>

            <div class="row-fluid">
            <div class="span12">

                <div id="headerSeparator"></div>
                <!--Edit Camera Slider here-->
                <div class="camera_full_width">
                    


                <style type="text/css">    
                        /*General styles*/
                        body
                        {
                            margin: 0;
                            padding: 0;
                            background-image:url(http://photofire.net/photoui/styles/mirrored_squares.png); 
                            background-color: rgb(181,181,181);
                        }

                        #main
                        {
                            width: 800px;
                            margin: 50px auto 0 auto;
                            background: white;
                            -moz-border-radius: 8px;
                            -webkit-border-radius: 8px;
                            padding: 30px;
                            border: 1px solid #adaa9f;
                            -moz-box-shadow: 0 2px 2px #9c9c9c;
                            -webkit-box-shadow: 0 2px 2px #9c9c9c;
                        }

                        /*Features table------------------------------------------------------------*/
                        .features-table
                        {
                          width: 100%;
                          margin: 0 auto;
                          border-collapse: separate;
                          border-spacing: 0;
                          text-shadow: 0 1px 0 #fff;
                          color: #2a2a2a;
                          background: #fafafa;  
                          background-image: -moz-linear-gradient(top, #fff, #eaeaea, #fff); /* Firefox 3.6 */
                          background-image: -webkit-gradient(linear,center bottom,center top,from(#fff),color-stop(0.5, #eaeaea),to(#fff)); 
                        }

                        .features-table td
                        {
                          height: 50px;
                          line-height: 50px;
                          padding: 0 20px;
                          border-bottom: 1px solid #cdcdcd;
                          box-shadow: 0 1px 0 white;
                          -moz-box-shadow: 0 1px 0 white;
                          -webkit-box-shadow: 0 1px 0 white;
                          white-space: nowrap;
                          text-align: center;
                        }

                        /*Body*/
                        .features-table tbody td
                        {
                          text-align: center;
                          font: normal 12px Verdana, Arial, Helvetica;
                          width: 150px;
                        }

                        .features-table tbody td:first-child
                        {
                          width: auto;
                          text-align: left;
                        }

                        .features-table td:nth-child(2), .features-table td:nth-child(3)
                        {
                          background: #efefef;
                          background: rgba(144,144,144,0.15);
                          border-right: 1px solid white;
                        }


                        .features-table td:nth-child(4)
                        {
                          background: #e7f3d4;  
                          background: rgba(184,243,85,0.3);
                        }

                        /*Header*/
                        .features-table thead td
                        {
                          font: bold 1.3em 'trebuchet MS', 'Lucida Sans', Arial;  
                          -moz-border-radius-topright: 10px;
                          -moz-border-radius-topleft: 10px; 
                          border-top-right-radius: 10px;
                          border-top-left-radius: 10px;
                          border-top: 1px solid #eaeaea; 
                        }

                        .features-table thead td:first-child
                        {
                          border-top: none;
                        }

                        /*Footer*/
                        .features-table tfoot td
                        {
                          font: bold 1.4em Georgia;  
                          -moz-border-radius-bottomright: 10px;
                          -moz-border-radius-bottomleft: 10px; 
                          border-bottom-right-radius: 10px;
                          border-bottom-left-radius: 10px;
                          border-bottom: 1px solid #dadada;
                        }

                        .features-table tfoot td:first-child
                        {
                          border-bottom: none;
                        }
        </style> 

    <div id="main">
        
        <table class="features-table">
                <thead>
                    <tr>
                        <td></td>
                        <td>Photo-drop.com</td>
                        <td>radsnm.com</td>
                        <td>christinajuliet.com</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td></td>
                                    <?php if ($flag1 == 1): ?>  
                                                            <td>Success</td>
                                    <?php else: ?>
                                                            <td>Failed!</td>
                                    <?php endif ?>

                        <td>Success</td>
                        <td>Success</td>
                    </tr>
                </tfoot>                    
                <tbody>
                    <tr>
                        <td>Reachability</td>
                        <td><img src="check.png" width="10" height="10" alt="check"></td>
                        <td><img src="check.png" width="10" height="10" alt="check"></td>
                        <td><img src="check.png" width="10" height="10" alt="check"></td>
                                
                    </tr>
                    <tr>
                        <td>CURL Request</td>
                                            <?php if ($flag1 == 2): ?>  
                                                            <td><img src="cross.png" width="10" height="10" alt="cross"></td>                          
                                                         

                                            <?php else: ?>
                                                          <td><img src="check.png" width="10" height="10" alt="check"></td>
                                            <?php endif ?>  
                        <td><img src="check.png" width="10" height="10" alt="check"></td>
                        <td><img src="check.png" width="10" height="10" alt="check"></td>           
                    </tr>
                    <tr>
                        <td>CURL Response</td>
                                            <?php if ($flag1 == 1): ?>                            
                                                              <td><img src="check.png" width="10" height="10" alt="check"></td>

                                            <?php else: ?>
                                                              <td><img src="cross.png" width="10" height="10" alt="cross"></td>
                                            <?php endif ?>  


                        <td><img src="check.png" width="10" height="10" alt="check"></td>
                                            <?php if ($flagthree == 1): ?>  

                                            
                                                        <td><img src="check.png" width="10" height="10" alt="check"></td>                       
                                             
                                                  <?php else: ?>
                                                          <td><img src="cross.png" width="10" height="10" alt="cross"></td>    
                                                  <?php endif ?> 
                    </tr>
                    <tr>
                        <td>User registration</td>

                                    <?php if ($flag1 == 1): ?>                            
                                                            <td><img src="check.png" width="10" height="10" alt="check"></td>

                                    <?php else: ?>
                                                            <td><img src="cross.png" width="10" height="10" alt="cross"></td>
                                    <?php endif ?>


                      <td><img src="check.png" width="10" height="10" alt="check"></td>


                                        <?php if ($flagthree == 1): ?>  

                                                  <td><img src="check.png" width="10" height="10" alt="check"></td>                       
                                     
                                          <?php else: ?>
                                                  <td><img src="cross.png" width="10" height="10" alt="cross"></td>    
                                          <?php endif ?> 
                    </tr>
                </tbody>
        </table>

    </div>




                    <br style="clear:both"/><div style="margin-bottom:40px"></div>
                </div>
				<!--End Camera Slider here-->

                <div id="divHeaderText" class="page-content">
                    <div id="divHeaderLine1">Cherishing Memories</div>
					</br>
                    <div id="divHeaderLine2">Let's live and share happiness</div><br />                    
                </div>
				<hr>

                <div id="headerSeparator2"></div>						
				
            </div>
        </div>
    </div>

    <div class="contentArea">

        <div class="divPanel notop page-content"> 
         
            <div class="row-fluid">
                <div class="span12" id="divMain">
                <!--Edit Main Content here-->
                    <div class="row-fluid">
<!--     <div class="span4">
			<div class="box"> -->
				
<table>
<tr>
    <td> <div style="min-width: 250px; max-width: 290px; height: 200px; margin: 0 auto"></div></td>
    <!-- <td> <div id="container-speed" style="min-width: 250px; max-width: 290px; height: 200px; margin: 0 auto"></div></td> -->
                    <!-- <td><div id="container-rpm" style="min-width: 250px; height: 200px; max-width: 290px; margin: 0 auto"></div></td> -->
                    <!-- <div id="container-chart" style="min-width: 400px; height: 400px; margin: 0 auto"></div> -->
                   <td> <div id="container-chart" style="min-width: 310px; max-width: 400px; height: 300px; margin: 0 auto"></div></td>
                    <td><div id="container" style="min-width: 310px; height: 300px; max-width: 600px; margin: 0 auto"></div></td>
                </tr>
</table>
                </div>
            </div>
        </div>  
    </div>      

</div>
<hr>


  <div id="divHeaderLine1">Replication Panel</div>
                    </br>
                    <div id="divHeaderLine2">High Availability!!</div><br />  


<table style="width:100%">
  <tr>
    <!-- <form name="login-form" class="login-form" onclick="replication.php" method="post"> -->
    <td> <span class="switch">
                            <span class="switch-border1">
                                <span class="switch-border2">
                                    <input id="switch1" onclick="loadXMLDoc1()" type="checkbox" name="repli" value="1" />
                                    <label for="switch1"></label>
                                    <span class="switch-top"></span>
                                    <span class="switch-shadow"></span>
                                    <span class="switch-handle"></span>
                                    <span class="switch-handle-left"></span>
                                    <span class="switch-handle-right"></span>
                                    <span class="switch-handle-top"></span>
                                    <span class="switch-handle-bottom"></span>
                                    <span class="switch-handle-base"></span>
                                    <span class="switch-led switch-led-green">
                                        <span class="switch-led-border">
                                            <span class="switch-led-light">
                                                <span class="switch-led-glow"></span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="switch-led switch-led-red">
                                        <span class="switch-led-border">
                                            <span class="switch-led-light">
                                                <span class="switch-led-glow"></span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
<!-- <div id="myDiv1"><h2></h2></div> -->
                    </td>
    <!-- </form> -->
    <td><span class="switch">
                            <span class="switch-border1">
                                <span class="switch-border2">
                                    <input id="switch2" onclick="loadXMLDoc2()" type="checkbox" name="repli" value="1" />
                                    <label for="switch2"></label>
                                    <span class="switch-top"></span>
                                    <span class="switch-shadow"></span>
                                    <span class="switch-handle"></span>
                                    <span class="switch-handle-left"></span>
                                    <span class="switch-handle-right"></span>
                                    <span class="switch-handle-top"></span>
                                    <span class="switch-handle-bottom"></span>
                                    <span class="switch-handle-base"></span>
                                    <span class="switch-led switch-led-green">
                                        <span class="switch-led-border">
                                            <span class="switch-led-light">
                                                <span class="switch-led-glow"></span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="switch-led switch-led-red">
                                        <span class="switch-led-border">
                                            <span class="switch-led-light">
                                                <span class="switch-led-glow"></span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span></td> 
<!-- <div id="myDiv2"><h2></h2></div> -->
                    </td>


    <td><span class="switch">
                            <span class="switch-border1">
                                <span class="switch-border2">
                                    <input id="switch3" onclick="loadXMLDoc3()" type="checkbox" name="repli" value="1" />
                                    <label for="switch3"></label>
                                    <span class="switch-top"></span>
                                    <span class="switch-shadow"></span>
                                    <span class="switch-handle"></span>
                                    <span class="switch-handle-left"></span>
                                    <span class="switch-handle-right"></span>
                                    <span class="switch-handle-top"></span>
                                    <span class="switch-handle-bottom"></span>
                                    <span class="switch-handle-base"></span>
                                    <span class="switch-led switch-led-green">
                                        <span class="switch-led-border">
                                            <span class="switch-led-light">
                                                <span class="switch-led-glow"></span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="switch-led switch-led-red">
                                        <span class="switch-led-border">
                                            <span class="switch-led-light">
                                                <span class="switch-led-glow"></span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span></td>
<!-- <div id="myDiv3"><h2></h2></div> -->
                    </td>


    <td> <span class="switch">
                            <span class="switch-border1">
                                <span class="switch-border2">
                                    <input id="switch4" onclick="loadXMLDoc4()" type="checkbox" name="repli" value="1" />
                                    <label for="switch4"></label>
                                    <span class="switch-top"></span>
                                    <span class="switch-shadow"></span>
                                    <span class="switch-handle"></span>
                                    <span class="switch-handle-left"></span>
                                    <span class="switch-handle-right"></span>
                                    <span class="switch-handle-top"></span>
                                    <span class="switch-handle-bottom"></span>
                                    <span class="switch-handle-base"></span>
                                    <span class="switch-led switch-led-green">
                                        <span class="switch-led-border">
                                            <span class="switch-led-light">
                                                <span class="switch-led-glow"></span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="switch-led switch-led-red">
                                        <span class="switch-led-border">
                                            <span class="switch-led-light">
                                                <span class="switch-led-glow"></span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
<!-- <div id="myDiv4"><h2></h2></div> -->
                    </td>


                    </td>
                  </tr>

                 <tr>
                    <td><h4>Replicate All</h4></td>
                    <td><h4>Photo-drop.com</h4></td>    
                    <td><h4>Radsnm.com</h4></td>
                    <td><h4>christinajuliet.com</h4></td>
                  </tr>
                <tr>
                    <td><div id="myDiv1"></div></td>
                    <td><div id="myDiv2"></div></td>    
                    <td><div id="myDiv3"></div></td>
                    <td><div id="myDiv4"></div></td>
                  </tr>

                  
            </table>

	
		
	      <hr>
	
	       		
            
		
			
            <!--End Main Content Area here-->
			
			<!--Edit Footer here-->
            <div id="footerInnerSeparator"></div>
        </div>
    </div>

    <div id="footerOuterSeparator"></div>

    <div id="divFooter" class="footerArea shadow">

        <div class="divPanel">

            <div class="row-fluid">
               
                 <div class="span3" id="footerArea3">

                  
                </div>
                

                 <div class="span3" id="footerArea1">
                
                    <h3>About Us</h3>

                    <p>San Jose State University</p>
                    <p>Team:Mavericks</p>
                    
                    <p> 
                        <a href="#" title="Terms of Use">Terms of Use</a><br />
                        <a href="#" title="Privacy Policy">Privacy Policy</a><br />
                        <a href="#" title="FAQ">FAQ</a><br />
                        <a href="#" title="Sitemap">Sitemap</a>
                    </p>

                </div>
                <div class="span3" id="footerArea4">

                    <h3>Get in Touch</h3>  
                                                               
                    <ul id="contact-info">
                    <li>                                    
                        <i class="general foundicon-phone icon"></i>
                        <span class="field">Phone:</span>
                        <br />
                        (123) 456 7890 / 456 7891                                                                      
                    </li>
                    <li>
                        <i class="general foundicon-mail icon"></i>
                        <span class="field">Email:</span>
                        <br />
                        <a href="mailto:info@yourdomain.com" title="Email">pradil90@gmail.com</a>
                    </li>
                    <li>
                        <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                        <span class="field">Address:</span>
                        <br />
                        San Jose State University<br />
                        One Washington Square <br />
                        CA
                    </li>
                    </ul>

                </div>




                <div class="span3" id="footerArea3">

                  
                </div>
                
            </div>

            <br /><br />
            <div class="row-fluid">
            <div class="span12">
            <p class="copyright"> 
            Copyright © 2014 Your Company. All Rights Reserved.
            </p>

            <div class="social_bookmarks">                    
                <a href="#"><div class="icon_twitter"></div></a>
                <a href="#"><div class="icon_facebook"></div></a>
                <a href="#"><div class="icon_google"></div></a>
                <a href="#"><div class="icon_pinterest"></div></a>                   
            </div>
            </div>
            </div>

        </div>
    </div>
</div>
<br /><br /><br />

<!-- <script src="../photoui/scripts/jquery.min.js" type="text/javascript"></script>  -->
<script src="../photoui/scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../photoui/scripts/default.js" type="text/javascript"></script>

<script src="../photoui/scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script><script src="../photoui/scripts/camera/scripts/camera.min.js" type="text/javascript"></script>
<script src="../photoui/scripts/easing/jquery.easing.1.3.js" type="text/javascript"></script>
<script type="text/javascript">function startCamera() {$('#camera_wrap').camera({ fx: 'simpleFade, mosaicSpiralReverse', time: 2000, loader: 'none', playPause: false, navigation: true, height: '38%', pagination: true });}$(function(){startCamera()});</script>

<script src="../photoui/scripts/wookmark/js/jquery.wookmark.js" type="text/javascript"></script>
<script type="text/javascript">$(window).load(function () {var options = {autoResize: true,container: $('#gridArea'),offset: 10};var handler = $('#tiles li');handler.wookmark(options);$('#tiles li').each(function () { var imgm = 0; if($(this).find('img').length>0)imgm=parseInt($(this).find('img').not('p img').css('margin-bottom')); var newHeight = $(this).find('img').height() + imgm + $(this).find('div').height() + $(this).find('h4').height() + $(this).find('p').not('blockquote p').height() + $(this).find('iframe').height() + $(this).find('blockquote').height() + 5;if($(this).find('iframe').height()) newHeight = newHeight+15;$(this).css('height', newHeight + 'px');});handler.wookmark(options);handler.wookmark(options);});</script>
<script src="../photoui/scripts/yoxview/yox.js" type="text/javascript"></script>
<script src="../photoui/scripts/yoxview/jquery.yoxview-2.21.js" type="text/javascript"></script>
<script type="text/javascript">$(document).ready(function () {$('.yoxview').yoxview({autoHideInfo:false,renderInfoPin:false,backgroundColor:'#ffffff',backgroundOpacity:0.8,infoBackColor:'#000000',infoBackOpacity:1});$('.yoxview a img').hover(function(){$(this).animate({opacity:0.7},300)},function(){$(this).animate({opacity:1},300)});});</script>

</body>
</html>