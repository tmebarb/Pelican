<div id='AtoA_form'
<h1>Match advisees to an advisor</h1>
<br>

<?php echo form_open('dashboard/advisorAdviseeMatch'); ?>
<label for="advisorID" class="center-align">Enter Advisor ID</label>
<br>
<?php echo form_input('advisorID', ''); ?>
<br>
<label for="adviseeID" class="center-align">Enter Advisee ID</label>
<br>
<?php echo form_input('adviseeID', ''); ?>
<?php echo form_submit('submit' , 'submit'); ?>

</div>