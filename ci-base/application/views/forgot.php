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
  <title>Register Page | Pelican</title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo base_url();?>asserts/images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>asserts/images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#8c1919">
  <meta name="msapplication-TileImage" content="<?php echo base_url();?>asserts/images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo base_url();?>asserts/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url();?>asserts/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <?php echo validation_errors(); ?>
    <?php echo form_open('login/forgot'); ?>

    <?php echo $this->session->flashdata('error_msg') ?>
    <?php echo $this->session->flashdata('success_msg') ?>
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Forgot your password?</h4>
            <p class="center">Please enter your email.</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
              <label for="user_email">
                  University Email:                
                  </label>
                  <?php
                  echo set_value('user_email');
                  $data = array(
                    'name'        => 'user_email',
                    'id'          => 'user_email',
                    'style'   => 'margin-top: 10px; margin-left: 30px',
                    'value'   => set_value('user_email')
                    );
                  echo form_input($data);
                  ?>
              <br>
          </div>
        </div>
        
        <!--
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
              <label for="user_email">
                  University Email:                
                  </label>
                  <?php
                  echo set_value('user_email');
                  $data = array(
                    'name'        => 'user_email',
                    'id'          => 'user_email',
                    'style'   => 'margin-top: 10px; margin-left: 30px',
                    'value'   => set_value('user_email')
                    );
                  echo form_input($data);
                  ?>
              <br>
          </div>
        </div>
        -->

        <div class="row">
          <div class="input-field col s12">
           
            <button type="submit" class="btn waves-effect waves-light col s12" name="submit" value="formSave">Submit</button>
          </div>
        

          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Return to <a href="<?php echo base_url()?>login">Login</a> page </p>
          </div>
        </div>
      </form>
    </div>
  </div>



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

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo base_url();?>asserts/js/plugins.js"></script>

</body>

</html>