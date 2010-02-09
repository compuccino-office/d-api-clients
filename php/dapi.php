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
 * @copyright by grischa@compuccino.com, 2009-2010 compuccino.com
 * 
 */


class DApi {
	private $api_url = "http://v1.d-api.de";
	private $yql_url = "http://query.yahooapis.com/v1/public/yql";
	private $api_user = "";
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
		if( null !== $api_user ) $this->api_user = $api_user;
		if( null !== $api_key ) $this->api_key = $api_key;
		$this->Useragent = 'D.Api PHP Client 0.1 beta (curl) ' . phpversion();
	}
	
	/**
	* 
	* @param string $method
	* @param array $parameter
	*/
	function call ( $method = "/", $parameter = array() ) {
		if( null != $this->api_user ) $parameter['api_user'] = $this->api_user;
		if( null != $this->api_key ) $parameter['api_key'] = $this->api_key;
		$parameter['output_type'] = "phpserialize";
		if( substr( $method, 0, 1 ) !== "/" ) {
			$method = "/".$method;
		}
		$Url = $this->api_url . $method;
		
		return unserialize( $this->_request( $Url, $parameter ) );
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
	@header("Content-Type: text/html;charset=utf-8");
	#line( "<small>Start Test in File: ".__FILE__." Line: " . __LINE__ . "</small>" );
	$dapi = new DApi;
	line( "YQL - Examples" );
	#line( 'Show Tables', $dapi->yql( "Show Tables" ), '$dapi->yql( "Show Tables" );' );
	line( 'SELECT * FROM d-api.parlament.bund.wahlkreise.ortsdaten LIMIT 1', $dapi->yql( "SELECT * FROM d-api.parlament.bund.wahlkreise.ortsdaten LIMIT 1" ), '$dapi->yql( "SELECT * FROM d-api.bundestag.wahlkreise.ortsdaten LIMIT 1" );' );
	line( 'SELECT id, vorname, nachname, partei FROM d-api.parlament.bund.politiker LIMIT 4', $dapi->yql( "SELECT id, vorname, nachname, partei FROM d-api.parlament.bund.politiker LIMIT 4" ), '$dapi->yql( "SELECT id, vorname, nachname, partei FROM d-api.parlament.bund.politiker LIMIT 4" );' );
	
	line( "<br/>API - Examples" );
	line( '/', $dapi->call( "/" ), '$dapi->call( "/" )' );
	line( 'parlament.bund.ausschuesse?limit=1', $dapi->call( 'parlament.bund.ausschuesse', array( 'limit' => 1 ) ), '$dapi->call( \'parlament.bund.ausschuesse\', array( \'limit\' => 1 ) );' );
	line( 'parlament.bund.petitionen?limit=5',  $dapi->parlament_bund_petitionen( array( 'limit' => 5 ) ), '$dapi->parlament_bund_petitionen( array( \'limit\' => 5 ) );' );
	line( 'parlament.bund.wahlkreise.ortsdaten?limit=2,4', $dapi->parlament_bund_wahlkreise_ortsdaten( array( 'limit' => '2,4' ) ), '$dapi->parlament_bund_wahlkreise_ortsdaten( array( \'limit\' => \'2,4\' ) );' );
	
}


if( $_SERVER['SCRIPT_FILENAME'] == __FILE__ ) {
	test();
}