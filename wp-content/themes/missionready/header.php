<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title><?php bloginfo('name');?></title>

    <!--StyleSheet-->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>

    <script src="<?php echo get_template_directory_uri(); ?>/js/google.api.js"></script>
</head>

<body>
<!-- ==================== Start progress-scroll-button ==================== -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- ==================== End progress-scroll-button ==================== -->

<!-- Main Wrapper -->
<div class="mainwrapper">
    <!--Full width header Start-->
<div class="full-width-header"> 
    <!--Header Start-->
    <header id="rs-header" class="rs-header header-transparent"> 
      <!-- Menu Start -->
      <div class="menu-area dark-menu menu-sticky">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <div class="logo-area"> <a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/customer-obsession-logo.png" alt="logo"></a> </div>
            </div>
            <div class="col-sm-9 text-right">
              <div class="rs-menu-area">
                <div class="expand-btn-inner">
                  <div class="menu-btnarea">
                    <ul>
                    <?php
                      $cpi = get_the_id();
                      $locations = get_nav_menu_locations();
                      $menu_id = $locations['nav-menu'];
                      $nav_items = wp_get_nav_menu_items($menu_id);

                      foreach( $nav_items as $nav):
                        $current_menu = $nav->object_id;
                    ?>

                        <li><a href="<?php echo $nav->url; ?>" class="main-btn <?php if($nav->title == "Fit for 20"): ?>main-btn-outlined <?php endif; ?>"><?php echo $nav->title; ?></a></li>

                    <?php endforeach; ?>
                    </ul>
                  </div>
                  <div id="nav-expander" class="nav-expander style2">
                    <div class="bar"> <span class="dot1"></span> <span class="dot2"></span> <span class="dot3"></span> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Menu End --> 
      
      <!-- Canvas Menu start -->
      <nav class="right_menu_togle custom hidden-md">
        <div class="close-btn"><span id="nav-close" class="text-center"><i class="las la-times"></i></span></div>
        <div class="inner-offcanvas">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="off-menu">
                  <ul class="menu-part">
                  <?php
                      $cpi = get_the_id();
                      $locations = get_nav_menu_locations();
                      $menu_id = $locations['primary'];
                      $nav_items = wp_get_nav_menu_items($menu_id);

                      foreach( $nav_items as $nav):
                          $current_menu = $nav->object_id;
                  ?>

                  <li><a href="<?php echo $nav->url; ?>"><?php echo $nav->title; ?></a></li>

                  <?php endforeach; ?>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="off-nav-layer"></div>
      </nav>
      <!-- Canvas Menu end --> 
    </header>
    <!--Header End--> 
  </div>
  <!--Full width header End--> 