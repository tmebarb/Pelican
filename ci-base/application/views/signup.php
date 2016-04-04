<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
</head>
<body>
	<div style="margin: 0px auto; width: 30%; margin-top: 100px;" >
		<h1>Test SignUp</h1>
		<hr>
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('login/savesignup'); ?>

		<?php echo $this->session->flashdata('error_msg') ?>
		<?php echo $this->session->flashdata('success_msg') ?>
		<label for="username">
			Full Name: 
		</label>
		<?php 
		$data = array(
			'name'        => 'fullname',
			'id'          => 'fullname',
			'style'		=> 'margin-left: 4px'
			);
		echo form_input($data);
		?>
		<br>
		<label for="fullname">
			Username: 
		</label>
		<?php
		$data = array(
			'name'        => 'username',
			'id'          => 'username',
			'style'		=> 'margin-top: 10px; margin-left: 6px'
			);
		echo form_input($data);
		?>
		<br>
		<label for="password">
			Password: 
		</label>
		<?php
		$data = array(
			'name'        => 'password',
			'type'		=> 'password',
			'id'          => 'password',
			'style'		=> 'margin-top: 10px; margin-left: 10px'
			);
		echo form_input($data);


		echo '<br/>';
		$data = array(
			'type' 		=> 'submit',
			'value'		=>	'Sign Up',
			'style'		=> 'margin-left: 190px; margin-top: 10px;'
			);
		echo form_input($data);


		?>
	</div>
</form>
</body>
</html>