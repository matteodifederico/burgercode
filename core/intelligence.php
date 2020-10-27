<?php
  require_once('resources.php');
  global $resources;

  require('strings.php');
  global $strings;

  function get_string( $languagePrefix, $stringName ) {
    global $strings;
    $string = $strings[$languagePrefix . '-' . $stringName];
    return $string;
  }

  function get_language(){
    if( !isset( $_GET['lang'] ) || $_GET['lang'] == null ) {
      $lang = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
      $acceptLang = ['fr', 'it', 'en'];
      $lang = in_array( $lang, $acceptLang ) ? strtoupper( $lang ) : 'EN';
    } else {
      $acceptLang = ['FR', 'IT', 'EN'];
      $lang = in_array( $_GET['lang'], $acceptLang ) ? strtoupper( $_GET['lang'] ) : 'EN';
    }
    //return $lang;
    return 'EN';
  }

// /**
//  * Get page metadata e SEO data
//  * @require /meta-data.php
//  * @return Array meta data
//  * @example $data = get_metaData();
//  */
//   function get_metaData(){
//     require('meta-data.php');
//       global $meta;
//     $i = 0;
//     $pageMeta = null;
//     foreach ($meta['pages'] as $key => $item) {
//       if(strpos($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], $item['slug'] )){
//         $pageMeta = [
//           'name' => $item['name'],
//           'slug' => $item['slug'],
//           'title' => $item['title'],
//           'description' => $item['description'],
//           'keywords' => $item['keywords'],
//         ];
//         return $pageMeta;
//       }
//       $i++;
//     }
//   }

  function get_alert( $url ){
    global $resources;

    /**
     * message section
     */
    if ( isset( $_GET['message'] ) ){
      if ( $_GET['message'] == 'example' ){
        echo <<<HTML
              <!-- your HTML alert box -->
            HTML;
      } else {
        return;
      }
    }

    /**
     * Error section
     */
    if ( isset( $_GET['error'] ) ){
      $error = $_GET['error'];
      $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "&current-url=https" : "&current-url=http") . "://$_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI]";
      $referer = isset( $_SERVER['HTTP_REFERER'] ) ? '&referrer=' . $_SERVER['HTTP_REFERER'] : '';
      $browser = isset( $_SERVER['HTTP_USER_AGENT'] ) ? '&user-agent=' . $_SERVER['HTTP_USER_AGENT'] : '';
      $supportLink = $resources->url->main . '/technical-support?ticket=false&problem=' .$error . $currentUrl . $referer . $browser;

      if ( $_GET['error'] == 'example' ){
        echo <<<HTML
              <!-- your HTML alert box -->
            HTML;
      } else {
        return;
      }
    }
  }

?>
