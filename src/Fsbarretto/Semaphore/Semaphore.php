<?php

namespace Fsbarretto\Semaphore;

class Semaphore
{
	CONST ENDPOINT = "http://api.semaphore.co/api/sms";

	private static $_apiKey;

	public function __construct($api_key)
	{
		self::$_apiKey = $api_key;
	}

	public function send($number, $from, $message)
	{
		try{
			$payload = new Payload(self::$_apiKey, compact('number', 'from', 'message'));
		}catch(\Exception $e) {
			throw new $e->getMessage();
		}

		return $this->_request($payload);
	}

	private function _request(PayloadInterface $payload)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, self::ENDPOINT);
		curl_setopt($ch,CURLOPT_POST, count($payload->getFields()));
		curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($payload->getFields()));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}
}