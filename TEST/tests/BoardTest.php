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
	    $victor = new RobotPlayer('Victor');
        $flip = new RobotPlayer('Flip');
        $arjan = new RobotPlayer('Arjan');

	    for ($i=1; $i<=100; $i++) {
		    $board1 = new Board(new RandomDeal($i, -$i), new Pair($martine, $flip), new Pair($victor, $arjan));
		    echo "\n" . $board1->getDealer()->getName() . ": ";
		    $hand = $board1->getPlayerHand($board1->getNextPlayer());
		    foreach ($hand->getSuits() as $key => $suit) {
			    echo $suit . " ";
		    }
		    $nextBid = $board1->getNextBid();
		    echo " => " . $nextBid->getName();
	    }
    }
}


