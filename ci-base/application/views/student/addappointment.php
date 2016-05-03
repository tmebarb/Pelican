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
        $("#form").validate({
            rules: {
                time: "required"
            }
        });
    });
</script>
<div class="container">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!--    <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
            var $startTime = [];
            var $endTime = [];
            var $loading = $('#loadingDiv').hide();
            $(document)
                .ajaxStart(function () {
                    $loading.show();
                })
                .ajaxStop(function () {
                    $loading.hide();
                });
            $('#advisorID').on('contentChanged', function () {
                $(this).material_select();
            });

            $("#date").datepicker({
                minDate: "<?php
                        if($sessionDetails) {
                            echo ($sessionDetails->startDate > date('Y-m-d'))? $sessionDetails->startDate : 0;
                        } else {
                            echo 0;
                        }
                 ?>",
                dateFormat: "yy-mm-dd",
                maxDate: "<?php
                        if($sessionDetails) {
                            echo $sessionDetails->endDate;
                        }
                 ?>"
            });
            $("#date").change(function () {
                var date = $(this).datepicker('getDate');
                //alert(date.getUTCDay());
                day = date.getUTCDay()
                dayName = "";
                if (day == 1)
                    dayName = "monday";
                else if (day == 2)
                    dayName = "tuesday";
                else if (day == 3)
                    dayName = "wednesday";
                else if (day == 4)
                    dayName = "thrday";
                else if (day == 5)
                    dayName = "friday";
                else
                    dayName = "weekend"
                $.ajax({
                    url: "<?php echo base_url(); ?>/student/getAdvisorSlotsByDayNDate/" + $("#date").val() + "/" + dayName + "/<?php if($advisor) {
                        echo $advisor->advisor_id;
                    } ?>",
                    success: function (data) {
                        result = jQuery.parseJSON(data);
                        //alert(data);
                        var msg = $("#msg");
                        if (result.length == 0) {
                            msg.empty();
                            $startTime = [];
                            $endTime = [];
                            msg.append("<span style='color: red;'>No time Slot on " + dayName + " (" + $("#date").val() + ")</span>");

                        } else {
                            msg.empty();
                            $startTime = [];
                            $endTime = [];
                            $.each(result, function (key, value) {
                                msg.append("<div style='float:right'>")
                                $startTime.push(value.start_time)
                                $endTime.push(value.end_time)
                                msg.append("Tentive Schedule Available on this day: <span style='color: #12b29a'>" + value.start_time + " to " + value.end_time + "</span><br/>")
                                msg.append("</div>")
                            });
                        }
                    },
                });
            });

            $('#time').timepicker({timeFormat: 'H:i:s'});

            $('#time').change(function () {
                if ($startTime.length) {
                    okStart = false;
                    okEnd = false;
                    for (i = 0; i < $startTime.length; i++) {
                        if ($startTime[i] <= $('#time').val())
                            okStart = true;
                    }
                    for (i = 0; i < $endTime.length; i++) {
                        if ($endTime[i] >= $('#time').val())
                            okEnd = true;
                    }
                    if (!okStart || !okEnd) {
                        alert("Please select a valid time")

                        $("#submitButton").prop("disabled",true);
                    } else {
                        $.ajax({
                            url: "<?php echo base_url(); ?>/student/isTimeSlotTaken/" + $("#time").val() + "/" + $("#date").val(),
                            success: function (data) {
                                result = jQuery.parseJSON(data);
                                //alert(data);
                                var msg = $("#msg2");
                                if (result.length == 0) {
                                    msg.empty();

                                } else {
                                    msg.empty();
                                    msg.append(((result.msg)? "This time slot is already taken, check any other possibility from given slots": " "));
                                    if((result.msg)) {
                                        $("#submitButton").prop("disabled",true);
                                    } else {
                                        $("#submitButton").prop("disabled",false);
                                    }
                                }
                            },
                        });
                    }
                } else {
                    alert("No time Slot on selected date");
                    $('#time').val("");
                }
            });
        });
    </script>
    <div class="section">
        <div id="basic-form" class="section">

            <form action="<?php echo base_url() ?>student/saveappointment" method="post" id="form" novalidate="novalidate">
                <div class="card-panel">

                    <img src="<?php echo base_url() ?>asserts/images/hex-loader2.gif" alt="" id="loadingDiv"
                         style="margin: auto 0px; text-align: center; padding-left: 31%;">

                    <div class="right">
                        <?php
                        if ($advisor) { ?>
                            Your Advisor: <strong><?php
                                echo $advisor->advisor_name;
                                ?></strong>
                        <?php } else {
                            ?>
                            Advisor not assigned
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                    if (!$slotDetails) {
                        ?>
                        <div class="row">
                            <div class="input-field col s2">
                                <p for="date" data-error="wrong" data-success="right" class="right">Pick Date</p>
                            </div>
                            <div class="input-field col s4">
                                <input id="date" name="date" type="text" required>
                            </div>
                            <div class="col s6">
                                <?php
                                if ($sessionDetails) {
                                    ?>
                                    <p>Note: Your advisor is only available from '<span
                                            style="color: #78cf54"><?php echo $sessionDetails->startDate ?></span>' to
                                        '<span style="color: #78cf54"><?php echo $sessionDetails->endDate ?></span>'</p>
                                    <?
                                } else {
                                    ?>
                                    <!--<p style="color: red;">Ops! Your advisor haven't set advising details yet!</p>-->
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <label for="time">Start Time</label>
                                <input type="text" id="time" name="time" class="required">
                            </div>
<!--                            <input name="test" id="time">-->
                            <div class="col s6" id="msg" style="padding-top: 10px;">

                            </div>
                        </div>
                        <div class="col s6" id="msg2" style="padding-top: 10px;">

                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" id="submitButton"
                                        style="z-index: 0">Save
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        You Already have an Appointment with
                        <?php
                        if ($advisor) { ?>
                            <strong><?php
                                echo $advisor->advisor_name;
                                ?></strong>
                        <?php }

                        $timestamp = strtotime($slotDetails->date);
                        $day = date('D', $timestamp);

                        echo " on " . $day . " (" . $slotDetails->date . ")";

                        ?>
                        <?php
                    }
                    ?>
                </div>
            </form>
            <div>
            <?php
            if ($slotDetails) {
            ?>
            <form action="<?php echo base_url()?>student/undoSelect" method="POST">
                    <button type="submit" class="btn waves-effect waves-light red darken-4 remove_field" style="maring-top: 30px;">Remove</button>
            </form>
            <?php }?>
            </div>
        </div>
    </div>
</div>