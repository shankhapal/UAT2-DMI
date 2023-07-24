<?php
$_SESSION['randSalt'] = Rand();
$salt_server = $_SESSION['randSalt'];
?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 align-center mx-auto">
				<?php echo $this->Form->create(null, array('id' => 'common_user_redirect_login_form')); ?>
					<div class="card img-thumbnail box2shadow">
						<div class="card-body register-card-body">
							<h4 class="login-box-msg">Common User Login Redirect</h4>
							<div class="input-group mb-3">
								<label for="field3" class="col-md-3"><span> Password <span class="cRed">*</span></span></label>
								<?php echo $this->Form->control('password', array(
									'label' => '',
									'id' => 'passwordValidation',
									'placeholder' => 'Please enter your Password',
									'class' => 'form-control',
									'error' => ['attributes' => ['wrap' => 'div', 'class' => 'error invalid-feedback']]
								)); ?>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
								<?php echo $this->Form->control('salt_value', array(
									'label' => '',
									'id' => 'hiddenSaltvalue',
									'type' => 'hidden',
									'value' => $salt_server
								)); ?>
								<div class="col-md-9 offset-md-3">
									<span id="error_password" class="error invalid-feedback"></span>
								</div>
							</div>

						<!-- added by shankhpal shende for captcha code on 15/07/2023 -->
						<div class="input-group mb-3">
							<label for="field3" class="col-md-3">
								<span> Verify <span class="required-star cRed">*</span></span>
							</label>
							<div class="col-md-9">
								<div class="input-group">
									<span id="captcha_img" class="col-4 mr-2 rounded p-0 d-flex"><?php echo $this->Html->image(array('controller'=>'users','action'=>'create_captcha'), array('class'=>'rounded')); ?></span>
									<div class="col-2 btn m-0 p-0"><img class="img-responsive img-thumbnail border-0 shadow-none" id="new_captcha" src="<?php echo $this->request->getAttribute('webroot');?>img/refresh.png"/>
								</div>
								</div>
							</div>
						</div>

						<!-- added captcha by shankhpal shende on 14/07/2023 -->
						<div class="input-group mb-3">
							<label for="field3" class="col-md-3">
								<span> Enter Captcha <span class="required-star cRed">*</span></span>
							</label>
							<div class="col-md-9">
								<div class="input-group">
									<?php echo $this->Form->control('captcha', array(
										'label' => false,
										'id' => 'captchacode',
										'type' => 'text',
										'placeholder' => 'Please enter captcha code',
										'class' => 'form-control col-12')); ?>
									<div class="input-group-append">
										<div class="input-group-text">
											<span class="fas fa-lock"></span>
										</div>
									</div>
								</div>
								<span id="error_captcha" class="error invalid-feedback"></span>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<?php echo $this->Form->control('Submit', array(
							'type' => 'submit',
							'name' => 'submit',
							'label' => false,
							'class' => 'btn btn-success submit_btn')); ?>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</section>

<input type="hidden" value="<?php echo $return_error_msg; ?>" id="return_error_msg" />
<?php echo $this->Html->script('Users/common_user_redirect_login'); ?>
