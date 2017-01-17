<?php

namespace bbs;

class MatchOnMHCP extends Matcher
{
	public function calcMatch(Hand $hand, Meaning $meaning)
	{
		$match = $this->matchInHcpRanges($hand->getMhcp(), $meaning->getHcpRanges());
		return $match;
	}

	public function calcMinMaxHcp($rangeNames)
	{
		$allRanges = $this->getHcpRanges();

		$min = 100;
		$max = 0;
		foreach ($rangeNames as $rangeName) {
			$range = $allRanges[trim($rangeName)];
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

	public function getHcpRanges()
	{
		$hcpRanges = [
			'HCP_VERYWEAK' => [0, 5],
			'HCP_WEAK' => [4, 7],
			'HCP_PREEMPTIVE' => [5, 10],
			'HCP_INVITATIONAL' => [7, 11],
			'HCP_OPENING' => [11, 15],
			'HCP_STRONG' => [15, 19],
			'HCP_VERYSTRONG' => [18, 37],
			'HCP_WEAK_NO' => [12, 14],
			'HCP_STRONG_NO' => [14, 17],
			'HCP_STRONGER_NO' => [17, 19],
			'HCP_TWO_NO' => [19, 21],
			'HCP_THREE_NO' => [21, 23],
			'HCP_FOUR_NO' => [23, 25],
			'HCP_FIVE_NO' => [25, 27],
			'HCP_SIX_NO' => [27, 29],
			'HCP_SEVEN_NO' => [29, 37],
		];

		return $hcpRanges;
	}

	public function matchInHcpRanges($hcp, $rangeNames)
	{
		$minMax = $this->calcMinMaxHcp($rangeNames);
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
/*		return [[
			'match' => '1.0',
			'adjust_min' => '0',
			'adjust_max' => '0',
		]];
*/
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

