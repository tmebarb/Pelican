<form action="<?php echo base_url() ?>advisor/updatetimeslots" method="post">

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
				alert("Start time should before than end time")
				$('#mondayEnd').val("")
			}
		});
        $('#tueEnd').focusout(function() {
        	if (!$('#tueStart').val()) {
        		alert("Enter Start time first")
        		$('#tueEnd').val("")
        	} else if ($('#tueStart').val() >= $('#tueEnd').val()) {
        		alert("Start time should before than end time")
        		$('#tueEnd').val("")
        	}
        });
        $('#WedEnd').focusout(function() {
        	if (!$('#WedStart').val()) {
        		alert("Enter Start time first")
        		$('#WedEnd').val("")
        	} else if ($('#WedStart').val() >= $('#WedEnd').val()) {
        		alert("Start time should before than end time")
        		$('#WedEnd').val("")
        	}
        });
        $('#ThrEnd').focusout(function() {
        	if (!$('#ThrStart').val()) {
        		alert("Enter Start time first")
        		$('#ThrEnd').val("")
        	} else if ($('#ThrStart').val() >= $('#ThrEnd').val()) {
        		alert("Start time should before than end time")
        		$('#ThrEnd').val("")
        	}
        });
        $('#FirEnd').focusout(function() {
        	if (!$('#FirStart').val()) {
        		alert("Enter Start time first")
        		$('#FirEnd').val("")
        	} else if ($('#FirStart').val() >= $('#FirEnd').val()) {
        		alert("Start time should before than end time")
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

<html>
<body>

<form action="action_page.php">

<div class="container">
    <div class="section">
        <?php if ($sessiondetails!=null): ?>
            <input type="hidden" name="session_id" value="<?php echo $sessiondetails->session_id ?>">
        <?php endif ?>
        <div class="row">
        <div class="input-field col s2">
        <p class="right label" style="text-align: right;color:#9e9e9e;">Start Date:</p>
        </div>
        <div class="input-field col s2">
        <input type="date" name="startdate" autocomplete="off" value='<?php echo ($sessiondetails) ?  $sessiondetails->startdate: "" ; ?>'>
        </div>
        <div class="input-field col s3">
        <p class="right label" style="text-align: right;color:#9e9e9e;">End Date:</p>
        </div>
        <div class="input-field col s3">
        <input type="date" name="enddate" autocomplete="off" value='<?php echo ($sessiondetails) ?  $sessiondetails->enddate: "" ; ?>'>
        </div>
        </div>
    <div id="datefields">
</div>
</form>

</body>
</html>


<div class="container">
	<div class="section">
		<div class="row">
			<div class="input-field col s3">
				<p class="right label" style="text-align: right;color:#9e9e9e;">Monday</p>
			</div>
                <?php if (empty($mondayStartSlots)) { ?> 
    			<div class="input-field col s3">
                    <input id="mondayStart" type="text" class="time input-field ui-timepicker-input" name="mondaystart[]" autocomplete="off">
                    <label for="mondayStart">Start Time</label>
    			</div>
    			<div class="input-field col s3">
    				<input id="mondayEnd" type="text" class="time input-field ui-timepicker-input" name="mondayend[]" autocomplete="off">
    				<label for="mondayEnd">End Time</label>
    			</div>
                <?php } else { 
                    foreach ($mondayStartSlots as $index => $startTime) {
                           ?>
                <div class="input-field col s3">
                    <input id="mondayStart" type="text" class="time input-field ui-timepicker-input" name="mondaystart[]" autocomplete="off" value="<?php echo $startTime ?>">
                    <label for="mondayStart">Start Time</label>
                </div>
                <div class="input-field col s3">
                    <input id="mondayEnd" type="text" class="time input-field ui-timepicker-input" name="mondayend[]" autocomplete="off" value="<?php echo $mondayEndSlots[$index] ?>">
                    <label for="mondayEnd">End Time</label>
                </div>


                           <?php
                        }
                    }
                    ?>
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
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="mondayStart'+x+'" type="text" class="time input-field ui-timepicker-input" name="mondaystart[]" autocomplete="off"><label for="mondayStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="mondayEnd'+x+'" type="text" class="time input-field ui-timepicker-input" name="mondayend[]" autocomplete="off"><label for="mondayEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
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
				<input id="tueStart" type="text" class="time input-field ui-timepicker-input" name="tuestart[]" autocomplete="off">
				<label for="tueStart">Start Time</label>
			</div>
			<div class="input-field col s3">
				<input id="tueEnd" type="text" class="time input-field ui-timepicker-input" name="tueend[]" autocomplete="off">
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
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="tueStart'+x+'" type="text" class="time input-field ui-timepicker-input" name="tuestart[]" autocomplete="off"><label for="tueStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="tueEnd'+x+'" type="text" class="time input-field ui-timepicker-input" name="tueend[]" autocomplete="off"><label for="tueEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
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
				<input id="WedStart" type="text" class="time input-field ui-timepicker-input" name="wedstart[]" autocomplete="off">
				<label for="WedStart">Start Time</label>
			</div>
			<div class="input-field col s3">
				<input id="WedEnd" type="text" class="time input-field ui-timepicker-input" name="wedend[]" autocomplete="off">
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
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="WedStart'+x+'" type="text" class="time input-field ui-timepicker-input" name="wedstart[]" autocomplete="off"><label for="WedStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="WedEnd'+x+'" type="text" class="time input-field ui-timepicker-input" name="wedend[]" autocomplete="off"><label for="WedEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
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
                <input id="ThrStart" type="text" class="time input-field ui-timepicker-input" name="thrstart[]" autocomplete="off">
                <label for="ThrStart">Start Time</label>
            </div>
            <div class="input-field col s3">
                <input id="ThrEnd" type="text" class="time input-field ui-timepicker-input" name="thrend[]" autocomplete="off">
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
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="ThrStart'+x+'" type="text" class="time input-field ui-timepicker-input" name="thrstart[]" autocomplete="off"><label for="ThrStart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="ThrEnd'+x+'" type="text" class="time input-field ui-timepicker-input" name="thrend[]" autocomplete="off"><label for="ThrEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
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
                <input id="FriStart" type="text" class="time input-field ui-timepicker-input" name="fristart[]" autocomplete="off">
                <label for="FriStart">Start Time</label>
            </div>
            <div class="input-field col s3">
                <input id="FriEnd" type="text" class="time input-field ui-timepicker-input" name="friend[]" autocomplete="off">
                <label for="FriEnd">End Time</label>
            </div>
            <div class="input-field col s3">
                <button class="btn waves-effect waves-light red darken-4" type="submit" name="action" id="friadd">Add</button>
            </div>
        </div>
        <div id="frifields">
        </div>

    </div>
</div>

<script>
    $(document).ready(function() { //maximum input boxes allowed
    var wrapper         = $("#frifields"); //Fields wrapper
    var add_button      = $("#friadd"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault(); //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col s3"><p style="display:hidden"></p></div><div class="input-field col s3"><input id="FriStart'+x+'" type="text" class="time input-field ui-timepicker-input" name="fristart[]" autocomplete="off"><label for="ThrStFriStartart'+x+'">Start Time</label></div><div class="input-field col s3"><input id="FriEnd'+x+'" type="text" class="time input-field ui-timepicker-input" name="friend[]" autocomplete="off"><label for="FriEnd'+x+'">End Time</label></div><button class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button></div>'); //add input box
            $('#FriStart'+x+'').timepicker({  });
            $('#FriEnd'+x+'').timepicker({  });
            $('#FriEnd'+x+'').focusout(function() {
                if (!$('#FriStart'+x+'').val()) {
                    alert("Enter Start time first")
                    $('#FriEnd'+x+'').val("")
                } else if ($('#FriStart'+x+'').val() >= $('#FriEnd'+x+'').val()) {
                    alert("Start time should before than end time")
                    $('#FriEnd'+x+'').val("")
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
				
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" style="z-index: 0">Save 
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
			</div>
		</div>
	</div>
</form>