<?php

namespace bbs;


class Observer
{
	use hasName;

	private $publishers;
	private $observed;

	public function __construct($name, $publishers)
	{
		$this->publishers = $publishers;
	}

	public function observe($object, $method, $in, $out)
	{
		$exploded = explode('::', $method);
		$className = $exploded[0];
		$functionName = $exploded[0];

		$observed = new Observed($this, $className, $object, $functionName, $in, $out);
		$this->publish($observed);
	}

	public function publish($observed)
	{
		foreach ($this->publishers as $publisher) {
			$publisher->publishObservation($observed);
		}
	}
}

