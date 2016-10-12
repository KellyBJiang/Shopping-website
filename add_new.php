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
  				<li class="active"><a href="javascript:;">Add photos</a></li>
  				<li><a href="search.php">Search photos</a></li>
				<li><a href="select.php">View all the Photographers</a></li>
			</ul>
			
		</div>
	</div>
	
	

	
	<!-- don't mind this script, I just added them for fun! -->
	<script charset="ISO-8859-1" src="http://fast.wistia.com/static/popover-v1.js"></script>
	
	<div class="row" >
		<div class="twelve columns">
		<h1>Add new items</h1>	</br></br>	
        <h4>Images</h4>
        <form action=".\php\add_items.php"  method = "post" background-color="red">
            
            <p>
            <label>Resolution(width)</label>
            <input type="text" name="image_r_w" size="50" placeholder="Enter Resolution width">
            </p>
            <p>
            <label>Resolution(height)</label>
            <input type="text" name="image_r_h" size="10" placeholder="Enter Resolution height">
            </p>
			<label>DPI</label>
			<select name="image_dpi">
				<option selected disabled>Choose here</option>
				<option value="20">20</option>
				<option value="96">96</option>
				<option value="120">120</option>
				<option value="150">150</option>
				<option value="200">200</option>
				<option value="300">300</option>
				<option value="600">600</option>
			 </select>
            </p>
            <p>
            <label>Category</label>
			<select name="image_ctgy">
				<option selected disabled>Choose here</option>
				<option value="pets">pets</option>
				<option value="nature">nature</option>
				<option value="architecture">architecture</option>
				<option value="vehicle">vehicle</option>
				<option value="human">human</option>
			 </select>
            </p>
            <p>
            <label>Format</label>
			<select name="image_form">
				<option selected disabled>Choose here</option>
				<option value="jpeg">jpeg</option>
				<option value="png">png</option>
				<option value="gif">gif</option>
				<option value="bmp">bmp</option>
				<option value="jpg">jpg</option>
			 </select>
            </p>
            <p>
            <label>File URL</label>
            <input type="text" name="image_file" size="10" placeholder="Enter a File URL">
            </p>
			<p>
			<label>ID of photographer</label>
            <input type="text" name="image_idphoger" size="10" placeholder="Enter the id of photographer" required>
            </p>
			<p>
			<label>ID of log</label>
            <input type="text" name="image_idlog" size="10" placeholder="Enter the id of log(250~392)" required>
            </p>
			<p>Add photographer information?</p>
			<p>Add a log?</p>
            <p>
            <button type="sumit", name="submit_image" >Add a photo</button>
            </p>
            <!-- <input type="submit" value="Submit"/>  -->
        </form></br></br></br>
		
		
			
			
			
		<h4>Cameras</h4>
        <form action=".\php\add_items.php"  method = "post">
            <p>
            <label>Brand</label>
			<select name="camera_brand">
				<option selected disabled>Choose here</option>
				<option value="Nikon">Nikon</option>
				<option value="Canon">Canon</option>
				<option value="Olympus">Olympus</option>
				<option value="Sony">Sony</option>
				<option value="Fujifilm">Fujifilm</option>
			 </select>
            </p>
            <p>
            <label>Seris</label>
            <input type="text" name="camera_seris" size="50" placeholder="Enter the seris(EOS Rebel T5)">
            </p>
            <p>
            <label>Camera_price</label>
            <input type="text" name="camera_price" size="50" placeholder="Enter the price(300)">
            </p>
			<p>
			<label>Comments</label>
			<select name="camera_comments">
				<option selected disabled>Choose here</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			 </select>
            </p>
			
			<label>Front image</label>
            <input type="text" name="camera_f" size="50" placeholder="Enter a image URL">
            </p>
			<label>Back image</label>
            <input type="text" name="camera_b" size="50" placeholder="Enter a image URL">
            </p>			
            <p>
            <label>Autofocus mode</label>
            <input type="text" name="camera_af" size="10" placeholder="Enter Autofocus mode of the camera">
            </p>
			<label>Color</label>
			<select name="camera_color">
				<option selected disabled>Choose here</option>
				<option value="black">black</option>
				<option value="white">white</option>
				<option value="red">red</option>
				<option value="blue">blue</option>
				<option value="gray">gray</option>
				<option value="green">green</option>
			 </select>
            </p>
            <p>
            <label>Lens mount</label>
            <input type="text" name="camera_lenmt" size="50" placeholder="Enter the Lens mount">
            </p>
            <p>
            <label>ISO range</label>
            <input type="text" name="camera_iso" size="50" placeholder="Enter a ISO range( Auto, 100 - 25600 in 1/3 stops, plus 50, 51200, 102400 as option )">
            </p>
            <p>
            <label>Size of the camera(dimesion)</label>
            <input type="text" name="camera_dimen" size="50" placeholder="Enter the size(3x4x5)">
            </p>
			<p>
            <label>File form</label>
            <input type="text" name="camera_fifom" size="50" placeholder="Enter the file form )">
            </p>
			<p>
            <label>weight</label>
            <input type="text" name="camera_we" size="50" placeholder="Enter the weight )">
            </p>
			<p>
            <label>model year</label>
            <input type="text" name="camera_year" size="50" placeholder="Enter the model year )">
            </p>			
			<p>
            <label>Video file form</label>
            <input type="text" name="camera_vdf" size="50" placeholder="Enter video file form )">
            </p>
			<p>
            <label>Video file resolution</label>
            <input type="text" name="camera_vdrsln" size="50" placeholder="Enter video file resolution)">
            </p>
			<p>Add photographer information?</p>
			<p>Add a log?</p>
            <p>
            <button type="sumit", name="submit_cam" >Add a Camera</button>
            </p>
            <!-- <input type="submit" value="Submit"/>  -->
        </form>
		</br></br></br>	
		
		
		<h4>logs</h4>
        <form action=".\php\add_items.php"  method = "post">
            <p>
				<label>date</label>
				<input type="text" class="datepicker" name="logs_date" size="50" placeholder="">
            </p>
            <p>
				<label>Location</label>
				<input type="text" name="logs_loca" size="50" placeholder="Enter the location">
            </p>
            <p>
				<label>weather</label>
				<select name="logs_weat">
					<option selected disabled>Choose here</option>
					<option value="foggy">foggy</option>
					<option value="cloudy">cloudy</option>
					<option value="rainy">rainy</option>
					<option value="clear">clear</option>
					<option value="sunny">sunny</option>
					<option value="snowy">snowy</option>
					<option value="lightening">lightening</option>
				</select>
            </p>
            <p>
				<label>iso</label>
				<select name="logs_iso">
					<option selected disabled>Choose here</option>
					<option value="Auto">Auto</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="200">200</option>
					<option value="320">320</option>
					<option value="400">400</option>
					<option value="640">640</option>
					<option value="800">800</option>
					<option value="1000">1000</option>
					<option value="2000">2000</option>
					<option value="3200">3200</option>
					<option value="5000">5000</option>
					<option value="6400">6400</option>
					<option value="8000">8000</option>
				</select>
            </p>
				<label>start time</label>
				<input type="text" class="timepicker" name="logs_st"  size="50" placeholder=""/>
            </p>
            <p>
				<label>end time</label>
				<input type="text" class="timepicker" name="logs_et" size="50" placeholder="">
            </p>
			<p>
				<label>Camera id</label>
				<input type="text" name="logs_cam" size="50" placeholder="Enter the camera id">
			</p>
            <p>Do you want to add a photographer?</p>
     
            <p>
				<button type="sumit", name="submit_log" >Add Log</button>
            </p>
            <!-- <input type="submit" value="Submit"/>  -->
        </form>
		</br></br></br>	
		
		<h4>photographers</h4>
		<form action=".\php\add_items.php"  method = "post">
            <p>
				<label>name</label>
				<input type="text" name="phoger_name" size="50" placeholder="Enter the names">
            </p>
            <p>
				<label>gender</label>
				<select name="phoger_gender">
					<option selected disabled>Choose here</option>
					<option value="F">F</option>
					<option value="M">M</option>
				</select>
            </p>
            <p>
				<label>phone</label>
				<input type="text" name="phoger_phone" size="50" placeholder="Enter phone number">
            </p>
            <p>
				<label>addr</label>
				<input type="text" name="phoger_addr" size="10" placeholder="Enter the address of photographers">
            </p>
				<label>city</label>
				<input type="text" name="phoger_city" size="50" placeholder="Enter the city">
            </p>
            <p>
				<label>state</label>
				<select name="phoger_state">
					<option selected disabled>Choose here</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
            </p>
            <p>
				Do you want to add a photographer?</p>           
            <p>
				<button type="sumit", name="submit_pho" >Add Photographer</button>
            </p>
            <!-- <input type="submit" value="Submit"/>  -->
        </form>
		
			
		</div>
	</div>
	<div class="row">
		<div class="twelve columns">
		<hr />
		<p align="center"> 2016 CSCE-606 Project #1. Design by Kelly and Stephen.</p>
		</div>
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