<?php 
include('dbConn.php');
$collection = "jobs";

$count = 0;
for($i=1; $i<=1004; $i++){
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
	  job_title =>  'Supply Chain Management Manager - Airport Operations', 
      job_position_title =>  'Supply Chain Management Manager - Airport Operations',
      job_function =>  'Engineering/Program Mgt.',
      job_desc =>  'Description

The SCM Manager – Airport Operations is a subject matter expert in Airport Operations supply chain processes to achieve company and division goals, including project assessment, strategy development, supplier evaluation, and negotiation of terms to meet quality, cost and performance targets. As an individual contributor, the SCM Manager – Airport Operations works with internal customers and suppliers to ensure company and divisional objectives are met, and partners with business stakeholders to execute Airport Operations supply chain strategy, including leading sourcing, contracting and supplier performance management efforts.

Sourcing

Manages the sourcing process, including strategy development, supplier evaluation and selection, and negotiation of terms to meet quality, cost and performance objectives.
Serves as the main point of contact for administering RFPs and executing contracts for the division.
Utilizes data and analysis to develop and manage cost models to accurately forecast costs and project the impact of sourcing outcomes.
Maintains and deepens the relationship between Supply Chain and operations leadership to ensure results meet company and division targets.
Administers the 5-phase sourcing process across all projects
Supplier Oversight

Assists in the development and oversight of key supplier relationships.
Leads or participates in supplier business review meetings.
Manages operational issues/escalation processes and ensures timely resolution of operational issues that stem from supplier performance
Drives proper and effective communications between internal stakeholders and suppliers.
Contract Administration

Coordinates with Legal and other stakeholders to develop and manage the contracting process, including drafting key commercial terms and conditions.
Standardizes contracting agreements across common products and services to improve consistency and improve the speed of contract throughput.
Documents and communicates proper business practices to ensure awareness of and adherence to policies and internal controls.
Drafts commercial contract language, leads negotiations on key terms and conditions, and liaises with legal department and other stakeholders to finalize agreements.
Administers, navigates, and leverages the contract lifecycle management system to improve internal transparency of contracts, including tracking of milestones and key conditions.
Spend Control

Participates in budgeting and cost control processes to ensure management has good insight into cost drivers and levers for accounts with large-dollar supplier spend components.
Performs moderate to complex analysis to develop and review cost metrics and benchmarks in order to develop targets and identify opportunities to reduce spend.
General

Participates in strategic and operational planning on behalf of Supply Chain.
Champions ‘best practices’ to help business stakeholders review existing processes to meet changing needs.
Develops and uses metrics to design, develop and implement oversight programs to monitor supplier performance.
Identifies process improvements to reduce cost and increase performance and efficiency.


Requirements

Job-Specific Experience, Education & Skills

Required

Where permitted by applicable law, candidates must have received or be willing to receive the COVID-19 vaccine by date of hire to be considered, if not currently employed by Alaska Airlines or Horizon Air. The Company will provide reasonable accommodations to qualified employees with disabilities or for a sincerely held religious belief.
7 years of negotiations and contract management experience, including use of master contracts and statements of work to manage risk and drive efficiency.
Bachelor’s degree, with a focus in business administration, supply chain, finance, or a related discipline, or an additional two years of relevant training/experience in lieu of this degree.
Demonstrated use of strategic sourcing processes, including strategy development, RFP writing, and contract administration.
Experience negotiating high-value and high-impact contracts required, specifically services-related agreements with Service Level Agreement components.
Superior ability to present complex problems and situations to senior/executive leadership and to drive resolutions with limited guidance.
Detailed oriented and highly organized, with the ability to execute on multiple projects, priorities, and deadlines and work independently with limited guidance in a fast-paced environment where flexibility is key.
Ability to draft contract language, negotiate, and influence others to gain desired outcomes within various types of agreements.
Ability to build influence across departments around company strategies.
Proven track record of sustaining strong customer/supplier relationships.
Experience with change management and challenging the status quo.
Proficiency with Microsoft Office applications (e.g., Word, Excel, PowerPoint, SharePoint, Teams, and Outlook) and collaboration and analytic tools (Smartsheet, Tableau, etc.).
High school diploma or equivalent is required.
Minimum age of 18.
Must be authorized to work in the U.S
Preferred

Experience as a power user of a contract lifecycle management system within a large organization
Experience with financial analysis of complex topics and proposals.
Experience in key aspects of supplier management and oversight.
Familiarity with airport operations and/or airline experience.
Job-Specific Leadership Expectations

Embody our values to own safety, do the right thing, be kind-hearted, deliver performance, and be remarkable.

Total Rewards

Competitive total rewards package
Medical, dental and vision benefits
401k match program
Monthly incentive pay plan
Annual incentive pay plan
Generous paid time off
Travel privileges on Alaska Airlines & Horizon Air
Employment Type Full-Time
FLSA Status Exempt
Regular/Temporary Regular
Requisition ID 2021-6221
Equal Employment Opportunity Alaska Airlines and Horizon Air are proud to be an Equal Employment Opportunity and Affirmative Action employer that is committed to diversity, equity, and inclusion. All qualified applicants will receive consideration for employment without regard to race, color, religion, sex (including pregnancy, sexual orientation, gender identity, and gender expression), national origin, age, protected veteran or disabled status, genetic information (including family medical history) or other legally protected characteristics. Qualified applicants with criminal histories will also be considered for employment, consistent with applicable federal, state, and local law. People of color, women, LGBTQIA+, immigrants, veterans and persons with disabilities are encouraged to apply. We are an E-Verify ® employer, where required by law.',
      job_type =>  'Full-Time',
	  job_start_date =>  $job_start_date,
	  job_end_date =>  '',
	  job_duration =>  'Indefinite',
	  job_city =>  'SeaTac',
	  job_state =>  'Washington',
	  job_zip =>  '98168',
	  job_country =>  'United States',
	  min_education =>  'BA/BS/Undergraduate',
	  min_experience =>  '5-7 Years',
	  required_travel =>  'Travel privileges on Alaska Airlines & Horizon Air',
	  salary_type =>  'H',
	  min_salary =>  '$30.00',
	  max_salary =>  '$45.00',
	  salary_amount =>  '',
	  job_status =>  'A',
	  job_posting_date =>  '2021-09-01',
	  company_name =>  'Alaska Airlines'
	);
	$single_insert = new MongoDB\Driver\BulkWrite();
	$single_insert->insert($record);
	$conn->executeBulkWrite("$dbname.$collection", $single_insert);
	$count++;
}

echo "<br>$count records inserted";

?>