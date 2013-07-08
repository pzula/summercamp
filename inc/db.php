<?php

// connect to the  database
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
  // $sql = 'SELECT campus_id, session_id, name, type, start, end, address1, address2, city, state, zip, map_url, description, tz
  //         FROM all_session_data';
  $schools = 'SELECT DISTINCT campus_id, campus_name
          		FROM all_sessions_view
              ORDER BY campus_name';
  $schooloutput = $pdo->query($schools);

  $sessions = 'SELECT session_combo, campus_id, campus_name, session_id, start_date, end_date, end_display_date
  				FROM all_sessions_view
  				WHERE end_display_date >= CURDATE()';
  $sessionoutput = $pdo->query($sessions);
}
catch (PDOException $e)
{
  // throw an error if sql queries fail
  $error = 'Error fetching data: ' . $e->getMessage();
  include 'error.php';
  exit();
}

foreach ($schooloutput as $school) {
	$schooldata[] = array(
    'campus_id' => $school['campus_id'],
    'campus_name' => $school['campus_name']
  );
}

foreach ($sessionoutput as $session) {
	$sessiondata[] = array(
	'campus_id' => $session['campus_id'],
	'campus_name' => $session['campus_name'],
    'session_combo' => $session['session_combo'],
    'session_id' => $session['session_id'],
    'start_date' => $session['start_date'],
    'end_date' => $session['end_date'],
    'end_display_date' => $session['end_display_date']
  );
}



// make sure no more than 20 people have signed up for this program

?>