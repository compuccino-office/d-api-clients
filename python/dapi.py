# -*- coding: UTF-8 -*-
#!/usr/bin/env python
#
import logging
from json import loads as JSON_decode
from urllib import urlopen, urlencode


"""
	d-api Python Client
	
	Ein Client Handler für v1.d-api.de
	Wiki: http://wiki.d-api.de/Api
	
	@package    Utilities d-api
	@license    
	@version    0.1 beta
	@author grischaandreew
	@copyright by grischa@compuccino.com, 2009 compuccino.com
	
	Bsp:
		dapi = Client()
		pprint( dapi.call( '/' ) )# alle methoden auflisten
		pprint( dapi.call('bundestag.ausschuesse/get', { "limit": 1 } ) )
		pprint( dapi.call('bundestag.ausschuesse/list', { "limit": 10 } ) )
		pprint( dapi.bundestag_petition( method='list', limit=10 ) )
		pprint( dapi.bundestag_wahlkreise( limit=10 ) )
	
"""


standardApiUrl = "http://v1.d-api.de"
standardYqlUrl = "http://query.yahooapis.com/v1/public/yql"

class Client:
	""" Api Client Klasse für d-api.de
			siehe http://wiki.d-api.de/Api
	"""
	user_name=None
	api_key=None
	api_url=None
	yql_url=None
	
	def __init__( self, user_name = None, api_key = None, api_url=standardApiUrl, yql_url=standardYqlUrl ):
		"""Initialisiere Klasse
			@param: string|None username Wenn kein Username und Password übergeben wird, wird automatisch der gast-account verwendet
			@param: string|None api_key
			@param: string|None api_url
			@return void
		"""
		self.user_name = user_name
		self.api_key = api_key
		self.api_url = api_url
		self.yql_url = yql_url
	
	def call( self, method = "", params = {} ):
		"""führe einen Call auf die Api aus
		"""
		if self.user_name is not None: params['user_name'] = self.user_name
		if self.api_key is not None: params['api_key'] = self.api_key
		params['output_type'] = "json"
		if method.startswith('/') is False:
			method = "/" + method
		URL = self.api_url + method
		content = ""
		try:
			logging.debug( "Open %s", (URL,params) )
			content = urlopen( URL, urlencode( params ) )
			response = JSON_decode( content.read() )
			content.close()
			return response
		except Exception, e:
			logging.warning( "Failure By Fetching %s", ( URL, params, str(e) )  )
			return False
	
	def yql( self, YQL = "", params = {} ):
		"""führe eine YQL Abfrage über YAHOO aus
		"""
		defaultParams = {
			'format': 'json',
			'env': self.api_url + "/index/alltables.env",
			'q': YQL,
			'diagnostics': 'false'
		}
		for k in params: defaultParams[k] = params[k]
		try:
			logging.debug( "Fetching YQL-Statement %s", ( YQL, defaultParams )  )
			content = urlopen( self.yql_url, urlencode( defaultParams ) )
			response = JSON_decode( content.read() )
			content.close()
			return response
		except Exception, e:
			logging.warning( "Failure By Fetching %s", ( self.yql_url, defaultParams, str(e) )  )
			return False
		
	def __getattr__( self, name ):
		if self.__dict__.has_key( name ):
			return self.__dict__.get( name )
		
		def tmp( method='get', **params ):
			if len(method)>0:
				method = "/"+method
			return self.call( name.replace( '_', '.' )+method, params )
		
		return tmp


if __name__ == "__main__":
	from pprint import pprint
	logging.getLogger().setLevel( logging.DEBUG )
	dapi = Client()
	print "".center(200,"*")
	print " API-Examples ".center(200,"*")
	print "".center(200,"*")
	print ""
	print " / ".center(200,"*")
	pprint( dapi.call( '/' ) )
	print " bundestag.ausschuesse/get?limit=1 ".center(200,"*")
	pprint( dapi.call('bundestag.ausschuesse/get', { "limit": 1 } ) )
	print " bundestag.ausschuesse/get?limit=10 ".center(200,"*")
	pprint( dapi.call('bundestag.ausschuesse/list', { "limit": 10 } ) )
	print " bundestag.petition/list?limit=10 ".center(200,"*")
	pprint( dapi.bundestag_petition( method='list', limit=10 ) )
	print " bundestag.wahlkreise/get?limit=5 ".center(200,"*")
	pprint( dapi.bundestag_wahlkreise( limit=5 ) )
	
	print ""
	print "".center(200,"*")
	print " YQL-Examples ".center(200,"*")
	print "".center(200,"*")
	print ""
	print " SELECT * FROM dapi.bundestag.wahlkreise LIMIT 1 ".center(200,"*")
	pprint( dapi.yql('SELECT * FROM dapi.bundestag.wahlkreise LIMIT 1' ) )
	print " SELECT id, vorname, nachname, partei FROM dapi.bundestag.mdb.politiker LIMIT 4 ".center(200,"*")
	pprint( dapi.yql('SELECT id, vorname, nachname, partei FROM dapi.bundestag.mdb.politiker LIMIT 4' ) )