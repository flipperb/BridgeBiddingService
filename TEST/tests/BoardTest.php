<?php

namespace bbs;


class BoardTest extends \BaseTest
{
    /**
     * @test
     */
    public function createBoard()
    {


	    $martine = new RobotPlayer('Martine');
        $flip = new RobotPlayer('Flip');
        $victor = new RobotPlayer('Victor');
        $arjan = new RobotPlayer('Arjan');

        $board1 = new Board(new RandomDeal(1, -1), new Pair($martine, $flip), new Pair($victor, $arjan));

		$nextBid = $board1->getNextBid();

	    print_r($nextBid);

		return $board1;
    }

	/**
	 * @test
	 */

    public function startPlay()
    {

    }


}