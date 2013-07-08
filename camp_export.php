<?php 
session_start();

$campus = $_SESSION['campus'];

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

  if(isset($_SESSION['campus'])) {
    $campus = $_SESSION['campus'];
     $registrations = "SELECT *
    FROM registrants
    LEFT JOIN sessions on (registrants.session_combo = sessions.session_combo)
    LEFT JOIN session_dates on (sessions.session_id = session_dates.session_id)
    WHERE campus_id = '$campus'";
    $registrants = $pdo->query($registrations);
  }
}
catch (PDOException $e)
{
  // throw an error if sql queries fail
  $error = 'Error fetching data: ' . $e->getMessage();
  include 'inc/error.php';
  exit();
}

// Pick a filename and destination directory for the file
// Remember that the folder where you want to write the file has to be writable
$filename = "tmp/camp_export_".time().".csv";
 
// Actually create the file
// The w+ parameter will wipe out and overwrite any existing file with the same name
$handle = fopen($filename, 'w+');
 
// Write the spreadsheet column titles / labels
fputcsv($handle, array('Registrant ID','Campus ID','First Name','Last Name','E-mail','Phone','Session Start','Session End','Tshirt Size', 'Birthday'));
 
// Write all the user records to the spreadsheet
foreach($registrants as $row)
{
         $start_date = strtotime( $row['start_date'] );
       $start_date = date( 'F d, Y', $start_date );
       $end_date = strtotime( $row['end_date'] );
       $end_date = date( 'F d, Y', $end_date );
    fputcsv($handle, array($row['registrant_id'],$row['campus_id'],$row['first_name'],$row['last_name'],$row['email_address'],'"'.$row['phone'].'"',$start_date,$end_date,$row['tshirt'], $row['birthdate']));
}
 
// Finish writing the file
fclose($handle);

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=camp_export_'.time().".csv");
header('Pragma: no-cache');
readfile("tmp/camp_export_".time().".csv");

?>
		
