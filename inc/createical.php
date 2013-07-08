<?php 
	session_start();

	//set correct content-type-header
	header('Content-type: text/calendar; charset=utf-8');
	$Filename = "LeCordonBleu" . $_SESSION['session'] . ".ics";
	header('Content-Disposition: download; filename=' . $Filename);
    


    //simplify the data
    $location = $_SESSION['campus_name'] . " | " . $_SESSION['address'] . " " . $_SESSION['city'] . ", " . $_SESSION['state'] . " " . $_SESSION['zip'] . " ";
    $name = "Le Cordon Bleu Two Day Culinary Camp";
    $description = 'At this fun-filled, two-day Culinary Camp, you\'ll be taught to cook and how to identify and safely use basic kitchen equipment and knives, prepare simple dishes, using basic cooking skills, and apply basic cooking techniques to proteins, starches, and vegetables. On day two, bring up to 2 friends or parents to see your creations!';

    $startdatetime = strtotime( $_SESSION['start_date'] . '0800' );
    $endrectime = strtotime( $_SESSION['start_date'] . '1400' );
    $starttime = date( 'Ymd\THi00', $startdatetime ); 
    $endtime = date( 'Ymd\THi00', $endrectime );
    $enddatetime = strtotime( $_SESSION['end_date'] . '1400' );
    $recendtime = date( 'Ymd\THi00', $enddatetime );  


    $ical = "BEGIN:VCALENDAR" . "\n";
	$ical .= "VERSION:2.0" . "\n";
	$ical .= "PRODID:-//hacksw/handcal//NONSGML v1.0//EN" . "\n";
	$ical .= "BEGIN:VEVENT" . "\n";
	$ical .= "UID:info@chefs.edu" . "\n";
	$ical .= "DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z" . "\n";
	$ical .= "ORGANIZER;CN=Le Cordon Bleu:MAILTO:info@chefs.edu" . "\n";
	$ical .= "LOCATION:" . $location . "\n";
	$ical .= "DESCRIPTION:" . $description . "\n";
	$ical .= "DTSTART:" . $starttime . "\n";
	$ical .= "DTEND:" . $endtime . "\n";
	$ical .= "RRULE:" . "FREQ=DAILY;UNTIL=" . $recendtime . "\n";
	$ical .= "SUMMARY:" . $name . "\n";
	$ical .= "END:VEVENT" . "\n";
	$ical .= "END:VCALENDAR" . "\n";

	echo $ical;
	exit;

?> 
