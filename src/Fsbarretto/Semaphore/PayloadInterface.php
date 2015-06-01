<?php

namespace Fsbarretto\Semaphore;

interface PayloadInterface
{
	public function getNumber();
	public function getMessage();
	public function getFrom();
	public function getApikey();
}