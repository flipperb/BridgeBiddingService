<?php

namespace bbs;

class SystemCard
{
	use hasName;

    private $pair;

    public function __construct($name, Pair $pair)
    {
		$this->setName($name);
        $this->pair = $pair;
    }

    public function listGadgets()
    {
		return [];
    }

}