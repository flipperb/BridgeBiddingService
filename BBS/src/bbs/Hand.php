<?php

namespace bbs;


class Hand
{
	private $suits;
	private $hcp;
	private $mhcp;
	private $numControls;
	private $distribution;
	private $shape;
	private $inShapes;

	public function __construct($suits)
	{
		$this->suits = $suits;
		$this->getHcp();
		$this->getMhcp();
		$this->getNumControls();
		$this->getDistribution();
		$this->getShape();
		$this->getInShapes();
		$this->inHcpRanges();
	}

	public function getSuits()
	{
		return $this->suits;
	}

	public function getSuit($name)
	{
		return $this->suits[$name];
	}

	public function getDistribution()
	{
		if (!isset($this->distribution)) {
			$this->distribution = '';
			foreach ($this->suits as $suit) {
				$this->distribution .= strlen($suit);
			}
		}
		return $this->distribution;
	}

	public function getShape()
	{
		if (!isset($this->shape)) {
			$this->shape = [];
			foreach ($this->suits as $suit) {
				$this->shape[] = strlen($suit);
			}
			rsort($this->shape);
			$this->shape = implode('', $this->shape);
		}
		return $this->shape;
	}

	public function getInShapes()
	{

		if (isset($this->inShapes)) {
			return $this->inShapes;
		}

		$shapes = [
			'FOUR333' => '4333',
			'BALANCED' => '4333, 4432, 5332',
			'SEMIBALANCED' => '5332, 5422, 6322',
			'UNBALANCED' => '4441, 6331, 7321, 7330, 5422, 5431, 5521, 5530, 6511, 6520, 6610, 5440, 6421, 6430, 7421, 7430',
			'ONESUITED' => '6322, 6331, 7321, 7330, 8311, 8320, 8410',
			'TWOSUITED' => '5422, 5431, 5521, 5530, 6511, 6520, 6610, 7600',
			'THREESUITED' => '5431, 5440, 5530, 4441',
			'FOUR441' => '4441',
			'SKEWED' => '6421, 6430, 7411, 7420',
			'FREAKHAND' => '9999',
		];

		$this->inShapes = [];
		foreach ($shapes as $name => $shape) {
			if (strpos($shape, $this->getShape()) !== false) {
				$this->inShapes[] = $name;
			}
		}

		return $this->inShapes;
	}

	public function inShapes($shapeNames)
	{
		foreach ($shapeNames as $shapeName) {
			foreach ($this->getInShapes() as $inShape) {
				if ($shapeName == $inShape) {
					return true;
				}
			}
		}
		return false;
	}

	public function inHcpRanges()
	{
		if (isset($this->inRanges)) {
			return $this->inRanges;
		}

		$hcpRanges = [
			'VERYWEAK' => [0, 5],
			'WEAK' => [4, 7],
			'PREEMPTIVE' => [5, 10],
			'INVITATIONAL' => [7, 11],
			'OPENING' => [11, 15],
			'STRONG' => [15, 37],
			'VERYSTRONG' => [18, 37],
			'WEAKNOTRUMP' => [11, 14],
			'STRONGNOTRUMP' => [14, 17],
			'STRONGERNOTRUMP' => [17, 19],
			'TWONOTRUMP' => [19, 21],
			'THREENOTRUMP' => [21, 23],
			'FOURNOTRUMP' => [23, 25],
			'FIVENOTRUMP' => [25, 27],
			'SIXNOTRUMP' => [27, 29],
			'SEVENNOTRUMP' => [29, 37],
		];

		$this->inRanges = [];
		$hcp = $this->getHcp();
		foreach ($hcpRanges as $rangeName => $hcpRange) {
			if ($hcp >= $hcpRange[0] && $hcp <= $hcpRange[1]) {
				$this->inRanges[] = $rangeName;
			}
		}
		return $this->inRanges;
	}

	public function getHcp()
	{
		$hcp_array = [
			'A' => 4,
			'K' => 3,
			'Q' => 2,
			'J' => 1,
		];

		if (!isset($this->hcp)) {
			$this->hcp = 0;
			$this->hcp = $this->calcPoints($hcp_array);
		}
		return $this->hcp;
	}

	public function getMhcp()
	{
		$mhcp_array = [
			'A' => 4.4,
			'K' => 3.0,
			'Q' => 1.6,
			'J' => 0.8,
			'T' => 0.2,
		];

		if (!isset($this->mhcp)) {
			$this->mhcp = 0;
			$this->mhcp = $this->calcPoints($mhcp_array);
		}
		return $this->mhcp;
	}

	public function getNumControls()
	{
		$num_controls_array = [
			'A' => 2,
			'K' => 1,
		];

		if (!isset($this->numControls)) {
			$this->numControls = 0;
			$this->numControls = $this->calcPoints($num_controls_array);
		}
		return $this->numControls;
	}

	private function calcPoints($points_array)
	{
		$points = 0;
		foreach ($this->suits as $suit) {
			foreach ($points_array as $card_value => $add_points) {
				strpos($suit, $card_value) !== false ? $points += $add_points : null;
			}
		}
		return $points;
	}
}