<?php
/**
 * Template Name: splash_page
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>UCLA Games</title>
<style type="text/css">
img  { 	display: block; 	margin-right: auto; 	margin-top: 250px; 	margin-left: auto; }    
body { 	
background-color: #111; }  .ss-form-container{ 	display: block; 	margin-left: auto; 	margin-right: 
auto; 	
margin-top: 30px; 	width: 222px; 	color: #fff; 	background-color: #111; 	border: 1px solid #CCC; 	
padding: 0.5em 1em; 	font-size: 0.9em; } .ss-q-title{ 	font-weight: bold; 	padding-left:7px; 	
float: left; }  .ss-q-submit{ 	color: #fff; } .ss-form-entry{  }  .ss-q-short { 	 	background:#f7f7f7; 	
border:solid gray 1px;  	color:#666666; 	float: left; 	margin-left: 10px; }  .ss-q-submit { 	color: #000;  
} .space{ 	margin-bottom: 24px; }
</style>
<script type="text/javascript">
function custommsg() {
	document.getElementById("form-message").style.display=""; 
	document.getElementById("form-message").innerHTML="Thanks for your interest!"; 
	document.getElementById("form-container").style.display="none";
	} 
	
function isValidEmail(f) {
	var str = f.elements[1].value;
	   return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);
	}
</script>
		<title>UCLA GAME LAB </title>
		
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18966343-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</head>
	<body id="index" class="home">
		<img src="<?php bloginfo('template_directory'); echo "/SoonGL.jpg"; ?>" />
		<div class="ss-form-container" style="display:none;" id="form-message"></div>
		<div class="ss-form-container" id="form-container">
			<p>This UCLA Game Lab site is coming soon. Sign up for our mailing list to keep in touch!</p>
			<form action="" method="post" target="fake-target" 
onsubmit="this.action='https://spreadsheets.google.com/a/hadto.net/formResponse?formkey=dDk1UEtIUVZ5OXlfNXkzQ09nT2dWa2c6MQ'; 
if (isValidEmail(this)) {custommsg(); return true;} else return false;">
				<div class="ss-form-entry">
					<div class="ss-q-title">Name?</div><input type="text" class="ss-q-short" 
name="single:0">
				</div>
				<div class="space"> &nbsp;</div>
				<div class="ss-form-entry">
					<div class="ss-q-title">Email?</div><input type="text" class="ss-q-short" 
name="single:1">
				</div>
				<div class="space"> &nbsp;</div>
				<input type="submit" class="ss-q-submit" value="Submit">
			</form>
		</div>
		<p>
			<iframe src="#" id="fake-target" name="fake-target" style="width:0px; height:0px; 
border:0px;"></iframe><br>
		</p>
	</body>
</html>

