<?php ?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6"><label class="badge badge-info">User Manuals</label></div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<?php echo $this->element('other_elements/common_breadcrumbs'); ?>
							<li class="breadcrumb-item active">User Manuals</li>
						</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-12"><h4>All Mannuals</h4></div>
						<div class="col-12">
							<div class="card card-primary card-tabs">
								<div class="card-header p-0 pt-1">
									<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Applicant Manuals</a>
										</li>
									
										<?php if($userType == 'User'){ ?>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Users Manuals</a>
											</li>
										<?php } ?>
									</ul>
								</div>
								<div class="card-body">
									<div class="tab-content" id="custom-tabs-one-tabContent">
										<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
										<table class="table m-0 table-bordered table-striped">
												<thead class="tablehead">
													<tr>
														<th>Title</th>
														<th>Manual Link</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Advance Payment Module</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Advance Payment Module.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Approval of Designated Person for Issue of CAG</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Approval of Designated Person for Issue of CAG (Applicant).pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Backlog Data Entry by Applicant</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Backlog Data Entry (Applicant).pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>CA BEVO Forms</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/CA BEVO.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>CA Non BEVO Forms</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/CA NON BEVO.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Chemist Registration</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Chemist Registration.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Grant & Issue of E-Code</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Grant & Issue of E-Code (Applicant).pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Grant of Approval to 15 Digit Code</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Grant of Approval to 15 Digit Code (Applicant).pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Laboratory Approval</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Laboratory Approval.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Laboratory Approval (Domestic)</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Laboratory Domestic (Domestic).pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Primary User Registration</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Primary User Registration.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Printing Press</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Printing Press.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Renewal Process</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Renewal Process (Applicant).pdf">View Pdf</a></td>
													</tr>	
													<tr>
														<td>Self Allotment of Replica Serial Number</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/applicant/Self Allotment of Replica Serial Number.pdf">View Pdf</a></td>
													</tr>	
												</tbody>
											</table>
										</div>
										<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
										<table class="table m-0 table-bordered table-striped">
												<thead class="tablehead">
													<tr>
														<th>Title</th>
														<th>Manual Link</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Backlog Data Entry by DMI</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Backlog Data Entry (Users).pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>CMS Management</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/CMS Management.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Form Scrutiny and Grant User</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Form Scrutiny and Grant User.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Form Scrutiny and Grant User</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Form Scrutiny and Grant User.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Grant & Issue of 15-Digit Code</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Grant & Issue of 15-Digit Code (Users).pdf">View Pdf</a></td>
													</tr>
														<tr>
															<td>Grant & Issue of E-Code</td>
															<td><a target="_blank" href="/testdocs/DMI/manuals/users/Grant & Issue of E-Code (Users).pdf">View Pdf</a></td>
														</tr>
													<tr>
														<td>Masters Management</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Masters Management.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Re-esign module with master</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Re-esign module with master.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Renewal Process</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Renewal Process.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Reports</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Reports.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Users Management</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Users Management.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Transfer Application</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Transfer Application.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Solution of Dates Issues for Backlog Data Entry</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Solution for Dates Issues.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>To Update Applicant profile details</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Update Primary & Secondary Applicant Details.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>To Unlock Users Account</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Unlock Users Account.pdf">View Pdf</a></td>
													</tr>
													<tr>
														<td>Work Transfer Module</td>
														<td><a target="_blank" href="/testdocs/DMI/manuals/users/Work Transfer Module.pdf">View Pdf</a></td>
													</tr>
												</tbody>
											</table>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

