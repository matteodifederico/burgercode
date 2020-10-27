<?php


class Comunication
{

  /**
   * Send mail
   * @author Matteo Di Federico <info@oxisnet.com>
   * @parameter $mail = String, $subject = String, $message = String, $type = String
   * @usage $this->send_mail( 'ex@example.com', 'subject', 'Message', 'Account' );
   * @return Bool
   */
  private function send_mail( $mail, $subject, $message, $type = null ){
    if ( $mail == '' || $subject == '' || $message == '' ){
      return false;
    }
    if ( $type == null ){
      $headers = 'From: noreply@hotelschart.com';
    } else {
      if ( $type == 'account' ) {
        $headers = 'From: accounts@hotelschart.com';
      } else if ( $type == 'shop' ) {
        $headers = 'From: orders@hotelschart.com';
      } else {
        $headers = 'From: noreply@hotelschart.com';
      }
    }
    if ( mail ( $email, $subject, $message, $headers ) ) {
      return true;
    } else {
      return false;
    }
  }

  /*
   * Account notification builder
   * @author Matteo Di Federico <info@oxisnet.com>
   * @parameter $type = String, $user = Array
   * @usage $this->create_account_notify( 'created', $user );
   * @return Bool
   */
  public function create_account_notify( $type, $user = null ){
    $email = '';
    $subject = '';
    $message = '';

    if ( $type == 'created' && $user != null ){
      if ( $user['role'] == 'user' ){
        $email = $user['email'];
        $subject = 'We are almost there!';
        $message = 'Your profile has been created!<br>Your account has been created and is pending, you will receive an email when your account is approved.<br><br>';
        $message .= '<a href="/connector/internal/user/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=created">If it wasn\'t you click here</a></br>';
        $message .= '<a href="/connector/internal/user/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
      if ( $user['role'] == 'supplier' ){
        $email = $user['email'];
        $subject = 'We are almost there!';
        $message = 'Your profile has been created!<br>Your account has been created and is pending, you will receive an email when your account is approved.<br><br>';
        $message .= '<a href="/connector/internal/supplier/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=created">If it wasn\'t you click here</a></br>';
        $message .= '<a href="/connector/internal/supplier/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
      if ( $user['role'] == 'admin' ){
        $email = $user['email'];
        $subject = 'We are almost there!';
        $message = 'Your profile has been created!<br>Your account has been created and is pending, you will receive an email when your account is approved.<br><br>';
        $message .= '<a href="/connector/internal/admin/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=created">If it wasn\'t you click here</a></br>';
        $message .= '<a href="/connector/internal/admin/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
    } else if ( $type == 'approved' && $user != null ){
      if ( $user['role'] == 'user' ){
        $email = $user['email'];
        $subject = 'Welcome to Hotelchart!';
        $message = 'Your profile has been approved!<br>Now you can receive the latest news from hotelschart.<br>You can also log in with<br>Username:' . $user['username'] . '<br>Password: you password<br><br>';
        $message .= '<a href="/connector/internal/user/password-reset.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for reset yor password</small></a></br>';
        $message .= '<a href="/connector/internal/user/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
      if ( $user['role'] == 'supplier' ){
        $email = $user['email'];
        $subject = 'Welcome to Hotelchart!';
        $message = 'Your profile has been approved!<br>Now you can enter and start selling your experiences on hotelschart.<br>You can also log in with<br>Username:' . $user['username'] . '<br>Password: you password<br><br>';
        $message .= '<a href="/connector/internal/supplier/password-reset.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for reset yor password</small></a></br>';
        $message .= '<a href="/connector/internal/supplier/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
      if ( $user['role'] == 'admin' ){
        $email = $user['email'];
        $subject = 'Welcome to Hotelchart!';
        $message = 'Your profile has been approved!<br>Now you can start administering the hotelschart portal.<br>You can also log in with<br>Username:' . $user['username'] . '<br>Password: you password<br><br>';
        $message .= '<a href="/connector/internal/admin/password-reset.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for reset yor password</small></a></br>';
        $message .= '<a href="/connector/internal/admin/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
    } else if ( $type == 'updated' && $user != null ){
      if ( $user['role'] == 'user' ){
        $email = $user['email'];
        $subject = 'Your account has been updated!';
        $message = 'Your hotelschart profile has been updated!<br><br>';
        $message .= '<a href="/connector/internal/user/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=updated">If it wasn\'t you click here</a></br>';
        $message .= '<a href="/connector/internal/user/password-reset.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for reset yor password</small></a></br>';
        $message .= '<a href="/connector/internal/user/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
      if ( $user['role'] == 'supplier' ){
        $email = $user['email'];
        $subject = 'Your account has been updated!';
        $message = 'Your hotelschart profile has been updated!<br><br>';
        $message .= '<a href="/connector/internal/supplier/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=updated">If it wasn\'t you click here</a></br>';
        $message .= '<a href="/connector/internal/supplier/password-reset.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for reset yor password</small></a></br>';
        $message .= '<a href="/connector/internal/supplier/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
      if ( $user['role'] == 'admin' ){
        $email = $user['email'];
        $subject = 'Your account has been updated!';
        $message = 'Your hotelschart profile has been updated!<br><br>';
        $message .= '<a href="/connector/internal/admin/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=updated">If it wasn\'t you click here</a></br>';
        $message .= '<a href="/connector/internal/admin/password-reset.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for reset yor password</small></a></br>';
        $message .= '<a href="/connector/internal/admin/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      }
    } else if ( $type == 'deleted' && $user != null ){
      if ( $user['role'] == 'user' ){
        $email = $user['email'];
        $subject = 'Your account has been deleted!';
        $message = 'Your hotelschart profile has been deleted!<br><br>';
        $message .= '<a href="/connector/internal/user/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=deleted">If it wasn\'t you click here</a></br>';
      }
      if ( $user['role'] == 'supplier' ){
        $email = $user['email'];
        $subject = 'Your account has been deleted!';
        $message = 'Your hotelschart profile has been deleted!<br><br>';
        $message .= '<a href="/connector/internal/supplier/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=deleted">If it wasn\'t you click here</a></br>';
      }
      if ( $user['role'] == 'admin' ){
        $email = $user['email'];
        $subject = 'Your account has been deleted!';
        $message = 'Your hotelschart profile has been deleted!<br><br>';
        $message .= '<a href="/connector/internal/admin/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=deleted">If it wasn\'t you click here</a></br>';
      }
    } else {
      return false;
    }
    if ( $this->send_mail( $email, $subject, $message, 'account' ) ) {
      return true;
    } else {
      return false;
    }
  }


  /*
   * Shop notification builder
   * @author Matteo Di Federico <info@oxisnet.com>
   * @parameter $for = String, $type = String, $user = Array, $supplier = Array, $product = Array
   * @usage $this->create_shop_notify( 'user', 'buying', $user, $supplier, $product );
   * @return Bool
   */
  public function create_shop_notify( $for, $type, $user = null, $supplier = null, $product = null ){
    $email = '';
    $subject = '';
    $message = '';
    if ( $type == 'buying' && $user != null && $supplier != null && $product != null ){
      if ( $for == 'user' ){
        $email = $user['email'];
        $subject = 'Thanks for your order!';
        $message = 'Your purchase has been successfully processed, you will be contacted by the operator in the next few days for.<br><br>';
        $message .= '<a href="/connector/internal/user/account-violation.php?userId=' . $user['id'] . '&token=' . $user['token'] . '&action=created">If it wasn\'t you click here</a></br>';
        $message .= '<a href="/connector/internal/user/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      } else if ( $for == 'supplier' ) {
        $email = $supplier['email'];
        $subject = 'New order received!';
        $message = 'Congratulations!<br>You have received a new order for ' . $product['title'] . ' from ' . $user['name'] . ', don\'t forget to contact him for the latest deals!.<br>';
        $message .= 'The purchase was made by ' . $user['name'] . ' ' . $user['surname'] . ' (tel: ' . $user['phone'] . ', e-Mail: ' . $user['email'] . ')<br>';
        $message .= 'And is related to ' . $product['title'] . ' for ' . $product['selectedDate'] . '<br><br>';
        $message .= '<a href="/connector/internal/user/unsubscribe.php?userId=' . $user['id'] . '&token=' . $user['token'] . '"><small>Click here for delete your account</small></a>';
      } else {
        return false;
      }
    } else {
      return false;
    }
    if ( $this->send_mail( $email, $subject, $message, 'shop' ) ) {
      return true;
    } else {
      return false;
    }
  }

}
