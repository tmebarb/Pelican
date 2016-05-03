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
  <title>Login Page | Materialize - Material Design Admin Template</title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo base_url() ?>asserts/images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>asserts/images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo base_url() ?>asserts/images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo base_url() ?>asserts/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url() ?>asserts/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url() ?>asserts/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url() ?>asserts/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url() ?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/jquery-1.11.2.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
  <style>
    label {
      width: 100%;
    }
    .input-field label {
      font-size: 0.8rem;
      -webkit-transform: translateY(-140%);
      -moz-transform: translateY(-140%);
      -ms-transform: translateY(-140%);
      -o-transform: translateY(-140%);
      transform: translateY(-140%);
    }
  </style>

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
      $("#form").validate();
    });
  </script>
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
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="post" action="<?php echo base_url().'login/verify' ?>" id="form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo base_url() ?>asserts/images/Pelican Logo32x32.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Pelican</p>
          </div>
        </div>
        <?php echo validation_errors(); ?>
    
        <?php echo $this->session->flashdata('error_msg') ?>
        <?php echo $this->session->flashdata('success_msg') ?>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" required="" aria-required="true" name="username">
            <label for="username">Username</label>
          </div>
        </div>
        <br/>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" required="" aria-required="true" name="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">          
<!--          <div class="input-field col s12 m12 l12  login-text">-->
<!--              <input type="checkbox" id="remember-me" />-->
<!--              <label for="remember-me">Remember me</label>-->
<!--          </div>-->
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="<?php echo base_url() ?>login/signup">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="<?php echo base_url() ?>login/forgot">Forgot password?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins.js"></script>

</body>

</html>