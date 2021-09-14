<?php
error_reporting(0);
// connect to mongodb
$dbhost = 'localhost';
//$dbhost = '18.236.184.217';
$dbport = '27017';
$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport", array("username" => "satyen", "password" => "satyen123"));
//$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport", array("username" => "sysadmin", "password" => "clematis#2021"));
$dbname = "newairlines";
$comcollection = "companyMaster";
$catcollection = "categoryMaster";
//Retrive all companies ids
$filter = [];
$query = new MongoDB\Driver\Query($filter);
$comresult = $conn->executeQuery($dbname.'.'.$comcollection, $query);
$comarray = array();
foreach($comresult as $company){
    array_push($comarray, "$company->_id");
}

//Retrive all categories ids
$filter = [];
$query = new MongoDB\Driver\Query($filter);
$catresult = $conn->executeQuery($dbname.'.'.$catcollection, $query);
$catarray = array();
foreach($catresult as $category){
    array_push($catarray, "$category->_id");
}

$date_array = array('2021-09-10','2021-09-01','2021-09-05','2021-09-06','2021-09-02','2021-09-03');

?>