<?php

namespace bbs;


class RobotPlayer extends Player
{
	public function __construct(Observer $observer = null, $name)
	{
		$name = 'RBP_' . $name;
		parent::__construct($observer, $name, new SystemCard('BBS', null));
	}

	public function askNextBid(Board $board)
	{
		if (empty($board->getBidding())) {
			$nextBid = $this->askOpeningBid($board);
		} else {
			$nextBid = new Pass($this);
		}
		$this->observeMe(__METHOD__, $board, $nextBid);
		return $nextBid;
	}

	public function askOpeningBid(Board $board)
	{
		$openingBids = new DeBolleHartenOpeningBids();
		$openingBids->createBids();
		$matches = [];
		foreach ($openingBids->getBids() as $key => $bid) {
			$matches[$key] = $this->matchBid($board->getPlayerHand($this), $bid);
		}

		$bestKey = '';
		$bestMatch = 0;
		foreach ($matches as $key => $match) {
			if ($match > $bestMatch) {
				$bestKey = $key;
				$bestMatch = $match;
			}
		}
		return new Bid($this, $bestKey, $openingBids->getBids()[$bestKey]);
	}

	public function createMatchers(Hand $hand, Meaning $meaning)
	{
		$matchers = [];
		$matchers['hcp'] = new MatchOnHCP($hand, $meaning);
		$matchers['mhcp'] = new MatchOnMHCP($hand, $meaning);
		$matchers['shape'] = new MatchOnShape($hand, $meaning);
		$matchers['distribution'] = new MatchOnDistribution($hand, $meaning);
		return $matchers;
	}

	public function matchBid(Hand $hand, SystemBid $systemBid)
	{
		$bestMatch = 0;
		foreach ($systemBid->getMeanings() as $meaning) {
			$matchers = $this->createMatchers($hand, $meaning);
			$totalMatch = 0;
			foreach ($matchers as $matcher) {
				$totalMatch += $matcher->getMatch();
			}
			$match = $totalMatch / count($matchers);
			if ($match > $bestMatch) {
				$bestMatch = $match;
			}
		}
		return $bestMatch;
	}
}

