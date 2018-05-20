<?php

namespace bbs;

class Event
{
	private $observedBy;
	private $object;
	private $name;
	private $method;
	private $params;
	private $time;
	private $microtime;

	public function __construct($observedBy, $object, $name, $method, $params = [])
	{
		$this->observedBy = $observedBy;
		$this->object = $object;
		$this->name = $name;
		$this->method = $method;
		$this->params = $params;
		$this->time = time();
		$this->microtime = microtime();
	}

	public function getObservedBy()
	{
		return $this->observedBy;
	}

	public function getClassName()
	{
		return substr(explode('::', $this->method)[0],strlen('bbs/'));
	}

	public function getObject()
	{
		return $this->object;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getFunction()
	{
		return explode('::', $this->method)[1];
	}

	public function getParams()
	{
		return $this->params;
	}

	public function getTime()
	{
		return $this->time;
	}

	public function getMicrotime()
	{
		return $this->microtime;
	}

}
