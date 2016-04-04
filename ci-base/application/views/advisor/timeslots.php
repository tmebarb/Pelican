<script type="text/javascript">
	$(document).ready(function(){
		$('#mondayStart').timepicker({  });
		$('#tueStart').timepicker({  });
        $('#tueEnd').timepicker({  });
		$('#WedStart').timepicker({  });
		$('#WedEnd').timepicker({  });
		$('#mondayEnd').timepicker({
		});
		$('#ThrStart').timepicker({  });
        $('#ThrEnd').timepicker({  });
		$('#FirStart').timepicker({  });
        $('#FirEnd').timepicker({  });
		$('#mondayEnd').focusout(function() {
			if (!$('#mondayStart').val()) {
				alert("Enter Start time first")
				$('#mondayEnd').val("")
			} else if ($('#mondayStart').val() >= $('#mondayEnd').val()) {
				alert("Start time should be before the end time")
				$('#mondayEnd').val("")
			}
		});
        $('#tueEnd').focusout(function() {
        	if (!$('#tueStart').val()) {
        		alert("Enter Start time first")
        		$('#tueEnd').val("")
        	} else if ($('#tueStart').val() >= $('#tueEnd').val()) {
        		alert("Start time should be before the end time")
        		$('#tueEnd').val("")
        	}
        });
        $('#WedEnd').focusout(function() {
        	if (!$('#WedStart').val()) {
        		alert("Enter Start time first")
        		$('#WedEnd').val("")
        	} else if ($('#WedStart').val() >= $('#WedEnd').val()) {
        		alert("Start time should be before the end time")
        		$('#WedEnd').val("")
        	}
        });
        $('#ThrEnd').focusout(function() {
        	if (!$('#ThrStart').val()) {
        		alert("Enter Start time first")
        		$('#ThrEnd').val("")
        	} else if ($('#ThrStart').val() >= $('#ThrEnd').val()) {
        		alert("Start time should be before the end time")
        		$('#ThrEnd').val("")
        	}
        });
        $('#FirEnd').focusout(function() {
        	if (!$('#FirStart').val()) {
        		alert("Enter Start time first")
        		$('#FirEnd').val("")
        	} else if ($('#FirStart').val() >= $('#FirEnd').val()) {
        		alert("Start time should be before the end time")
        		$('#FirEnd').val("")
        	}
        });
	})
</script>

<div class="container">
	<div class="section">
		<div class="row">
			<div class="input-field col s6">
				<p class="right label" style="text-align: right;color:#9e9e9e;"><h4>Select Days Available</h4></p>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="section">
		<div class="row">
			<div class="input-field col s3">
				<p class="right label" style="text-align: right;color:#9e9e9e;">Monday</p>
			</div>
			<div class="input-field col s3">
				<input id="mondayStart" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="mondayStart">Start Time</label>
			</div>
			<div class="input-field col s3">
				<input id="mondayEnd" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="mondayEnd">End Time</label>
			</div>
			<div class="input-field col s3">
				<button class="btn waves-effect waves-light red darken-4" type="submit" id="mondayadd" name="action">Add</button>
			</div>
		</div>
		<div id="mondayfields">
		</div>

	</div>
</div>

<script>
	$(document).ready(function() { //maximum input boxes allowed
    var wrapper         = $("#mondayfields"); //Fields wrapper
    var add_button      = $("#mondayadd"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault(); //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="mondayStart'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="mondayStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="mondayEnd'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="mondayEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
            $('#mondayStart'+x+'').timepicker({  });
            $('#mondayEnd'+x+'').timepicker({  });
            $('#mondayEnd'+x+'').focusout(function() {
            	if (!$('#mondayStart'+x+'').val()) {
            		alert("Enter Start time first")
            		$('#mondayEnd'+x+'').val("")
            	} else if ($('#mondayStart'+x+'').val() >= $('#mondayEnd'+x+'').val()) {
            		alert("Start time should before than end time")
            		$('#mondayEnd'+x+'').val("")
            	}
            });
        });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    	e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>


<div class="container">
	<div class="section">
		<div class="row">
			<div class="input-field col s3">
				<p class="right label" style="text-align: right;color:#9e9e9e;">Tuesday</p>
			</div>
			<div class="input-field col s3">
				<input id="tueStart" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="tueStart">Start Time</label>
			</div>
			<div class="input-field col s3">
				<input id="tueEnd" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="tueEnd">End Time</label>
			</div>
			<div class="input-field col s3">
				<button class="btn waves-effect waves-light red darken-4" type="submit" name="action" id="tueadd">Add</button>
			</div>
		</div>
		<div id="tuefields">
		</div>

	</div>
</div>

<script>
	$(document).ready(function() { //maximum input boxes allowed
    var wrapper         = $("#tuefields"); //Fields wrapper
    var add_button      = $("#tueadd"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault(); //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="tueStart'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="tueStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="tueEnd'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="tueEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
            $('#tueStart'+x+'').timepicker({  });
            $('#tueEnd'+x+'').timepicker({  });
            $('#tueEnd'+x+'').focusout(function() {
            	if (!$('#tueStart'+x+'').val()) {
            		alert("Enter Start time first")
            		$('#tueEnd'+x+'').val("")
            	} else if ($('#tueStart'+x+'').val() >= $('#tueEnd'+x+'').val()) {
            		alert("Start time should before than end time")
            		$('#tueEnd'+x+'').val("")
            	}
            });
        });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    	e.preventDefault(); $(this).parent('div').remove();
    	x--;
    })
});
</script>





