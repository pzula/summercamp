<?php
session_start();
?>

<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Thank you for signing up for Le Cordon Bleu Summer Camp!</title>
	
	<link rel="stylesheet" href="css/foundation.min.css" />
	<link rel="stylesheet" href="css/custom.css" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js?ver=3.5.1"></script>
	<script type="text/javascript" src="js/vendor/custom.modernizr.js"></script>
	<!-- IE Fix for Media Queries -->
	<!--[if lt IE 9]>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>   
	<![endif]-->
	
</head>
<body>
	<header class="row">
	
		<div class="logo large-9 columns">
			<a href="#">Le Cordon Bleu</a>
		</div>	
		<div class="header-right large-7 columns">	
		</div>
	</header>
	
	<div class="row">
		<nav class="large-16 columns">
			<ul>
				<li><a href="index.php">Schedule</a></li>
				<li><a href="details.php">Camp Details</a></li>
			</ul>
		</nav>
	</div>
	
	<div class="row">
		<div class="form-sidebar large-6 columns push-10">
			
			
			
			<div class="form-footer">

				<img src="images/LCB-TY-image-300px.jpg" alt="Happy chefs!" style="margin-top:30px">

			<p class="permission">
					<br>
					<br>
				Medical Treatment Authorization and Consent Form
				<br>
				<span class="print">&raquo; <a href="pdf/LCB_Summer_Camp_Medical_Form.pdf" target="_blank" alt="Print permission form">Click here to print form</a></span>

			<p class="permission">
				For campers under 18, a participation form must be completed and turned in prior to starting camp. Those under 18 without a permission form will not be allowed to participate without parental/guardian consent.
				<br>
				<span class="print">&raquo; <a href="pdf/LCB_Summer_Camp_Wavier_Form.pdf" target="_blank" alt="Print permission form">Click here to print form</a></span>
			</p>

			<div class="form-footer hide-for-small">
				<ul class="social-list">
					<li class="facebook"><a href="https://www.facebook.com/LeCordonBleu ">Facebook</a></li>
					<li class="instagram"><a href="http://instagram.com/lecordonbleu">Instagram</a></li>
					<li class="twitter"><a href="https://twitter.com/LCBSchools">Twitter</a></li>
				</ul>
				<p class="hashtag">#bleusummercamp</p>
				<div class="clear"></div>
			</div>

				<div class="clear"></div>
			</div>
			
			
			
		</div><!-- End .form-sidebar -->
		<div class="content-left large-10 columns pull-6">
		
			<h1>Thank you for registering!<br><br> Please print this page for your records.</h1>
			<div class="clear"></div>
			
			
			<h2>Your Session Details</h2>
			<div class="camp-callout">
			<ul>			
				<li><strong>Dates:</strong> <?php echo $_SESSION['start_date'] . " & " . $_SESSION['end_date']; ?></li>
				<li><strong>Time:</strong> 8:00am - 2:00pm (<a href="inc/createical.php">Add to calendar</a>)</li>
				<li><strong>Address:</strong><br> <?php echo $_SESSION['campus_name'] . "<br>" . $_SESSION['address'] . "<br>" . $_SESSION['city'] . ", " . $_SESSION['state'] . " " . $_SESSION['zip'] ?><br>
				<a href="<?php echo $_SESSION['map_url']; ?>" target="_blank">Map</a></li>
				<li><strong>Have questions?</strong> Contact <?php echo $_SESSION['doa_name']; ?> at <a href="mailto:<?php echo $_SESSION['doa_email']; ?>"><?php echo $_SESSION['doa_email']; ?></a> or <?php echo $_SESSION['campus_phone']; ?>

			</ul>
			</div>
			<br />
			
			<h2>Your Activities</h2>
			
			<div class="camp-callout">
				<img src="images/cutting.jpg" style="width: 127px; height: 127px; border: 0px; float: left; margin: 0px 20px 10px 0px;" class="hide-for-small" />
				<h3>Day 1</h3>
				
				<p class="focus"><strong>Focusing on:</strong></p>
				
				<ul>
					<li>Basic Knife Handling &amp; Skills
						<ul>
							<li>Peel - Slice</li>
							<li>Dice - Chop</li>
						</ul>
					</li>
					<li>Roasting</li>
				</ul>
				
			</div>
			<div class="camp-callout">
				<img src="images/pan.jpg" style="width: 127px; height: 127px; border: 0px; float: right; margin: 0px 0px 10px 20px;" class="hide-for-small" />
				<h3>Day 2</h3>
				
				<p class="focus"><strong>Focusing on:</strong></p>
				
				<ul>
					<li>Saut&eacute;</li>
					<li>Pasta Making</li>
					<li>Sauces</li>
					<li>Basic Baking &amp; Pastry Techniques</li>
				</ul>
				
			</div>
		
		
			<br />
			<div class="form-footer show-for-small">
				<ul class="social-list">
					<li class="facebook"><a href="https://www.facebook.com/LeCordonBleu ">Facebook</a></li>
					<li class="instagram"><a href="http://instagram.com/lecordonbleu">Instagram</a></li>
					<li class="twitter"><a href="https://twitter.com/LCBSchools">Twitter</a></li>
				</ul>
				<p class="hashtag">#bleusummercamp</p>
				<div class="clear"></div>
			</div>
		
		</div><!-- End .content-left -->
	</div>
	<footer>
		<div class="footerLeft">
			<p class="address"><span class="blue">Le Cordon Bleu</span> | 231 N. Martingale Road | Schaumburg, IL 60173</p>

			<p class="small">Financial Aid is available for those who qualify. Find disclosures on graduation rates, student financial obligations and more at <a href="http://www.chefs.edu/disclosures" target="_blank">www.chefs.edu/disclosures</a>.Le Cordon Bleu&reg; and the Le Cordon Bleu logo are registered trademarks of Career Education Corporation. Le Cordon Bleu cannot guarantee employment or salary. Credits earned at Le Cordon Bleu are unlikely to transfer externally, but Le Cordon Bleu credits will transfer within Le Cordon Bleu if you choose to continue on and pursue a higher degree program with us. XXXXXX 06/13</p>
		</div>

	</footer>
	
	
  <script src="js/foundation.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/main.js"></script>
  <!--
  <script src="js/foundation/foundation.js"></script>
  <script src="js/foundation/foundation.placeholder.js"></script>
  <script src="js/foundation/foundation.forms.js"></script>
  <script src="js/foundation/foundation.orbit.js"></script>
  <script src="js/foundation/foundation.section.js"></script>
  <script src="js/foundation/foundation.topbar.js"></script>
  -->
  <script>
    $(document).foundation();
  </script>
</body>
</html>