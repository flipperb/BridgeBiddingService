<?php

namespace bbs;


class Board
{
	private $deal;
	private $eastWest;
	private $northSouth;
	private $winds;
	private $bidding;
	private $dealer;

	public function __construct(Deal $deal, Pair $northSouth, Pair $eastWest)
	{
		$this->deal = $deal;
		$this->eastWest = $eastWest;
		$this->northSouth = $northSouth;
		$this->winds = [];
		$this->winds[] = $northSouth->getPlayer1();
		$this->winds[] = $eastWest->getPlayer1();
		$this->winds[] = $northSouth->getPlayer2();
		$this->winds[] = $eastWest->getPlayer2();
		$this->getDealer();
		$this->bidding = [];
	}

	public function getDealer()
	{
		$wind = ($this->getDeal()->getNumber() % 4) - 1;
		return $this->dealer = $this->winds[$wind];
	}

	public function getDeal()
	{
		return $this->deal;
	}

	public function getNextPlayer()
	{
		$wind = ($this->getDeal()->getNumber() + count($this->bidding) + 1) % 4;
		return $this->winds[$wind];
	}

	public function getBidding()
	{
		return $this->bidding;
	}

	public function getNextBid()
	{
		$nextBid = $this->getNextPlayer()->askNextBid($this);
		$bidding[] = $nextBid;
		return $nextBid;
	}
}
