<?php

namespace bbs;


class SystemBid
{
	private $type = '';
	private $forcing = '';
	private $meanings = [];

	public function __construct($type, $forcing, $meanings)
	{
		$this->type = $type;
		$this->forcing = $forcing;
		$this->meanings = is_array($meanings) ? $meanings : [$meanings];
	}

	public function getType()
	{
		return $this->type;
	}

	public function getForcing()
	{
		return $this->forcing;
	}

	public function getMeanings()
	{
		return $this->meanings;
	}
}

