<?php

namespace bbs;


class Player
{
    use hasName;

	private $systemCard;

    public function __construct($name, SystemCard $systemCard)
    {
        $this->setName($name);
	    $this->systemCard = $systemCard;
    }

    public function askNextBid(Board $board)
    {
		return new Pass($this);
    }

    public function askOpeningBid($board)
    {
	    return new Pass($this);
    }
}