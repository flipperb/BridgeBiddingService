<?php

namespace bbs;


class Bid
{
	use hasName;

	private $player;
	private $systemBid;

	public function __construct(Player $player, $name, SystemBid $systemBid = null)
	{
		$this->setName($name);
		$this->player = $player;
		$this->systemBid = $systemBid;
	}

	public function getPlayer()
	{
		return $this->player;
	}

	public function getSystemBid()
	{
		return $this->systemBid;
	}
}