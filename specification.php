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
		h3 
		{
			font-family: Verdana;
			color: #e69900;
		}
	</style>
	
</head>

<body>

	<div class="row">
		<div class="twelve columns">
			<img src="img/xiaomi_logo.png">
			<a class="head_nav_a" >Welsocm to DSLR Camera</a>
            <span>|</span>
            <a class="head_nav_a"  href="http://www.bestbuy.com/site/buying-guides/dslr-camera-buying-guide/pcmcat329300050005.c?id=pcmcat329300050005" style= "text-decoration: none">Tips for DSLR Camera</a>
			<ul class="nav-bar">				
				<li><a href="index.php">Home</a></li>
				<li><a href="search.php">Search cameras</a></li>
				<li class="active"><a href="specification.php">View specification</a></li>
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
										?><br><?php
										//echo "<input style='background-color: #F0E68C;' type='submit' name='submit' value='Compare price' >";
										echo "<a href=com_price.php?id_camera=" . $record4['id_camera'] . " class=button>compare price</a>";
									?>
									</div>						
								</div>	
							</div>
						</div>
					</div>
				</div>
				
				
				<br><br><br>
				<div class="row">
					<div class="twelve columns">	
							<ul class="tab">
							  <li><a class = "active" href="specification.php">Specification</a></li>
							  <?php echo "<li><a href=\"review.php?id_camera=". $id_camera . "\" >Reviews</a></li>";?>
							  
							</ul>							
							
							<br><br><br>
							<?php 
							echo "<h3>Overview</h3>";
							echo "<p>".$record4['overview']."</p>";
							?>
							<br><br><br>
							<?php 
							echo "<h3>Specification</h3>";
							?>
						</div>
					</div>
					
				<?php
					
					
					echo "<div class=\"row\"><table border = 3 width=100% height=\"100\">
					<tr>
					<th>Info</th>
					<th>specification</th>	
					</tr>";
					echo "<form id=compare action = contact.php method =post>";
					

					
						
					echo "<tr>";
					echo "<td>" . "Brand" . " </td>";
					echo "<td>" .   $record4['brand'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Seris" . " </td>";
					echo "<td>" . $record4['seris'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Price" . " </td>";
					echo "<td>" .  $record4['price'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Rating(0~5)" . " </td>";
					echo "<td>" . $record4['comments'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Autofocus" . " </td>";
					echo "<td>" .  $record4['a_f_tech'] . "</td>";
					echo "</tr>";	

					echo "<tr>";
					echo "<td>" . "Color" . " </td>";
					echo "<td>" . $record4['color'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Lens mount" . " </td>";
					echo "<td>" .  $record4['comp_mount'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "ISO range" . " </td>";
					echo "<td>" . $record4['iso_range'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Size" . " </td>";
					echo "<td>" . $record4['dimen'] . "</td>";
					echo "</tr>";
			
					echo "<tr>";
					echo "<td>" . "File format" . " </td>";
					echo "<td>" . $record4['fil_fom'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Weight" . " </td>";
					echo "<td>" . $record4['weight'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Model year" . " </td>";
					echo "<td>" . $record4['model_y'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Video format" . " </td>";
					echo "<td>" . $record4['vd_fom'] . "</td>";
					echo "</tr>";
					
					
					
					echo "<tr>";
					echo "<td>" . "Video Resolution" . " </td>";
					echo "<td>" .$record4['vd_rsln'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td>" . "Description" . " </td>";
					echo "<td>" . $record4['dscp'] . "</td>";
					echo "</tr>";
							
					echo "</form>";
					echo "</table></div>";
			}
			include("includes/footer.html");
			mysql_close($mysql);
			?>
</body>
</html>