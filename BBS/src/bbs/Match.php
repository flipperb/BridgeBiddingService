<?php

namespace bbs;


class Matcher
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

	public function getMatch()
	{
		return $this->match;
	}
}