<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/sidebar.css" >

<!-- Documentation: This script is used to target a sidebar list for post.  -->

<nav id="sidebar" class="sidebar">

<?php if ( is_single($post = '')): ?>
<h3>Pediatric Primary Care</h3>
<ul >
  <li>Doctors</li>
  <li>Book An Appointment</li>
  <li>Pharmacy</li>
</ul>
<?php elseif ( is_single($post = '')): ?>
  <h3>Adult Primary Care</h3>
  <ul >
    <li>Custom Menu Item 2</li>
    <li>Custom Menu Item 2</li>
    <li>Custom Menu Item 2</li>
  </ul>
<?php elseif ( is_single($post = '')): ?>
  <h3>Pharmacy</h3>
  <ul>
    <li>Custom Menu Item 3</li>
    <li>Custom Menu Item 3</li>
    <li>Custom Menu Item 3</li>
  </ul>


<?php endif;?>
