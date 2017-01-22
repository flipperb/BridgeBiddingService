<?php

namespace bbs;


class Player
{
    use hasName;
	use hasObserver;

	private $systemCard;

    public function __construct(Observer $observer = null, $name, $description = '', SystemCard $systemCard = null)
    {
	    $this->setObserver($observer);
        $this->setName($name, $description);
	    $this->systemCard = $systemCard;
    }

    public function askNextBid(Board $board)
    {
		return new Pass($this);
    }

    public function askOpeningBid(Board $board)
    {
	    return new Pass($this);
    }
}