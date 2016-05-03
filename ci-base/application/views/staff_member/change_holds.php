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
    $("#adviseeCWID").change(function() {
      $("#error").empty()
    });
    $("#form").validate({
      messages: {
        adviseeCWID: {
          required: "Advisee ID Required!",
          number: "Number Only allowed"
        }
      }
    });
  });
</script>

<link href="<?php echo base_url();?>asserts/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?php echo base_url();?>asserts/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">



<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
<link href="<?php echo base_url();?>asserts/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?php echo base_url();?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?php echo base_url();?>asserts/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?php echo base_url();?>asserts/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

        <!--start container-->
            <div class="divider"></div>
            <!--Basic Form, accepts advisor and advisee ID and updates the correct tables in the database, signifying the advisor advises the advisee-->
            <div id="basic-form" class="section">
              <?php $attributes = array('id' => 'form');?>
              <?php echo form_open('Staff_member/changeHoldsConfirm', $attributes); ?>
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Lift/Place Advisee Hold</h4>
                    <div class="row">
                      <form class="col s12" action="Staff_member/changeHoldsConfirm" method="post">
                         <div class="col s12 m12 l12">
                        </div>
                        <div class="row"><div class="col s12" id="error" style="color:red">

                          </div>
                          <div class="input-field col s12">
                            <label for="adviseeCWID">Enter Advisee CWID</label>
<!--                            --><?php //echo form_input('adviseeCWID', '', 'id="adviseeCWID"'); ?>
                            <input type="text" id="adviseeCWID" name="adviseeCWID" class="required number" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <?php $options =  array(
                                '1'    => 'Add Hold',
                                '0'  => 'Lift Hold',
                              );?>
                            
                            <?php echo form_dropdown('hold', $options, '0'); ?>
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
                      <?php echo form_close();?>


                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="container">
     
           <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>CWID</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Major</th>
                          <th>Classification</th>
                          <th>Hold</th>
                          <th>Advisor</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                          <th>Student Name</th>
                          <th>CWID</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Major</th>
                          <th>Classification</th>
                          <th>Hold</th>
                          <th>Advisor</th>            
                        </tr>
                    </tfoot>
                 
                    <tbody>
                      <?php foreach ($advisees as $row): ?>
                      <tr>
                        <td><?php echo $row->advisee_name  ?></td>
                        <td><?php echo $row->CWID ?></td>
                        <td><?php echo $row->user_email ?></td>
                        <td><?php echo $row->user_phone ?></td>
                        <td><?php echo $row->major ?></td>
                        <td><?php echo $row->classification ?></td>
                        <td><?php echo $row->hold ?></td>
                        <td><?php $re = $this->Advisees_model->getAdvisorDetailsByAdviseeUserID($row->user_id); echo ($re)? $re->advisor_name: "not assigned yet"; ?></td>
                      </tr>
                        
                      <?php endforeach ?>
                  </tbody>
                </table>
                      
  <!-- END CONTENT -->
</div>
  <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- ================================================
Scripts
================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="<?php echo base_url();?>asserts/js/jquery-1.11.2.min.js"></script>
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

