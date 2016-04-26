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
                  $('#FriStart').timepicker({  });
                  $('#FriEnd').timepicker({  });
                  $('#mondayEnd').focusout(function() {
                    if (!$('#mondayStart').val()) {
                        alert("Enter Start time first")
                        $('#mondayEnd').val("")
                    } else if ($('#mondayStart').val() >= $('#mondayEnd').val()) {
                        alert("Start time should before than end time")
                        $('#mondayEnd').val("")
                    }
                });
                  $('#mondayStart').focusout(function() {
                    if ($('#mondayEnd').val()) {
                        if ($('#mondayStart').val() >= $('#mondayEnd').val()) {
                            alert("Start time should before than end time")
                            $('#mondayStart').val("")
                        }
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
                  $('#tueStart').focusout(function() {
                    if ($('#tueEnd').val()) {
                        if ($('#tueStart').val() >= $('#tueEnd').val()) {
                            alert("Start time should before than end time")
                            $('#tueStart').val("")
                        }
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
                  $('#WedStart').focusout(function() {
                    if ($('#WedEnd').val()) {
                        if ($('#WedStart').val() >= $('#WedEnd').val()) {
                            alert("Start time should before than end time")
                            $('#WedStart').val("")
                        }
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
                  $('#ThrStart').focusout(function() {
                    if ($('#ThrEnd').val()) {
                        if ($('#ThrStart').val() >= $('#ThrEnd').val()) {
                            alert("Start time should before than end time")
                            $('#ThrStart').val("")
                        }
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
                  $('#FriStart').focusout(function() {
                    if ($('#FriEnd').val()) {
                        if ($('#FriStart').val() >= $('#FriEnd').val()) {
                            alert("Start time should before than end time")
                            $('#FriStart').val("")
                        }
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

<!--NEW START DATE/END DATE INPUT-->
<html>
<body>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $("#datepicker2").datepicker({
        dateFormat: "yy-mm-dd" 
    });
    $("#datepicker1").datepicker({
        dateFormat: "yy-mm-dd", 
        minDate:  0,
        onSelect: function(date){            
        var date1 = $('#datepicker1').datepicker('getDate');           
        var date = new Date( Date.parse( date1 ) );
        date.setDate( date.getDate());        
        var newDate = date.toDateString(); 
        newDate = new Date( Date.parse( newDate ) );                      
        $('#datepicker2').datepicker("option","minDate",newDate);            
    }
    });
  });
  </script>
</head>
<body>

<!--
<?php echo form_open('Advisor/timeslotAddConfirm'); ?>
-->
<div class="container">
    <div class="section">
        <div class="row">
        <?php if ($sessiondetails!=null): ?>
            <input type="hidden" name="session_id" value="<?php echo $sessiondetails->session_id ?>">
        <?php endif ?>
        <div class="input-field col s3">
            <p class="right label" style="text-align: right;color:#9e9e9e;">Start Date:</p>
        </div>
        <div class="input-field col s3">
        <input type="text" id="datepicker1" name="startdate" value='<?php echo ($sessiondetails) ?  $sessiondetails->startDate: "" ; ?>'>
        <!--<?php echo form_input('start_date', ''); ?>-->
        </div>
        <div class="input-field col s2">
            <p class="right label" style="text-align: right;color:#9e9e9e;">End Date:</p>
        </div>
        <div class="input-field col s3">
        <input type="text" id="datepicker2" name="enddate" value='<?php echo ($sessiondetails) ?  $sessiondetails->endDate: "" ; ?>'>
        <!--<?php echo form_input('end_date', ''); ?>-->
        </div>
        </div>
        <div id="datefields">
    </div>

            <!--This is the old section for the date fields
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
                    </div> -->


            <!-- Not related to start date and end date fields
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
                         <input type="hidden" name="mondayUpdateID[]" value="<?php echo $mondayUpdateID[$index] ?>">
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
            </div> -->
            <!-- <div id="mondayfields">
            </div> -->
   
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
                <input id="mondayEnd" type="text" class="time input-field ui-timepicker-input tueEnd" name="mondayend[]" autocomplete="off">
                <label for="mondayEnd">End Time</label>
            </div>
            <div class="input-field col s3">
                <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="monadd">Add</button>
            </div>
            <?php } else { 
                $first = true;
                foreach ($mondayStartSlots as $index => $startTime) {
                 ?>
                 <?php if (!$first): ?>
                    <div class="row" id="<?php echo 'bc'.$index ?>">
                        <div class="col s3"><p style="display:hidden"></p></div>
                    <?php endif ?>

                    <input type="hidden" name="mondayUpdateID[]" value="<?php echo $mondayUpdateID[$index] ?>">

                    <div class="input-field col s3">
                        <input id="<?php echo 'MonStartWith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="mondaystart[]" autocomplete="off" value="<?php echo $startTime ?>">
                        <label for="<?php echo 'MonStartWith'.$index ?>">Start Time</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="<?php echo 'MonEndWith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="mondayend[]" autocomplete="off" value="<?php echo $mondayEndSlots[$index] ?>">
                        <label for="<?php echo 'MonEndWith'.$index ?>">End Time</label>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $("<?php echo '#MonStartWith'.$index ?>").timepicker({  });
                            $("<?php echo '#MonEndWith'.$index ?>").timepicker({  });
                            $("<?php echo '#MonEndWith'.$index ?>").focusout(function() {
                            if (!$("<?php echo '#MonEndWith'.$index ?>").val()) {
                                    alert("Enter Start time first")
                                    $("<?php echo '#MonEndWith'.$index ?>").val("")
                                } else if ($("<?php echo '#MonStartWith'.$index ?>").val() >= $("<?php echo '#MonEndWith'.$index ?>").val()) {
                                    alert("Start time should before than end time")
                                    $("<?php echo '#MonEndWith'.$index ?>").val("")
                                }
                            });
                            $("<?php echo '#MonStartWith'.$index ?>").focusout(function() {
                                if ($("<?php echo '#MonEndWith'.$index ?>").val()) {
                                    if ($("<?php echo '#MonStartWith'.$index ?>").val() >= $("<?php echo '#MonEndWith'.$index ?>").val()) {
                                        alert("Start time should before than end time")
                                        $("<?php echo '#MonStartWith'.$index ?>").val("")
                                    }
                                }
                            });    
                        });
                    </script>

                    <?php if ($first){ ?>
                    <div class="input-field col s3">
                        <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="monadd">Add</button>
                    </div>
                    <?php } else {
                        ?>
                        <button class="btn waves-effect waves-light red darken-4 remove_field" type="button" style="maring-top: 30px;">Remove</button>
                        <script>
                            $(document).ready(function() {
                                        $("#<?php echo 'bc'.$index ?>").on("click",".remove_field", function(e){ //user click on remove text
                                            e.preventDefault(); $(this).parent('div').remove();
                                        })
                                    });
                        </script>
                        <?php
                    } ?>
                    </div>
                    <?php  
                    $first = false;
                }
            }
            ?>
        </div>
        <div id="monfields">
        </div>
      </div>
    </div>
    <script>
          $(document).ready(function() { //maximum input boxes allowed
            var wrapper         = $("#monfields"); //Fields wrapper
            var add_button      = $("#monadd"); //Add button ID
            
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
                    $('#mondayStart'+x+'').focusout(function() {
                        if ($('#mondayEnd'+x+'').val()) {
                            if ($('#mondayStart'+x+'').val() >= $('#mondayEnd'+x+'').val()) {
                                alert("Start time should before than end time")
                                $('#mondayStart'+x+'').val("")
                            }
                        }
                    });
                });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
              e.preventDefault(); $(this).parent('div').remove();
              x--;
            })});
    </script>

    <div class="container">
       <div class="section">
          <div class="row">
             <div class="input-field col s3">
                <p class="right label" style="text-align: right;color:#9e9e9e;">Tuesday</p>
            </div>
            <?php if (empty($tuesdayStartSlots)) { ?>
            <div class="input-field col s3">
                <input id="tueStart" type="text" class="time input-field ui-timepicker-input" name="tuestart[]" autocomplete="off">
                <label for="tueStart">Start Time</label>
            </div>
            <div class="input-field col s3">
                <input id="tueEnd" type="text" class="time input-field ui-timepicker-input tueEnd" name="tueend[]" autocomplete="off">
                <label for="tueEnd">End Time</label>
            </div>
            <div class="input-field col s3">
                <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="tueadd">Add</button>
            </div>
            <?php } else { 
                $first = true;
                foreach ($tuesdayStartSlots as $index => $startTime) {
                 ?>
                 <?php if (!$first): ?>
                    <div class="row" id="<?php echo 'bc'.$index ?>">
                        <div class="col s3"><p style="display:hidden"></p></div>
                    <?php endif ?>

                    <input type="hidden" name="tuesdayUpdateID[]" value="<?php echo $tuesdayUpdateID[$index] ?>">

                    <div class="input-field col s3">
                        <input id="<?php echo 'TueStartWith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="tuestart[]" autocomplete="off" value="<?php echo $startTime ?>">
                        <label for="<?php echo 'TueStartWith'.$index ?>">Start Time</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="<?php echo 'TueEndWith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="tueend[]" autocomplete="off" value="<?php echo $tuesdayEndSlots[$index] ?>">
                        <label for="<?php echo 'TueEndWith'.$index ?>">End Time</label>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $("<?php echo '#TueStartWith'.$index ?>").timepicker({  });
                            $("<?php echo '#TueEndWith'.$index ?>").timepicker({  });
                            $("<?php echo '#TueEndWith'.$index ?>").focusout(function() {
                            if (!$("<?php echo '#TueEndWith'.$index ?>").val()) {
                                    alert("Enter Start time first")
                                    $("<?php echo '#TueEndWith'.$index ?>").val("")
                                } else if ($("<?php echo '#TueStartWith'.$index ?>").val() >= $("<?php echo '#TueEndWith'.$index ?>").val()) {
                                    alert("Start time should before than end time")
                                    $("<?php echo '#TueEndWith'.$index ?>").val("")
                                }
                            });
                            $("<?php echo '#TueStartWith'.$index ?>").focusout(function() {
                                if ($("<?php echo '#TueEndWith'.$index ?>").val()) {
                                    if ($("<?php echo '#TueStartWith'.$index ?>").val() >= $("<?php echo '#TueEndWith'.$index ?>").val()) {
                                        alert("Start time should before than end time")
                                        $("<?php echo '#TueStartWith'.$index ?>").val("")
                                    }
                                }
                            });    
                        });
                    </script>

                    <?php if ($first){ ?>
                    <div class="input-field col s3">
                        <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="tueadd">Add</button>
                    </div>
                    <?php } else {
                        ?>
                        <button class="btn waves-effect waves-light red darken-4 remove_field" type="button" style="maring-top: 30px;">Remove</button>
                        <script>
                            $(document).ready(function() {
                                        $("#<?php echo 'bc'.$index ?>").on("click",".remove_field", function(e){ //user click on remove text
                                            e.preventDefault(); $(this).parent('div').remove();
                                        })
                                    });
                        </script>
                        <?php
                    } ?>
                    </div>
                    <?php  
                    $first = false;
                }
            }
            ?>
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
                    $('#tueStart'+x+'').focusout(function() {
                        if ($('#tueEnd'+x+'').val()) {
                            if ($('#tueStart'+x+'').val() >= $('#tueEnd'+x+'').val()) {
                                alert("Start time should before than end time")
                                $('#tueStart'+x+'').val("")
                            }
                        }
                    });
                });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            	e.preventDefault(); $(this).parent('div').remove();
            	x--;
            })});
    </script>





    <div class="container">
       <div class="section">
          <div class="row">
             <div class="input-field col s3">
                <p class="right label" style="text-align: right;color:#9e9e9e;">Wednesday</p>
            </div>
            <?php if (empty($WednesdayStartSlots)) { ?>
            <div class="input-field col s3">
                <input id="WedStart" type="text" class="time input-field ui-timepicker-input" name="wedstart[]" autocomplete="off">
                <label for="WedStart">Start Time</label>
            </div>
            <div class="input-field col s3">
                <input id="WedEnd" type="text" class="time input-field ui-timepicker-input WedEnd" name="wedend[]" autocomplete="off">
                <label for="WedEnd">End Time</label>
            </div>
            <div class="input-field col s3">
                <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="webadd">Add</button>
            </div>
            <?php } else { 
                $first = true;
                foreach ($WednesdayStartSlots as $index => $startTime) {
                 ?>
                 <?php if (!$first): ?>
                    <div class="row" id="<?php echo 'bc'.$index ?>">
                        <div class="col s3"><p style="display:hidden"></p></div>
                    <?php endif ?>

                    <input type="hidden" name="WednesdayUpdateID[]" value="<?php echo $WednesdayUpdateID[$index] ?>">

                    <div class="input-field col s3">
                        <input id="<?php echo 'WedStartwith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="wedstart[]" autocomplete="off" value="<?php echo $startTime ?>">
                        <label for="<?php echo 'WedStartwith'.$index ?>">Start Time</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="<?php echo 'WedEndwith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="wedend[]" autocomplete="off" value="<?php echo $WednesdayEndSlots[$index] ?>">
                        <label for="<?php echo 'WedEndwith'.$index ?>">End Time</label>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $("<?php echo '#WedStartwith'.$index ?>").timepicker({  });
                            $("<?php echo '#WedEndwith'.$index ?>").timepicker({  });
                            $("<?php echo '#WedEndwith'.$index ?>").focusout(function() {
                            if (!$("<?php echo '#WedEndwith'.$index ?>").val()) {
                                    alert("Enter Start time first")
                                    $("<?php echo '#WedEndwith'.$index ?>").val("")
                                } else if ($("<?php echo '#WedStartwith'.$index ?>").val() >= $("<?php echo '#WedEndwith'.$index ?>").val()) {
                                    alert("Start time should before than end time")
                                    $("<?php echo '#WedEndwith'.$index ?>").val("")
                                }
                            });
                            $("<?php echo '#WedStartwith'.$index ?>").focusout(function() {
                                if ($("<?php echo '#WedEndwith'.$index ?>").val()) {
                                    if ($("<?php echo '#WedStartwith'.$index ?>").val() >= $("<?php echo '#WedEndwith'.$index ?>").val()) {
                                        alert("Start time should before than end time")
                                        $("<?php echo '#WedStartwith'.$index ?>").val("")
                                    }
                                }
                            });    
                        });
                    </script>

                    <?php if ($first){ ?>
                    <div class="input-field col s3">
                        <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="webadd">Add</button>
                    </div>
                    <?php } else {
                        ?>
                        <button class="btn waves-effect waves-light red darken-4 remove_field" type="button" style="maring-top: 30px;">Remove</button>
                        <script>
                            $(document).ready(function() {
                                        $("#<?php echo 'bc'.$index ?>").on("click",".remove_field", function(e){
                                            e.preventDefault(); $(this).parent('div').remove();
                                        })
                                    });
                        </script>
                        <?php
                    } ?>
                    </div>
                    <?php  
                    $first = false;
                }
            }
            ?>
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
                    $('#WedStart'+x+'').focusout(function() {
                        if ($('#WedEnd'+x+'').val()) {
                            if ($('#WedStart'+x+'').val() >= $('#WedEnd'+x+'').val()) {
                                alert("Start time should before than end time")
                                $('#WedStart'+x+'').val("")
                            }
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
            <?php if (empty($thrdayStartSlots)) { ?>
            <div class="input-field col s3">
                <input id="ThrStart" type="text" class="time input-field ui-timepicker-input" name="thrstart[]" autocomplete="off">
                <label for="ThrStart">Start Time</label>
            </div>
            <div class="input-field col s3">
                <input id="ThrEnd" type="text" class="time input-field ui-timepicker-input" name="thrend[]" autocomplete="off">
                <label for="ThrEnd">End Time</label>
            </div>
            <div class="input-field col s3">
                <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="thradd">Add</button>
            </div>
            <?php } else { 
                $first = true;
                foreach ($thrdayStartSlots as $index => $startTime) {
                 ?>
                 <?php if (!$first): ?>
                    <div class="row" id="<?php echo 'bc'.$index ?>">
                        <div class="col s3"><p style="display:hidden"></p></div>
                    <?php endif ?>

                    <input type="hidden" name="thrdayUpdateID[]" value="<?php echo $thrdayUpdateID[$index] ?>">

                    <div class="input-field col s3">
                        <input id="<?php echo 'ThrStartWith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="thrstart[]" autocomplete="off" value="<?php echo $startTime ?>">
                        <label for="<?php echo 'ThrStartWith'.$index ?>">Start Time</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="<?php echo 'ThrEndWith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="thrend[]" autocomplete="off" value="<?php echo $thrdayEndSlots[$index] ?>">
                        <label for="<?php echo 'ThrEndWith'.$index ?>">End Time</label>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $("<?php echo '#ThrStartWith'.$index ?>").timepicker({  });
                            $("<?php echo '#ThrEndWith'.$index ?>").timepicker({  });
                            $("<?php echo '#ThrEndWith'.$index ?>").focusout(function() {
                            if (!$("<?php echo '#ThrEndWith'.$index ?>").val()) {
                                    alert("Enter Start time first")
                                    $("<?php echo '#ThrEndWith'.$index ?>").val("")
                                } else if ($("<?php echo '#ThrStartWith'.$index ?>").val() >= $("<?php echo '#ThrEndWith'.$index ?>").val()) {
                                    alert("Start time should before than end time")
                                    $("<?php echo '#ThrEndWith'.$index ?>").val("")
                                }
                            });
                            $("<?php echo '#ThrStartWith'.$index ?>").focusout(function() {
                                if ($("<?php echo '#ThrEndWith'.$index ?>").val()) {
                                    if ($("<?php echo '#ThrStartWith'.$index ?>").val() >= $("<?php echo '#ThrEndWith'.$index ?>").val()) {
                                        alert("Start time should before than end time")
                                        $("<?php echo '#ThrStartWith'.$index ?>").val("")
                                    }
                                }
                            });    
                        });
                    </script>

                    <?php if ($first){ ?>
                    <div class="input-field col s3">
                        <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="thradd">Add</button>
                    </div>
                    <?php } else {
                        ?>
                        <button class="btn waves-effect waves-light red darken-4 remove_field" type="button" style="maring-top: 30px;">Remove</button>
                        <script>
                            $(document).ready(function() {
                                        $("#<?php echo 'bc'.$index ?>").on("click",".remove_field", function(e){ //user click on remove text
                                            e.preventDefault(); $(this).parent('div').remove();
                                        })
                                    });
                        </script>
                        <?php
                    } ?>
                    </div>
                    <?php  
                    $first = false;
                }
            }
            ?>
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
                    $('#ThrStart'+x+'').focusout(function() {
                        if ($('#ThrEnd'+x+'').val()) {
                            if ($('#ThrStart'+x+'').val() >= $('#ThrEnd'+x+'').val()) {
                                alert("Start time should before than end time")
                                $('#ThrStart'+x+'').val("")
                            }
                        }
                    });
                });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove();
                x--;
            })
        });
    </script>


    <!-- <div class="container">
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
    </div> -->
    <div class="container">
       <div class="section">
          <div class="row">
             <div class="input-field col s3">
                <p class="right label" style="text-align: right;color:#9e9e9e;">Friday</p>
            </div>
            <?php if (empty($fridayStartSlots)) { ?>
            <div class="input-field col s3">
                    <input id="FriStart" type="text" class="time input-field ui-timepicker-input" name="fristart[]" autocomplete="off">
                    <label for="FriStart">Start Time</label>
                </div>
                <div class="input-field col s3">
                    <input id="FriEnd" type="text" class="time input-field ui-timepicker-input" name="friend[]" autocomplete="off">
                    <label for="FriEnd">End Time</label>
                </div>
            <div class="input-field col s3">
                <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="friadd">Add</button>
            </div>
            <?php } else { 
                $first = true;
                foreach ($fridayStartSlots as $index => $startTime) {
                 ?>
                 <?php if (!$first): ?>
                    <div class="row" id="<?php echo 'bc'.$index ?>">
                        <div class="col s3"><p style="display:hidden"></p></div>
                    <?php endif ?>

                    <input type="hidden" name="firdayUpdateID[]" value="<?php echo $firdayUpdateID[$index] ?>">

                    <div class="input-field col s3">
                        <input id="<?php echo 'FriStartWith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="fristart[]" autocomplete="off" value="<?php echo $startTime ?>">
                        <label for="<?php echo 'FriStartWith'.$index ?>">Start Time</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="<?php echo 'FriEndWith'.$index ?>" type="text" class="time input-field ui-timepicker-input" name="friend[]" autocomplete="off" value="<?php echo $fridayEndSlots[$index] ?>">
                        <label for="<?php echo 'FriEndWith'.$index ?>">End Time</label>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $("<?php echo '#FriStartWith'.$index ?>").timepicker({  });
                            $("<?php echo '#FriEndWith'.$index ?>").timepicker({  });
                            $("<?php echo '#FriEndWith'.$index ?>").focusout(function() {
                            if (!$("<?php echo '#FriEndWith'.$index ?>").val()) {
                                    alert("Enter Start time first")
                                    $("<?php echo '#FriEndWith'.$index ?>").val("")
                                } else if ($("<?php echo '#FriStartWith'.$index ?>").val() >= $("<?php echo '#FriEndWith'.$index ?>").val()) {
                                    alert("Start time should before than end time")
                                    $("<?php echo '#FriEndWith'.$index ?>").val("")
                                }
                            });
                            $("<?php echo '#FriStartWith'.$index ?>").focusout(function() {
                                if ($("<?php echo '#FriEndWith'.$index ?>").val()) {
                                    if ($("<?php echo '#FriStartWith'.$index ?>").val() >= $("<?php echo '#FriEndWith'.$index ?>").val()) {
                                        alert("Start time should before than end time")
                                        $("<?php echo '#FriStartWith'.$index ?>").val("")
                                    }
                                }
                            });    
                        });
                    </script>

                    <?php if ($first){ ?>
                    <div class="input-field col s3">
                        <button class="btn waves-effect waves-light red darken-4" type="button" name="action" id="friadd">Add</button>
                    </div>
                    <?php } else {
                        ?>
                        <button class="btn waves-effect waves-light red darken-4 remove_field" type="button" style="maring-top: 30px;">Remove</button>
                        <script>
                            $(document).ready(function() {
                                        $("#<?php echo 'bc'.$index ?>").on("click",".remove_field", function(e){ //user click on remove text
                                            e.preventDefault(); $(this).parent('div').remove();
                                        })
                                    });
                        </script>
                        <?php
                    } ?>
                    </div>
                    <?php  
                    $first = false;
                }
            }
            ?>
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
                    $('#FriStart'+x+'').focusout(function() {
                        if ($('#FriEnd'+x+'').val()) {
                            if ($('#FriStart'+x+'').val() >= $('#FriEnd'+x+'').val()) {
                                alert("Start time should before than end time")
                                $('#FriStart'+x+'').val("")
                            }
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