<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php include("includes/head.html");?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

#navBar
{
    width: 100%;
    height: 300px;

    border-width: 1px;
	
   
}

#subDiv1, #subDiv2, #subDiv3, #subDiv4
{
    width: 10%;
    height: 300px;
    
}
#subDiv1
{
  
    float: left;
    margin-left: 0%;
}
#subDiv2
{
    float: left;
    margin-left: 15%;
}
#subDiv3
{
    float: left;
    margin-left: 30%;
}
#subDiv4
{
  
    float: left;
    margin-left: 45%;
}

p.weekly
{
	text-align: center;
}

p.popular
{
	text-align:left;
}

h3.weekly
{
	color: #ff6600;
	text-align:left;
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
				<li class="active"><a href="javascript:;">Home</a></li>
				<li><a href="search.php">Search Cameras</a></li>
			</ul>
		</div>
	</div>
	
	
	<br><br><br>
	<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="imgc/4nikonD3200.png" style="width:100%">
  <div class="text">NikonD3200</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="imgc/A99Sony.png" style="width:100%">
  <div class="text">Sony A99</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="imgc/3Canoneosrebelt5i.png" style="width:100%">
  <div class="text">Canon EOS Rebel t5i</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="imgc/canoneos50D2.png" style="width:100%">
  <div class="text">Canon EOS 50D</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


		
	<div class="row">
		<div class="twelve columns">
			<div class="row">
				<br />
				<h3 class = "weekly">Weekly Deals</h3>
			</div>
			<div class="row">
					<div class="two columns">
						<a href="specification.php?id_camera=2"><img src=".\imgc\weekly\151t+mEVyl6L.jpg" height="300" width="300" border="1"/></a>
						<p class="weekly">Nikon D7100</p>
					</div>
					<div class="two columns">
						<a href="specification.php?id_camera=3"><img src=".\imgc\weekly\281LIl2BKorS._SL1500_.jpg" height="300" width="300" border="1"/></a>	
						<p class="weekly">Nikon D40</p>
					</div>
					<div class="two columns">
						<a href="specification.php?id_camera=12"><img src=".\imgc\weekly\3.jpg" height="300" width="300" border="1"/></a>		
						<p class="weekly">Canon EOS RebelT5</p>
					</div>
					<div class="two columns">
						<a href="specification.php?id_camera=6"><img src=".\imgc\weekly\471-9a6mqyeL._SL1500_.jpg" height="300" width="300" border="1" /></a>		
						<p class="weekly">Canon EOS 5dMarkIII</p>
					</div>
					<div class="two columns">
						<a href="specification.php?id_camera=8"><img src=".\imgc\weekly\571INzALUNZL._SL1200_.jpg" height="300" width="300" border="1"/></a>		
						<p class="weekly">Sony A99</p>
					</div>
					<div class="two columns">
						<a href="specification.php?id_camera=13"><img src=".\imgc\weekly\651yldYuDPmL.jpg" height="300" width="300" border="1"/></a>		
						<p class="weekly">Canon EOS Xti</p>
					</div>
			</div>
			<br>
			
			<div class= "row">
				<div class="six columns">
					<h3 class="weekly">Popular search</h3>
				</div>
					<div class="six columns">
					<h3 class="weekly">Popular Brand</h3>
				</div>
				
			</div>
			
			<div class= "row">
				<div class="six columns">
					<a href="specification.php?id_camera=8"><p class="popular">Sony Alpha SLT-A99V DSLRCamera</p></a>
				</div>
				<div class="six columns">
					<a href="contect.php?brand='sony' "><p class="popular">Sony</p>
				</div>				
			</div>
			<div class= "row">
				<div class="six columns">
					<a href="specification.php?id_camera=14"><p class="popular">Nikon D60 Special Edition</p></a>
				</div>
				<div class="six columns">
					<a href="contect.php?brand='nikon' "><p class="popular">Nikon</p>
				</div>				
			</div>
			<div class= "row">
				<div class="six columns">
					<a href="specification.php?id_camera=6"><p class="populary">Canon EOS 5D</p></a>
				</div>
				<div class="six columns">
					<a href="contect.php?brand='canon' "><p class="popular">Canon</p>
				</div>				
			</div>
			
			
		</div>
	</div>
	
	<?php include("includes/footer.html");?>
</body>
</html>