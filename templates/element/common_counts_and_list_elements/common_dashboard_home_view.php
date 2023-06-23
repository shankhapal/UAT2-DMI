

<?php if($_SESSION['current_level']=='level_1'){ //For MO user
		//for counts
		echo $this->element('common_counts_and_list_elements/common_counts_element');
		echo $this->Html->css('dashboard/scrutiny-tab-btn'); 		

	 }elseif($_SESSION['current_level']=='level_2'){ //For IO user	 
		//for counts
		echo $this->element('common_counts_and_list_elements/common_counts_element');
		echo $this->Html->css('dashboard/inspection-tab-btn');
	 
	 }elseif($_SESSION['current_level']=='level_3' && $_SESSION['level_3_for']=='RO'){ //For RO User	 
		//for counts
		echo $this->element('common_counts_and_list_elements/common_counts_element');				
		echo $this->Html->css('dashboard/regional-office-tab-btn');

	 }elseif($_SESSION['current_level']=='level_3' && $_SESSION['level_3_for']=='SO'){ //For SO User	 
		//for counts
		echo $this->element('common_counts_and_list_elements/common_counts_element');		
		echo $this->Html->css('dashboard/sub-office-tab-btn');

	 }elseif($_SESSION['current_level']=='level_4'){  //For HO User	 
		//for counts
		echo $this->element('common_counts_and_list_elements/common_counts_element');	
		echo $this->Html->css('dashboard/ho-office-tab-btn');
	 
	 }elseif($_SESSION['current_level']=='pao'){ // For PAO User	 
		//for counts
		echo $this->element('common_counts_and_list_elements/common_counts_element');	
		echo $this->Html->css('dashboard/pao-office-tab-btn');
	  
	 }elseif($_SESSION['current_level']=='pending_status'){ // For PAO User	 

	  
	 }
	 else{ 

		//dashboard graph code starts here ?>
			
		<div class="content-wrapper mt30">
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<section class="col-lg-7">
							
							<div class="card direct-chat direct-chat-primary">
							<?php echo $this->element('user_dashboard_common_elements/dashboard_recent_comments'); ?>
							</div>
							<div class="card direct-chat direct-chat-primary">
								
								<?php echo $this->element('user_dashboard_common_elements/top_home_count_boxes'); ?>
								<?php //echo $this->element('user_dashboard_common_elements/dashboard_calender'); ?>
							</div>
						</section>

						<section class="col-lg-5">
							<?php echo $this->element('user_dashboard_common_elements/dashboard_country_map'); ?>
							
							<?php //echo $this->element('user_dashboard_common_elements/dashboard_appl_status_graph'); ?>
							
						</section>
					</div>
				</div>
			</section>
		</div>	
		
		
		<?php echo $this->element('user_dashboard_common_elements/dashboard_chart'); ?>
		
	<?php } 
		if(!empty($main_count_array)){
			echo $this->element('common_counts_and_list_elements/dashboard_main_counts');
		}
	?>	
	<div class="clearfix"></div>
	

	<?php if (!empty($_SESSION['listFor']) && !empty($_SESSION['listSubTab'])) { ?>
		
		<input type="hidden" id="listForValue" value="<?php echo $_SESSION['listFor']; ?>" />
		<input type="hidden" id="listSubValue" value="<?php echo $_SESSION['listSubTab']; ?>" />
	
	<?php echo $this->Html->script('dashboard/toClickStatusWiseTab'); } ?>

	<!-- 
	* The script implemented by Shankhpal calculates the pending work that has remained 
	*	incomplete for more than 5 days. It utilizes an Ajax function to retrieve and display a list of the pending tasks.
	* @version 23rd June 2023
	 -->
<!-- Modal -->
<div class="modal fade" id="myPendingWorkModel" tabindex="-1" role="dialog" aria-labelledby="myPendingWorkModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myPendingWorkModelLabel">List of Pending Applications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Application Type</th>
              <th>Application Id</th>
              <th>process</th>
            </tr>
          </thead>
          <tbody id="myPendingWorkModelBody">
            <!-- Table rows will be dynamically inserted here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

	<?php echo $this->Html->script('dashboard/toDisplay5DaysPendingWork') ?>