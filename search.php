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
			//connect to databse
			include("php/db_conn.php")
		?>
		
		<div class="row">
		<div class="twelve columns">
			<img src="https://cdn4.iconfinder.com/data/icons/computer-parts/512/camera-128.png" height="60" width = "60">
			<a class="head_nav_a" >Welsocm to DSLR Camera</a>
            <span>|</span>
            <a class="head_nav_a"  href="http://www.bestbuy.com/site/buying-guides/dslr-camera-buying-guide/pcmcat329300050005.c?id=pcmcat329300050005" style= "text-decoration: none">Tips for DSLR Camera</a>
			<ul class="nav-bar">
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="javascript:;">search cameras</a></li>
			</ul>
			</div>
		</div>
				
		<div class="row">
			<div class="twelve columns">
				<h5>Narrow search results</h6>
				<div class="row">
					<div class="three columns" id="leftSearchContainer">
						<p id="secName">Search results by</p> 	
						<form action="search.php" method="post" class="custom">
							<p class="subSecName">brand:</p>
								<div id="BrdCheckboxContainer" class="custom">
									<div class="checkbox">
									  <label><input type="checkbox" value="Nikon" name="brd[]">Nikon</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="Canon" name="brd[]">Canon</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="Olympus" name="brd[]">Olympus</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="Sony" name="brd[]">Sony</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" value="Fujifilm" name="brd[]">Fujifilm</label>
									</div>
								</div>
							
							<p class="subSecName">price:</p>
								<!--
									<div id="rslnRatio">
										<input type="radio" name="rsln_sml" value="small"> small<br>
										<input type="radio" name="rsln_sml" value="medium"> medium<br>
										<input type="radio" name="rsln_sml" value="large"> large
									</div>
									<br>
								-->
								<div id="priceEnter">
									<label>between:</label>
									<input type="text" name="price_l" placeholder="lowest">
									
									<label>and</label>
									<input type="text" name="price_h" placeholder="highest">
								</div>
							<p class="subSecName">comment:</p>
							<div id="comCheckboxContainer" class="custom">
								<div class="checkbox">
								  <label><input type="checkbox" value="1" name="com[]">1</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="2" name="com[]">2</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="3" name="com[]">3</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="4" name="com[]">4</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="5" name="com[]">5</label>
								</div>
							</div>
								
							<p class="subSecName">model year:</p>
							<?php
								$qry_year = "select distinct model_y from cameras ORDER BY model_y ASC";
								$data_year = mysql_query($qry_year, $mysql);
								//handle query error
								if($data_year == false){
									$message = "Failed to fetch photographer names";
									echo "<script type='text/javascript'>alert('$message');</script>";
								}
								echo "<div id=\"yearCheckboxContainer\">";
								while ($record = mysql_fetch_array($data_year)) {
									echo "<div class=\"checkbox\">\n"; 
									echo  "<label><input type=\"checkbox\" value=\"" . $record['model_y'] . "\" name=\"year[]\">" . $record['model_y'] . "</label>\n</div>\n";
								}
								echo "</div>";
							?>
							
							
							<div style="margin-top:10px;">
								<input type='submit' name='search' value = 'search items'>
							</div>
						</form>					
					</div>
			
					<div class="nine columns">
					<p id="secName">Search results</p>
					<?php
						if (isset($_POST['search'])) {
							$brand_qry = "select id_camera from cameras";
							$price_qry = "select id_camera from cameras";
							$comment_qry = "select id_camera from cameras";
							$year_qry = "select id_camera from cameras";
							$whole_qry = "select * from cameras";
							
							if (!isset($_POST['brd']) && empty($_POST['price_l']) && empty($_POST['price_h']) && !isset($_POST['com']) && !isset($_POST['year'])) {
								echo "<p>Please select something to search.</p>";
							}
							else {
								//define conditions
								if (isset($_POST['brd'])) {
									$brd_cons_len = sizeof($_POST['brd']);
									$brand_qry .= " where (brand='" . $_POST['brd'][0] . "'";
									$i = 1;
									while ($i < $brd_cons_len) {
										$brand_qry .= " or brand='" . $_POST['brd'][$i] . "'";
										$i++;
										
									}
									$brand_qry .= ")";
									//echo $ctgy_cons . "<br><br>";
								}
							
								if (!empty($_POST['price_l']) && !empty($_POST['price_h'])) {
									//price cons
									$price_qry .= " where (price between " . $_POST['price_l'] . " and " . $_POST['price_h'] . ")";
									
									//echo $price_qry . "<br><br>";
								}
								
								if (isset($_POST['com'])) {
									$com_cons_len = sizeof($_POST['com']);
									$comment_qry .= " where (comments=" . $_POST['com'][0];
									$i = 1;
									while ($i < $com_cons_len) {
										$comment_qry .= " or comments=" . $_POST['com'][$i];
										$i++;
										
									}
									$comment_qry .= ")";
									//echo $comment_qry . "<br><br>";
								}
								
								if (isset($_POST['year'])) {
									$year_cons_len = sizeof($_POST['year']);
									$year_qry .= " where (model_y='" . $_POST['year'][0] . "'";
									$i = 1;
									while ($i < $year_cons_len) {
										$year_qry .= " or model_y='" . $_POST['year'][$i] . "'";
										$i++;
										
									}
									$year_qry .= ")";
									//echo $ctgy_cons . "<br><br>";
								}
								
								$whole_qry .= " where id_camera in (" . $brand_qry . ") and id_camera in (" . $price_qry . ") and id_camera in (" . $comment_qry .") and id_camera in (" . $year_qry . ")";
								//echo $whole_qry . "<br><br>";
								
								$mydata = mysql_query($whole_qry, $mysql);
								
								$record = mysql_fetch_assoc($mydata);
								if ($record == NULL) {
									echo "<p>No results!</p>";
								}else {
									//initial mydata again
									$mydata = mysql_query($whole_qry, $mysql);
									echo "<form action=\"compare.php\" method=\"post\" style=\"background: url();\">";
									echo "<input type=submit name=com_butn style = 'background-color:#ffdd99' value=compare>";
									echo "<span style='color: #adad85; font-size:10pt'>Please select 2 or 3 items to compare.</span>";
									echo "<div class=\"gallery\">\n"; 
									while ($record = mysql_fetch_assoc($mydata))
									{
										
										echo "<div class=\"photo\">\n"; 
										echo "<div class=\"comp_checkbox\">";
										echo "<label style=\"padding-top: px;\"><input type=checkbox value=" . $record['id_camera'] ." name=comp_check[]>compare</label>";
										echo "</div>";
										echo "<a href=\"specification.php?id_camera=" . $record['id_camera'] . "\"><img class=sear_res width=195px height=195px src=\"" . $record['ext_front'] . "\" alt=\"not available\"></a>\n"; 
										echo "<p>" . $record['brand'] . " " . $record['seris'] . "</p>"; 
										echo "<p><span style='color:red'>as low as: $" . $record['price'] . "</span></p>";
										echo "<a href=com_price.php?id_camera=" . $record['id_camera'] . " class=button>compare price</a>";
										echo "</div>";
										
									}
									echo "</div>";
									echo "</form>";
								}
								
								mysql_free_result($mydata);
							}
						}
					?>	
					
						<!--
							<form action="campare.php" method="post" style="background: url();">
							<input type="submit" name="com_butn" value="compare">
							<div class="gallery">
							
								<div class="photo">
								<div class="checkbox">
								  <label><input type="checkbox" value="" name="comp_check[]">compare</label>
								</div>
								<a href="contact.php?id_camera=6"><img class="sear_res" width="195px" height="195px" src="https://images-na.ssl-images-amazon.com/images/I/71-9a6mqyeL._SL1500_.jpg" alt="not available"></a>
								<p style="text-align: center;">Canon EOS 5D</p>
							
								</div>
							
							
								<div class="photo">
								<div class="checkbox">
								  <label><input type="checkbox" value="" name="comp_check[]">compare</label>
								</div>
								<a href="contact.php?id_camera=12"><img class="sear_res" width="195px" height="195px" src="https://images-na.ssl-images-amazon.com/images/I/71tz63oxXqL._SL1500_.jpg" alt="not available"></a>
								<p style="text-align: center;">Canon EOS Rebel T5</p>
								</div>
							
							
							
								<div class="photo">
								<div class="checkbox">
								  <label><input type="checkbox" value="" name="comp_check[]">compare</label>
								</div>
								<a href="contact.php?id_camera=13"><img class="sear_res" width="195px" height="195px" src="https://images-na.ssl-images-amazon.com/images/I/714uCi-1G-S._SL1500_.jpg" alt="not available"></a>
								<p style="text-align: center;">Canon Rebel XTi </p>
								</div>
							
							
							
							
							
								<div class="photo">
								<div class="checkbox">
								  <label><input type="checkbox" value="" name="comp_check[]">compare</label>
								</div>
								<a href="contact.php?id_camera=13"><img class="sear_res" width="195px" height="195px" src="https://images-na.ssl-images-amazon.com/images/I/714uCi-1G-S._SL1500_.jpg" alt="not available"></a>
								<p style="text-align: center;">Canon Rebel XTi </p>
								</div>
						</div>
						</form>
						-->
							
						
						
						
						
						
						
					
						
					
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
	
	<?php mysql_close($mysql);?>
</body>
</html>