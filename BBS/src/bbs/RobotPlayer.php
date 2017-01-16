<?php

namespace bbs;


class RobotPlayer extends Player
{
	public function __construct($name)
	{
		$name = 'RBP_' . $name;
		parent::__construct($name, new SystemCard('BBS', null));
	}

	public function askNextBid(Board $board)
	{
		if (empty($board->getBidding())) {
			return $this->askOpeningBid($board);
		}
		return new Pass($this);
	}

	public function askOpeningBid(Board $board)
	{
		$openingBids = new DeBolleHartenOpeningBids();
		$openingBids->createBids();
		$matches = [];
		foreach ($openingBids->getBids() as $key => $bid) {
			$matches[$key] = $this->matchBid($board->getDeal()->getHand(1), $bid);
		}

		$bestKey = '';
		$bestMatch = 0;
		foreach ($matches as $key => $match) {
			if ($match > $bestMatch) {
				$bestKey = $key;
				$bestMatch = $match;
			}
		}
		return new Bid($this, $bestKey);
	}

	public function matchBid(Hand $hand, SystemBid $systemBid)
	{
		$bestMatch = 0;
		foreach ($systemBid->getMeanings() as $meaning) {
			$matcher = new MatchOnHCP($hand, $meaning);
			$match = $matcher->calcMatch($hand, $meaning);
			if ($match > $bestMatch) {
				$bestMatch = $match;
			}
		}
		return $bestMatch;
	}
}

