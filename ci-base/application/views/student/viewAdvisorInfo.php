<head>

	<!--Creates a table that is grey-striped on the even rows-->
	<style>
		table 
		{
		  border-collapse: separate;
		  border-spacing: 0;
		}
		th, td 
		{
		  font-size: 1em;
		  padding: 10px 15px;
		}
		tbody tr:nth-child(odd) {
		  background: #f0f0f2;
		}
		td 
		{
		  border-bottom: 1px solid #cecfd5;
		  border-right: 1px solid #cecfd5;
		}
		td:first-child 
		{
		  border-left: 1px solid #cecfd5;
		}
	</style>
</head>

 <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Advisor's Profile</h5>
                <ol class="breadcrumb">
                    <li><a href="dashboard">Dashboard</a></li>
                    
                    <li class="active">Profile Page</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->



<div id = 'main'>
	<!--Provides view for a user that is an advisor-->
		<table>
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
		</table>	
	  </div>



