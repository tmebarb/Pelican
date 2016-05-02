<div class="container">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
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
                    dayName = "s"
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
                            msg.append("<span style='color: red;'>No time Slot on " + dayName + " (" + $("#date").val() + ")</span>");

                        } else {
                            msg.empty();
                            $.each(result, function (key, value) {
                                msg.append("<div style='float:right'>")
                                msg.append("Available times: <span style='color: #12b29a'>" + value.start_time + " to " + value.end_time + "</span><br/>")
                                msg.append("</div>")
                            });
                        }
                    },
                });
            });

//            $("#date").change(function(){
//                $.ajax({url: "<?php //echo base_url(); ?>//staff_member/getAdvisorsByMajor/" + $("#major").val(),
//                    success: function(data){
//                        result = jQuery.parseJSON(data);
//                        //alert(data);
//                        var options = $("#advisorID");
//                        if(result.length==0) {
//                            $("#dropdownforAdvisor").hide();
//                            $("#advisorNOTfound").show();
//                        } else {
//                            $("#dropdownforAdvisor").show();
//                            $("#advisorNOTfound").hide();
//                        }
//                        options.empty();
//                        $.each(result, function(key, value) {
//                            options.append($("<option />").val(value.user_id).text(value.user_fullname))
//                            options.trigger('contentChanged');
//                        });
//
//                    },
//
//                });
//            });

        });
    </script>
    <div class="section">
        <div id="basic-form" class="section">
            <form action="">
                <div class="card-panel">
                    <img src="<?php echo base_url() ?>asserts/images/hex-loader2.gif" alt="" id="loadingDiv"
                         style="margin: auto 0px; text-align: center; padding-left: 31%;">

                    <div class="right">
                        <?php
                        if($advisor) { ?>
                        Your Advisor: <strong><?php
                            echo $advisor->advisor_name;
                            ?></strong>
                        <?php } else {
                            ?>
                        Advisor not assigned
                        <?php
                        } ?>
                    </div>

                    <div class="row">
                        <div class="input-field col s2">
                            <p for="date" data-error="wrong" data-success="right" class="right">Pick Date</p>
                        </div>
                        <div class="input-field col s4">
                            <input id="date" name="date" type="text" required="" aria-required="true">
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
                                <p style="color: red;">Ops! Your advisor haven't set advising details yet!</p>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" id="msg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>