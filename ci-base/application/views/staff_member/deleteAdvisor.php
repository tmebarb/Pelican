<script>
  $.validator.setDefaults({
    errorClass: 'invalid',
    validClass: "valid",
    errorPlacement: function (error, element) {
      $(element)
          .closest("form")
          .find("label[for='" + element.attr("name") + "']")
          .attr('data-error', error.text());
        $("#error").empty();
        $("#error").append(error.text());
    }
  });
  $().ready(function () {
      $("#advisorCWID").change(function() {
        $("#error").empty()
      });
    $("#form").validate({
        messages: {
            advisorCWID: {
                required: "Advisee ID Required!",
                number: "Number Only allowed"
            }
        }
    });
  });
</script>


  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!--start container-->
            <div class="divider"></div>
            <!--Basic Form, accepts advisor and advisee ID and updates the correct tables in the database, signifying the advisor advises the advisee-->
            <div id="basic-form" class="section">
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Delete An Advisor</h4>
                    <div class="row">
                      <form class="col s12" action="<?php echo base_url()?>Staff_member/deleteAdvisorProcess" method="post" id="form">
                         <div class="col s12 m12 l12">
                        </div>
                        <div class="row">
                            <div class="col s12" id="error" style="color:red">

                            </div>
                          <div class="input-field col s12">

                            <label for="advisorCWID" >Enter Advisor CWID</label>
<!---->
<!--                            --><?php
//                              //$arr = array('id')
//                            echo form_input('advisorCWID'); ?>
                            <input type="text" id="advisorCWID" name="advisorCWID" class="required number" required>
                          </div>
                        </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right"
                                <?php echo form_submit('submit' , 'submit'); ?>
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="container">
          <div class="section">
    </div>
    
                
  <!-- END CONTENT -->
</div>
  <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- ================================================
    Scripts
    ================================================ -->
    
 <!-- ================================================
    Scripts
    ================================================ -->

    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins/data-tables/data-tables-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins.js"></script>    
    