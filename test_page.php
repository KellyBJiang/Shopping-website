<!doctype html>
<html lang="en">
<?php include("includes/header.html");?>
<body>

<div class="container text-center">
     <h2>Jquery - Timepicker Example using jQuery Timepicker Plugin</h2>
     <strong>Select Time:</strong> <input type="text" id="timepicker" class="from-control">
</div>

<form>
	<input type="text" class="datepicker" size="10">
</form>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="stylesheets/jquery.timepicker.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.js"></script>
	
	<script type="text/javascript" src="javascripts/zebra_datepicker.js"></script>
	<link rel="stylesheet" href="stylesheets/default.css" type="text/css">
	
	<script type="text/javascript">
		$(document).ready(function() {
			$("#timepicker").timepicker(
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