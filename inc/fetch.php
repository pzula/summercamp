<?php

if(isset($_GET['campus'])) {
	$campus = $_GET['campus'];
}

// connect to the  database
try {
	$pdo = new PDO('mysql:host=localhost;dbname=lcbsummercamp', 'summercamp', 'xxxx');
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
  $session_listing = "SELECT session_combo, campus_id, campus_name, session_id, start_date, end_date, end_display_date
  				FROM all_sessions_view
  				WHERE end_display_date >= CURDATE()
  				AND campus_id = '$campus'";
  				// removed class cap per client -- use this to query view if needed again
          // AND registrant_count < 20
  $session_list = $pdo->query($session_listing);
}
catch (PDOException $e)
{
  // throw an error if sql queries fail
  $error = 'Error fetching data: ' . $e->getMessage();
  include 'error.php';
  exit();
}


foreach ($session_list as $indv_session) {
	$indv_session_data[] = array(
	'campus_id' => $indv_session['campus_id'],
	'campus_name' => $indv_session['campus_name'],
    'session_combo' => $indv_session['session_combo'],
    'session_id' => $indv_session['session_id'],
    'start_date' => $indv_session['start_date'],
    'end_date' => $indv_session['end_date'],
    'end_display_date' => $indv_session['end_display_date']
  );
}


?>

 					<?php foreach($indv_session_data as $indv_session): ?>
                        <?php 
                        $start_date = strtotime( $indv_session['start_date'] );
                        $start_date = date( 'F d, Y', $start_date );
                        $end_date = strtotime( $indv_session['end_date'] );
                        $end_date = date( 'F d, Y', $end_date );
                         ?>
                        <option value="<?php echo $indv_session['session_combo']; ?>"><?php echo $start_date . ' &amp; ' . $end_date; ?></option>
        			<?php endforeach; ?>  