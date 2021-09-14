<?php 
include('dbConn.php');
$collection = "jobs";

$count = 0;
for($i=1; $i<=1003; $i++){
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
	  job_title =>  'Senior Engineer/AOD', 
      job_position_title =>  'Senior Engineer/AOD',
      job_function =>  'Engineering/Program Mgt.',
      job_desc =>  'Description

Job Title: Senior Engineer/AOD
Job Requisition Number: RC375517
Category: Aviation
Job Family: FXE-US: Flight Operations
Time Type: Full Time
Work Shift: FCC_4x10_3rd
Locations:
Memphis, Tennessee

Designs, specify and/or develop technical specifications for configuration, repair, operation and maintenance of airplanes, engines and components, and their associated systems and equipment to assure or enhance safety, reliability and economic utilization while keeping with federal aviation regulations and manufacturers published data.

Minimum Education
Bachelors degree in engineering (see special notes).

Minimum Experience
Five (5) years related aircraft engineering experience. Airframe and/or powerplant license(s) preferred.

Knowledge, Skills, and Abilities
Strong analytical, communication and technical writing skills.

This position is for third shift. Must be able to work variable shifts. Engineering experience in the design, analysis and repair of aircraft structure preferred.

FedEx Express is absolutely, positively your best choice for a career.

Are you looking for a company that provides a safe, diverse and rewarding environment where employees have opportunities to grow and succeed?

Are you looking for a company that provides benefits, competitive pay and opportunities to develop your skills into a rewarding career?

This is who we are and what we do. Come join the team that is recognized consistently among best employers and is the world’s largest express transportation company, providing services to more than 220 countries and territories. Come help us deliver the FedEx Purple Promise by making every customer experience outstanding.

We’re excited that your career search has brought you to FedEx. Visit the link below to see more about what it means to join the team at FedEx:

https://www.fedex.com/en-us/about/working-at-fedex.html


FedEx Express is an EEO/AA employer and prohibits discrimination and harassment against any applicant or employee on the basis of race, color, religion, national origin, citizenship, genetic information, age (except for bona fide occupational qualifications), sex, pregnancy (including childbirth or a related medical condition), disability, sexual orientation, gender identity, gender expression, marital status, military leave or service, status as a disabled veteran or other covered veteran status, participation in EEO protected activity, any other status protected by federal, state, or local law, or association with a person on the basis of one or more of the foregoing.

FedEx Express is an AA/EEO/Veterans/Disabled Employer.

Applicants who require reasonable accommodations to complete a profile or to submit responses to qualifying questions may contact Reginald Stewart at 1-866-730-1021.

Please click below to learn more about your rights as an Applicant under Federal Employment Laws:

Equal Employment Opportunity is the Law
EEO is the Law Supplement
Pay Transparency Policy
Family and Medical Leave Act (FMLA)
Employee Polygraph Protection Act

E-Verify Program Participant: FedEx Express participates in the Department of Homeland Security U.S. Citizenship and Immigration Services E-Verify program (For U.S. applicants and employees only).

Please click below to learn more about the E-Verify program:

E-Verify Notice (bilingual)
Right to Work Notice (English) / (Spanish)

If you are applying in Philadelphia, PA, you can click below to learn about Philadelphias fair chance hiring law.

http://www.phila.gov/HumanRelations/DiscriminationAndEnforcement/Pages/BantheBoxLawAtAGlance.aspx


Pursuant to the San Francisco Fair Chance Ordinance FedEx Express will consider for employment qualified applicants with arrest and conviction records.


NEW YORK CORRECTION LAW

ARTICLE 23-A

LICENSURE AND EMPLOYMENT OF PERSONS PREVIOUSLY CONVICTED OF ONE OR MORE CRIMINAL OFFENSES

Section 750. Definitions.

751. Applicability.

752. Unfair discrimination against persons previously convicted of one or more criminal offenses prohibited.

753. Factors to be considered concerning a previous criminal conviction; presumption.

754. Written statement upon denial of license or employment.

755. Enforcement.

§750. Definitions. For the purposes of this article, the following terms shall have the following meanings:

(1) "Public agency" means the state or any local subdivision thereof, or any state or local department, agency, board or commission.

(2) "Private employer" means any person, company, corporation, labor organization or association which employs ten or more persons.

(3) "Direct relationship" means that the nature of criminal conduct for which the person was convicted has a direct bearing on his fitness or ability to perform one or more of the duties or responsibilities necessarily related to the license, opportunity, or job in question.

(4) "License" means any certificate, license, permit or grant of permission required by the laws of this state, its political subdivisions or instrumentalities as a condition for the lawful practice of any occupation, employment, trade, vocation, business, or profession. Provided, however, that "license" shall not, for the purposes of this article, include any license or permit to own, possess, carry, or fire any explosive, pistol, handgun, rifle, shotgun, or other firearm.

(5) "Employment" means any occupation, vocation or employment, or any form of vocational or educational training. Provided, however, that "employment" shall not, for the purposes of this article, include membership in any law enforcement agency.

§751. Applicability. The provisions of this article shall apply to any application by any person for a license or employment at any public or private employer, who has previously been convicted of one or more criminal offenses in this state or in any other jurisdiction, and to any license or employment held by any person whose conviction of one or more criminal offenses in this state or in any other jurisdiction preceded such employment or granting of a license, except where a mandatory forfeiture, disability or bar to employment is imposed by law, and has not been removed by an executive pardon, certificate of relief from disabilities or certificate of good conduct. Nothing in this article shall be construed to affect any right an employer may have with respect to an intentional misrepresentation in connection with an application for employment made by a prospective employee or previously made by a current employee.

§752. Unfair discrimination against persons previously convicted of one or more criminal offenses prohibited. No application for any license or employment, and no employment or license held by an individual, to which the provisions of this article are applicable, shall be denied or acted upon adversely by reason of the individuals having been previously convicted of one or more criminal offenses, or by reason of a finding of lack of "good moral character" when such finding is based upon the fact that the individual has previously been convicted of one or more criminal offenses, unless:

(1) There is a direct relationship between one or more of the previous criminal offenses and the specific license or employment sought or held by the individual; or

(2) the issuance or continuation of the license or the granting or continuation of the employment would involve an unreasonable risk to property or to the safety or welfare of specific individuals or the general public.

§753. Factors to be considered concerning a previous criminal conviction; presumption. 1. In making a determination pursuant to section seven hundred fifty-two of this chapter, the public agency or private employer shall consider the following factors:

(a) The public policy of this state, as expressed in this act, to encourage the licensure and employment of persons previously convicted of one or more criminal offenses.

(b) The specific duties and responsibilities necessarily related to the license or employment sought or held by the person.

(c) The bearing, if any, the criminal offense or offenses for which the person was previously convicted will have on his fitness or ability to perform one or more such duties or responsibilities.

(d) The time which has elapsed since the occurrence of the criminal offense or offenses.

(e) The age of the person at the time of occurrence of the criminal offense or offenses.

(f) The seriousness of the offense or offenses.

(g) Any information produced by the person, or produced on his behalf, in regard to his rehabilitation and good conduct.

(h) The legitimate interest of the public agency or private employer in protecting property, and the safety and welfare of specific individuals or the general public.

2. In making a determination pursuant to section seven hundred fifty-two of this chapter, the public agency or private employer shall also give consideration to a certificate of relief from disabilities or a certificate of good conduct issued to the applicant, which certificate shall create a presumption of rehabilitation in regard to the offense or offenses specified therein.

§754. Written statement upon denial of license or employment. At the request of any person previously convicted of one or more criminal offenses who has been denied a license or employment, a public agency or private employer shall provide, within thirty days of a request, a written statement setting forth the reasons for such denial.

§755. Enforcement.

1. In relation to actions by public agencies, the provisions of this article shall be enforceable by a proceeding brought pursuant to article seventy-eight of the civil practice law and rules.

2. In relation to actions by private employers, the provisions of this article shall be enforceable by the division of human rights pursuant to the powers and procedures set forth in article fifteen of the executive law, and, concurrently, by the New York city commission on human rights.



Job Information

Job ID: 58357181
Location:
Memphis, Tennessee, United States
Position Title: Senior Engineer/AOD
Company Name: FedEx Express
Job Function: Engineering/Program Mgt.',
      job_type =>  'Full-Time',
	  job_start_date =>  $job_start_date,
	  job_end_date =>  '',
	  job_duration =>  'Indefinite',
	  job_city =>  'Memphis',
	  job_state =>  'Tennessee',
	  job_zip =>  '38002',
	  job_country =>  'United States',
	  min_education =>  'Bachelor degree in engineering (see special notes).',
	  min_experience =>  'Five (5) years related aircraft engineering experience. Airframe or powerplant license(s) preferred.',
	  required_travel =>  'Yes',
	  salary_type =>  'H',
	  min_salary =>  '$25.00',
	  max_salary =>  '$35.00',
	  salary_amount =>  '',
	  job_status =>  'A',
	  job_posting_date =>  '2021-09-01',
	  company_name =>  'FedEx Express'
	);
	$single_insert = new MongoDB\Driver\BulkWrite();
	$single_insert->insert($record);
	$conn->executeBulkWrite("$dbname.$collection", $single_insert);
	$count++;
}

echo "<br>$count records inserted";

?>