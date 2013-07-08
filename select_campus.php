<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Report - Select Campus | Le Cordon Bleu Summer Camp!</title>
	
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
				<li class="active"><a href="select_campus.php">Select Campus</a></li>
				<li><a href="camp_report.php">Registrant Details</a></li>
			</ul>
		</nav>
	</div>
	
	<div class="row">
		

		<?php include 'inc/db.php'; ?>
    <br></a>
    <center>
      <form action="camp_report.php" method="post">
        <h2>Select the campus to view reports from:</h2><br>
        <select name="campus_selection">
          <option selected disabled value="">Please select one</option>
                    <?php foreach($schooldata as $school): ?>
                        <option value="<?php echo $school['campus_id']; ?>"><?php echo $school['campus_name']; ?></option>
                    <?php endforeach; ?> 
        </select><br>
        <input type="submit" value="Show me the report">
      <form>
      </center>
		

	</div>
	
	
  <script src="js/foundation.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/main.js"></script>
  <script>
  $(document).ready(function() {
  	$("tr:even").css("background-color", "#eeeeee");
	$("tr:odd").css("background-color", "#ffffff");
  });
  </script>
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