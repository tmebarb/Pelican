

  <!-- CORE CSS-->
  
  <link href="<?php echo base_url();?>asserts/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url();?>asserts/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>asserts/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- //////////////////////////////////////////////////////////////////////////// -->

 
      <!-- START CONTENT -->
      <section id="content">
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">List advisees</h5>
                <ol class="breadcrumb">
                    <li><a href="dashboard">Dashboard</a></li>
                    
                    <li class="active">List advisees</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        

        <!--start container-->
        <div class="container">
          <div class="section">

           
            <div class="divider"></div>
            
            <!--DataTables example-->
            <div id="row-grouping">
              <h4 class="header">List of All Advisees</h4>
              <div class="row">
                
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
                      </tr>
                        
                      <?php endforeach ?>
                  </tbody>
                </table>
              </div>

                        
      <!-- LEFT RIGHT SIDEBAR NAV-->

    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



 



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
