<?php

require_once('intelligence.php');

/**
 * Configure this area
 *-------------------------------------------
 */
$inProduction = false;
$siteUrlInProduction = 'https://exampleDomain';
$siteUrlInDevelopment = 'http://localhost/dynamic-template-3.0';
/**
 * Stop editing here
 *-------------------------------------------
 */

$resx = ($inProduction == true) ?
  file_get_contents( $siteUrlInProduction . '/core/config-prod.json' ) :
  file_get_contents( $siteUrlInDevelopment . '/core/config-dev.json');
$resources = json_decode($resx);

/**
 * SEO e META section
 */

//index
$indexSlug = "/";
$indexPageTitle = "Dymanic template - Homepage";
$indexPageDescription = "Example home page by Dymanic template | " . $indexPageTitle;
$indexPageKeywords = "PHP, PHP framework, BurgerCode";

//example page
$exampleSlug = "/contatti";
$examplePageTitle = "Ecoartigiano - Contatti";
$examplePageDescription = "Contatti | ".$examplePageTitle;
$examplePageKeywords = "";


//current page variables (not edit this variables or function)

function get_page_variables(){
  $currentUrl = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  //edit or add your custom variables
  global $indexSlug, $exampleSlug;
  //edit or add your custom function reply the second (else if) cycle and customizing the variables
  if( strpos($currentUrl, $exampleSlug ) ){
    global $examplePageTitle, $examplePageDescription, $examplePageKeywords;
    $data = [$examplePageTitle, $examplePageDescription, $examplePageKeywords];
    return $data;
  } else if( strpos($currentUrl, $indexSlug ) ){
    global $indexPageTitle, $indexPageDescription, $indexPageKeywords;
    $data = [$indexPageTitle, $indexPageDescription, $indexPageKeywords];
    return $data;
  }
}

?>
