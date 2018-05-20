<?php

namespace bbs;

class RandomDeal extends Deal
{
    const SUITS = ['C','D','H','S'];
    const VALUES = ['2','3','4','5','6','7','8','9','T','J','Q','K','A'];
    const SEATS = ['N','E','S','W'];
    const NUM_CARDS_IN_HAND = 13;
    const NUM_VALUES = 13;
    const NUM_SUITS = 4;

    public function __construct($number, $seed = null)
    {
        $hands = $this->shuffleAndDeal($seed);
        parent::__construct($number, $hands);
    }

    protected function shuffleAndDeal($seed = null)
    {
        $numCards = self::NUM_SUITS * self::NUM_VALUES;
        $cards = range(1, $numCards);
        if (!empty($seed)) {
            srand($seed);
        }
        shuffle($cards);
        $hands = [];
        $cards52 = array_chunk($cards, self::NUM_CARDS_IN_HAND);
        foreach ($cards52 as $cards13) {
            $hands[self::SEATS[count($hands)]] = $this->createHand($cards13);
        }
        return $hands;
    }

    protected function createHand($cards13)
    {
        rsort($cards13);

        $curSuit = self::NUM_SUITS - 1;
        $suits = [];
        $suit = '';
        foreach ($cards13 as $card) {

            if ($card > ($curSuit * self::NUM_VALUES)) {
                $suit = $suit . $this->getValueChar($card-1);
            } else {
                $suits[self::SUITS[$curSuit]] = $suit;
                $suit = '';
                $curSuit--;
                $suit .= $this->getValueChar($card-1);
            }
        }
        $suits[self::SUITS[$curSuit]] = $suit;
        $newHand = new Hand($suits);
        return $newHand;
    }

    protected function getSuitChar($cardNum)
    {
        return self::SUITS[$cardNum/count(self::VALUES)];
    }

    protected function getValueChar($cardNum)
    {
        return self::VALUES[$cardNum%self::NUM_VALUES];
    }
}
