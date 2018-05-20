<?php

namespace bbs;


class BoardTest extends \BaseTest
{
	/**
	 * @test
	 */
	public function createBoard()
    {
	    $publisher = new Publisher('BBS', []);
		$observer = new Observer('BBSO', [$publisher]);

	    $martine = new RobotPlayer($observer, 'Martine');
	    $victor = new RobotPlayer($observer, 'Victor');
        $flip = new RobotPlayer($observer, 'Flip');
        $arjan = new RobotPlayer($observer, 'Arjan');

	    for ($i=1; $i<=1; $i++) {
		    $board1 = new Board(new RandomDeal($i, -$i), $martine, $victor, $flip, $arjan);
		    $hand = $board1->getPlayerHand($board1->getNextPlayer());
		    $nextBid = $board1->getNextBid();
	    }

/*
 *
 *
	    for ($i=1; $i<=100; $i++) {
		    $board1 = new Board(new RandomDeal($i, -$i), $martine, $victor, $flip, $arjan);
		    echo "\n" . $board1->getDealer()->getName() . ": ";
		    $hand = $board1->getPlayerHand($board1->getNextPlayer());
		    foreach ($hand->getSuits() as $key => $suit) {
			    echo $suit . " ";
		    }
		    $nextBid = $board1->getNextBid();
		    echo " => " . $nextBid->getName();
	    }
*/
    }
}


