<?php
  require_once('core/resources.php');
  global $resources;
  require_once('core/intelligence.php');
  require_once('core/views-costructor.php');
?>

<?php include('template-parts/intelligent-parts/pre.php'); ?>
  <?php $lang = get_language(); ?>
  <?php call_header(); ?>
  <!-- Start content page -->

  <!-- ALERT area start-->
  <?php get_alert( $_SERVER['REQUEST_URI'] ); ?>
  <!-- ALERT area stop-->

  <!-- Your page HTML here -->

  <!-- end content page -->
  <!-- start footer -->
  <?php call_footer(); ?>
  <!-- _________________________________________________________________________ -->
    <!-- Keep this block at the bottom of the page -->
    <!-- CSS page link -->
    <link rel="stylesheet" type="text/css" href="<?php echo $resources->url->css; ?>index.php">
    <!-- Javascript page link -->
    <script type="text/javascript" src="<?php echo $resources->url->js; ?>index.js"></script>
  <!-- _________________________________________________________________________ -->
  <?php include('template-parts/intelligent-parts/post.php'); ?>
