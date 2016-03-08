


<?php 

      //for bread crumb
      $this->breadcrumbs->push('Section', '/section');
      $this->breadcrumbs->push('Page', '/section/page');

      // unshift crumb
      $this->breadcrumbs->unshift('Home', '/');
  $this->breadcrumbs->show();
 ?>


        <!--start container-->
        <div class="container">
          <div class="section">
            

          <!--Form Advance-->          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2">Advisor Details</h4>
                
                <?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('success_msg') ?>
                <?php echo $this->session->flashdata('error_msg') ?>
                
                <div class="row">
                  <form class="col s12" method="post" action="<?php echo base_url() ?>dashboard/saveadvisor">
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="first_name" name="first_name" type="text" required="" aria-required="true">
                        <label for="first_name" data-error="wrong" data-success="right">First Name</label>
                      </div>
                    
                      <div class="input-field col s6">
                        <input id="last_name" name="last_name" type="text"  required="" aria-required="true">
                        <label for="last_name" data-error="wrong" data-success="right">Last Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="email5" name="email5" type="email"  required="" aria-required="true">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                      </div>
                      <div class="file-field input-field col s6">
                        <input class="file-path validate" name="path" type="text"/>
                        <div class="btn">
                          <span>Photo</span>
                          <input type="file" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="password6" type="password" name="password"  required="" aria-required="true">
                        <label for="password" data-error="wrong" data-success="right">Password</label>
                      </div>
                      <div class="input-field col s6">
                        <input id="repassword6" type="password"  name="repassword"  required="" aria-required="true">
                        <label for="repassword6" data-error="wrong" data-success="right">Confirm Password</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <select name="major"  required="" aria-required="true">
                          <option value="" disabled selected>Choose Advisor's Major</option>
                          <option value="1">Computer Sciences</option>
                          <option value="2">Bussiness</option>
                          <option value="3">Pharmecy</option>
                        </select>
                        <label data-error="wrong" data-success="right">Major</label>
                      </div>                        
                      <div class="input-field col s6">
                        <input type="date" name="dob" class="datepicker" required="" aria-required="true">
                        <label for="dob" data-error="wrong" data-success="right">DOB</label>
                      </div>
                      
                    </div>
                    
                    <div class="row">
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="action" style="z-index: 0">Save 
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
  </section>
  <!-- END CONTENT -->