<div class="container">
	<div class="section">
		<div class="row">
			<div class="input-field col s3">
				<p class="right label" style="text-align: right;color:#9e9e9e;">Wednesday</p>
			</div>
			<div class="input-field col s3">
				<input id="WedStart" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="WedStart">Start Time</label>
			</div>
			<div class="input-field col s3">
				<input id="WedEnd" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="WedEnd">End Time</label>
			</div>
			<div class="input-field col s3">
				<button class="btn waves-effect waves-light red darken-4" type="submit" name="action" id="webadd">Add</button>
			</div>
		</div>
		<div id="wedfields">
		</div>

	</div>
</div>

<script>
	$(document).ready(function() { //maximum input boxes allowed
    var wrapper         = $("#wedfields"); //Fields wrapper
    var add_button      = $("#webadd"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault(); //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="WedStart'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="WedStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="WedEnd'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="WedEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
            $('#WedStart'+x+'').timepicker({  });
            $('#WedEnd'+x+'').timepicker({  });
            $('#WedEnd'+x+'').focusout(function() {
            	if (!$('#WedStart'+x+'').val()) {
            		alert("Enter Start time first")
            		$('#WedEnd'+x+'').val("")
            	} else if ($('#WedStart'+x+'').val() >= $('#WedEnd'+x+'').val()) {
            		alert("Start time should before than end time")
            		$('#WedEnd'+x+'').val("")
            	}
            });
        });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    	e.preventDefault(); $(this).parent('div').remove();
    	x--;
    })
});
</script>




<div class="container">
	<div class="section">
		<div class="row">
			<div class="input-field col s3">
				<p class="right label" style="text-align: right;color:#9e9e9e;">Thursday</p>
			</div>
			<div class="input-field col s3">
				<input id="ThrStart" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="ThrStart">Start Time</label>
			</div>
			<div class="input-field col s3">
				<input id="ThrEnd" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="ThrEnd">End Time</label>
			</div>
			<div class="input-field col s3">
				<button class="btn waves-effect waves-light red darken-4" type="submit" name="action" id="thradd">Add</button>
			</div>
		</div>
		<div id="thrfields">
		</div>

	</div>
</div>

<script>
	$(document).ready(function() { //maximum input boxes allowed
    var wrapper         = $("#thrfields"); //Fields wrapper
    var add_button      = $("#thradd"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault(); //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="ThrStart'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="ThrStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="ThrEnd'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="ThrEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
            $('#ThrStart'+x+'').timepicker({  });
            $('#ThrEnd'+x+'').timepicker({  });
            $('#ThrEnd'+x+'').focusout(function() {
            	if (!$('#ThrStart'+x+'').val()) {
            		alert("Enter Start time first")
            		$('#ThrEnd'+x+'').val("")
            	} else if ($('#ThrStart'+x+'').val() >= $('#ThrEnd'+x+'').val()) {
            		alert("Start time should before than end time")
            		$('#ThrEnd'+x+'').val("")
            	}
            });
        });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    	e.preventDefault(); $(this).parent('div').remove();
    	x--;
    })
});
</script>
<div class="container">
	<div class="section">
		<div class="row">
			<div class="input-field col s3">
				<p class="right label" style="text-align: right;color:#9e9e9e;">Friday</p>
			</div>
			<div class="input-field col s3">
				<input id="FirStart" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="FirStart">Start Time</label>
			</div>
			<div class="input-field col s3">
				<input id="FirEnd" type="text" class="time input-field ui-timepicker-input" autocomplete="off">
				<label for="FirEnd">End Time</label>
			</div>
			<div class="input-field col s3">
				<button class="btn waves-effect waves-light red darken-4" type="submit" name="action" add="friAdd">Add</button>
			</div>
		</div>
		<div id="frifields">
		</div>

	</div>
</div>

<script>
	$(document).ready(function() { //maximum input boxes allowed
    var wrapper         = $("#frifields"); //Fields wrapper
    var add_button      = $("#friAdd"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault(); //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="FirStart'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="FirStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="FirEnd'+x+'" type="text" class="time input-field ui-timepicker-input" autocomplete="off"><label for="FirEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
            $('#FirStart'+x+'').timepicker({  });
            $('#FirEnd'+x+'').timepicker({  });
            $('#FirEnd'+x+'').focusout(function() {
            	if (!$('#FirStart'+x+'').val()) {
            		alert("Enter Start time first")
            		$('#FirEnd'+x+'').val("")
            	} else if ($('#FirStart'+x+'').val() >= $('#FirEnd'+x+'').val()) {
            		alert("Start time should before than end time")
            		$('#FirEnd'+x+'').val("")
            	}
            });
        });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    	e.preventDefault(); $(this).parent('div').remove();
    	x--;
    })
});
</script>