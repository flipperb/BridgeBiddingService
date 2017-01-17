<?php

namespace bbs;

class MatchOnShape extends Matcher
{
	public function calcMatch(Hand $hand, Meaning $meaning)
	{
		$match = $this->matchShapes($hand->getInShapes(), $meaning->getShapes());
		return $match;
	}

	public function matchShapes($handShapes, $bidShapes)
	{
		if (empty($bidShapes)) {
			return 1;
		}

		foreach ($handShapes as $handShape) {
			foreach ($bidShapes as $bidShape) {
				if ($handShape == $bidShape) {
					return 1;
				}
			}
		}
		return 0;
	}

}