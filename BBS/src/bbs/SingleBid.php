<?php

namespace bbs;


class SingleBid extends SystemBid
{
	private $minHcp;
    private $maxHcp;
	private $shapeNames;
	private $promisedSuit;

	public function __construct($name, $forcing, array $hcpRange, array $shapeNames, $promisedSuit)
    {
        parent::__construct($name, $forcing);
        $this->minHcp = $hcpRange[0];
        $this->maxHcp = $hcpRange[1];
        $this->shapeNames = $shapeNames;
        $this->promisedSuit = $promisedSuit;
    }

	public function getShapeNames()
	{
		return $this->shapeNames;
	}

	public function getPromisedSuit()
	{
		return $this->promisedSuit;
	}

}