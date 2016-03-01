<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
 <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
       

    <!-- chartist -->
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/chartist-js/chartist.min.js"></script>   

    <!-- chartjs -->
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/chartjs/chart-script.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/sparkline/sparkline-script.js"></script>
    
    <!--jvectormap-->
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/jvectormap/vectormap-script.js"></script>
    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins.js"></script>
	<script type="text/javascript">
	function callMyAjax () {
		jQuery(document).ready(function($) {
		    // We'll pass this variable to the PHP function example_ajax_request
		    var fruit = 'Banana';
		     
		    		$.ajax({
					   url: '<?php echo base_url() ?>dashboard/calender',
					   contentType: 'application/json; charset=utf-8',
    				   dataType: 'json',
					   error: function() {
					      $('#info').html('<p>An error has occurred</p>');
					   },
					   success: function(data) {
					   	$.each(data.info,function(index,item){
						   //alert(item.title+ " - "+item.start)
						   $('#info').append(item.title + "<br />")
						}); 
					   },
					   type: 'GET'
					});
		              
			});
		}
		$(document).ready(function($) {

			$("#idForm").submit(function(ev) {
		    		$.ajax({
					   url: '<?php echo base_url() ?>dashboard/savedate',
					   contentType: 'application/json; charset=utf-8',
    				   dataType: 'json',
    				   data: $("#idForm").serialize(),
					   error: function() {
					      $('#info').html('<p>An error has occurred</p>');
					   },
					   success: function(data) {
						   //alert(item.title+ " - "+item.start)
						   $('#info').append(data.title + "<br />")
					   },
					   type: 'get'
					});
					ev.preventDefault();
		            $("#name").val("");
		            $("#name").focus();
				});
		});
	</script>
</head>
<body>
	<input type="button" value="PotatosS" onclick="callMyAjax()" />
	<div id="info">
		
	</div>

	<form id="idForm" action="<?php echo base_url() ?>dashboard/savedate" method="post">
		<input name="asdf" id="name"></input>
		<input type="submit"></input>
	</form>
</body>
</html>