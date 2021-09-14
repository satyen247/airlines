<?php 
include('dbConn.php');
$collection = "jobs";

$count = 0;
for($i=1; $i<=1002; $i++){
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
	  job_title =>  'Associate Administrator for Aviation Safety', 
      job_position_title =>  'Associate Administrator for Aviation Safety',
      job_function =>  '',
      job_desc =>  'Description

Summary
The Office of Aviation Safety (AVS) manages the certification of aircraft and the people who fly and maintain those aircraft, as well as others working in safety-related positions. AVS also oversees civil flight operations and develops safety regulations with the help of more than 7,400 employees across the globe.

Responsibilities
The Associate Administrator for Aviation Safety is the key advisor to the FAA Administrator on aviation safety. The incumbent sets, oversees, and enforces safety standards for all sectors of the aviation industry, impacting every facet of domestic and international civil aviation safety. The Associate Administrator executes the work of the Office of Aviation Safety through a geographically-dispersed workforce of approximately 7,400 employees and is responsible for an approximate $1.8B budget.

Principal Responsibilities:

Develops FAA safety strategic management initiatives, goals, and short and long term direction and implementation plans. Leads and communicates the status, safety strategies, critical issues, complex challenges and emerging developments, products, technologies, and innovations. Ensures that strategies are developed based on data-driven decision making that advances and improves the mission of FAA and AVS operations and stakeholder products and services.

Oversees the adequacy of substantive aspects of FAA rulemaking actions, directives/guidance, and responses relating to the safety of flight; certification and competence of airmen, air carriers, and air agencies; certification and airworthiness of aircraft; aircraft and airmen registry; physical fitness of airmen and other persons associated with safety in flight; airmen medical certification systems, aviation medical research, designated aviation medical examiner system, aeromedical education, and medical accident investigations; National Transportation Safety Board (NTSB) accident and incident investigation, NTSB recommendations, reporting programs for accidents and incidents, and NTSB hearings.

Influences the development and harmonization of international safety standards, procedures and practices. Partners with other civil aviation authorities and regional organizations to promote and improve FAA’s position in global aviation leadership. Advocates compliance with international safety standards.

Champions unmanned aircraft systems (UAS) activities to enable the safe and efficient use and integration of UAS globally. Advocates for the development and alignment of UAS regulations and policy harmonization across the agency, broader U.S. Government, global aviation community, Air Navigation Service Provider counterparts and others on a bilateral, regional and global basis.

Provides global leadership for Aerospace Medicine in the 21st century. Manages a broad range of medical programs and services (e.g., pilot medical certification, aerospace medical training, medical clearance of air traffic control specialists, aviation industry drug and alcohol testing).

Ensures FAA serves as the industry leader in safety investigation, analysis, and information sharing. Prescribes procedures and responsibilities for aircraft accident and incident notification, investigation and reporting. Oversees the FAA’s accident, incident and occurrence response programs. Directs investigations and activities related to the NTSB.

Maintains close and continuous contact with representatives of Congress, national military establishment, other Federal agencies, State and local governments, aviation industry stakeholders, and the general public, as well as various other domestic and foreign public and private aviation organizations. Handles media inquiries related to, and develops communications strategy for, aviation safety matters. Presents and defends DOT/FAA positions with respect to Aviation Safety programs and policies.

Travel Required
25% or less - The job may require up to 25% travel.



Requirements

Conditions of Employment
US Citizenship is required.
Selective Service Registration is required for males born after 12/31/1959.
Designated or Random Drug Testing required.
Qualifications
As a basic requirement for entry into the FAA Executive System, you must clearly articulate and describe within your five (5) page resume evidence of progressively responsible leadership experience that is indicative of senior executive level management capability; and that is directly related to the skills and abilities outlined under the Leadership and Technical Requirements listed below.

LEADERSHIP REQUIREMENT: Do you have experience in achieving operational results? If so, provide examples of ways you have exercised leadership to deliver significant results. Explain how you established goals, assessed outcomes, and improved products and services. Indicate how you identified and met customers requirements and addressed the needs of stakeholders. Include examples of complex problems you solved or difficult obstacles that you overcame as a leader. Your description should include (1) the size and complexity of organizations you have led, (2) the scope of programs you have managed, and (3) the impact of your results on customers and other stakeholders.
LEADERSHIP REQUIREMENT: Do you have experience leading people? If yes, describe the size of the organization and number and types of positions you have managed. Discuss ways that you have established and maintained positive work environments and prevented or eliminated discrimination or harassment. Describe ways that you have mentored and developed employees and built individual and team performance. Discuss how you have established and led teams to deliver products and services. Include in your description experience in leading others in a matrix environment across organizations.
LEADERSHIP REQUIREMENT: Do you have experience building relationships? If yes, describe (1) the types of individuals with whom you routinely collaborate; and (2) the purpose and outcomes of the communication. Discuss your experience in communicating and cooperating with others to achieve goals. Provide examples of how you have built relationships to achieve consensus and how you were able to obtain the cooperation of others with competing priorities and perspectives. Describe how you effectively communicate information within and outside of your organization.
LEADERSHIP REQUIREMENT: Do you have experience leading strategic change? If yes, describe examples of strategic changes that you led for your organization; describe the entities that the change affected (agency, industry, organizational components). Discuss obstacles you encountered and how you overcame them to the benefit of the agency. Include in your description ways that you applied long-range vision, developed strategies, and applied innovative ideas and techniques.
TECHNICAL REQUIREMENT: Demonstrated experience leading a large, complex, and technically oriented civil aviation organization.
TECHNICAL REQUIREMENT: Demonstrated ability to work collaboratively with senior leaders and stakeholders to identify, develop, and promote aviation safety technology programs and operations on a global scale.
Education
An education requirement has not been established for this occupational series.',
      job_type =>  'Full-Time',
	  job_start_date =>   $job_start_date,
	  job_end_date =>  '',
	  job_duration =>  'Indefinite',
	  job_city =>  'Washington',
	  job_state =>  'Columbia',
	  job_zip =>  '20003',
	  job_country =>  'United States',
	  min_education =>  'High School',
	  min_experience =>  '',
	  required_travel =>  '',
	  salary_type =>  'M',
	  min_salary =>  '',
	  max_salary =>  '',
	  salary_amount =>  '$3000',
	  job_status =>  'A',
	  job_posting_date =>  '2021-09-01',
	  company_name =>  'Federal Aviation Administration'
	);
	$single_insert = new MongoDB\Driver\BulkWrite();
	$single_insert->insert($record);
	$conn->executeBulkWrite("$dbname.$collection", $single_insert);
	$count++;
}

echo "<br>$count records inserted";

?>