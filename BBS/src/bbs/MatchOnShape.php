<?php
/**
 * Created by PhpStorm.
 * User: flipboer
 * Date: 12/01/2017
 * Time: 21:30
 */

namespace bbs;


class MatchOnShape extends Match
{
	public function calcMatch(Hand $hand, Meaning $meaning)
	{
		$match = $this->matchShapes($hand->getInShapes(), $meaning->getShapes());
		return $match;
	}

	public function matchShapes($handShapes, $bidShapes)
	{
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