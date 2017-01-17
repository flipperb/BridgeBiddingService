<?php

namespace bbs;


class Meaning
{
	private $promisedSuit = '';
	private $hcpRanges = [];
	private $shapes = [];
	private $distributions = [];

	public function __construct($promisedSuit, $hcpRanges, $shapes, $distributions = [])
	{
		$this->promisedSuit = $promisedSuit;
		$this->hcpRanges = is_array($hcpRanges) ? $hcpRanges : explode(',',$hcpRanges);
		$this->shapes = is_array($shapes) ? $shapes : explode(',',$shapes);
		$this->distributions = is_array($distributions) ? $distributions : explode(',', $distributions);
	}

	public function getPromisedSuit()
	{
		return $this->promisedSuit;
	}

	public function getDistributions()
	{
		return $this->distributions;
	}

	public function getHcpRanges()
	{
		return $this->hcpRanges;
	}

	public function getShapes()
	{
		return $this->shapes;
	}
}