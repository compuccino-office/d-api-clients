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

function dapi ( api_url, api_user, api_key, yql_url ) {
	this.api_url = api_url || "http://v1.d-api.de";
	this.default_parameter = {};
	this.call_counter = 0;
	this.yql_url = yql_url || "http://query.yahooapis.com/v1/public/yql";
	this._cache = {};
	if( api_user ) this.default_parameter['api_user'] = api_user;
	if( api_key ) this.default_parameter['api_key'] = api_key;
	return this;
}

dapi.prototype.paramize = function( url, obj ) {
	var q = [],k;
	for( k in obj ) {
		if( k.length > 0 && String(obj[k]).length > 0 )
			q.push( k+"="+obj[k] );
	}
	return url + "?" + q.join("&");
}
dapi.prototype.urlize = function( method, params ) {
	if( typeof params != "object" ) return "";
	params['output_type'] = "jsonp";
	return this.paramize( this.api_url +"/"+ method, params );
}

dapi.prototype.yql_urlize = function( yqlStatement, params ) {
	params = params || {};
	params['output_type'] = "jsonp";
	params['env'] = this.api_url+"/index/alltables.env";
	params['q'] = yqlStatement;
	params['format'] = 'json';
	if( params['diagnostics'] == undefined )
		params['diagnostics'] = 'false';
	return this.paramize( this.yql_url, params );
}

dapi.prototype.request = function( url, cb ) {
	var cacheId = escape(url);
	if( this._cache[cacheId] ) {
		cb.apply( this, this._cache[cacheId] );
		return this;
	}
	var c = null, cid = "dapi_callback_"+this.call_counter++,that=this;
	url += "&callback="+cid;
	window[ cid ] = function(){
		try{ document.body.removeChild( c ); }catch( err ){}
		that._cache[cacheId] = arguments;
		cb.apply( that, arguments );
	};
	c = document.createElement("script");
	c.type = "text/javascript";
	c.onerror = window[ cid ];
	c.src = url;
	document.body.appendChild( c );
	return this;
}

dapi.prototype.call = function( method, cb, params ) {
	return this.request( this.urlize( method, params || {} ), cb || function(){} );
}
/**
 * nulticall call a method with pagination 
 */
dapi.prototype.multicall = function ( method, cb, params, perPage ) {
	perPage = perPage || 10;
	params = params || {};
	var limits = String( params['limit'] ).split(','),
	start = parseInt( limits[0] ),sites=Math.ceil( limits[1]/perPage ),i,self=this,data=[];
	for( i=0; i < sites; i++ ){
		(function(i){
			params.limit = (start + i*perPage) + "," + perPage;
			self.call( method, function( response ){
				if( response.data ) {
					$.each( response.data, function( i, dat ) {
						data.push( dat );
					} );
				}
				response.data = data;
				if( i >= sites-1 ) {
					cb( response );
				}
			}, params );
		})(i);
	}
	return this;
}

dapi.prototype.yql = function( Yql, cb, params ) {
	return this.request( this.yql_urlize( Yql, params ), cb || function(){} );
}