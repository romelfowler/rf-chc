<?php
/*
Template Name: About Us
*/
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>About us</title>
    <link rel="stylesheet" href="http://www.RommelFowler.com/global-styles/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/boots.css">

  </head>
  <body>
    <nav class="navbar navbar-inverse ">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/CHC-LOGO-FINAL-02.png" alt="brand" /></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="inner-nav collapse navbar-collapse" id="bs-example-navbar-collapse-1">


          <ul class="nav navbar-nav navbar-right">
             <li><a href="#search">Search</a></li>
          </ul>




        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="http://staging.culinaryhc.com" target="_blank">Home <span class="sr-only">(current)</span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Our Services <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="http://culinaryhc.com/service/vision/" target="_blank">Vision</a></li>
              <li><a href="http://culinaryhc.com/service/dental/" target="_blank">Dental</a></li>
              <li><a href="http://culinaryhc.com/service/urgent-care/">Urgent Care</a></li>
              <!-- <li role="separator" class="divider"></li> -->
              <li><a href="http://culinaryhc.com/2017/01/05/pediatric-primary-care/" target="_blank">Pediatric Primary Care</a></li>
              <li><a href="http://culinaryhc.com/2017/01/05/adult-primary-care/" target="_blank">Adult Primary Care</a></li>
              <li><a href="http://culinaryhc.com/service/pharmacy/" target="_blank">Pharmacy</a></li>

            </ul>
          </li>
          <li><a href="http://culinaryhc.com/2017/02/14/faqs/" target="_blank">FAQs</a></li>

        </ul>


      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

<header id="header" class="aboutus_header">

  <!-- Carousel
================================================== -->
<?php get_template_part('template-parts/content', 'carousel');?>

</header><!-- header -->

<div id="search">
  <button type="button" class="close">×</button>
  <form>
  <input type="search" value="" placeholder="type keyword(s) here" />
  <button type="submit" class="btn btn-primary">Search</button>
  </form>
</div>

  <!-- Mission Vision
================================================== -->
<?php get_template_part('template-parts/about-us/content', 'mv');?>

<!-- Google API
// un-comment if you want to turn on maps
================================================== -->
<?php //get_template_part('template-parts/about-us/content', 'googleAPI');?>


<!-- News
// news section to show case photos and upcming events
================================================== -->
<?php //get_template_part('template-parts/about-us/content', 'news');?>

<footer id="footer">
<div class="address">
  <span><a href="https://www.google.com/maps/place/650+N+Nellis+Blvd,+Las+Vegas,+NV+89110/@36.1714383,-115.0634637,17z/data=!3m1!4b1!4m5!3m4!1s0x80c8dc9cf84fd40f:0xe70c45f40db17ebf!8m2!3d36.1714383!4d-115.061275">650 N. Nellis Blvd. Las Vegas, NV 89110</a></span>
</div>
 <div class="social facebook"></div>
 <div class="social linkedin"></div>
 <div class="social instagram"></div>
</footer>
  </body>

<script src="http://www.RommelFowler.com/global-styles/js/jquery-2.2.4.min.js"></script>
  <script src="http://www.RommelFowler.com/global-styles/js/bootstrap.min.js"></script>
  <script src="<?php bloginfo('template_directory');?>/js/animation.js">
  </script>
</html>
