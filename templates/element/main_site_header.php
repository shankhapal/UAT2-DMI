<?php echo $this->Html->css('uat_text'); ?>
<!-- Create homepage title dynamic and change logo image url path // Done by pravin 28/04/2018 -->
<div class="wrapper logo-title row">
	<div class="col-md-3 col-xs-3 header-img1">
		<img class="img-responsive" src="/testdocs/logos/emblem.png">
		<label class="uat_text">UAT Version</label>
	</div>

	<div class="col-md-6 col-xs-6 header-text">
		<!-- Updated on 27-08-2018, up downs-->
		<h2><?php echo $home_page_content[2]['title']; ?><br><?php echo $home_page_content[1]['title']; ?></h2>
		<h1><?php echo $home_page_content[0]['title']; ?></h1>
	</div>

	<div class="col-md-3 col-xs-3 header-img2">
		<img class="img-responsive" src="/testdocs/logos/agmarklogo.png">
	</div>
	<div class="clear"></div>
</div>


<?php

if (filter_var(base64_decode((string) $this->getRequest()->getSession()->read('username')), FILTER_VALIDATE_EMAIL)) {//for email encoding the (String) type cast is applied to fix the PHP 8.1 Depracations - Akash [06-10-22]

	if(isset($_SESSION['userloggedin']) && $_SESSION['userloggedin']=='yes'){

		echo $this->element('user_header_login_strip');
	}	

} else {

	if(isset($_SESSION['userloggedin']) && $_SESSION['userloggedin']=='yes'){

		echo $this->element('applicant_header_login_strip');

	}	  

}


 ?>
