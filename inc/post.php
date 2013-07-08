<?php
	
	session_start();

	include 'functions.php';

	// escape magic quotes trickery

	if (get_magic_quotes_gpc()) {
	  $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	  while (list($key, $val) = each($process)) {
	    foreach ($val as $k => $v) {
	      unset($process[$key][$k]);
	      if (is_array($v)) {
	        $process[$key][stripslashes($k)] = $v;
	        $process[] = &$process[$key][stripslashes($k)];
	      } else {
	        $process[$key][stripslashes($k)] = stripslashes($v);
	      }
	    }
	  }
	  unset($process);
	}

	// connect to the database
	
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

	// process the form using placeholders and prepared statements to guard against sql injection

	try
	{
		// post to our database
		$sql = 'INSERT INTO registrants SET
			first_name = :first_name,
			last_name = :last_name,
			email_address = :email_address,
			tshirt = :tshirt,
			session_combo = :session_combo,
			phone = :phone,
			birthdate = :birthdate';
		$s = $pdo->prepare($sql);
		$s->bindValue(':first_name', $_POST['firstName']);
		$s->bindValue(':last_name', $_POST['lastName']);
		$s->bindValue(':email_address', $_POST['email']);
		$s->bindValue(':tshirt', $_POST['tshirt']);
		$s->bindValue(':session_combo', $_POST['session']);
		$s->bindValue(':phone', $_POST['phone']);
		$s->bindValue(':birthdate', $_POST['month'] . " " . $_POST['day'] . ", " . $_POST['year']);
		$s->execute();


		// pull dates for knotice

		$fields = $_POST;

		$session_combo = $fields['session'];

		$notice_sql = "SELECT *
          FROM sessions
          LEFT JOIN session_dates on (sessions.session_id = session_dates.session_id)
          WHERE session_combo = '$session_combo'";
        $session_dates = $pdo->query($notice_sql);

        // format for knotice

        foreach ($session_dates as $session) {
			$fields[] = array(
		    'start_date' => $session['start_date'],
		    'end_date' => $session['end_date']
		  );

			$start_date = strtotime( $session['start_date'] );
            $fields['start_date'] = date( 'F d, Y', $start_date );
            $end_date = strtotime( $session['end_date'] );
            $fields['end_date'] = date( 'F d, Y', $end_date );
		}

		// post to knotice
		
		 PostToNotice($fields);


		// Grab everything for thank you page

		$ty_sql = "SELECT * 
					FROM sessions
					LEFT JOIN session_dates ON ( sessions.session_id = session_dates.session_id ) 
					LEFT JOIN schools ON ( sessions.campus_id = schools.campus_id )
					WHERE session_combo = '$session_combo'";
		$ty_extract = $pdo->query($ty_sql);
			foreach ($ty_extract as $ty_detail) {
				$detail[] = array(
			    'start_date' => $ty_detail['start_date'],
			    'end_date' => $ty_detail['end_date'],
			    'campus_id' => $ty_detail['campus_id'],
			    'campus_name' => $ty_detail['campus_name'],
			    'address' => $ty_detail['address'],
			    'city' => $ty_detail['city'],
			    'state' => $ty_detail['state'],
			    'zip' => $ty_detail['zip'],
			    'campus_phone' => $ty_detail['campus_phone'],
			    'doa_name' => $ty_detail['doa_name'],
			    'doa_email' => $ty_detail['doa_email'],
			    'map_url' => $ty_detail['map_url'],
			    'campaign_id' => $ty_detail['campaign_id']
			  );

				       $start_date = strtotime( $ty_detail['start_date'] );
				       $start_date = date( 'F d, Y', $start_date );
				       $end_date = strtotime( $ty_detail['end_date'] );
				       $end_date = date( 'F d, Y', $end_date );

				$_SESSION['session'] = $fields['session'];
				$_SESSION['start_date'] = $start_date;
				$_SESSION['end_date'] = $end_date;
				$_SESSION['campus_name'] = $ty_detail['campus_name'];
				$_SESSION['address'] = $ty_detail['address'];
				$_SESSION['city'] = $ty_detail['city'];
				$_SESSION['state'] = $ty_detail['state'];
				$_SESSION['zip'] = $ty_detail['zip'];
				$_SESSION['campus_phone'] = $ty_detail['campus_phone'];
				$_SESSION['doa_name'] = $ty_detail['doa_name'];
				$_SESSION['doa_email'] = $ty_detail['doa_email'];
				$_SESSION['map_url'] = $ty_detail['map_url'];
	}
}
	catch (PDOException $e)
	{
		$error = 'Error submitting RSVP';
		include 'includes/error.php';
		exit();
	}



	header('Location: ../thankyou.php');
	exit();


?>