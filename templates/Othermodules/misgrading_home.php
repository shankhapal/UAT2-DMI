<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6"><label class="badge badge-info">Actions on Misgrading Module</label></div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action'=>'home'));?></a></li>
						<li class="breadcrumb-item active">List of Firms</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-12">
		<div class="card card-success card-tabs">
			<div class="card-header p-0 pt-1">
				<ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" 
						   id="custom-tabs-two-first-tab" 
						   data-toggle="pill" 
						   href="#custom-tabs-two-first" 
						   role="tab" 
						   aria-controls="custom-tabs-two-first" 
						   aria-selected="true" 					
						   title="This Is to List the all Firms List to Take the action on misgrading or send the show cause notice">
						   List of Firm
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" 
						   id="custom-tabs-two-three-tab" 
						   data-toggle="pill" 
						   href="#custom-tabs-two-three" 
						   role="tab" 
						   aria-controls="custom-tabs-two-three" 
						   aria-selected="false"
						   title="This Is to List the all Firms List of sent notices">
						   Actions Taken on Firms
						</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content" id="custom-tabs-two-tabContent">
					<div class="tab-pane fade show active" id="custom-tabs-two-first" role="tabpanel" aria-labelledby="custom-tabs-two-first-tab">
						<?php echo $this->element('misgrade_elements/list_of_firms'); ?>
					</div>
					<div class="tab-pane fade" id="custom-tabs-two-three" role="tabpanel" aria-labelledby="custom-tabs-two-three-tab">
						<?php echo $this->element('misgrade_elements/list_of_action_taken'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->script('othermodules/misgrading_home'); ?>