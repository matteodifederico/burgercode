<?php
require_once ('internal/security.php');
$sec = new Security;
 // $token = $sec->get_random_token();
 $token = mktime();
// $token = $sec->password_hash_create('Difederico90');
echo $token;
?>
