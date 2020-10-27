<?php

require_once('../config/database.php');

/**
 * Security and criptography
 * @author Matteo Di Federico
 */
class Security
{
  /**
   * Generate secure random token
   * @param Int (optional - default 30) lenght of token
   * @return String token
   */
  public function get_random_token($lenght = 30){
    $lenght != 30 ?
      $lenght = $lenght :
      $lenght = 30;
    $token = openssl_random_pseudo_bytes($lenght);
    $token = bin2hex($token);
    return $token;
  }

  /**
   * Generate secure string hashing
   * @param String plain text string
   * @return String hashed string
   */
  public function string_hash_create( $splainString ){
    $options = [
      'cost' => 10
    ];
    $hashedString = password_hash( $splainString, PASSWORD_ARGON2I, $options );
    return $hashedString;
  }

  /**
   * String hashed verify
   * @param String plain text string
   * @param String hashed string
   * @return Bool is same string?
   */
  public function string_hash_check( $splainString, $hashedString ){
    $response = password_verify( $splainString, $hashedString );
    return $response;
  }

  /**
   * Check app autorization
   * @param String app token
   * @return Bool app is autorize?
   */
  public function app_auth( $appToken ){
    $appToken = htmlspecialchars( $appToken );
    $appToken = addslashes( $appToken );
    $database = new Database();
    $db = $database->getConnection();
    $query = "SELECT token FROM applications WHERE token='" . $appToken . "'";
    $stmt = $db->prepare( $query );
    // execute query
    $stmt->execute();
    $num = $stmt->rowCount();
    if ( $num > 0 ){
      return true;
    } else {
      return false;
    }
  }
}

?>
