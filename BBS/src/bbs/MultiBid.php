<?php

namespace bbs;


class MultiBid extends SystemBid
{
	private $bids;

	public function __construct($name, $forcing = true, array $bids)
	{
		parent::__construct($name, $forcing);
		$this->bids = $bids;
	}
}

