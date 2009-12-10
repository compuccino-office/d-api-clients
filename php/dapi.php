<?php
/**
 * Client Class for d-api.de
 * Siehe http://wiki.d-api.de/Api, http://wiki.d-api.de/api-console
 * 
 * @package    Utilities d-api
 * @license    http://wiki.d-api.de/Impressum
 * @contact    http://wiki.d-api.de/Kontakt
 * @version    0.1 beta
 * @author grischaandreew
 * @copyright by grischa@compuccino.com, 2009 compuccino.com
 * 
 */


class DApi {
	private $api_url = "http://v1.d-api.de";
	private $yql_url = "http://query.yahooapis.com/v1/public/yql";
	private $user_name = "";
	private $api_key = "";
	private $Useragent = "";
	public $CURLOPT_CONNECTTIMEOUT = 10;
	public $CURLOPT_TIMEOUT = 30;
	
	
	/**
	* 
	* @param string $api_url
	* @param string $yql_url
	* @param string $user_name
	* @param string $api_key
	*/
	function __construct( $api_url = null, $yql_url = null, $user_name = null, $api_key = null  ) {
		if( null !== $api_url ) $this->api_url = $api_url;
		if( null !== $yql_url ) $this->yql_url = $yql_url;
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
		
		return unserialize( utf8_decode( $this->_request( $Url, $parameter ) ) );
	}
	
	private function _request( $Url, $parameter ) {
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
		return $result;
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
	
	/**
	* 
	* @param string $yqlStatement
	* @param array $parameter
	*/
	function yql( $yqlStatement="", $parameter=array() ) {
		$Parameter = array_merge( array(
			'format' => 'json',
			'env' => $this->api_url . "/index/alltables.env",
			'q' => $yqlStatement,
			'diagnostics' => 'false'
		), $parameter );
		return json_decode( $this->_request( $this->yql_url, $Parameter ) );
	}
	
}


function line( $title, $log = null, $codeBlock = null ) {
	print "<h1> $title </h1>";
	if( null !== $codeBlock ) {
			print "<pre style='background: black; color: orange;padding: 0.5em;padding-bottom: 1em'>&lt;?php\n\n";
			print_r( $codeBlock );
			print "\n\n?&gt;</pre>";
	}
	if( null !== $log ) {
		print "<pre style='margin-bottom: 2em; border-bottom: 2px solid #666; background: black; color: orange;padding: 0.5em;padding-bottom: 1em'>";
		print_r( $log );
		print "</pre>";
	}
	flush();
}


function test( ) {
	#line( "<small>Start Test in File: ".__FILE__." Line: " . __LINE__ . "</small>" );
	$dapi = new DApi;
	line( "YQL - Examples" );
	line( 'SELECT * FROM d-api.bundestag.wahlkreise LIMIT 1', $dapi->yql( "SELECT * FROM d-api.bundestag.wahlkreise LIMIT 1" ), '$dapi->yql( "SELECT * FROM d-api.bundestag.wahlkreise LIMIT 1" );' );
	line( 'SELECT id, vorname, nachname, partei FROM d-api.bundestag.mdb.politiker LIMIT 4', $dapi->yql( "SELECT id, vorname, nachname, partei FROM d-api.bundestag.mdb.politiker LIMIT 4" ), '$dapi->yql( "SELECT id, vorname, nachname, partei FROM d-api.bundestag.mdb.politiker LIMIT 4" );' );
	
	line( "API - Examples" );
	line( '/', $dapi->call( "/" ) );
	line( 'bundestag.ausschuesse/get?limit=1', $dapi->call( 'bundestag.ausschuesse/get', array( 'limit' => 1 ) ), '$dapi->call( \'bundestag.ausschuesse/get\', array( \'limit\' => 1 ) );' );
	line( 'bundestag.ausschuesse/list?limit=10', $dapi->call( 'bundestag.ausschuesse/list', array( 'limit' => 10 ) ), '$dapi->call( \'bundestag.ausschuesse/list\', array( \'limit\' => 10 ) );' );
	line( 'bundestag.petition/list?limit=10',  $dapi->bundestag_petition( array( 'method'=>'list', 'limit' => 10 ) ), '$dapi->bundestag_petition( array( \'method\'=>\'list\', \'limit\' => 10 ) );' );
	line( 'bundestag.wahlkreise/get?limit=10', $dapi->bundestag_wahlkreise( array( 'limit' => 10 ) ), '$dapi->bundestag_wahlkreise( array( \'limit\' => 10 ) );' );
	
}


if( $_SERVER['SCRIPT_FILENAME'] == __FILE__ ) {
	test();
}