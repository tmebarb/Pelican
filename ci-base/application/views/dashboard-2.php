<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
</head>
<style>
	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		padding: 8px;
		text-align: left;
		border-bottom: 1px solid #ddd;
	}

	tr:hover{background-color:#f5f5f5}
</style>
<body>
	<h2>Hi <?php echo $this->session->userdata('user_fullname') ?>,</h2>
	<p>Welcome to test login and u are a <b>'<?php echo $this->session->userdata('usertype') ?>'</b><br></p>
	<a href="<?php echo base_url(); ?>login/logout">Click here to logout</a>

	<hr>
	<h3>Current Users</h3>
	<div style="width: 50%; margin: 0px auto;">
		
		<table>
			<tr>
				<th>Full Name</th>
				<th>Username</th>
				<th>Type</th>
			</tr>
			<?php foreach ($allusers as $user): ?>
				<tr>					
					<td><?php echo $user->user_fullname ?></td>					
					<td><?php echo $user->user_name ?></td>					
					<td><?php echo $user->user_type ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>