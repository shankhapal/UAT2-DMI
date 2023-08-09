<?php //added new file by Laxmi Bhadade for movement of application on 20-07-2023 ?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6"><label class="badge info2 float-left"> Application Movement's</label></div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Application Movement's</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
    <?php echo $this->Form->create(null,array('id'=>'movement_application','class'=>'form-group')); ?>
    <section class="content form-middle">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-Lightblue">
						 <div class="card-header"><h3 class="card-title-new"> Application Movement's</h3></div>
                            <div class="form-horizontal">
								<div class="card-body">
								 <div class="row">
                                 <div class="col-sm-1">
                                 </div>
                                 <div class="col-sm-4">
                                 <div class="form-group">
                                    <label>Application type <span class="cRed">*</span></label>
                                    <?php echo $this->Form->control('appl_type', array('type'=>'select', 'id'=>'appl_type', 'label'=>false, 'options'=>$applTypesList, 'empty'=>'--Select--','class'=>'form-control', 'aria-hidden'=>true)); ?>
                                    <span id="error_appl_type" class="error invalid-feedback"></span>
								 </div>
                                 </div>
                                 <div class="col-sm-4">
                                 <div class="form-group">
                                    <label>Application Id <span class="cRed">*</span></label>
                                    <?php echo $this->Form->control('appl_id', array('type'=>'select', 'id'=>'appl_id', 'label'=>false, 'empty'=>'--Select--','class'=>'form-control selectpicker ', 'aria-hidden'=>true)); ?>
                                    <span id="error_appl_id" class="error invalid-feedback"></span>
                                </div>
                                 </div>
                                  <div class="col-sm-2">
                                     <div class="form-group">
                                     <label><span></span><br></label>
                                      <?php echo $this->Form->submit('Get Movement', array('type'=>'submit', 'id'=>'get_movement', 'label'=>'Get Movement', 'class'=>'form-control btn btn-success')); ?>
                                     </div>
                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                 </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>	
</section>		
<section class="content form-middle listdata">
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="card card-Lightblue">
		 <div class="card-header"><h3 class="card-title-new"> Application Movement History</h3></div>
         <div class="form-horizontal">
             <div class="card-body">
              <div class="row1">
                <table id="movement_history" class="table m-0 table-bordered table-striped table-hover">
                <thead class="tablehead">
                    <tr>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                            <?php $i=0;
                            if(!empty($from)){
                            foreach ($from as $key => $fm) { ?>
                            <tr>
                             <td>
                                <?php echo $fm; ?>
                             </td> 
                             <td>
                                <?php echo $to[$i]; ?>
                             </td> 
                             <td>
                                <?php echo $sentdate[$i]; ?>
                             </td> 
                             <td>
                                <?php echo $action[$i]; ?>
                             </td> 
                             </tr>
                            <?php $i++; } } ?>
                       
                    </tbody>
                </table>
              </div>
              </div>
            </div>
        </div>
        </div>
    </div>
 </div>
</section>


</div>
<?php //echo $this->Html->css('select2.min'); ?>

<?php echo $this->Html->script('movements/movements_appl'); ?>
<?php //echo $this->Html->script('movements/select2.min'); ?>