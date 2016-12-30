<?php

namespace bbs;


class BiddingSequence
{
	private $board;
	private $bids;

	public function __construct($board)
	{
		$this->board = $board;
		$this->bids = [];
	}
}