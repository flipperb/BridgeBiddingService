<?php
/**
 * Created by PhpStorm.
 * User: flipboer
 * Date: 12/01/2017
 * Time: 21:30
 */

namespace bbs;


class Match
{
	private $hand;
	private $meaning;
	private $match;

	public function __construct(Hand $hand, Meaning $meaning)
	{
		$this->hand = $hand;
		$this->meaning = $meaning;
		$this->match = $this->calcMatch($hand, $meaning);
	}

	public function getMeaning()
	{
		return $this->meaning;
	}

	public function getHand()
	{
		return $this->hand;
	}

	public function calcMatch(Hand $hand, Meaning $meaning)
	{
		return 0;
	}
}