<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php include("includes/head.html");?>

<body>
	
	
	<div class="container">
		<?php 
			include("includes/header.html");
			//connect to databse
			include("php/db_conn.php")
		?>
		
		<div class="row">
			<div class="twelve columns">
				<ul class="nav-bar">
					<li><a href="index.php">Home</a></li>
					<li><a href="add_new.php">Add photos</a></li>
					<li class="active"><a href="javascript:;">Search photos</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="select.php">View all the Photographers</a></li>
				</ul>
			</div>
		</div>
				
		<div class="row">
			<div class="twelve columns">
				<h3>Search photos</h3>
				<div class="row">
					<div class="three columns" id="leftSearchContainer">
						<p id="secName">Search results by</p> 	
						<form action="search.php" method="post" class="custom">
							<p class="subSecName">categary:</p>
								<div id="ctyCheckboxContainer" class="custom">
									<div class="checkbox">
									  <label><input type="checkbox" value="pets" name="ctgy[]">pets</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="human" name="ctgy[]">human</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="architecture" name="ctgy[]">arch</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="vehicle" name="ctgy[]">vehicle</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="nature" name="ctgy[]">nature</label>
									</div>
								</div>
							<p class="subSecName">resolution:</p>
								<!--
									<div id="rslnRatio">
									<input type="radio" name="rsln_sml" value="small"> small<br>
									<input type="radio" name="rsln_sml" value="medium"> medium<br>
									<input type="radio" name="rsln_sml" value="large"> large
								</div>
								-->
								<br>
								<div id="rslnEnter">
									<label>at least:</label>
									<input type="text" name="rsln_l_w" placeholder="width">
									
									<label>*</label>
									<input type="text" name="rsln_l_h" placeholder="height">
									<br>
									<label>at most:</label>
									<input type="text" name="rsln_m_w" placeholder="width">
									
									<label>*</label>
									<input type="text" name="rsln_m_h" placeholder="height">
								</div>
							<p class="subSecName">dpi:</p>
								<div id="dpiCheckboxContainer" class="custom">
									<div class="checkbox">
									  <label><input type="checkbox" value="20" name="dpi[]">20</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="96" name="dpi[]">96</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="120" name="dpi[]">120</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="150" name="dpi[]">150</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="200" name="dpi[]">200</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="300" name="dpi[]">300</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="600" name="dpi[]">600</label>
									</div>
								</div>
							<p class="subSecName">photographer:</p>
								<?php
									$qry_phoger = "select name from phogers";
									$data_phogers = mysql_query($qry_phoger, $mysql);
									//handle query error
									if($data_phogers == false){
										$message = "Failed to fetch photographer names";
										echo "<script type='text/javascript'>alert('$message');</script>";
									}
									echo "<div id=\"phogerCheckboxContainer\">";
									while ($record = mysql_fetch_array($data_phogers)) {
										echo "<div class=\"checkbox\">\n"; 
										echo  "<label><input type=\"checkbox\" value=\"" . $record['name'] . "\" name=\"phoger_name[]\">" . $record['name'] . "</label>\n</div>\n";
									}
									echo "</div>";
								?>
								
							<p class="subSecName">date:</p>
							<div id="dateEnter">
								<label>between:</label>
								<input type="text" class="datepicker" name="date_1" placeholder="select date">
								<label>and</label>
								<input type="text" class="datepicker" name="date_2" placeholder="select date">
							</div>
								
							<p class="subSecName">weather:</p>
							<div id="weatCheckboxContainer" class="custom">
								<div class="checkbox">
								  <label><input type="checkbox" value="foggy" name="wea[]">foggy</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="cloudy" name="wea[]">cloudy</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="rainy" name="wea[]">rainy</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="clear" name="wea[]">clear</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="sunny" name="wea[]">sunny</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="snowy" name="wea[]">snowy</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="lightening" name="wea[]">lightening</label>
								</div>
							</div>
							<div style="margin-top:10px;">
								<input type='submit' name='search' value = 'search items'>
							</div>
						</form>					
					</div>
			
					<div class="nine columns">
					<p id="secName">Search results</p>
					<?php
						if (isset($_POST['search'])) {
							//define conditions
							$where_qry = "select * from images where ";
							if (isset($_POST['ctgy'])) {
								$ctgy_cons_len = sizeof($_POST['ctgy']);
								$ctgy_cons = "(ctgy='" . $_POST['ctgy'][0] . "'";
								$i = 1;
								while ($i < $ctgy_cons_len) {
									$ctgy_cons .= " or ctgy='" . $_POST['ctgy'][$i] . "'";
									$i++;
									
								}
								$where_qry .= $ctgy_cons . ")\n"; 
								echo $where_qry . "<br><br>";
							}
							
							if (!empty($_POST['rsln_l_w']) && !empty($_POST['rsln_l_h']) && !empty($_POST['rsln_m_w']) && !empty($_POST['rsln_m_h'])) {
								$rsln_cons = "and (rsln_w between " . $_POST['rsln_l_w'] . " and " . $_POST['rsln_m_w'] . ")\nand (rsln_h between " . $_POST['rsln_l_h'] . " and " . $_POST['rsln_m_h'] . ")";
								
								$where_qry .= $rsln_cons . "\n"; 
								echo $where_qry . "<br><br>";
							}
							
							if (isset($_POST['dpi'])) {
								$dpi_cons_len = sizeof($_POST['dpi']);
								$dpi_cons = " and (dpi=" . $_POST['dpi'][0];
								$i = 1;
								while ($i < $dpi_cons_len) {
									$dpi_cons .= " or dpi=" . $_POST['dpi'][$i];
									$i++;
									
								}
								$where_qry .= $dpi_cons . ")\n"; 
								echo $where_qry . "<br><br>";
							}
							
							if (isset($_POST['phoger_name'])) {
								$phoger_cons_len = sizeof($_POST['phoger_name']);
								//find id_phoger
								$phoger_id_qry = "select id_phoger from phogers where (name='" . $_POST['phoger_name'][0] . "'";
								
								$i = 1;
								while ($i < $phoger_cons_len) {
									$phoger_id_qry .= " or name='" . $_POST['phoger_name'][$i] ."'";
									$i++;
								}
								$phoger_id_qry .=")"; 
								echo $phoger_id_qry . "<br><br>";
								
								//append id_phoger in where query
								$where_qry .= " and (id_phoger in (" . $phoger_id_qry . "))";
								
								echo $where_qry . "<br><br>";
							}
							
							$id_log_qry="select id_log from logs where ";
							
							if (!empty($_POST['date_1']) && !empty($_POST['date_2'])) {
								$id_log_qry .= "(date between '" . $_POST['date_1'] . "' and '" . $_POST['date_2'] . "')";
								echo $id_log_qry . "<br><br>";
							}
							
							if (isset($_POST['wea'])) {
								$wea_cons_len = sizeof($_POST['wea']);
								$id_log_qry .= " and (weather='" . $_POST['wea'][0];
								$i = 1;
								//echo $wea_cons_len . "<br>";
								while ($i < $wea_cons_len) {
									$id_log_qry .= " or weather='" . $_POST['wea'][$i] . "')";
									$i++;
								} 
								//echo strlen($id_log_qry) . "<br>";
								echo $id_log_qry . "<br><br>";
							}
							
							
							
							
							//var_dump($_POST['phoger_name']);
							//echo sizeof($_POST[phoger_name]);
							/*
							$selQuery = 
							$mydata = mysql_query($selQuery, $mysql);
							//$i=0;
							while($record = mysql_fetch_array($mydata))
							{
								echo "<div class=\"gallery\">\n"; 
								echo "<div class=\"photo\">\n"; 
								echo "<a href=\"#\"><img src=\"images/30-html5-tutorials.jpeg\" alt=\"foto\"></a>\n"; 
								echo "<p><a href=\"#\">Cactus</a></p>"; 
								echo "</div>";
								echo "</div>";
								//$i++;
							}
							*/
						}
					?>					
					</div>
				</div>
			</div>
		</div>
		<?php include("includes/footer.html");?>
	</div>
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="stylesheets/jquery.timepicker.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.js"></script>
	
	<script type="text/javascript" src="javascripts/zebra_datepicker.js"></script>
	<link rel="stylesheet" href="stylesheets/default.css" type="text/css">
	
	<script type="text/javascript">
		$(document).ready(function() {
			$("input.timepicker").timepicker(
					{timeFormat: 'h:mm p',
					interval: 30,
					defaultTime: '12',
					startTime: '00:00',
					dynamic: false,
					dropdown: true,
					scrollbar: true
				    });
			$('input.datepicker').Zebra_DatePicker();
		});
	</script>
</body>
</html>