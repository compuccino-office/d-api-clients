<?php
/**
 * Client Class for d-api.de
 * Siehe http://wiki.d-api.de/Api
 * 
 * @package    Utilities d-api
 * @license    
 * @version    0.1 beta
 * @author grischaandreew
 * @copyright by grischa@compuccino.com, 2009 compuccino.com
 * 
 */


class DApi {
	private $api_url = "http://v1.d-api.de";
	private $user_name = "";
	private $api_key = "";
	private $Useragent = "";
	public $CURLOPT_CONNECTTIMEOUT = 10;
	public $CURLOPT_TIMEOUT = 30;
	
	
	/**
	* 
	* @param string $api_url
	* @param string $user_name
	* @param string $api_key
	*/
	function __construct( $api_url = null, $user_name = null, $api_key = null  ) {
		if( null !== $api_url ) $this->api_url = $api_url;
		if( null !== $user_name ) $this->user_name = $user_name;
		if( null !== $api_key ) $this->api_key = $api_key;
		$this->Useragent = 'D.Api PHP Client 0.1 beta (curl) ' . phpversion();
	}
	
	/**
	* 
	* @param string $method
	* @param array $parameter
	*/
	function call ( $method = "/", $parameter = array() ) {
		if( null != $this->user_name ) $parameter['user_name'] = $this->user_name;
		if( null != $this->api_key ) $parameter['api_key'] = $this->api_key;
		$parameter['output_type'] = "phpserialize";
		if( substr( $method, 0, 1 ) !== "/" ) {
			$method = "/".$method;
		}
		$Url = $this->api_url . $method;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url );
		curl_setopt($ch, CURLOPT_POST, True );
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $parameter ) );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->Useragent );
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->CURLOPT_CONNECTTIMEOUT );
		curl_setopt($ch, CURLOPT_TIMEOUT, $this->CURLOPT_TIMEOUT );
		$result = @curl_exec( $ch );
		curl_close( $ch );
		return unserialize( utf8_decode( $result ) );
	}
	
	function __call( $name, $parameter ) {
		$parameter = isset( $parameter[0] ) ? $parameter[0] : array();
		$method = isset( $parameter['method'] ) ? $parameter['method'] : 'get';
		$name = str_replace( "_", '.', $name );
		if( substr( $method, 0, 1 ) !== "/" ) {
			$method = "/".$method;
		}
		unset($parameter['method']);
		return $this->call( $name.$method, $parameter );
	}
	
}


$dapi = new DApi;
var_dump( $dapi->call( "/" ) );
var_dump( $dapi->call( 'bundestag.ausschuesse/get', array( 'limit' => 1 ) ) );
var_dump( $dapi->call( 'bundestag.ausschuesse/list', array( 'limit' => 10 ) ) );
var_dump( $dapi->bundestag_petition( array( 'method'=>'list', 'limit' => 10 ) ) );
var_dump( $dapi->bundestag_wahlkreise( array( 'limit' => 10 ) ) );