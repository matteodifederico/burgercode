<?php
/**
 * Page and templates costruction functions
 * NOT EDIT THIS FILE
 * @author Matteo Di Federico
 */


function call_globalCss(){
  $globalCss = 'public/css/global.php';
  if (file_exists($globalCss)) {
    echo '<link id="globalCss" rel="stylesheet" href="public/css/global.php">';
  }else{
  }
}
function call_globalJs(){
  $globalJs = 'public/js/global.js';
  if (file_exists($globalJs)) {
    echo '<script id="globalJs" type="text/javascript" src="public/js/global.js"></script>';
  }else{
  }
}
//animation
  function call_animationCss(){
    $animationCss = 'public/css/animation.css';
    if (file_exists($animationCss)) {
      echo '<link id="animationCss" rel="stylesheet" href="public/css/animation.css">';
    }else{
    }
  }
//header
function call_header(){
  $header = 'template-parts/header.php';
  if (file_exists($header)) {
    include($header);
  }else{
    echo '</head><body>';
  }
}
function call_headerCss(){
  $header = 'template-parts/header.php';
  if (file_exists($header)) {
    echo '<link id="headerCss" rel="stylesheet" href="public/css/header.php">';
  }else{
  }
}
function call_headerJs(){
  $header = 'template-parts/header.php';
  if (file_exists($header)) {
    echo '<script id="headerJs" type="text/javascript" src="public/js/header.js"></script>';
  }else{
  }
}
//sidebar
function call_sidebar(){
  $sidebar = 'template-parts/sidebar.php';
  if (file_exists($sidebar)) {
    include($sidebar);
  }else{
  }
}
function call_sidebarCss(){
  $sidebar = 'template-parts/sidebar.php';
  if (file_exists($sidebar)) {
    echo '<link id="sidebarCss" rel="stylesheet" href="public/css/sidebar.css">';
  }else{
  }
}
function call_sidebarJs(){
  $sidebar = 'template-parts/sidebar.php';
  if (file_exists($sidebar)) {
    echo '<script id="sidebarJs" type="text/javascript" src="public/js/sidebar.js"></script>';
  }else{
  }
}
//footer
function call_footer(){
  $footer = 'template-parts/footer.php';
  if (file_exists($footer)) {
    include($footer);
  }else{
  }
}
function call_footerCss(){
  $footer = 'template-parts/footer.php';
  if (file_exists($footer)) {
    echo '<link id="footerCss" rel="stylesheet" href="public/css/footer.php">';
  }else{
  }
}
function call_footerJs(){
  $footer = 'template-parts/footer.php';
  if (file_exists($footer)) {
    echo '<script id="footerJs" type="text/javascript" src="public/js/footer.js"></script>';
  }else{
  }
}

?>
