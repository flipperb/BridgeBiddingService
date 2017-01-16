<?php

namespace bbs;

class SystemBids
{
	private $bids = [];

	public function addBid($name, SystemBid $systemBid)
	{
		$this->bids[$name] = $systemBid;
	}

	public function addBids($names, SystemBid $systemBid)
	{
		$names = is_array($names) ? $names : explode(',', $names);
		foreach ($names as $name) {
			$this->addBid($name, $systemBid);
		}
	}

	public function getBids()
	{
		return $this->bids;
	}
}

