<?php 
include('dbConn.php');
$collection = "jobs";

$count = 0;
for($i=1; $i<=1005; $i++){
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
	  job_title =>  'Aviation Electrical Technician II', 
      job_position_title =>  'Aviation Electrical Technician II',
      job_function =>  'Other',
      job_desc =>  'Description

GENERAL DESCRIPTION

Supports all Tyonek Services Group aircraft operations with an emphasis on NAVAIR program support.

DUTIES

Performs aircraft inspections, assists in aircraft movements, performs aircraft preservations and all associated installation, removal and troubleshooting procedures.
Interpret engineering designs and drawings
Provide technical direction, training, and guidance to lower level technical personnel as necessary
Read, interpret, and supports development of electrical fabrication and installation drawings
Perform fabrication, installation, and troubleshooting of control, power, Video and RF cables and harnesses on aircraft
Use both In-Shop and Flight-line test equipment for troubleshooting and testing
Work as a modification team member supporting workflow and task assignments during the integration process
During modification; perform in-process inspections for assembly and installation design conformance
Travel may be required
Other Duties as Assigned
EDUCATION/EXPERIENCE REQUIREMENTS

High School diploma or graduate equivalent
Minimum of six (6) years of significant experience in demonstrating installation, troubleshooting, and maintenance of complex communications equipment and electronics equipment
Ordinance handling experience desired
F/A-18 and NAVAIR 4790 experience preferred
Provide technical direction and guidance to lower level technical personnel
Must have or be able to obtain and maintain a Secret clearance
Graduate of a technical school is preferred
We maintain a drug-free workplace and perform post offer, pre-employment substance abuse testing.
PHYSICAL REQUIREMENTS

To perform this job successfully, an individual must be able to perform each essential duty satisfactorily. The requirements listed are representative of the knowledge, skills, and/or abilities required. Reasonable accommodations may be made to enable individuals with disabilities to perform essential job functions.
Must be able to walk and stand on level and/or inclined surfaces for certain periods throughout the day.
Must be able to climb stairs, ramps, ladders, and work stands, working at heights with fall protection devices.
Must be able to crouch, crawl, grasp or handle objects, use finger dexterity, bend elbow/knee and reach above/below shoulders.
May be required to lift up to 50 pounds and carry for short distances.
May be required to read dials/gauges, identify small objects and hand tools.
Must be able to see imperfections, micrometer readings and other small scales.
Must be able to communicate by voice and detect sound by ear.
Must be able to distinguish color and judge three-dimensional depth.
May be required to operate power vehicles, machinery, hand tools, ground support equipment, fork lift, APU, etc.
May be required to work in varying temperatures and weather
EQUAL OPPORTUNITY EMPLOYER VEVRAA/ADA

TNC and its subsidiaries fall under ANCSA and are entitled under Federal Law to extend hiring preferences to its shareholders. ANCSA provides TNC the authority to give shareholder preference in hiring. TNC reaffirms its belief in equal employment opportunity for all employees and applicants for employment. Tyonek is an Equal Employment Opportunity Employer and a VEVRAA governed Federal Contractor who affords equal employment opportunity to protected veterans and people with disabilities. TNC provides all employees and job applicants equal employment opportunities in hiring and promotion without regard to age, sex, sexual orientation, marital status, race, religion, color, veteran status, genetic information, physical or mental disability, national origin or any other reason prohibited by law.




For more information, or to apply now, you must go to the website below. Please DO NOT email your resume to us as we only accept applications through our website.

https://www.applicantpro.com/j/1941414-29423',
      job_type =>  'Full-Time',
	  job_start_date =>  $job_start_date,
	  job_end_date =>  '',
	  job_duration =>  'Indefinite',
	  job_city =>  'Kiln',
	  job_state =>  'North Carolina',
	  job_zip =>  '39556',
	  job_country =>  'United States',
	  min_education =>  'H.S. Diploma/Equivalent',
	  min_experience =>  '5-7 Years',
	  required_travel =>  '',
	  salary_type =>  'H',
	  min_salary =>  '$20.00',
	  max_salary =>  '$25.00',
	  salary_amount =>  '',
	  job_status =>  'A',
	  job_posting_date =>  '2021-09-01',
	  company_name =>  'Tyonek Native Corporation'
	);
	$single_insert = new MongoDB\Driver\BulkWrite();
	$single_insert->insert($record);
	$conn->executeBulkWrite("$dbname.$collection", $single_insert);
	$count++;
}

echo "<br>$count records inserted";

?>