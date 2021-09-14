<?php 
include('dbConn.php');
$collection = "categoryMaster";
$categories = array('Accounting','Administration','Agriculture/Forestry/Fishing','Auto/Bus Driving/Truck Mechanic/Technician',
                'Aviation and Aerospace','Beauty and Wellness','Business Ops','Childcare/Daycare/Nannies','Communication','Construction/Building Trades',
                'Consulting Services','Consumer Products','Contracts/Acquisitions','Customer Service','Defense/Military/Intelligence Analysis','Design',
                'Education','Electronics','Emergency/Fire Management Services','Employment and Staffing Services','Energy','Engineering',
                'Environmental and Natural Resources','Executive/Senior Level Mgmt','Farming and Ranching','Finance','Funeral Services and Operations',
                'Gaming and Casino Operations','General Labor/Semi-Skilled','Government','Healthcare','Heavy Equipment Technician/Operator','Hospitality/Hotel/Resort',
                'Human Resources','Information Technology','Insurance','Internships','Investments','Law Enforcement','Letter and Package Delivery',
                'Maintenance','Management and Supervision','Marketing','Miscellaneous','Natural Sciences and Mathematics','Non-Profit/Associations',
                'Other','Personal Care and Service','Pet Grooming/Training','Production','Professional and Technical','Project Management','Public Safety',
                'Publishing','Quality Assurance/Safety','Real Estate and Property Mgmt','Restaurant','Retail/Wholesale','Sales','Science and Laboratory',
                'Seasonal/Temporary','Security','Skilled Trades','Social Services/Community','Sports/Park and Recreation','Supply Chain/Logistics',
                'Surveying and Planning','Telecommunications','Tourism/Travel','Transportation','Trucking and Truck Driving','Veterinarian/Animal Services',
                'Volunteer','Warehousing and Factory Work','Work From Home/Home Office');
$count = count($categories);
for($i = 0; $i < $count; $i++){
    //echo $categories[$i]. "<br>";
    $record = array(
        cat_name => $categories[$i],
        cat_status =>  'A'
    );
    $single_insert = new MongoDB\Driver\BulkWrite();
	$single_insert->insert($record);
	$conn->executeBulkWrite("$dbname.$collection", $single_insert);
	
}
echo "<br>$i records inserted";
?>