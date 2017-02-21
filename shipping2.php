<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shipping</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>
	<!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>
<body id="page4">
	<!--==============================header=================================-->
    <header>
    	<div class="row-top">
        	<div class="main">
            	<div class="wrapper">
                	<h1><a href="index.html">Catering<span>.com</span></a></h1>
                    <nav>
                        <ul class="menu">
                            <li><a href="index.html">About</a></li>
								      <li><a href="catalogue.html">Catalogue </a></li>
	                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row-bot">
        	<div class="row-bot-bg">
            	<div class="main">
                	<h2>Impressive Selection <span>for any Occasion</span></h2>
                </div>
            </div>
        </div>
    </header>

	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="wrapper">
            	<article class="col-1">
                	<div class="indent-left">
                        <div class="p2">
                            <h3 class="p1">Your Order</h3>
                            <dl class="list-2">
                                <dt><em>Order</em><span>Rate</span></dt>
                                <?php
                                $sum=0;
                                if ($_POST['abc'] ==null)header('Location: catalogue.html');

								foreach ($_POST['abc'] as $service) {

								     $abc=explode("/",$service);
								     echo "<dd><em>";
								     echo $abc[0];
								     echo "</em><span>";
								     echo $abc[1];
								     $sum+=$abc[1];
								     echo "</span></dd>";
								 }
								echo "<dd><b><em>Total</em><span><b>$sum</b></span></b></dd>";
                     ?>
                            </dl>
                        </div>
                    </div>
                </article>


                <?php
                		$nam =$_POST['name'];
                		$ph =$_POST['ph'];
                		$em =$_POST['em'];
                		$add =$_POST['add'];
		                $connect= mysql_connect("localhost","root","brijendra")
						or die("Couldn't connect to the server");
						$db1=mysql_select_db("finaldb",$connect)
						or die("Couldn't select the database");
						$query="INSERT INTO person (name, phno, em, addr) VALUES('$nam', '$ph', '$em', '$add')";
						$result=mysql_query($query)
						or die("Query failed: ". mysql_error());
						$ph=$ph."j";
						$query="CREATE TABLE $ph (name VARCHAR(50), rate INT)";
						$result=mysql_query($query)
						or die("Query failed: ". mysql_error());
						foreach ($_POST['abc'] as $service) {
							    $abc=explode("/",$service);
							    $query="INSERT INTO ".$ph." (name, rate) VALUES('$abc[0]', '$abc[1]')";
							    $result=mysql_query($query)
								or die("Query failed: ". mysql_error());
							 }
                     ?>
                <article class="col-2">
                	<h3 class="p1">Shipping In</h3>
				<b>Please be ready with Rs.<?php
				echo $sum;
				?>
				<br>
				Your Order will Reach you in an hour...
				</b>


                </article>
            </div>
        </div>
    </section>

	<!--==============================footer=================================-->
    <footer>
		        <div class="main">
		        	<div class="aligncenter">
		            	<span>Eataway.com &copy; 2015</span>
		            </div>
		        </div>
	    </footer>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
