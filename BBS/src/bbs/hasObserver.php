<?php

namespace bbs;


trait hasObserver
{
	protected $observer = null;

	protected function setObserver(Observer $observer)
	{
		$this->observer = $observer;
		return $this->observer;
	}

	protected function getObserver()
	{
		return $this->observer;
	}

	protected function observeMe($doing, $method, array $params)
	{
		if ($this->getObserver()) {
			return $this->getObserver()->observe($this, $doing, $method, $params);
		}
	}
}

