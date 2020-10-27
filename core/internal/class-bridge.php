<?php

/**
 * Manage request from connector
 * @param Object $resources
 */
class Bridge
{
  private $resx = null;

  /**
   * Class initialize
   * @param Object $resources
   */
  public function __construct($resources)
	{
		$this->rexs = $resources;
	}

  /**
   * Send post request
   * @param Array $data
   * @param String $apiPath
   * @param Bool $authentication
   * @return Object $response
   */
  public function send_post_request( $data, $apiPath, $authentication = false ){
    $resources = $this->rexs;
    $url = $resources->connector->baseUrl . $apiPath;
    $authentication == true ?
      $jsonDataEncoded = json_encode( $this->add_autentication_key( $data, $resources ) ) :
      $jsonDataEncoded = json_encode( $data );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $response = json_decode( $result );
    curl_close($ch);
    return $response;
  }

  /**
   * Send get request
   * @param Array $data
   * @param String $apiPath
   * @param Bool $authentication
   * @return Object $response
   */
  public function send_get_request( $apiPath, $data = null, $authentication = false ){
    $resources = $this->rexs;
    $url = $resources->connector->baseUrl . $apiPath;
    if ( $data != null ){
      $authentication == true ?
        $jsonDataEncoded = json_encode( $this->add_autentication_key( $data, $resources ) ) :
        $jsonDataEncoded = json_encode( $data );
    }
    $authentication == true ?
      $jsonDataEncoded = json_encode( $this->add_autentication_key( $data, $resources ) ) :
      $jsonDataEncoded = json_encode( $data );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonDataEncoded);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    $response = json_decode( $result );
    return $response;
  }

  /**
   * Add api authentication on request
   * @param Array $data
   * @param Object $resources
   * @return Array $authData
   */
  private function add_autentication_key( $data, $resources ){
    $data += array( 'appToken' => $resources->connector->apiKey );
    return $data;
  }
}
