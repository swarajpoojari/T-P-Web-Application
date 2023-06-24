<!DOCTYPE html>
<html>

<head>
	<!--favicon-->
	<link rel="shortcut icon" href="favicon.ico" type="image/icon">
	<link rel="icon" href="favicon.ico" type="image/icon">
	<title>ACPCE T&P | Campus Drives</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
	<meta name="keywords" content="Tillage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/templatemo-style.css" rel="stylesheet">

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- bootstarp-css -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--// bootstarp-css -->
	<!-- css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--// css -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600' rel='stylesheet' type='text/css'>
	<!--/fonts-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<!-- pop-up -->
	<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="all" />

	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

		});
	</script>
	<!-- pop-up -->
</head>

<body>
	<div class="container-fluid"></div>
	<!-- banner -->
	<div class="banner a-banner">
		<!-- container -->
		<div class="container">
			<div class="header">
				<div class="head-logo">

				</div>
				<div class="top-nav">
					<span class="menu">
						<img src="images/menu.png" alt="">
					</span>
					<ul class="nav1">

						<li class="hvr-sweep-to-bottom">
							<a href="../Homepage/index.php">ACPCE T&P <i>Goto Placement Homepage</i></a>
						</li>
						<li class="hvr-sweep-to-bottom">
							<a href="index.php">Home<i>Get the Overview of the Site</i></a>
						</li>
						<li class="hvr-sweep-to-bottom">
							<a href="about.php">About<i>About Us and our Cheif Architects</i></a>
						</li>
						<li class="hvr-sweep-to-bottom active">
							<a href="products.php">Campus Drives<i>Campus Drives</i></a>
						</li>

						<li class="hvr-sweep-to-bottom">
							<a href="mail.php">Mail Us<i>Get in Touch with us Instantly</i></a>
						</li>
						<div class="clearfix"></div>
					</ul>
					<!-- script-for-menu -->
					<script>
						$("span.menu").click(function() {
							$("ul.nav1").slideToggle(300, function() {
								// Animation complete.
							});
						});
					</script>
					<!-- /script-for-menu -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<div style="justify-content:center;">
		<img src="images\i5.jpg" alt="" style="width: 100%; height: 200px; object-fit: fill;">
		<div style="position: relative; bottom: 100px;  color: white; margin: 0px auto;">
			<h2>STUDENTS PLACED IN 2022-23</h2>
		</div>
	</div>
	<div style="margin: 10px;">
	<div class="templatemo-content-container">
		<div class="templatemo-content-widget no-padding">
			<div class="panel panel-default table-responsive">
				<table class="table table-striped table-bordered templatemo-user-table">
					<thead>
						<tr>

							<td><a class="white-text templatemo-sort-by">Name</a></td>
							<td><a class="white-text templatemo-sort-by">Branch</a></td>
							<td><a class="white-text templatemo-sort-by">Company Name </a></td>
							<td><a class="white-text templatemo-sort-by">Placed</a></td>
							<td><a class="white-text templatemo-sort-by">Package</a></td>
							<!-- <td><a class="white-text templatemo-sort-by">Date </a></td>
							<td><a class="white-text templatemo-sort-by">C/P</a></td>
							<td><a class="white-text templatemo-sort-by">PVenue</a></td>
							<td><a class="white-text templatemo-sort-by">SSLC</a></td>
							<td><a class="white-text templatemo-sort-by">PU/Dip </a></td>
							<td><a class="white-text templatemo-sort-by">BE</a></td>
							<td><a class="white-text templatemo-sort-by">Backlogs</a></td>
							<td><a class="white-text templatemo-sort-by">History of Backlogs </a></td>

							<td><a class="white-text templatemo-sort-by">Deatin years</a></td>

							<td><a class="white-text templatemo-sort-by">USN </a></td> -->



						</tr>
					</thead>

					<?php

					$num_rec_per_page = 15;
					$connect = mysqli_connect('localhost', 'root', '', 'placement');
					// mysqli_select_db('details');
					if (isset($_GET["page"])) {
						$page  = $_GET["page"];
					} else {
						$page = 1;
					};
					$start_from = ($page - 1) * $num_rec_per_page;
					$sql = "SELECT a.* , u.*
From addpdrive a,updatedrive u

WHERE a.CompanyName = u.CompanyName AND a.Date = u.VisitingDate AND year(u.Date) = '2023/2022' LIMIT $start_from, $num_rec_per_page";
					$rs_result = mysqli_query($connect, $sql); //run the query
					
					while ($row = mysqli_fetch_array($rs_result)) {
						?>
						<tr>
							
							<td>
								<p><?php echo $row['Name'];  ?> </p>
							</td>
							<td>
								<p><?php
								// echo $row['Name']; 
								$usn = $row['USN'];
								$sql1 = "SELECT `Branch` FROM `basicdetails` WHERE `USN` = '$usn'";
								$rs_result1 = mysqli_query($connect, $sql1);
								$row1 = mysqli_fetch_assoc($rs_result1);
								echo $row1["Branch"];
								?> 
								</p>
							</td>
							<td>
								<p><?php echo $row['CompanyName']; ?></p>
							</td>
							<td>
								<p><?php echo $row['Placed']; ?></p>
							</td>
							<td>
								<p><?php echo $row['Package']; ?></p>
							</td>
							

						</tr>
					<?php
					}
					?>

					</tbody>
				</table>
			</div>
		</div>
	</div>


	<div class="pagination-wrap">
		<ul class="pagination">
			<?php

			$num_rec_per_page = 15;
			mysqli_connect('localhost', 'root', '', 'placement');
			// mysql_select_db('details');
			$sql = "SELECT a.* , u.* From addpdrive a,updatedrive u WHERE a.CompanyName = u.CompanyName";

			$rs_result = mysqli_query($connect, $sql); //run the query
			$total_records = mysqli_num_rows($rs_result);  //count number of records
			$totalpage = ceil($total_records / $num_rec_per_page);

			$currentpage = (isset($_GET['page']) ? $_GET['page'] : 1);
			if ($currentpage == 0) {
			} else if ($currentpage >= 1  &&  $currentpage <= $totalpage) {

				if ($currentpage > 1 && $currentpage <= $totalpage) {

					$prev = $currentpage - 1;
					echo "<li><a  href='drivehome.php?page=" . $prev . "'><</a></li>";
				}

				if ($totalpage > 1) {
					$prev = $currentpage - 1;
					for ($i = $prev + 1; $i <= $currentpage + 2; $i++) {
						echo "<li><a href='drivehome.php?page=" . $i . "'>" . $i . "</a></li>";
					}
				}
				if ($totalpage > $currentpage) {
					$nxt = $currentpage + 1;
					echo "<li><a  href='drivehome.php?page=" . $nxt . "' >></a></li>";
				}

				echo "<li><a>Total Pages:" . $totalpage . "</a></li>";
			}

			?>
		</ul>
	</div>
	</div>
	
</body>