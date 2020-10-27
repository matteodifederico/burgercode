<?php

require_once('../internal/class-security.php');
require_once('../internal/class-connection.php');
require_once('../resources.php');
global $siteDomain;

if ( isset( $_POST ) ){
  if(isset($_POST['hp']) && $_POST['hp'] == ''){
    /**
     * POST request area
     */
  }
}

if ( isset( $_GET ) ){
  if(isset($_GET['hp']) && $_GET['hp'] == ''){
    /**
     * GET request area
     */
  }
}

?>
