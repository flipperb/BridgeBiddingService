<?php

namespace bbs;


class Board
{
	private $deal;
	private $eastWest;
	private $northSouth;
	private $players;
	private $bidding;
	private $dealer;

	public function __construct(Deal $deal, Pair $northSouth, Pair $eastWest)
	{
		$this->deal = $deal;
		$this->eastWest = $eastWest;
		$this->northSouth = $northSouth;
		$this->players = [];
		$this->players['N'] = $northSouth->getPlayer1();
		$this->players['E'] = $eastWest->getPlayer1();
		$this->players['S'] = $northSouth->getPlayer2();
		$this->players['W'] = $eastWest->getPlayer2();
		$this->getDealer();
		$this->bidding = [];
	}

	public function getPlayerHand(Player $player1)
	{
		foreach ($this->players as $key => $player) {
			if ($player == $player1) {
				return $this->getDeal()->getHand($key);
			}
		}
		return null;
	}

	public function getDealer()
	{
		$winds = ['N', 'E', 'S', 'W'];
		$wind = (($this->getDeal()->getNumber() - 1) % 4);
		return $this->dealer = $this->players[$winds[$wind]];
	}

	public function getDeal()
	{
		return $this->deal;
	}

	public function getNextPlayer()
	{
		$winds = ['N', 'E', 'S', 'W'];
		$wind = (($this->getDeal()->getNumber() + count($this->bidding) - 1) % 4);
		return $this->players[$winds[$wind]];
	}

	public function getBidding()
	{
		return $this->bidding;
	}

	public function getNextBid()
	{
		$nextBid = $this->getNextPlayer()->askNextBid($this);
		$this->bidding[] = $nextBid;
		return $nextBid;
	}
}
