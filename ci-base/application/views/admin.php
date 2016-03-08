<?php 
    include 'header.php';
    include 'admin-template/sidebar.php';
  	echo $this->breadcrumbs->show();
    include $view.'.php';
    include 'admin-template/right-sidebar.php';
    include 'footer.php';
 ?>