<?php namespace Ash\LaravelMeasurementProtocol;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;




class LaravelMeasurementProtocolClient {
	
	
	
	
	public static function __callStatic($method, $arguments) {
		
		$client = MeasurementProtocolClient::factory();
		
		$payload = isset($arguments[0]) ? $arguments[0] : [];
		$payload['tid'] = \Config::get('analytics.tid');
		
		// If the cid wasn't included in the payload, attempt to extract it from the `_ga` cookie.
		if(!isset($payload['cid'])) {
			$payload['cid'] = self::getCid();
		}
		
		if(!$payload['cid']) {
			return false;
		}
		
		$client->$method($payload);
		
	}
	
	
	
	
	/**
	 * Get cid
	 *
	 * Get the Google Analytics cid from the `_ga` cookie.
	 */
	private static function getCid() {
		
		$ga = self::parseGaCookie();
		
		if(!$ga) {
			return false;
		}
		
		return $ga['cid'];
		
	}
	
	
	
	
	/**
	 * Parse GA Cookie
	 */
	private static function parseGaCookie() {
		
		if(!isset($_COOKIE['_ga'])) {
			return false;
		}
		
		list($version, $domainDepth, $cid1, $cid2) = split('[\.]', $_COOKIE['_ga'], 4);
		
		return array(
			'version' => $version,
			'domainDepth' => $domainDepth,
			'cid' => $cid1 . '.' . $cid2
		);
		
	}




}