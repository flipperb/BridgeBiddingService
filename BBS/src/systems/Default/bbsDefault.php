<?php

namespace bbs;

class bbsDefault extends BiddingSystem
{
    public function __construct()
    {
        parent::__construct('bbsDefault');
    }

    public function listGadgets()
    {
        $gadgets = [
                'NATURAL',
                'ASK_ACES',
                'ASK_SHAPE',
                'ASK_MINMAX',
                'RKC',
                'CUE',
                'SPLINTER',
                'JOSEPHINE',
        ];

        return $gadgets;
    }

    public function listHcpRanges()
    {
        $hcpRanges = [
            'HCP_VERYWEAK' => [0, 5],
            'HCP_WEAK' => [4, 7],
            'HCP_PREEMPTIVE' => [5-10],
            'HCP_INVITATIONAL' => [7, 11],
            'HCP_OPENING' => [11, 15],
            'HCP_STRONG' => [15, 37],
            'HCP_VERYSTRONG' => [18, 37],
            'HCP_WEAK_NO' => [11, 14],
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

    public function listShapes()
    {
        $shapes = [
            'FOUR333' => [4333],
            'BALANCED' => [4333, 4432, 5332],
            'SEMIBALANCED' => [5332, 5422, 6322],
            'UNBALANCED' => [6331, 7321, 7330, 5422, 5431, 5521, 5530, 6511, 6520, 6610, 5431, 5440, 5530, 6421, 6430, 7421, 7430],
            'ONESUITED' => [6322, 6331, 7321, 7330, 8311, 8320, 8410],
            'TWOSUITED' => [5422, 5431, 5521, 5530, 6511, 6520, 6610],
            'THREESUITED' => [5431, 5440, 5530],
            'SKEWED' => [6421, 6430, 7411, 7420],
            'FREAKHAND' => [9999],
        ];

        return $shapes;
    }

    public function listSuitQualities()
    {
        $suitQualities = [
		    'SOLID' => ['AKQJx'],
		    'SEMISOLID' => ['AKQxx', 'AKJTx', 'AQJ8x'],
		    'GOOD' => ['AKxxx','AQ9xx','AJT8x'],
        ];

        return $suitQualities;
    }

    public function getOpenings()
    {
        // TODO: Implement getOpenings() method.
    }
}

