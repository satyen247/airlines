<?php
// connect to mongodb
	$dbhost = 'localhost';
	$dbport = '27017';
	//$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");
	$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport", array("username" => "sysadmin", "password" => "clematis#2021"));
	print_r($conn);
	echo "<br><br>";
	//die('hello');
	
	//$mng = new MongoDB\Driver\Manager();
	//print_r($mng);
	//echo "<br><br>";
	//user: "sysadmin",
    //pwd: "clematis#2021"
	
	
	$dbname = "mydb";
   $collection = "users";
   
   $user1 = array(
    'first_name' => 'Satyen',
    'last_name' => 'Rudra',
    'tags' => array('Manager','admin')
	);
	
	// Insert record
	$single_insert = new MongoDB\Driver\BulkWrite();
	$single_insert->insert($user1);
	//$conn->executeBulkWrite("$dbname.$collection", $single_insert);
	// show all records 
	
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
	
	
?>