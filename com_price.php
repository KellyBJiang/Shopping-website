<!DOCTYPE html>
<html lang="en">
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php include("includes/head.html");?>
<head>
	<style>
			ul.tab {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			//border: 1px solid #ccc;
			background-color: #f1f1f1;
		}

		/* Float the list items side by side */
		ul.tab li {float: left;}

		/* Style the links inside the list items */
		ul.tab li a {
			display: inline-block;
			color: black;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			transition: 0.3s;
			font-size: 17px;
		}

		/* Change background color of links on hover */
		ul.tab li a:hover {
			background-color: #ddd;
		}

		/* Create an active/current tablink class */
		ul.tab li a:focus, .active {
			background-color: #DAA520;
		}

		/* Style the tab content */
		.tabcontent {
			display: none;
			padding: 6px 12px;
			border: 1px solid #ccc;
			border-top: none;
		}
		th {
			background-color:#ffe066;
			border-bottom: 1px solid #ddd;
			height: 40px;
			text-align:left;
		}
		td {
			border-bottom: 1px solid #ddd;
		}
	</style>
	
</head>

<body>

	<div class="row">
		<div class="twelve columns">
			<img src="https://cdn4.iconfinder.com/data/icons/computer-parts/512/camera-128.png" height="60" width = "60">
			<a class="head_nav_a" >Welsocm to DSLR Camera</a>
            <span>|</span>
            <a class="head_nav_a"  href="http://www.bestbuy.com/site/buying-guides/dslr-camera-buying-guide/pcmcat329300050005.c?id=pcmcat329300050005" style= "text-decoration: none">Tips for DSLR Camera</a>
			<ul class="nav-bar">				
				<li><a href="index.php">Home</a></li>
				<li><a href="search.php">Search cameras</a></li>
				<li><a class="active" href="compare.php">Compare prices</a></li>
			</ul>
		</div>
	</div>
	
	
	
	<!-- don't mind this script, I just added them for fun! -->
	<script charset="ISO-8859-1" src="http://fast.wistia.com/static/popover-v1.js"></script>
	
	<div class="row">
		<div class="twelve columns">
		</div>
	</div>
	<?php 
		include("php/db_conn.php");		
			//get id_camera
			$id_camera = $_GET['id_camera'];
			
			$SearchQuery_cam1 = "SELECT * FROM cameras WHERE id_camera =" . $id_camera;
	
			
			$Searchcam1 = mysql_query($SearchQuery_cam1, $mysql);
	
			if (!$Searchcam1) 
			{
				$message = "Open Database Error!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} 
			echo "</br></br>";
		
			echo "</br></br>";
			if($record4= mysql_fetch_array($Searchcam1) )
			{
				
				?>
				<div class="row">
					<div class="twelve columns">	
						<div class="row">
							<div class = "five columns">
								<?php echo "<td>" .'<img src ='. $record4['ext_front'].' height = "400" width = "400">'." </td>"; ?>
							</div>
							<div class = "six columns">
								<div class="row">
								<br><br>
									<?php 
										echo "<div style ='font:30px/40px Arial,tahoma,sans-serif;color:#000000; font-weight: 900'>". $record4['brand']."  ".$record4['seris']." DSLR Camera</div>"; 
									?>
								</div>
								<div class="row">
									<br><br>
									<?php 
										echo  $record4['dscp']; 
									?>								
								</div>
								<div class="row">
									<br><br><br><br>
									<div class = "Two columns">
									<br>
									<?php 
										echo " As low as :";
									?>
									</div>	
									<div class = "nine columns">
									<?php 
										echo "<div style ='font:30px/40px Arial,tahoma,sans-serif;color:#DC143C'>" . "$  ".$record4['price']."</div>"; 
										?>
									</div>						
								</div>	
							</div>
						</div>
					</div>
				</div>
				
				
				<br><br><br>

				<?php				
					echo "<div class=\"row\"><table border = 3 width=100% height=\"100\">
					<tr>
					<th>RETALIER</th>
					<th>SHIPPING</th>
					<th>PRICE</th>
					<th>Store Link</th>					
					</tr>";
					echo "<form id=compare action = com_price.php method =post>";
					echo "<tr>";
					echo "<td ><br><br><p style=\"font-size:20px; font-family:verdana\">" ."Amazon"."</p>"." </td>";
					echo "<td ><br><br><p style =\"font-size:15px;\">" .   $record4['freeship1'] . "</td>";
					echo "<td ><br><br><p style =\"font-size:20px;color:#C71585\">$" .   $record4['priceamazon'] . "</td>";
					$addr_a = $record4['amazon'];
					echo '<td><br><br><a href="'.$addr_a.'" ><input style="background-color: #0052cc; color: #ffffff; font-size: 18px " type="button" value = "Go to store"/></a></td>';
					echo "</tr>";
				
					echo "<tr>";
					echo "<td ><br><br><p style=\"font-size:20px; font-family:verdana\">" ."Bestbuy"."</p>"." </td>";
					echo "<td ><br><br><p style =\"font-size:15px;\">" .   $record4['freeship2'] . "</td>";
					echo "<td ><br><br><p style =\"font-size:20px;color:#C71585\">$" .   $record4['pricebbuy'] . "</td>";
					$addr_bbuy = $record4['bbuy'];
					echo '<td><br><br><a href="'.$addr_bbuy.'" ><input style="background-color: #0052cc; color: #ffffff; font-size: 18px " type="button" value = "Go to store"/></a></td>';
					echo "</tr>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td ><br><br><p style=\"font-size:20px; font-family:verdana\">" ."Ebay"."</p>"." </td>";
					echo "<td ><br><br><p style =\"font-size:15px;\">" .   $record4['freeship3'] . "</td>";
					echo "<td ><br><br><p style =\"font-size:20px;color:#C71585\">$" .   $record4['priceebay'] . "</td>";
					$addr_ebay = $record4['ebay'];
					echo '<td><br><br><a href="'.$addr_ebay.'" ><input style="background-color: #0052cc; color: #ffffff; font-size: 18px " type="button" value = "Go to store"/></a></td>';
					echo "</tr>";
					echo "</tr>";

							
					echo "</form>";
					echo "</table></div>";
			}
			include("includes/footer.html");
			mysql_close($mysql);
			?>
</body>
</html>