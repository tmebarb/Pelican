
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 1.0
  Author: GeeksLabs
  Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Forms Layouts | Pelican
    </title>
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#8c1919">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>asserts/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>asserts/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?php echo base_url();?>asserts/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>asserts/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>asserts/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  </head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  
  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Change Student Worker Status</h5>
                <ol class="breadcrumb">
                  <li><a href="index.html">Dashboard</a>
                  </li>
                  <li><a href="<?php echo base_url() ?>staff_member/viewStudentWorker">Student Worker</a>
                  </li>
                  <li class="active">Change Student Worker Status</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Please enter the ID of the student whose student worker status is to be changed.</p>

            <div class="divider"></div>
            <!--Basic Form, accepts advisor and advisee ID and updates the correct tables in the database, signifying the advisor advises the advisee-->
            <div id="basic-form" class="section">
            	<?php echo form_open('dashboard/changeSWConfirm'); ?>
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Change Student Worker Status</h4>
                    <div class="row">
                      <form class="col s12" action="dashboard/changeSWConfirm/" method="post">
                        <div class="row">
                          <div class="input-field col s12">
                            
                            <label for="userCWID">Enter Advisee CWID</label>
                            <?php echo form_input('userCWID', ''); ?>
                          </div>
                        </div>
                            <select for="SWStatus" name="SWStatus">
                              <option value="1">Add Student Worker Status</option>
                              <option value="0">Remove Student Worker Status</option>
                            </select>
                            
                          </div>
                        </div>
                        <br></br>
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
                        <br></br>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l12">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>CWID</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Major</th>
                          <th>Classification</th>
                          <th>Student Worker</th>
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
                          <th>Student Worker</th>
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
                        <td><?php echo $row->student_worker ?></td>
                        <td><?php $re = $this->Advisees_model->getAdvisorDetailsByAdviseeUserID($row->user_id); echo ($re)? $re->advisor_name: "not assigned yet"; ?></td>
                      </tr>
                        
                      <?php endforeach ?>
                  </tbody>
                </table>
              </div>
    </div>
    
  <!-- END CONTENT -->
</div>
  <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

   <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/jquery-1.11.2.min.js">
    </script>    
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/materialize.js">
    </script>
    <!--prism-->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/prism.js">
    </script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js">
    </script>
    <!-- data-tables -->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins/data-tables/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins/data-tables/data-tables-script.js">
    </script>
    <!-- chartist -->
    <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins/chartist-js/chartist.min.js">
    </script>   
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins.js">
    </script>   
    