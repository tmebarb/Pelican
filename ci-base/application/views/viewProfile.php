<head>
	<style>
		th
		{
			column-span: 2;
			font-size: 2.5em;
		}
	</style>
</head>



<div id = 'main'>

	<?php if($this->session->userdata('user_type') =="advisor") ?>
	
		<table>dfasdfa
		<tbody>
			<?php foreach ($user_info as $row): ?>
			<tr>
				<th>Name:  </th>
				<td><?php echo $row->user_fullname ?></td>
			</tr>
			<tr>
				<th>CWID: </th>
				<td><?php echo $row->CWID ?></td>
			</tr>
			<tr>
				<th>User Name: </th>
				<td><?php echo $row->user_name ?></td>
			</tr>
			<tr>
				<th>Email: </th>
				<td><?php echo $row->user_email ?></td>
			</tr>
			<tr>
				<th>Phone: </th>
				<td><?php echo $row->user_phone ?></td>
			</tr>
			<tr>
				<th>Major: </th>
				<td><?php echo $row->major ?></td>
			</tr>
			<tr>
				<th>Office Location: </th>
				<td><?php echo $row->office_loc ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
		</table>
	

	<?php if($this->session->userdata('user_type') =="advisee") ?>
	
		<table> dalfjdl;sajf
		<tbody>
		<?php foreach ($user_info as $row): ?>
			<tr>
				<th>Name: </th>
				<td><?php echo $row->user_fullname ?></td>
			</tr>
			<tr>
				<th>CWID: </th>
				<td><?php echo $row->CWID ?></td>
			</tr>
			<tr>
				<th>User Name: </th>
				<td><?php echo $row->user_name ?></td>
			</tr>
			<tr>
				<th>Email: </th>
				<td><?php echo $row->user_email ?></td>
			</tr>
			<tr>
				<th>Phone: </th>
				<td><?php echo $row->user_phone ?></td>
			</tr>
			<tr>
				<th>Major: </th>
				<td><?php echo $row->major ?></td>
			</tr>
			<tr>
				<th>Classification: </th>
				<td><?php echo $row->classification ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
		</table>
	
</div>




