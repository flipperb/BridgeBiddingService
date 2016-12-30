<?php

namespace bbs;

class bbsDefault extends BiddingSystem
{
    public function __construct()
    {
        parent::__construct('bbsDefault');
    }

    public function getGadgets()
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

    public function getHcpRanges()
    {
        $hcpRanges = [
            'VERYWEAK' => [0, 5],
            'WEAK' => [4, 7],
            'PREEMPTIVE' => [5-10],
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

        return $hcpRanges;
    }

    public function getShapes()
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

    public function getSuitQualities()
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

