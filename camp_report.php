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
	<title>Report | Le Cordon Bleu Summer Camp</title>
	
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
				<li><a href="select_campus.php">Select Campus</a></li>
				<li class="active"><a href="camp_report.php">Registrant Details</a></li>
			</ul>
		</nav>
	</div>
	
	<div class="row">
		

			<?php 

// connect to db
try {
  $pdo = new PDO('mysql:host=localhost;dbname=lcbsummercamp', 'summercamp', 'xxx');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
} 
catch (PDOExeption $e) {
  $output = "Unable to connect to the database server";
  include 'output.php';
  exit();
}

// only need this for debugging
// $output = "Database connection established";
// include 'output.php';


try 
{
  $registrations = 'SELECT *
    FROM registrants
    LEFT JOIN sessions on (registrants.session_combo = sessions.session_combo)
    LEFT JOIN session_dates on (sessions.session_id = session_dates.session_id)';
  $registrants = $pdo->query($registrations);

  if(isset($_POST['campus_selection'])) {
    $campus = $_POST['campus_selection'];
     $registrations = "SELECT *
    FROM registrants
    LEFT JOIN sessions on (registrants.session_combo = sessions.session_combo)
    LEFT JOIN session_dates on (sessions.session_id = session_dates.session_id)
    WHERE campus_id = '$campus'";
    $registrants = $pdo->query($registrations);

    $_SESSION['campus'] = $campus;
  }
}
catch (PDOException $e)
{
  // throw an error if sql queries fail
  $error = 'Error fetching data: ' . $e->getMessage();
  include 'inc/error.php';
  exit();
}

echo "<h1>Summer Camp Signups</h1>";
echo "<p>Not seeing signups for your campus? Make sure to select the proper campus from the Select Campus link. If you are still not seeing registrations, no one has signed up for a session on your campus yet.</p>";
echo "<center><table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Campus ID</th><th>First Name</th><th>Last Name</th><th>E-mail</th><th>Phone</th><th>Session Start</th><th>Session End</th><th>Tshirt Size</th><th>Birthday</th></tr>";

    foreach($registrants->fetchAll() as $row){
       $start_date = strtotime( $row['start_date'] );
       $start_date = date( 'F d, Y', $start_date );
       $end_date = strtotime( $row['end_date'] );
       $end_date = date( 'F d, Y', $end_date );

        echo "<tr>";
        echo "<td>".$row['registrant_id']."</td>";
        echo "<td>".$row['campus_id']. "</td>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['last_name']."</td>";
        echo "<td>".$row['email_address']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$start_date."</td>";
        echo "<td>".$end_date."</td>";
        echo "<td>".$row['tshirt']."</td>";
        echo "<td>".$row['birthdate']."</td>";
        echo "</tr>";
    }

    $registrants->closeCursor();

    echo "</table></center>"; 

    echo "<strong><a href='camp_export.php' target='_blank'>Generate CSV of Report</a></strong>";

    echo "<br><br><br>";


?>
		

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