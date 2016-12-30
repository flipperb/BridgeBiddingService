<?php
/**
 * Created by PhpStorm.
 * User: flipboer
 * Date: 25/11/2016
 * Time: 21:49
 */

namespace bbs;


class OpeningBids
{
    public function listOpeningBids()
    {
        $oneDiamond = new SingleBid('1D','NON_FORCING', new hcpRange(11,20),['SEMIBAL','UNBAL','5D']);
        $oneHeart = new SingleBid('1H','NON_FORCING', new hcpRange(11,20),['SEMIBAL','UNBAL','5H']);
        $oneSpade = new SingleBid('1S','NON_FORCING', new hcpRange(11,20),['SEMIBAL','UNBAL','5S']);
        $oneNoTrump = new SingleBid('1N','NON_FORCING',new hcpRange(14,17),['FOUR333','BAL','SEMIBAL']);

        $bids = array();
        $bids['1D'] = new SingleBid('1D','NON_FORCING', new hcpRange(11,20),['SEMIBAL','UNBAL','5D']);
        $bids['1H'] = new SingleBid('1H','NON_FORCING', new hcpRange(11,20),['SEMIBAL','UNBAL','5H']);
        $bids['1S'] = new SingleBid('1S','NON_FORCING', new hcpRange(11,20),['SEMIBAL','UNBAL','5S']);
        $bids['1N'] = new SingleBid('1N','NON_FORCING', new hcpRange(14,17),['FOUR333','BAL','SEMIBAL']);
    }
}