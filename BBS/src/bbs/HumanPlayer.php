<?php

namespace bbs;


class HumanPlayer extends Player
{
	public function askNextBid(Board $board)
	{
		return new Pass($this);
	}

	public function askOpeningBid(Board $board)
	{
		return new Pass($this);
	}

}
