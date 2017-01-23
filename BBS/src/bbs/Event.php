<?php

namespace bbs;


class Event
{
	private $observedBy;
	private $className;
	private $object;
	private $functionName;
	private $ins;
	private $outs;
	private $time;

	public function __construct(Observer $observedBy, $className, $object, $functionName, $ins, $outs)
	{
		$this->observedBy = $observedBy;
		$this->className = $className;
		$this->object = $object;
		$this->functionName = $functionName;
		$this->ins = $ins;
		$this->outs = $outs;
		$this->time = time();
		$this->microtime = microtime();
	}

	public function getObservedBy()
	{
		return $this->observedBy;
	}

	public function getClassName()
	{
		return $this->className;
	}

	public function getObject()
	{
		return $this->object;
	}

	public function getFunctionName()
	{
		return $this->functionName;
	}

	public function getIns()
	{
		return $this->ins;
	}

	public function getOuts()
	{
		return $this->outs;
	}

	public function getTime()
	{
		return $this->time;
	}

	public function getMicrotime()
	{
		return $this->microtime;
	}

	public function getObjectName()
	{
		return $this->object->getName();
	}

}