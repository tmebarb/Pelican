

        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Includes predefined classes for easy layout options.</p>

            <div class="divider"></div>
            <!--Basic Form, accepts advisor and advisee ID and updates the correct tables in the database, signifying the advisor advises the advisee-->
            <div id="basic-form" class="section">
            	<?php echo form_open('Staff_member/advisorAdviseeMatch'); ?>
              <div class="row">
                <div class="col s12 m12 l8">
                  <div class="card-panel">
                    <h4 class="header2">Basic Form</h4>
                    <div class="row">
                      <form class="col s12" action="Staff_member/advisorAdviseeMatch/" method="post">
                        <div class="row">
                          <div class="input-field col s12">
                            
                            <label for="advisorID">Enter Advisor CWID</label>
                            <?php echo form_input('advisorID', ''); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                           
                            <label for="adviseeID">Enter Advisee CWID</label>
                            <?php echo form_input('adviseeID', ''); ?>
                            
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