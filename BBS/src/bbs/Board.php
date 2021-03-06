<?php

namespace bbs;


class Board
{
	private $deal;
	private $players;
	private $bidding;
	private $dealer;

	public function __construct(Deal $deal, Player $north, Player $east, Player $south, Player $west, $bidding = [])
	{
		$this->deal = $deal;
		$this->players = [];
		$this->players['N'] = $north;
		$this->players['E'] = $east;
		$this->players['S'] = $south;
		$this->players['W'] = $west;
		$this->getDealer();
		$this->bidding = [];
	}

	public function getPlayerHand(Player $player)
	{
		foreach ($this->players as $key => $player1) {
			if ($player1 == $player) {
				return $this->getDeal()->getHand($key);
			}
		}
		return null;
	}

	public function getDealer()
	{
		$seats = ['N', 'E', 'S', 'W'];
		$seat = (($this->getDeal()->getNumber() - 1) % 4);
		return $this->dealer = $this->players[$seats[$seat]];
	}

	public function getDeal()
	{
		return $this->deal;
	}

	public function getNextPlayer()
	{
		$seats = ['N', 'E', 'S', 'W'];
		$seat = (($this->getDeal()->getNumber() + count($this->bidding) - 1) % 4);
		$nextPlayer = $this->players[$seats[$seat]];
		return $nextPlayer;
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
