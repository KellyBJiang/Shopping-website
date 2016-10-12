<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php include("includes/head.html");?>
<head>
	<style>
		textarea 
		{
			font-size: 13px; 
		}
	</style>
</head>

<body>

	<?php include("includes/header.html");?>
	
	<div class="row">
		<div class="twelve columns">
			<ul class="nav-bar">
 		 		<li><a href="index.php">Home</a></li>
  				<li ><a href="search.php">Search cameras</a></li>
				<li class="active"><a href="javascript:;">Compare cameras</a></li>
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
			
			//POST params
			$items_num = sizeof($_POST['comp_check']);
			//echo $items_num . "<br>";
			foreach ($_POST['comp_check'] as $id_cam) {
				//echo $id_cam ."<br>";
			}
			
		if ($items_num == 1) {
			$message = "Should at least choose two cameras!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		if ($items_num == 2) {
			$SearchQuery_cam1 = "SELECT * FROM cameras WHERE id_camera =" . $_POST[comp_check][0];
			$SearchQuery_cam2 = "SELECT * FROM cameras WHERE id_camera =" . $_POST[comp_check][1];
			
			$Searchcam1 = mysql_query($SearchQuery_cam1, $mysql);
			$record4= mysql_fetch_array($Searchcam1);
			$Searchcam2 = mysql_query($SearchQuery_cam2, $mysql);
			$record2 = mysql_fetch_array($Searchcam2);
			
			if (!$Searchcam1 || !$Searchcam2) 
			{
				$message = "Open Database Error!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} 
			//echo "</br></br>";
			if ($record4 && $record2)
			{
				echo "<div class=\"row\"><h1>Comparing cameras</h1><table border = 3 width=100% height=\"100\"><col width=82><col width=370><col width=370>
				<tr>
				<th>Info</th>
				<th>camera 1</th>	
				<th>camera 2</th>
				</tr>";
				echo "<form id=compare action = contact.php method =post>";
				
				echo "<tr>";
				echo "<td>" . "Front View" . " </td>";
				echo "<td><a href=\"specification.php?id_camera=" . $record4['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record4['ext_front'] . "\" alt=\"not available\"></a></td>"; 
				echo "<td><a href=\"specification.php?id_camera=" . $record2['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record2['ext_front'] . "\" alt=\"not available\"></a></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Back View" . " </td>";
				echo "<td><a href=\"specification.php?id_camera=" . $record4['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record4['ext_back'] . "\" alt=\"not available\"></a></td>"; 
				echo "<td><a href=\"specification.php?id_camera=" . $record2['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record2['ext_back'] . "\" alt=\"not available\"></a></td>";
				//echo "<td>" .'<img src ='. $record4['ext_back'].' height = "300" width = "300">'." </td>";
				//echo "<td>" .'<img src ='. $record2['ext_back'].' height = "300" width = "300">'. " </td>";
				echo "</tr>";
						
				echo "<tr>";
				echo "<td colspan='3'><span style='color:#e68a00; font-size:15pt'>Quick Compare</span></td>";
				echo "</tr>";
				
				
				echo "<tr>";
				echo '<td><a href="https://answers.yahoo.com/question/index?qid=20101030095828AADbUoG">' . "Brand" ."<img src='http://media.idownloadblog.com/wp-content/uploads/2013/04/Yahoo-3.0-for-iOS-app-icon-small.png' height='20' width='20'>" . " </td>";
				echo '<td>' .   $record4['brand'] . "</td>";
				echo "<td>" .   $record2['brand'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Seris" . " </td>";
				echo "<td>" . $record4['seris'] . "</td>";
				echo "<td>" . $record2['seris'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Price" . " </td>";
				echo "<td>" .  $record4['price'] . "<a href=com_price.php?id_camera=" . $record4['id_camera'] . " class=button>compare price</a>"."</td>";
				echo "<td>" .  $record2['price'] . "<a href=com_price.php?id_camera=" . $record2['id_camera'] . " class=button>compare price</a>"."</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Rating(0~5)" . " </td>";
				echo "<td>" . $record4['comments'] . "</td>";
				echo "<td>" . $record2['comments'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td colspan='3'><span style='color:#e68a00; font-size:15pt'>Specification</span></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo '<td><a href="https://photographylife.com/dslr-autofocus-modes-explained">' . "Autofocus"."<img src='http://profoto.com/offcameraflash/wp-content/uploads/2014/10/photographylife-logo.png' height='15' width='15'>" ."</a>". " </td>";
				echo "<td>" .  $record4['a_f_tech'] . "</td>";
				echo "<td>" .  $record2['a_f_tech'] . "</td>";
				echo "</tr>";	

				echo "<tr>";
				echo "<td>" . "Color" . " </td>";
				echo "<td>" . $record4['color'] . "</td>";
				echo "<td>" . $record2['color'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo '<td><a href="https://en.wikipedia.org/wiki/Lens_mount">' . "Lens mount" ."<img src='http://www.tenderthefilm.com/wp-content/uploads/2013/03/wikipedialogo.png' height='15' width='15'>" ."</a>". " </td>";
				echo "<td>" .  $record4['comp_mount'] . "</td>";
				echo "<td>" .  $record2['comp_mount'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo '<td><a href="https://photographylife.com/what-is-iso-in-photography">' . "ISO range" . "<img src='http://profoto.com/offcameraflash/wp-content/uploads/2014/10/photographylife-logo.png' height='15' width='15'>" ." </td>";
				echo "<td>" . $record4['iso_range'] . "</td>";
				echo "<td>" . $record2['iso_range'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Size" . " </td>";
				echo "<td>" . $record4['dimen'] . "</td>";
				echo "<td>" . $record2['dimen'] . "</td>";
				echo "</tr>";
				
				//  echo "<td>" ."<input type='text' name='brand' value ='".  $record4['brand'] . "'></td>";
				
				echo "<tr>";
				echo "<td>" . "File format" . " </td>";
				echo "<td>" . $record4['fil_fom'] . "</td>";
				echo "<td>" . $record2['fil_fom'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Weight" . " </td>";
				echo "<td>" . $record4['weight'] . "</td>";
				echo "<td>" . $record2['weight'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Model year" . " </td>";
				echo "<td>" . $record4['model_y'] . "</td>";
				echo "<td>" . $record2['model_y'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Video format" . " </td>";
				echo "<td>" . $record4['vd_fom'] . "</td>";
				echo "<td>" . $record2['vd_fom'] . "</td>";
				echo "</tr>";
				
				
				
				echo "<tr>";
				echo "<td>" . "Video Resolution" . " </td>";
				echo "<td>" .$record4['vd_rsln'] . "</td>";
				echo "<td>" .$record2['vd_rsln'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Description" . " </td>";
				echo "<td>" . $record4['dscp'] . "</td>";
				echo "<td>" . $record2['dscp'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td colspan='3'><span style='color:#e68a00; font-size:15pt'>Annotation</span></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>&nbsp</td>";
				echo "<td>" . '<textarea form="compare" rows="4" cols="50" placeholder="write your annotation here..."></textarea>' . "</td>";
				echo "<td>" . '<textarea form="compare" rows="4" cols="50" placeholder="write your annotation here..."></textarea>' . "</td>";
				echo "</tr>";
				
				
				echo "</form>";
				echo "</table></div>";
			}
		}
		
		if ($items_num == 3) {
			$SearchQuery_cam1 = "SELECT * FROM cameras WHERE id_camera =" . $_POST[comp_check][0];
			$SearchQuery_cam2 = "SELECT * FROM cameras WHERE id_camera =" . $_POST[comp_check][1];
			$SearchQuery_cam3 = "SELECT * FROM cameras WHERE id_camera =" . $_POST[comp_check][2];
			
			$Searchcam1 = mysql_query($SearchQuery_cam1, $mysql);
			$record4= mysql_fetch_array($Searchcam1);
			$Searchcam2 = mysql_query($SearchQuery_cam2, $mysql);
			$record2 = mysql_fetch_array($Searchcam2);
			$Searchcam3 = mysql_query($SearchQuery_cam3, $mysql);
			$record3 = mysql_fetch_array($Searchcam3);
			if (!$Searchcam1 || !$Searchcam2 || !$Searchcam3) 
			{
				$message = "Open Database Error!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} 
			//echo "</br></br>";
			if ($record4 && $record2 && $record3)
			{
				echo "<div class=\"row\"><h1>Comparing cameras</h1><table border = 3 width=100% height=\"100\"><col width=82><col width=230><col width=230><col width=230>
				<tr>
				<th>Info</th>
				<th>camera 1</th>	
				<th>camera 2</th>
				<th>camera 3</th>
				</tr>";
				echo "<form id=compare action= method =>";
				
				echo "<tr>";
				echo "<td>" . "Front View" . " </td>";
				echo "<td><a href=\"specification.php?id_camera=" . $record4['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record4['ext_front'] . "\" alt=\"not available\"></a></td>"; 
				echo "<td><a href=\"specification.php?id_camera=" . $record2['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record2['ext_front'] . "\" alt=\"not available\"></a></td>"; 
				echo "<td><a href=\"specification.php?id_camera=" . $record3['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record3['ext_front'] . "\" alt=\"not available\"></a></td>"; 				
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Back View" . " </td>";
				echo "<td><a href=\"specification.php?id_camera=" . $record4['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record4['ext_back'] . "\" alt=\"not available\"></a></td>"; 
				echo "<td><a href=\"specification.php?id_camera=" . $record2['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record2['ext_back'] . "\" alt=\"not available\"></a></td>"; 
				echo "<td><a href=\"specification.php?id_camera=" . $record3['id_camera'] . "\"><img height = \"300\" width = \"300\" src=\"" . $record3['ext_back'] . "\" alt=\"not available\"></a></td>"; 				
				echo "</tr>";

				echo "<tr>";
				echo "<td colspan='3'><span style='color:#e68a00; font-size:15pt'>Quick Compare</span></td>";
				echo "</tr>";				
				
				echo "<tr>";
				echo '<td><a href="https://answers.yahoo.com/question/index?qid=20101030095828AADbUoG">' . "Brand" ."<img src='http://media.idownloadblog.com/wp-content/uploads/2013/04/Yahoo-3.0-for-iOS-app-icon-small.png' height='20' width='20'>" . " </td>";
				echo "<td>" .   $record4['brand'] . "</td>";
				echo "<td>" .   $record2['brand'] . "</td>";
				echo "<td>" .   $record3['brand'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Seris" . " </td>";
				echo "<td>" . $record4['seris'] . "</td>";
				echo "<td>" . $record2['seris'] . "</td>";
				echo "<td>" . $record3['seris'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Price" . " </td>";
				echo "<td>" .  $record4['price']."<a href=com_price.php?id_camera=" . $record4['id_camera'] . " class=button>compare price</a>" . "</td>";
				echo "<td>" .  $record2['price']."<a href=com_price.php?id_camera=" . $record2['id_camera'] . " class=button>compare price</a>" . "</td>";
				echo "<td>" .  $record3['price']."<a href=com_price.php?id_camera=" . $record3['id_camera'] . " class=button>compare price</a>" . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Rating(0~5)" . " </td>";
				echo "<td>" . $record4['comments'] . "</td>";
				echo "<td>" . $record2['comments'] . "</td>";
				echo "<td>" . $record3['comments'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td colspan='3'><span style='color:#e68a00; font-size:15pt'>Specification</span></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo '<td><a href="https://photographylife.com/dslr-autofocus-modes-explained">' . "Autofocus"."<img src='http://profoto.com/offcameraflash/wp-content/uploads/2014/10/photographylife-logo.png' height='15' width='15'>" ."</a>". " </td>";
				echo "<td>" .  $record4['a_f_tech'] . "</td>";
				echo "<td>" .  $record2['a_f_tech'] . "</td>";
				echo "<td>" .  $record3['a_f_tech'] . "</td>";
				echo "</tr>";	

				echo "<tr>";
				echo "<td>" . "Color" . " </td>";
				echo "<td>" . $record4['color'] . "</td>";
				echo "<td>" . $record2['color'] . "</td>";
				echo "<td>" . $record3['color'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo '<td><a href="https://en.wikipedia.org/wiki/Lens_mount">' . "Lens mount" ."<img src='http://www.tenderthefilm.com/wp-content/uploads/2013/03/wikipedialogo.png' height='15' width='15'>" ."</a>". " </td>";
				echo "<td>" .  $record4['comp_mount'] . "</td>";
				echo "<td>" .  $record2['comp_mount'] . "</td>";
				echo "<td>" .  $record3['comp_mount'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo '<td><a href="https://photographylife.com/what-is-iso-in-photography">' . "ISO range" . "<img src='http://profoto.com/offcameraflash/wp-content/uploads/2014/10/photographylife-logo.png' height='15' width='15'>" ." </td>";
				echo "<td>" . $record4['iso_range'] . "</td>";
				echo "<td>" . $record2['iso_range'] . "</td>";
				echo "<td>" . $record3['iso_range'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Size" . " </td>";
				echo "<td>" . $record4['dimen'] . "</td>";
				echo "<td>" . $record2['dimen'] . "</td>";
				echo "<td>" . $record3['dimen'] . "</td>";
				echo "</tr>";
				
				//  echo "<td>" ."<input type='text' name='brand' value ='".  $record4['brand'] . "'></td>";
				
				echo "<tr>";
				echo "<td>" . "File format" . " </td>";
				echo "<td>" . $record4['fil_fom'] . "</td>";
				echo "<td>" . $record2['fil_fom'] . "</td>";
				echo "<td>" . $record3['fil_fom'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Weight" . " </td>";
				echo "<td>" . $record4['weight'] . "</td>";
				echo "<td>" . $record2['weight'] . "</td>";
				echo "<td>" . $record3['weight'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Model year" . " </td>";
				echo "<td>" . $record4['model_y'] . "</td>";
				echo "<td>" . $record2['model_y'] . "</td>";
				echo "<td>" . $record3['model_y'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Video format" . " </td>";
				echo "<td>" . $record4['vd_fom'] . "</td>";
				echo "<td>" . $record2['vd_fom'] . "</td>";
				echo "<td>" . $record3['vd_fom'] . "</td>";
				echo "</tr>";
				
				
				
				echo "<tr>";
				echo "<td>" . "Video Resolution" . " </td>";
				echo "<td>" .$record4['vd_rsln'] . "</td>";
				echo "<td>" .$record2['vd_rsln'] . "</td>";
				echo "<td>" .$record3['vd_rsln'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Description" . " </td>";
				echo "<td>" . $record4['dscp'] . "</td>";
				echo "<td>" . $record2['dscp'] . "</td>";
				echo "<td>" . $record3['dscp'] . "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td colspan='3'><span style='color:#e68a00; font-size:15pt'>Annotation</span></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>&nbsp</td>";
				echo "<td>" . '<textarea form="compare" rows="4" cols="50" placeholder="write your annotation here..."></textarea>' . "</td>";
				echo "<td>" . '<textarea form="compare" rows="4" cols="50" placeholder="write your annotation here..."></textarea>' . "</td>";
				echo "<td>" . '<textarea form="compare" rows="4" cols="50" placeholder="write your annotation here..."></textarea>' . "</td>";
				echo "</tr>";
				
				
				echo "</form>";
				echo "</table></div>";
			}
		}
		if ($items_num != 3 && $items_num != 2){
			?><div class="row">
				<div class="twelve columns">
					<div class = "Three columns">
						<?php echo "<img src = \"http://a1.mzstatic.com/us/r30/Purple5/v4/6f/86/83/6f868376-5166-e91e-4ee5-597d77321ddc/icon256.png\" height = '100' width = '100' >";?>
					</div>
					<div class = "nine columns">
						<br><br><br>
						<?php echo "<h3>Please select 2 or 3 items.</h3>";?>
					</div>
					
				</div>
			</div>
			<?php
		}

		
			
			
	include("includes/footer.html");
	mysql_close($mysql);
	?>
	
</body>
</html>