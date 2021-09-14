<?php 
include('dbConn.php');
$collection = "companyMaster";
$companies = array('Deloitte','CBRE','Allied Universal','Accenture','Humana','Wells Fargo','Marriott International','Hospital Corporation of America',
'UnitedHealth Group','JP Morgan','Aramark Corporation','Verizon','Compass Group','Ascension Health','Hilton Hotel Corporation','McDonald&rsquo;s',
'Domino&rsquo;s Pizza','Salesforce','Department of Veterans Affairs','VMWare','KPMG','Aya Healthcare','Starbucks','State Farm Insurance','Red Robin',
'Assurance Independent Agents','Microsoft','Sodexo','Securitas','Fidelity Brokerage Services','Encompass Health','Fiserv','Advantage Sales and Marketing',
'Ryder System Inc','Sysco','Panera Bread','YMCA','Citizens Financial Group','Pizza Hut','Buffalo Wild Wings','Universal Health Services','Kindercare',
'US&nbsp;Bancorp','Chili&rsquo;s','Quest Diagnostics','Hyatt','University of California','Citi','The TruGreen Companies LLC','Massage Envy','Sonic Drive-In',
'Kindred Healthcare','Chipotle','Healthcare Services Group','Guidehouse','Brookdale Senior Living','Select Medical','Leidos','Great Clips','Pearson','Nomad Health',
'American Express','T-Mobile','Taco Bell','ServiceMaster','Emerald Health Services','PricewaterhouseCoopers','Facebook','DaVita','Burger King','Crossmark',
'AdventHealth','XPO Logistics, Inc','Restaurant Depot','Fresenius','Baylor Scott &amp; White Health','Holiday Inn','Chick-fil-a','Arby&rsquo;s','Lifepoint Health',
'Kaiser Permanente','Home Instead Senior Care','UC Health','LHC Group','Cintas','Burlington Coat Factory','The Mentor Network','Black &amp; Veatch','ABM Industries',
'Google','DISH Network Corporation','SelectQuote','LiveOps Company Inc','Penske','Genesis Healthcare','TherapyTravelers','Waste Management','Comcast','Baptist Health',
'Charter Communications');
//$date_array = array('2021-09-10','2021-09-01','2021-09-05','2021-09-06','2021-09-02','2021-09-03');
$count = count($companies);
for($i = 0; $i < $count; $i++){
    //echo $companies[$i]. "<br>";
    $reg_date = array_rand($date_array);
    $record = array(
        company_name => $companies[$i],
        company_logo => '',
        company_desc => 'This is a demo description, please ignore. We will provide the actual description shortly.',
        company_url => 'https://www.google.com',
        company_status =>  'A',
        reg_date => $date_array[$reg_date]
    );
    $single_insert = new MongoDB\Driver\BulkWrite();
	$single_insert->insert($record);
	$conn->executeBulkWrite("$dbname.$collection", $single_insert);
	
}
echo "<br>$i records inserted";
?>