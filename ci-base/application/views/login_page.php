<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Test</title>
</head>
<body>
	<div style="margin: 0px auto; width: 30%; margin-top: 100px;" >
		<h1>Test Login</h1>
		<hr>
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('login/verify'); ?>
		
		<?php echo $this->session->flashdata('error_msg') ?>
		<?php echo $this->session->flashdata('success_msg') ?>

		<label for="username">Username:</label>
		<input type="text" size="20" id="username" name="username"/>
		<br/>
		<label for="password">Password:</label>
		<input type="password" size="20" id="passowrd" name="password" style="margin-top: 10px; margin-left: 4px" />
		<br/>
		<input type="submit" value="Login" style="margin-left: 133px; margin-top: 10px;" />
		<a href="<?php echo base_url() ?>login/signup">

		<input type="button" value="Sign Up" style="" /></a>
		</form>
		
	</div>
</body>
</html>