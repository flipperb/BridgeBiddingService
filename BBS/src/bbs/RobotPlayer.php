<?php

namespace bbs;


class RobotPlayer extends Player
{
	public function __construct($name)
	{
		$name = 'RBP_' . $name;
		parent::__construct($name);
	}

	public function askNextBid(Board $board)
	{
		if (empty($board->getBidding())) {
			return $this->askOpeningBid($board);
		}
		return new Pass($this);
	}

	public function askOpeningBid($board)
	{

	}
}