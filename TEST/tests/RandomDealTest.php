<?php

namespace bbs;


class RandomDealTest extends \BaseTest
{
    /** @test
     */
    public function constructRandomDeal()
    {
        $randomDeal = new RandomDeal(-1);
        $hands = $randomDeal->getHands();
        print_r($hands);
    }

    public function getTestData()
    {
        $testData = [
            [
                #set 1
                [
                    'seed' => 1000,
                    'hands' => [
                        ['sT', 's9', 'hT', 'h8', 'h6', 'h2', 'd2', 'cA', 'cJ', 'c8', 'c7', 'c4', 'c2'],
                        ['sA', 'sJ', 's3', 'hA', 'hJ', 'h4', 'h3', 'dK', 'd8', 'd6', 'cQ', 'c9', 'c5'],
                        ['s7', 's6', 's5', 's2', 'hK', 'h9', 'h7', 'dJ', 'dT', 'd7', 'd3', 'cK', 'cT'],
                        ['sK', 'sQ', 's8', 's4', 'hQ', 'h5', 'dA', 'dQ', 'd9', 'd5', 'd4', 'c6', 'c3'],
                    ],
                ]
            ],
        ];

        return $testData;
    }

    /** @test
     * @dataProvider getTestData
     */
    public function testRandomDeal()
    {
        $randomDeal = new RandomDeal(1);
        $hands = $randomDeal->getHands();
    }
}

