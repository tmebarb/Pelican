
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
  <title>Forms Layouts | Pelican</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#8c1919">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo base_url();?>asserts/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url();?>asserts/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
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

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="images/Pelican Logo.png" alt=""></a> <span class="logo-text">Materialize</span></h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
                        <li>    
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light show-search"><i class="mdi-action-search"></i></a>                              
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                        </li>
                        <!-- Dropdown Trigger -->                        
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

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
                <h5 class="breadcrumbs-title">Change User Role</h5>
                <ol class="breadcrumb">
                  <li><a href="index.html">Dashboard</a>
                  </li>
                  <li class="active">Change User Role</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Please enter the ID of the user whose role is to be changed.</p>

            <div class="divider"></div>
            <!--Basic Form, accepts advisor and advisee ID and updates the correct tables in the database, signifying the advisor advises the advisee-->
            <div id="basic-form" class="section">
            	<?php echo form_open('dashboard/changeRoleConfirm'); ?>
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Change User Role</h4>
                    <div class="row">
                      <form class="col s12" action="dashboard/changeRoleConfirm/" method="post">
                        <div class="row">
                          <div class="input-field col s12">
                            
                            <label for="userID">Enter Target User ID</label>
                            <?php echo form_input('userID', ''); ?>
                          </div>
                        </div>
                            <?php $options =  array(
                                'null' => 'Please Select A Roll',
                                'admin' => 'Administrator',
                                'advisor'    => 'Advisor',
                                'advisee'  => 'Advisee',
                                'Staff_member'   => 'Staff Member'
                              );?>
                            
                            <?php echo form_dropdown('newRole', $options, 'null'); ?>
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
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    