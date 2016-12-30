<?php

namespace bbs;


class Pass extends Bid
{
	public function __construct(Player $player)
	{
		parent::__construct($player, 'PASS');
	}
}