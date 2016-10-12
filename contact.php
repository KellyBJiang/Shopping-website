<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php include("includes/head.html");?>

<body>

	<?php include("includes/header.html");?>
	
	<div class="row">
		<div class="twelve columns">
			<ul class="nav-bar">
 		 		<li><a href="index.php">Home</a></li>
  				<li><a href="add_new.php">Add photos</a></li>
  				<li class="active"><a href="search.php">Search photos</a></li>
				<li><a href="select.php">View all the Photographers</a></li>
			</ul>
			
		</div>
	</div>
	
	
	
	<div class="row">
		<div class="twelve columns">
			<h1>Image Information</h1>
		</div>
	</div>
	<?php 
		include("php/db_conn.php");		
		
		
		//image form
		if(isset($_POST['updateimg']))
		{
			
			$UpdateQueryimg = "UPDATE images SET  dpi =$_POST[dpi],ctgy = '$_POST[ctgy]', format = '$_POST[format]',id_phoger = $_POST[id_phoger] ,id_log = $_POST[id_log] WHERE id_img = $_POST[id_img]";
			//echo $UpdateQueryimg;
			if (mysql_query($UpdateQueryimg, $mysql)) 
			{
				$message = "Update Record Success!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} else 
			{
				$message = "Error updating record: " . mysql_error($conn);
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			
			$SearchQuery_img = "SELECT * FROM images WHERE id_img =" . $_POST['id_img'];
			$Searchdata = mysql_query($SearchQuery_img, $mysql);
			if (!$Searchdata) 
			{
				$message = "Fetch Data Error!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} 
		
			
			if($record = mysql_fetch_array($Searchdata))
			{
				echo "<form action = contact.php method = post>";
				$addr= $record['file'];
				
				echo "<div class=\"row\">
				<div class=\"seven columns\">
				<img src= $addr height=\"500\" width=\"500\">
				</div>
				<div class=\"five columns\">	
					<table border = 3 width=\"350\" height=\"400\">
					<tr>
					<th>Info</th>;
					<th>detail</th>			
					</tr>";
				
				echo "<tr>";
				echo "<td>" . "image ID" . " </td>";
				echo "<td>"."<input type='hidden' name='id_img' value ='". $record['id_img'] . "' </td>" ;
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Resolution" . " </td>";
				echo "<td>"."<input type='hidden' name='rsln' value ='". $record['rsln_w']. " x " . $record['rsln_h']  . "' </td>" ;
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Dots per inch(DPI)" . " </td>";
				echo "<td>" ."<input type='text' name='dpi' value ='".  $record['dpi'] . "' </td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Category " . " </td>";
				echo "<td>" ."<input type='text' name='ctgy' value ='".  $record['ctgy'] . "' </td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "format ".   " </td>";
				echo "<td>" ."<input type='text' name='format' value ='".  $record['format'] . "' </td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Photographer ID ".   " </td>";
				echo "<td>" ."<input type='text' name='id_phoger' value ='".  $record['id_phoger'] . "' </td>";
				echo "</tr>";
				
				
				echo "<tr>";
				echo "<td>" . "Log ID ".   " </td>";
				echo "<td>" ."<input type='text' name='id_log' value ='".  $record['id_log'] . "' </td>";
				echo "</tr>";	

				echo "<td>"."<input type='submit' name='updateimg' value = 'update'" . " </td>" ;
				echo "<td>"."<input type='submit' name='deleteimg' value = 'delete'" . " </td>" ;
				echo "</form>";	
			} 
			echo "</table></div></div>";
			
		}
		else {
			if (!empty($_GET['id_img'])) {
				$SearchQuery_img = "SELECT * FROM images WHERE id_img =" . $_GET['id_img'];
			}else{
				if (!empty($_POST['id_img'])) {
					$SearchQuery_img = "SELECT * FROM images WHERE id_img =" . $_POST['id_img'];
				}
			}
			
			$Searchdata = mysql_query($SearchQuery_img, $mysql);
			if (!$Searchdata) 
			{
				$message = "Fetch Data Error!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} 
		
			
			if($record = mysql_fetch_array($Searchdata))
			{
				echo "<form action = contact.php method = post>";
				$addr= $record['file'];
				
				echo "<div class=\"row\">
				<div class=\"seven columns\">
				<img src= $addr height=\"500\" width=\"500\">
				</div>
				<div class=\"five columns\">	
					<table border = 3 width=\"350\" height=\"400\">
					<tr>
					<th>Info</th>
					<th>detail</th>			
					</tr>";
				
				echo "<tr>";
				echo "<td>" . "image ID" . " </td>";
				echo "<td>"."<input type='hidden' name='id_img' value ='". $record['id_img'] . "' </td>" ;
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Resolution" . " </td>";
				echo "<td>"."<input type='hidden' name='rsln' value ='". $record['rsln_w']. " x " . $record['rsln_h']  . "' </td>" ;
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Dots per inch(DPI)" . " </td>";
				echo "<td>" ."<input type='text' name='dpi' value ='".  $record['dpi'] . "' </td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Category " . " </td>";
				echo "<td>" ."<input type='text' name='ctgy' value ='".  $record['ctgy'] . "' </td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "format ".   " </td>";
				echo "<td>" ."<input type='text' name='format' value ='".  $record['format'] . "' </td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Photographer ID ".   " </td>";
				echo "<td>" ."<input type='text' name='id_phoger' value ='".  $record['id_phoger'] . "' </td>";
				echo "</tr>";
				
				
				echo "<tr>";
				echo "<td>" . "Log ID ".   " </td>";
				echo "<td>" ."<input type='text' name='id_log' value ='".  $record['id_log'] . "' </td>";
				echo "</tr>";	

				echo "<td>"."<input type='submit' name='updateimg' value = 'update'" . " </td>" ;
				echo "<td>"."<input type='submit' name='deleteimg' value = 'delete'" . " </td>" ;
				echo "</form>";	
			} 
			echo "</table></div></div>";
		}
			
			
			
		$id_p=$record['id_phoger'];	
		$SearchQuery_pho = "SELECT * FROM phogers WHERE id_phoger= '$id_p' ";
		$Searchpho = mysql_query($SearchQuery_pho, $mysql);
		if (!$Searchpho) 
		{
			$message = "Open Database Error!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} 
		echo "</br></br>";
		if($record2 = mysql_fetch_array($Searchpho))
		{
			echo "<div class=\"row\"><h1>Photographer</h1><table border = 3 width=100% height=\"100\">
			<tr>
			<th>Info</th>
			<th>detail</th>			
			</tr>";
			echo "<tr>";
			echo "<td>" . "Photoger ID" . " </td>";
			echo "<td>" .$record2['id_phoger']. " </td>";
			echo "</tr>";
					
			echo "<tr>";
			echo "<td>" . "Name" . " </td>";
			echo "<td>" .$record2['name']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "Gender" . " </td>";
			echo "<td>" .$record2['gender']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "Phone number" . " </td>";
			echo "<td>" .$record2['phone']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "Address" . " </td>";
			echo "<td>" .$record2['addr']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "City" . " </td>";
			echo "<td>" .$record2['city']." </td>";
			echo "</tr>";	

			echo "<tr>";
			echo "<td>" . "State" . " </td>";
			echo "<td>" .$record2['state']." </td>";
			echo "</tr>";			
			
			echo "</table></div>";
		}
		
		
		$id_l=$record['id_log'];	
		$SearchQuery_log = "SELECT * FROM logs WHERE id_log= '$id_l' ";
		$Searchlog = mysql_query($SearchQuery_log, $mysql);
		if (!$Searchlog) 
		{
			$message = "Open Database Error!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} 
		echo "</br></br>";
		if($record3 = mysql_fetch_array($Searchlog))
		{
			echo "<div class=\"row\"><h1>Log</h1><table border = 3 width=100% height=\"100\">
			<tr>
			<th>Info</th>
			<th>detail</th>			
			</tr>";
			echo "<tr>";
			echo "<td>" . "Log ID" . " </td>";
			echo "<td>" .$record3['id_log']. " </td>";
			echo "</tr>";
					
			echo "<tr>";
			echo "<td>" . "Date" . " </td>";
			echo "<td>" .$record3['date']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "Location" . " </td>";
			echo "<td>" .$record3['loca']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "Weather" . " </td>";
			echo "<td>" .$record3['weather']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "ISO" . " </td>";
			echo "<td>" .$record3['iso']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "Start time" . " </td>";
			echo "<td>" .$record3['st_t']." </td>";
			echo "</tr>";	

			echo "<tr>";
			echo "<td>" . "End time" . " </td>";
			echo "<td>" .$record3['end_t']." </td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>" . "Camera ID" . " </td>";
			echo "<td>" .$record3['id_camera']." </td>";
			echo "</tr>";
			
			
			echo "</table></div>";
		}
		
		
		
						
		
		//camera form
		if(isset($_POST['updatecam']))
		{
			
			$id_c=$record3['id_camera'];
			$UpdateQuery_camera = "UPDATE cameras SET brand = '$_POST[brand]', seris = '$_POST[seris]', price ='$_POST[price]',comments = '$_POST[comments]', a_f_tech = '$_POST[a_f_tech]',color = '$_POST[color]' ,comp_mount = '$_POST[comp_mount]',iso_range = '$_POST[iso_range]',dimen = '$_POST[dimension]',fil_fom = '$_POST[fileform]',weight = '$_POST[weight]',model_y = '$_POST[my]',vd_fom = '$_POST[Videoform]',vd_rsln = '$_POST[VideoResolution]', dscp = '$_POST[Dscp]' WHERE id_camera = '$id_c'";
			//echo $UpdateQuery_camera . "<br><br>";
			if (!mysql_query($UpdateQuery_camera, $mysql)) 
			{
				
				$message = "Error!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} 
				
			$SearchQuery_cam = "SELECT * FROM cameras WHERE id_camera = '$id_c' ";
			$Searchcam = mysql_query($SearchQuery_cam, $mysql);
			if (!$Searchcam) 
			{
				$message = "Open Database Error!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} 
			echo "</br></br>";
			if($record4= mysql_fetch_array($Searchcam))
			{
				echo "<div class=\"row\"><h1>Camera</h1><table border = 3 width=100% height=\"100\">
				<tr>
				<th>Info</th>
				<th>detail</th>			
				</tr>";
				echo "<form action = contact.php method =post>";
				
				echo "<tr>";
				echo "<td>" . "Camera ID" . " </td>";
				echo "<td>" .$record4['id_camera']. " </td>";
				echo "</tr>";
						
				echo "<tr>";
				echo "<td>" . "Brand" . " </td>";
				echo "<td>" . "<input type='text' name='brand' value ='".  $record4['brand'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Seris" . " </td>";
				echo "<td>" ."<input type='text' name='seris' value ='".  $record4['seris'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Price" . " </td>";
				echo "<td>" ."<input type='text' name='price' value ='".  $record4['price'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Rating(0~5)" . " </td>";
				echo "<td>" ."<input type='text' name='comments' value ='".  $record4['comments'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Autofocus" . " </td>";
				echo "<td>" ."<input type='text' name='a_f_tech' value ='".  $record4['a_f_tech'] . "'></td>";
				echo "</tr>";	

				echo "<tr>";
				echo "<td>" . "Color" . " </td>";
				echo "<td>" ."<input type='text' name='color' value ='".  $record4['color'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Lens mount" . " </td>";
				echo "<td>" ."<input type='text' name='comp_mount' value ='".  $record4['comp_mount'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "ISO range" . " </td>";
				echo "<td>" ."<input type='text' name='iso_range' value ='".  $record4['iso_range'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Size" . " </td>";
				echo "<td>" ."<input type='text' name='dimension' value ='".  $record4['dimen'] . "'></td>";
				echo "</tr>";
				
				//  echo "<td>" ."<input type='text' name='brand' value ='".  $record4['brand'] . "'></td>";
				
				echo "<tr>";
				echo "<td>" . "File format" . " </td>";
				echo "<td>" ."<input type='text' name='fileform' value ='".  $record4['fil_fom'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Weight" . " </td>";
				echo "<td>" ."<input type='text' name='weight' value ='".  $record4['weight'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Model year" . " </td>";
				echo "<td>" ."<input type='text' name='my' value ='".  $record4['model_y'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Video format" . " </td>";
				echo "<td>" ."<input type='text' name='Videoform' value ='".  $record4['vd_fom'] . "'></td>";
				echo "</tr>";
				
				
				
				echo "<tr>";
				echo "<td>" . "Video Resolution" . " </td>";
				echo "<td>" ."<input type='text' name='VideoResolution' value ='".  $record4['vd_rsln'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Description" . " </td>";
				echo "<td>" ."<input type='text' name='Dscp' value ='".  $record4['dscp'] . "'></td>";
				echo "</tr>";
				
				
				echo "<tr>";
				echo "<td>"."<input type='submit' name='updatecam' value = 'update camera'" . "></td>" ;
				echo "<td>"."<input type='hidden' name='id_img' value ='".  $record['id_img'] . "'></td>";
				echo "</tr>";
				echo "</form>";
				echo "</table></div>";
			}
			
		}
		else {
			$id_c=$record3['id_camera'];	
			$SearchQuery_cam = "SELECT * FROM cameras WHERE id_camera = '$id_c' ";
			$Searchcam = mysql_query($SearchQuery_cam, $mysql);
			if (!$Searchcam) 
			{
				$message = "Open Database Error!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} 
			echo "</br></br>";
			if($record4= mysql_fetch_array($Searchcam))
			{
				echo "<div class=\"row\"><h1>Camera</h1><table border = 3 width=100% height=\"100\">
				<tr>
				<th>Info</th>
				<th>detail</th>			
				</tr>";
				echo "<form action = contact.php method =post>";
				
				echo "<tr>";
				echo "<td>" . "Camera ID" . " </td>";
				echo "<td>" .$record4['id_camera']. " </td>";
				echo "</tr>";
						
				echo "<tr>";
				echo "<td>" . "Brand" . " </td>";
				echo "<td>" . "<input type='text' name='brand' value ='".  $record4['brand'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Seris" . " </td>";
				echo "<td>" ."<input type='text' name='seris' value ='".  $record4['seris'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Price" . " </td>";
				echo "<td>" ."<input type='text' name='price' value ='".  $record4['price'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Rating(0~5)" . " </td>";
				echo "<td>" ."<input type='text' name='comments' value ='".  $record4['comments'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Autofocus" . " </td>";
				echo "<td>" ."<input type='text' name='a_f_tech' value ='".  $record4['a_f_tech'] . "'></td>";
				echo "</tr>";	

				echo "<tr>";
				echo "<td>" . "Color" . " </td>";
				echo "<td>" ."<input type='text' name='color' value ='".  $record4['color'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Lens mount" . " </td>";
				echo "<td>" ."<input type='text' name='comp_mount' value ='".  $record4['comp_mount'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "ISO range" . " </td>";
				echo "<td>" ."<input type='text' name='iso_range' value ='".  $record4['iso_range'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Size" . " </td>";
				echo "<td>" ."<input type='text' name='dimension' value ='".  $record4['dimen'] . "'></td>";
				echo "</tr>";
				
				//  echo "<td>" ."<input type='text' name='brand' value ='".  $record4['brand'] . "'></td>";
				
				echo "<tr>";
				echo "<td>" . "File format" . " </td>";
				echo "<td>" ."<input type='text' name='fileform' value ='".  $record4['fil_fom'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Weight" . " </td>";
				echo "<td>" ."<input type='text' name='weight' value ='".  $record4['weight'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Model year" . " </td>";
				echo "<td>" ."<input type='text' name='my' value ='".  $record4['model_y'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Video format" . " </td>";
				echo "<td>" ."<input type='text' name='Videoform' value ='".  $record4['vd_fom'] . "'></td>";
				echo "</tr>";
				
				
				
				echo "<tr>";
				echo "<td>" . "Video Resolution" . " </td>";
				echo "<td>" ."<input type='text' name='VideoResolution' value ='".  $record4['vd_rsln'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . "Description" . " </td>";
				echo "<td>" . "<input type='text' name='Dscp' value ='".  $record4['dscp'] . "'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>"."<input type='submit' name='updatecam' value = 'update camera'" . "></td>" ;
				echo "<td>"."<input type='hidden' name='id_img' value ='".  $record['id_img'] . "'></td>";
				echo "</tr>";
				echo "</form>";
				echo "</table></div>";
			}
		}

			
			
	include("includes/footer.html");?>
</body>
</html>