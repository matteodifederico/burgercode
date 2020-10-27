<?php

/**
 * Security and Cryptographics function by BurgherCode
 * @author Matteo Di Federico
 */
class Security
{
  /**
   * Cryptography section
   * @author Matteo Di Federico
   */
   public function password_hash_create( $password ){
     $options = [
       'cost' => 10
     ];
     $hashedPassword = password_hash( $password, PASSWORD_ARGON2I, $options );
     return $hashedPassword;
   }

   public function createRandomToken( $requestLenght = 0 ) {
     $requestLenght != 0 ?
      $lenght = $requestLenght :
      $lenght = 30;
     $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_!"£$%&/()=+*§#@;:,.<>"';
     $randomString = '';
     for ($i = 0; $i < $lenght; $i++) {
         $randomString .= $char[rand(0, strlen($char) - 1)];
     }
     return $randomString;
   }

   /**
    * Request validation and sanification section
    * @author Matteo Di Federico
    */
    public function sanitizeData($req){
      $a = filter_var($req, FILTER_SANITIZE_SPECIAL_CHARS);
      $SanifyReq = filter_var($a, FILTER_SANITIZE_STRING);
      return $SanifyReq;
    }

    public function sanitizeEmail($req){
      $a = filter_var($req, FILTER_SANITIZE_SPECIAL_CHARS);
      $b = filter_var($a, FILTER_SANITIZE_EMAIL);
      $SanifyReq = filter_var($b, FILTER_SANITIZE_STRING);
      return $SanifyReq;
    }

    /**
     * Auth cookie section
     * @author Matteo Di Federico
     */
    public function createAuthCookie( $userName, $token, $role ){
      $randomToken = $this->createRandomToken();
      session_start();
      session_regenerate_id();
      $_SESSION['token_session_BG_App'] = $randomToken;
      $_SESSION['id_session_BG_App'] = session_id();
      $_SESSION['userName_session_BG_App'] = $userName;
      $_SESSION['userRole_session_BG_App'] = $role;
      return true;
    }

    /**
     * Check auth cookie section
     * @author Matteo Di Federico
     * @param String role for autentication check (optional)
     * @return Bool is autenticated? - is autenticated with requested role?
     */
    public function checkAuthCookie( $requestRole = '' ){
      session_start();
      $sessionId = session_id();
      if ( $_SESSION['id_session_BG_App'] == $sessionId ){
        if ( $requestRole != '' ){
          if ( $_SESSION['userRole_session_BG_App'] == $requestRole ) {
            return true;
          } else {
            return false;
          }
        } else {
          return true;
        }
      } else {
        return false;
      }
    }

    /**
     * Destroy auth cookie section
     * @author Matteo Di Federico
     * @return Bool is destroyed?
     */
    public function destoryAuthCookie(){
      session_start();
      session_regenerate_id();
      unset( $_SESSION['token_session_BG_App'] );
      unset( $_SESSION['id_session_BG_App'] );
      unset( $_SESSION['userName_session_BG_App'] );
      unset( $_SESSION['userToken_session_BG_App'] );
      unset( $_SESSION['userRole_session_BG_App'] );
      session_destroy();
      return true;
    }
}



?>
