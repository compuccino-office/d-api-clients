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

function dapi ( api_url, user_name, api_key, yql_url ) {
	this.api_url = api_url || "http://v1.d-api.de";
	this.default_parameter = {};
	this.call_counter = 0;
	this.yql_url = yql_url || "http://query.yahooapis.com/v1/public/yql";
	if( user_name ) this.default_parameter['user_name'] = user_name;
	if( api_key ) this.default_parameter['api_key'] = api_key;
	return this;
}

dapi.prototype.urlize = function( method, params ) {
	if( typeof params != "object" ) return "";
	var q = [],k;
	params['output_type'] = "jsonp";
	for( k in params )
		q.push( k+"="+params[k] );
	if( method.slice(0,1) !== "/" ) method = "/"+method;
	return this.api_url + method + "?" + q.join("&");
}

dapi.prototype.yql_urlize = function( yqlStatement, callbackID, params ) {
	params = params || {};
	params['output_type'] = "jsonp";
	params['callback'] = callbackID;
	params['env'] = this.api_url+"/index/alltables.env";
	params['q'] = yqlStatement;
	params['format'] = 'json';
	if( params['diagnostics'] == undefined )
		params['diagnostics'] = 'false';
	var q = [],k;
	for( k in params )
		q.push( k+"="+params[k] );
	return this.yql_url + "?" + q.join("&");
}

dapi.prototype.call = function( method, cb, params ) {
	params = params || {};
	cb = cb || function(){};
	params['callback'] = "dapi_callback_"+this.call_counter++;
	var c = null;
	window[ params['callback'] ] = function(){
		document.body.removeChild( c );
		cb.apply( this, arguments );
	};
	c = document.createElement("script");
	c.type = "text/javascript";
	c.onerror = params['callback'];
	c.src = this.urlize( method, params );
	document.body.appendChild( c );
	return this;
}

dapi.prototype.yql = function( Yql, cb, params ) {
	cb = cb || function(){};
	var callback = "dapi_callback_"+this.call_counter++;
	var c = null;
	window[ callback ] = function( ) {
		document.body.removeChild( c );
		cb.apply( this, arguments );
	};
	c = document.createElement("script");
	c.type = "text/javascript";
	c.onerror = callback;
	c.src = this.yql_urlize( Yql, callback, params );
	document.body.appendChild( c );
	return this;
}