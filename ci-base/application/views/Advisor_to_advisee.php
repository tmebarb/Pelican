      <script>
        $(document).ready(function(){
            var $loading = $('#loadingDiv').hide();
            $(document)
                .ajaxStart(function () {
                    $loading.show();
                })
                .ajaxStop(function () {
                    $loading.hide();
                });
            $('#advisorID').on('contentChanged', function() {
                $(this).material_select();
            });
          $("#major").change(function(){
            $.ajax({url: "<?php echo base_url(); ?>staff_member/getAdvisorsByMajor/" + $("#major").val(),
             success: function(data){
                result = jQuery.parseJSON(data);
                 //alert(data);
                 var options = $("#advisorID");
                 if(result.length==0) {
                     $("#dropdownforAdvisor").hide();
                     $("#advisorNOTfound").show();
                 } else {
                     $("#dropdownforAdvisor").show();
                     $("#advisorNOTfound").hide();
                 }
                 options.empty();
                 $.each(result, function(key, value) {
                     options.append($("<option />").val(value.advisor_id).text(value.user_fullname))
                     options.trigger('contentChanged');
                 });

              },

            });
          });

            $("#rangeOrIndividual").change(function() {
                if(this.value == "Range of CWID for Advisee") {
                    $("#range").show()
                    $("#individual").hide()
                } else {
                    $("#range").hide()
                    $("#individual").show()
                }
            });

        });
      </script>

      <!--start container-->
      <div class="container">
        <div class="section">

          <!--Basic Form, accepts advisor and advisee ID and updates the correct tables in the database, signifying the advisor advises the advisee-->
          <div id="basic-form" class="section">
           <?php echo form_open('Staff_member/advisorAdviseeMatch'); ?>
           <div class="row">
            <div class="col s12 m12 l8">
              <div class="card-panel">
                <h4 class="header2">Assign Advisee</h4>
                <div class="container">
                    <img src="<?php echo base_url() ?>asserts/images/hex-loader2.gif" alt="" id="loadingDiv" style="margin: auto 0px; text-align: center; padding-left: 20%;">
                    <form class="col s12" action="Staff_member/advisorAdviseeMatch/" method="post">
                    <div class="row">
                      <p for="major" class="col s3" style="margin-top: 30px">Select Major</p>
                      <div class="input-field col s9">
                        <select name="major" id="major">
                          <?php 
                          foreach ($majors as $major) {
                            echo '<option value='.$major->major_code.'>'.$major->major_name.'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                        <div id="dropdownforAdvisor">
                            <p for="advisorID" class="input-field col s3">Select Advisor</p>
                            <div class="input-field col s9">

                                <select id="advisorID" name="advisorID">
                                    <option value="notSelected" disabled selected>Select Advisor</option>
                                </select>
                            </div>
                        </div>
                        <div style="color: red; display: none;" id="advisorNOTfound" class="input-field col s12">
                            <p>No Advisor record found in selected Department!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="rangeOrIndividual" id="rangeOrIndividual">
                                <option>Individual ID of Advisee</option>
                                <option>Range of CWID for Advisee</option>
                            </select>
                        </div>
                    </div>
                        <div class="row" id="individual">
                            <div class="input-field col s12">
                                <label for="adviseeID">Enter Advisee CWID</label>
                                <?php echo form_input('adviseeID', ''); ?>
                            </div>
                        </div>
                        <div class="row" id="range" style="display: none">
                            <div class="input-field col s6">
                                <label for="adviseeIDStart">Enter Start CWID</label>
                                <?php echo form_input('adviseeIDStart', ''); ?>
                            </div>
                            <div class="input-field col s6">
                                <label for="adviseeIDEnd">Enter End CWID</label>
                                <?php echo form_input('adviseeIDEnd', ''); ?>
                            </div>
                        </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right"
                        <?php echo form_submit('submit' , 'submit'); ?>
                        <i class="mdi-content-send right"></i>
                      </button>
                      <?php echo form_close();?>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>