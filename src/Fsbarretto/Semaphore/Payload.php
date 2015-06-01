<?php
namespace Fsbarretto\Semaphore;


class Payload implements PayloadInterface
{

	private $apikey;
	private $from;
	private $number;
	private $message;

	public function __constuct($apiKey, $options)
	{
		$this->apikey = $apiKey;
		$this->number = $options['number'];
		$this->message = $options['message'];
		$this->from = $options['from'];
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function getFrom()
	{
		return $this->from;
	}

	public function getApikey()
	{
		return $this->apikey;
	}


	public function getFields()
	{
		return array(
			'number' => $this->getNumber(),
			'from' => $this->getFrom(),
			'message' => $this->getMessage(),
			'api' => $this->getApikey()
		);
	}
}