<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css" type="text/css" media="screen">
     <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap3.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap3-theme.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap-theme.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/student_dashboard.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/home.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/initial_test.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.mCustomScrollbar.css" type="text/css" media="screen">
    
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/alertify.core.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/alertify.default.css">
    <script src="<?php echo base_url(); ?>/assets/js/alertify.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/alertify.min.js"></script>
    
    
    <script src="<?php echo base_url(); ?>/assets/js/Chart.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.1.7.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/modernizr.2.5.3.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap3.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-2.0.3.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.1.min.js"></script>
    <script>   
  
        $(document).ready(function() { 
            $(".grey_icon_nav").hover(
                        function(){
                            $(".grey_icon_img").slideUp();
                               $("#grey_icon_desc").slideDown();
                        },
                        function(){
                             $(".grey_icon_img").slideDown();
                               $("#grey_icon_desc").slideUp();
                        }
                    );     
        
    });
    </script>
</head>
<body>
    <header class="main-header_new">
            <span class="logo_span left">
                <img class="logo" src ="<?php echo base_url(); ?>/assets/images/G-Learn.png" width="220" />
            </span>
            
           <div class="pull-right">
                <div id="myContainerRight">
                    <a href='<?php echo base_url();?>login/logout'> 
                        <div class="grey_icon_nav">
                              <div class="navbar-images-container grey_icon_img">
                                  <img class="navbar-images" src="<?php echo base_url();?>/assets/images/logout.png" />
                              </div>
                              <div id="grey_icon_desc" class="navbar_img_desc"> LOGOUT</div>
                      </div>
                    </a>
                </div> 
            </div>
</header>

