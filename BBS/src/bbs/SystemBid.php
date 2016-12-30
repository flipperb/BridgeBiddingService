<?php

namespace bbs;


class SystemBid
{
	use hasName;

    private $systemCard;

	public function __construct($name, $systemCard)
	{
		$this->systemCard = $systemCard;
	    $this->setName($name);
	}
}

