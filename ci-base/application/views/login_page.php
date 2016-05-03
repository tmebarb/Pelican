<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Test</title>
	<!-- jQuery Library -->
	<script type="text/javascript" src="<?php echo base_url() ?>asserts/js/jquery-1.11.2.min.js"></script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
	<style>
		label {
			width: 100%;
		}
	</style>

	<script>
		$.validator.setDefaults({
			errorClass: 'invalid',
			validClass: "valid",
			errorPlacement: function (error, element) {
				$(element)
						.closest("form")
						.find("label[for='" + element.attr("id") + "']")
						.attr('data-error', error.text());
			}
		});
		$().ready(function () {
			$("#form").validate();
		});
	</script>
</head>
<body>
	<div style="margin: 0px auto; width: 30%; margin-top: 100px;" >
		<h1>Test Login</h1>
		<hr>
		<br>
		<?php echo validation_errors(); ?>
		<?php $attributes = array('id' => 'form');?>
		<?php echo form_open('login/verify', $attributes); ?>
		
		<?php echo $this->session->flashdata('error_msg') ?>
		<?php echo $this->session->flashdata('success_msg') ?>

		<label for="username">Username:</label>
		<input type="text" size="20" id="username" name="username" required/>
		<br/>
		<label for="password">Password:</label>
		<input type="password" size="20" id="passowrd" name="password" style="margin-top: 10px; margin-left: 4px" required />
		<br/>
		<input type="submit" value="Login" style="margin-left: 133px; margin-top: 10px;" />
		<a href="<?php echo base_url() ?>login/signup">

		<input type="button" value="Sign Up" style="" /></a>
		</form>
		
	</div>
</body>
</html>