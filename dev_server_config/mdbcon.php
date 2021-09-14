<?php
// connect to mongodb
	$dbhost = 'localhost';
	$dbport = '27017';
	$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");
	print_r($conn);
	echo "<br><br>";
	
	/*
	$dbname = "codeigniter-mongodb";
    $collection = "users";
    $filter = [];
	$option = [];
	
	$read = new MongoDB\Driver\Query($filter, $option);
	$all_users = $conn->executeQuery("$dbname.$collection", $read);
	echo nl2br("List of all users:\n");
	foreach ($all_users as $user) {
		echo nl2br($user->first_name.' '.$user->last_name.' has following roles:' . "\n");
		foreach ($user->tags as $tag) {
			echo nl2br($tag . "\n");
		}
	}
	
	*/
?>