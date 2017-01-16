<?php

namespace bbs;

class SystemCard
{
	use hasName;

    private $pair;
	private $openingBids;

    public function __construct($name, $pair)
    {
		$this->setName($name);
        $this->pair = $pair;
	    $this->openingBids = new OpeningBids();
    }

	public function getOpeningBids()
	{
		return $this->openingBids;
	}

}