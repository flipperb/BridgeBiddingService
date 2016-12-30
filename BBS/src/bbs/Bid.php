<?php

namespace bbs;


class Bid
{
	use hasName;

	private $player;

	public function __construct(Player $player, $name)
	{
		$this->setName($name);
		$this->player = $player;
	}

	public function getPlayer()
	{
		return $this->player;
	}
}