<?php
/**
 * Created by PhpStorm.
 * User: flipboer
 * Date: 22/01/2017
 * Time: 12:11
 */

namespace bbs;


trait hasObserver
{
	protected $observer = null;

	protected function setObserver(Observer $observer)
	{
		$this->observer = $observer;
	}

	protected function observeMe($method, $in, $out)
	{
		if ($this->observer) {
			$this->observer->observe($this, $method, $in, $out);
		}
	}
}