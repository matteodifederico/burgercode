<?php
  require_once('core/resources.php');
    global $resources;
  $metaData = get_page_variables();
  // require_once('core/intelligence.php');
  // $data = get_metaData();

?>

<!DOCTYPE html>
<html lang="en">
  <!-- start head -->
  <head>
    <link rel="icon" href="images/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="<?php echo $resources->application->author ?>">
    <meta name="description" content="<?php echo $metaData[1] ?>">
    <meta name="keywords" content="<?php echo $metaData[2] ?>">
    <title><?php echo $metaData[0] ?></title>
