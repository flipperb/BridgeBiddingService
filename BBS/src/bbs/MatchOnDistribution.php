<?php

namespace bbs;


class MatchOnDistribution extends Matcher
{
	public function calcMatch(Hand $hand, Meaning $meaning)
	{
		$match = false;

		if (empty($meaning->getDistributions())) {
			return 1;
		}

		foreach ($meaning->getDistributions() as $distribution) {
			$match = $this->getMatch4Distribution(str_split($hand->getDistribution(),1), $distribution);
			if ($match == true) {
				return 1;
			}
		}
		return 0;
	}

	public function getMatch4Distribution($handDistribution, $distribution)
	{
		$distribution = is_array($distribution) ? $distribution : explode(',', $distribution);
		foreach ($handDistribution as $suit => $suitLength) {
			$operator = str_split($distribution[$suit])[0];
			$reqLength = str_split($distribution[$suit])[1];
			switch ($operator) {
				case '=': {
					if ($suitLength != $reqLength) {
						return false;
					}
					break;
				}
				case '-': {
					if ($suitLength > $reqLength) {
						return false;
					}
					break;
				}
				case '+': {
					if ($suitLength < $reqLength) {
						return false;
					}
					break;
				}
			}
		}
		return true;
	}
}