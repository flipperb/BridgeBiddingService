<?php

namespace bbs;

class MatchOnHCP extends Match
{
	public function calcMatch(Hand $hand, Meaning $meaning)
	{
		$match = $this->matchInHcpRanges($hand->getHcp(), $meaning->getHcpRanges());
		return $match;
	}

	public function calcMinMaxHcp($ranges)
	{
		$ranges = is_array($ranges) ? $ranges : [$ranges];
		$min = 100;
		$max = 0;
		foreach ($ranges as $range) {
			$minRange = is_array($range) ? $range[0] : explode(',', $range)[0];
			if ($minRange < $min) {
				$min = $minRange;
			}
			$maxRange = is_array($range) ? $range[1] : explode(',', $range)[1];
			if ($maxRange > $max) {
				$max = $maxRange;
			}
		}
		return ['min'=>$min, 'max'=>$max];
	}

	public function matchInHcpRanges($hcp, $ranges)
	{
		$minMax = $this->calcMinMaxHcp($ranges);
		$runs = $this->getRuns();
		foreach ($runs as $run) {
			if (($hcp >= ($minMax['min'] + $run['adjust_min'])) && ($hcp <= ($minMax['max'] + $run['adjust_max']))) {
				return $run['match'];
			}
		}
		return 0;
	}

	public function getRuns()
	{
		$runs = [[
				'match' => '1.0',
				'adjust_min' => '1.5',
				'adjust_max' => '-1.5',
			],
			[
				'match' => '0.9',
				'adjust_min' => '1',
				'adjust_max' => '-1',
			],
			[
				'match' => '0.8',
				'adjust_min' => '0.5',
				'adjust_max' => '-0.5',
			],
			[
				'match' => '0.7',
				'adjust_min' => '0',
				'adjust_max' => '0',
			],
			[
				'match' => '0.6',
				'adjust_min' => '-0.5',
				'adjust_max' => '0.5',
			],
			[
				'match' => '0.4',
				'adjust_min' => '-1',
				'adjust_max' => '1',
			],
			[
				'match' => '0.2',
				'adjust_min' => '-1.5',
				'adjust_max' => '1.5',
			],
		];
		return $runs;
	}
}

