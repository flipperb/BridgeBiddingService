<?php

namespace bbs;

class Deal
{
    private $number;
    private $hands;

    public function __construct($number, array $hands)
    {
        $this->number = $number;
        $this->hands = $hands;
    }

    public function getNumber()
    {
		return $this->number;
    }

    public function getHands()
    {
        return $this->hands;
    }

    public function getHand($seat)
    {
	    return $this->hands[$seat];
    }
}


