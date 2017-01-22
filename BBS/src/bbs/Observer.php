<?php
/**
 * Created by PhpStorm.
 * User: flipboer
 * Date: 22/01/2017
 * Time: 12:10
 */

namespace bbs;


class Observer
{
	public function observe($object, $method, $in, $out)
	{
		$this->echoObservation($object, $method, $in, $out);
	}

	public function echoObservation($object, $method, $in, $out)
	{
		echo $method . ' ' . $object->getName();
	}
}