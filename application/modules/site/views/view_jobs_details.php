<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
?>

	<div id="results-page">
		<main class="job-search-main">

			<!-- starting of the search bar -->
			<section class="region_top-bar pos-f bg-white z-400 w-100">
				<section class="clearfix page-head" aria-label="Page Header">
					<div class="job-search-header">
						<h1>Search for Jobs</h1>
						<div id="js-search-form" class="clearfix" role="search">
							<form id="jt_search" class="clearfix" action="<?php echo base_url('jobs/search') ?>" method="get">
								<fieldset class="search-position-title" role="group" id="data-step-keywords">
									<legend>Job Search Keywords</legend>
									<div class="input-group">
										<input aria-label="Job Keyword Search" type="search" title="keywords" value="<?php echo $search_keywords; ?>"
											id="keywords" name="keywords" tab-index="10" maxlength="500"
											placeholder="Company Name or Job Title" class="keyword-search">
									</div>
									<input type="hidden" name="pos_flt" id="pos_flt" value="0">
								</fieldset>
								<div class="location-col">
									<div class="location_autocomplete" id="data-step-autocomplete">
										<input type="search" aria-label="location search input" id="location"
											tab-index="2" maxlength="500" placeholder="Location" name="location"
											autocomplete="off" class="ui-autocomplete-input" value="<?php echo $search_location; ?>">
										<div class="radius_select fade_radius">
										</div>
									</div>
								</div>
								<fieldset class="submit-search-group" role="group">
									<legend>Submit Search</legend>
									<button aria-label="Submit Job Search"
										class="primary btn-search btn-primary btn-svg" tab-index="30" type="submit">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path class="st0"
												d="M23.4 20.7l-5.6-5.6c1-1.5 1.5-3.2 1.5-5.1 0-5.2-4.2-9.4-9.4-9.4S.5 4.8.5 10s4.2 9.4 9.4 9.4c1.9 0 3.6-.5 5-1.5l5.6 5.6 2.9-2.8zM3.2 10.1a6.7 6.7 0 1 1 13.4 0 6.7 6.7 0 0 1-13.4 0z">
											</path>
										</svg>
									</button>
								</fieldset>
								<div class="filter-button-group" id="data-step-filter-button">
									<a href="javascript:void(0)" id="filterBtn" aria-label="Filter Your Search"
										tab-index="3" role="button" class="btn-filter btn-svg">Filter
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18">
											<defs></defs>
											<title>Icon-Filter</title>
											<g data-name="Layer 2">
												<g data-name="icon-filter">
													<path class="5e95ba6d-ebc5-4b47-aabd-a493dc65e7b5"
														d="M17 6a3 3 0 1 0-2.8-4H0V4H14.2A3 3 0 0 0 17 6Zm0-4a1 1 0 1 1-1 1A1 1 0 0 1 17 2Z">
													</path>
													<path class="5e95ba6d-ebc5-4b47-aabd-a493dc65e7b5"
														d="M7 6A3 3 0 0 0 4.2 8H0v2H4.2a3 3 0 0 0 5.6 0H20V8H9.8A3 3 0 0 0 7 6Zm0 4A1 1 0 1 1 8 9 1 1 0 0 1 7 10Z">
													</path>
													<path class="5e95ba6d-ebc5-4b47-aabd-a493dc65e7b5"
														d="M17 12a3 3 0 0 0-2.8 2H0v2H14.2A3 3 0 1 0 17 12Zm0 4a1 1 0 1 1 1-1A1 1 0 0 1 17 16Z">
													</path>
												</g>
											</g>
										</svg>
									</a>
								</div>
								<div id="data-step-launch-tutorial" class="step-tutorial" data-toggle="tooltip"
									data-placement="left" title="Guided Tour">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
										<g fill="none">
											<path
												d="M11 11.9L11 13 9 13 9 10 10 10C11.1 10 12 9.1 12 8 12 6.9 11.1 6 10 6 8.9 6 8 6.9 8 8L6 8C6 5.8 7.8 4 10 4 12.2 4 14 5.8 14 8 14 9.9 12.7 11.4 11 11.9M10 16.3C9.3 16.3 8.8 15.7 8.8 15 8.8 14.3 9.3 13.8 10 13.8 10.7 13.8 11.3 14.3 11.3 15 11.3 15.7 10.7 16.3 10 16.3M10 0C4.5 0 0 4.5 0 10 0 15.5 4.5 20 10 20 15.5 20 20 15.5 20 10 20 4.5 15.5 0 10 0"
												fill="#757575" />
											<rect x="-2" y="-2" width="24" height="24" />
										</g>
									</svg>
								</div>
								<div id="hiddenFieldsContainer">
								</div>
							</form>
						</div>
					</div>
				</section>
				<section class="af-container" style="display:none" id="data-step-applied-filters">
					<div class="applied-filters-row">
						<div class="filter-title">
							Applied Filters <small class="applied-filters-count"></small>
						</div>
						<div class="filter-panel">
						</div>
						<div class="filter-panel-nav">
							<a class="filters-show-all" href="javascript:void(0)" aria-label="View all filter chips"
								role="button">Show All</a>
							<a>Clear All</a>
						</div>
					</div>
				</section>
			</section>
			<!-- end of the search bar -->

			<!-- start of the left bar -->
			<section class="job-results-cf" style="margin-top: 50px;">
				<div class="job-results-body" id="data-step-pane-view">
					
					<!-- starting of the left section -->

					<section class="region_main-pane"
						style="height: calc(100vh - 190px);margin-top:50px;padding-bottom: 50px;">
						<section class="job-results-container">
							<div class="leaderboard-adspace top site" role="complementary" data-type="ad"
								data-location="top">
							</div>

							<!-- staring of the job details -->
							<div id="job-results-details" class="job-results-details ">
								<div class="job-details-inner">
									<div class="job-main-data">
										<div class="btn-mobile-back" role="button">
											<svg xmlns="http://www.w3.org/2000/svg" width="10" height="14"
												viewBox="0 0 10 14">
												<g fill="none">
													<g transform="translate(-5 -2)">
														<rect width="18" height="18"></rect>
														<polygon class="back-arrow"
															transform="translate(9.529046 9)scale(1 -1)translate(-9.529046 -9)"
															points="14.1 13.6 8.4 9 14.1 4.4 12.3 3 5 9 12.3 15"
															fill="979797"></polygon>
													</g>
												</g>
											</svg>
										</div>
										<?php
											if(count($details_job)>0)
											{
										?>
										<div class="job-details">
											<div class="job-detail-row">
												<a href="##">
													<h1 class="job-title"><?php echo $details_job['job_position_title']; ?></h1>
												</a>
											</div>
											<div class="job-label-row">
											</div>
											<div class="company-location-row">
												<div class="job-company-row">
												<?php echo $details_job['company_name']; ?>
												</div>
												<div class="company-location">
												<?php echo $details_job['job_city']; ?>, <?php echo $details_job['job_state']; ?>, <?php echo $details_job['job_zip']; ?>, <?php echo $details_job['job_country']; ?>
												</div>
											</div>
											<div class="job-subtext-row">
												<div aria-label="Job Posted Date" class="job-posted-date">
												<?php echo $details_job['post_time_ago']; ?>
												</div>
											</div>
										</div>
										<div class="job-cta">
											<div class="job-cta-items">
												<div class="job-cta-actions">
													<div class="icon-off anim-icon bookmark"
														aria-label="This Job is not Saved to your Profile">
														<a href="#" role="button"
															aria-label="Press Enter to Save this Job"
															class="save58391253"></a>
													</div>
													<div aria-label="Share this Job" class="ico">
														<a href="#" role="button"
															aria-label="Press Enter to Share this Job">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
																<defs></defs>
																<title>Icon-Share</title>
																<g data-name="Layer 2">
																	<g data-name="share">
																		<path
																			class="18d889ed-e699-4d53-94a9-a82d4eb217bf"
																			d="M16 12a4 4 0 0 0-3 1.4L7.9 10.8a3.9 3.9 0 0 0 0-1.7L13 6.6a4 4 0 1 0-0.9-1.8L7 7.4a4 4 0 1 0 0 5.2l5.1 2.6A4 4 0 1 0 16 12ZM16 2a2 2 0 1 1-2 2A2 2 0 0 1 16 2ZM4 12a2 2 0 1 1 2-2A2 2 0 0 1 4 12Zm12 6a2 2 0 1 1 2-2A2 2 0 0 1 16 18Z">
																		</path>
																	</g>
																</g>
															</svg>
														</a>
													</div>
													<div aria-label="Print this Job" class="ico">
														<a href="#" role="button"
															aria-label="Press Enter to Print this Job" id="ga_print">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 24">
																<g data-name="icon-print">
																	<g data-name="icon-paths">
																		<polygon
																			class="307ddfb8-5c2c-47b2-8983-a0f54a201ddb"
																			points="17 6 15 6 15 2 5 2 5 6 3 6 3 0 17 0 17 6" />
																		<path
																			class="307ddfb8-5c2c-47b2-8983-a0f54a201ddb"
																			d="M17 8H15v2H5V8H3a3 3 0 0 0-3 3v9H3v4H17V20h3V11A3 3 0 0 0 17 8ZM15 22H5V18H15Zm0-7a1 1 0 1 1 1-1A1 1 0 0 1 15 15Z" />
																	</g>
																</g>
															</svg>
														</a>
													</div>
												</div>
												<div class="job-cta-buttons">
													<a id="applyBtn" tabindex="0"
														href="#"
														class="primary ga_ext" role="button" target="_blank">Apply
														Now</a>
												</div>
											</div>
										</div>
									</div>
									<div class="job-main-desc">
										<div class="job-desc">
											<p><strong>Description</strong></p>
											<p><?php echo html_entity_decode(nl2br($details_job['job_desc'])); ?>
											</p>
										</div>
										<div class="job-stats">
											<p><strong>Job Information</strong></p>
											<ul class="list-type-data">
												<input type="hidden" id="currJobId" class="currJobId" value="<?php echo $details_job['job_id']; ?>">
												<li><b>Job ID:</b> <?php echo $details_job['job_id']; ?> </li>
												<li><b>Location:</b>
													<br> <?php echo $details_job['job_city']; ?>, <?php echo $details_job['job_state']; ?>, <?php echo $details_job['job_zip']; ?>, <?php echo $details_job['job_country']; ?>
												</li>
												<li>
													<b>Category: </b>
													<?php echo $details_job['category_name']; ?>
												</li>
												<li>
													<b>Position Title: </b>
													<?php echo $details_job['job_position_title']; ?>
												</li>
												<li>
													<b>Company Name: </b>
													<?php echo $details_job['company_name']; ?>
												</li>
												<li>
													<b>Job Function: </b>
													<?php echo $details_job['job_function']; ?>
												</li>
												<li>
													<b>Job Type: </b>
													<?php echo $details_job['job_type']; ?>
												</li>
												<li>
													<b>Job Duration: </b>
													<?php echo $details_job['job_duration']; ?>
												</li>
												<li>
													<b>Min Education: </b>
													<?php echo $details_job['min_education']; ?>
												</li>
												<li>
													<b>Min Experience: </b>
													<?php echo $details_job['min_experience']; ?>
												</li>
												<li>
													<b>Required Travel: </b>
													<?php echo $details_job['required_travel']; ?>
												</li>
												<li>
													<b>Salary: </b>
													<?php 
													  if($details_job['salary_type'] == 'H')
													  {
														  echo $details_job['min_salary'].' - '.$details_job['max_salary'].' (Hourly Wages)';

													  }elseif($details_job['salary_type'] == 'M')
													  {
														  echo $details_job['salary_amount'].' (Monthly Wages)';

													  }elseif($details_job['salary_type'] == 'H')
													  {
														  echo $details_job['salary_amount'].' (Yearly Wages)';
													  }
													?>
												</li>
											</ul>
										</div>
									</div>
									<?php
										}else{
											echo 'No job found!';
										}
									?>
								</div>
							</div>

							<!-- ending of the job the details -->
							<?php
								if(count($details_job)>0)
								{
							?>			
							<!-- start of the palm strings div -->
							<div class="job-hiring-company" id="data-step-hiring-company">
								<div class="job-hiring-inner">
									<div class="job-hiring-main">
										<div class="company-main-data">
											<div class="job-details-logo " role="presentation">
												<span role="presentation"><img
														src="https://cdn4.vectorstock.com/i/thumb-large/19/58/no-image-vector-30371958.jpg"
														alt="City of Palm Springs International Airport Logo"
														role="presentation"></span>
											</div>
											<div class="job-details"
												aria-labelledby="$Job-Title-at-City of Palm Springs International Airport">
												<div class="job-company-row"
													aria-labelledby="$Job-Title-at-City of Palm Springs International Airport"
													aria-label="Hiring Company"><a
														href="#"><?php echo $details_job['company_name']; ?></a></div>
												<div class="company-subtext-row"
													aria-labelledby="$Job-Title-at-City of Palm Springs International Airport">
													<div aria-label="Company Type"></div>
													<div aria-label="Company Location" class="job-posted-date">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="job-hiring-about">
										<div class="job-hiring-desc">
											<p>Please refer to the company's website or job descriptions to learn more
												about them.</p>
											<p><a href="#">View Full Profile</a></p>
										</div>
										<aside class="company-hiring-jobs">
											<strong>More Jobs from <?php echo $jobs['company_name']; ?></strong>
											<div id="Airport-Industrial-Technician-at-Diageo" class="job-details"
												aria-labelledby="Airport-Industrial-Technician-at-Diageo" role="button">
												<input type="hidden" name="job_id" value="57919479">
												<div class="job-detail-row">
													<div class="job-title" aria-label="Job Title">Airport Industrial
														Technician</div>
												</div>
												<div class="job-subtext-row"
													aria-labelledby="Airport-Industrial-Technician-at-Diageo">
													<div class="job-location" aria-label="Job Location">Cathedral City,
														California, United States</div>
												</div>
												<div class="job-subtext-row"
													aria-labelledby="Airport-Industrial-Technician-at-Diageo">
													<div aria-label="Job Posted Date" class="job-posted-date">
														30+ days ago
													</div>
												</div>
											</div>
										</aside>
									</div>
								</div>
							</div>
							<!-- end of the pakm strings div -->
							<?php } ?>		

						</section>
					</section>
					<!-- END : JOB RESULTS CONTAINER -->
				</div>
			</section>
		</main>
	</div>
