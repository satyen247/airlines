<?php 
include('dbConn.php');
$collection = "jobs";

$count = 0;
for($i=1; $i<=1001; $i++){
	$company_id = array_rand($comarray);
	$company_id = $comarray[$company_id];
	$cat_id = array_rand($catarray);
	$cat_id = $catarray[$cat_id];
	$jobid = mt_rand();
	$reg_date = array_rand($date_array);
	$job_start_date = array_rand($date_array);
	$job_start_date = $date_array[$job_start_date];

	$record = array(
	  company_id =>  $company_id,
	  cat_id => $cat_id,
	  job_id =>  $jobid,
	  job_title =>  'Airport Maintenance Superintendent', 
      job_position_title =>  'Airport Maintenance Superintendent',
      job_function =>  'Facility Operations & Maintenance',
      job_desc =>  'Description

	  This position is a member of the Palm Springs International Airport management team, with responsibility for planning, coordinating, and supervising airport maintenance activities and operations. With oversight of Maintenance Supervisors, Technicians and Janitorial Services staff, this position coordinates assigned activities with other departments, divisions, outside agencies, and the general public and provides highly responsible and complex staff assistance to the Assistant Executive Director of Aviation.
	  
	  
	  
	  Requirements
	  
	  Minimum and Preferred Requirements
	  
	  Experience:
	  
	  Five (5) years of increasingly responsible building and facilities maintenance experience, including three (3) years of administrative and supervisory experience is required.
	  Experience developing and directing programs for airside, landside, and terminal facilities maintenance is preferred.
	  Computerized Maintenance Systems (CMS) experience is preferred.
	  In addition to the above, the ideal candidate will possess strong knowledge of the principles, practices and theories of employee training, motivation, supervision and evaluation; operational safety, regulatory compliance, and possess the following:
	  
	  Key Competencies
	  Leadership, employee relations and supervision
	  Operational safety
	  Maintenance management
	  
	  Training:
	  High School Diploma or equivalent education is required.
	  Specialized training in airport or airfield maintenance, commercial maintenance, facilities maintenance, or related field is preferred.
	  Bachelor degree from an accredited college or university with major course work in airport operations, business administration, public administration, or a related field is preferred.',
      job_type =>  'Full-Time',
	  job_start_date =>  $job_start_date,
	  job_end_date =>  '',
	  job_duration =>  'Indefinite',
	  job_city =>  'Palm Springs',
	  job_state =>  'California',
	  job_zip =>  '92262',
	  job_country =>  'United States',
	  min_education =>  'H.S. Diploma/Equivalent',
	  min_experience =>  '3-5 Years',
	  required_travel =>  '0-10%',
	  salary_type =>  'H',
	  min_salary =>  '$38.30',
	  max_salary =>  '$51.53',
	  salary_amount =>  '',
	  job_status =>  'A',
	  job_posting_date =>  '2021-09-01'
	  
	);
	$single_insert = new MongoDB\Driver\BulkWrite();
	$single_insert->insert($record);
	$conn->executeBulkWrite("$dbname.$collection", $single_insert);
	$count++;
}

echo "<br>$count records inserted";

?>