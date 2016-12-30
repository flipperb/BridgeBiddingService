<?php

namespace bbs;


class Pair
{
    private $player1;
    private $player2;
    private $systemCard;

    public function __construct(Player $player1, Player $player2, SystemCard $systemCard = null)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->systemCard = $systemCard;
    }

	public function getPlayer1()
	{
		return $this->player1;
	}

	public function getPlayer2()
	{
		return $this->player2;
	}
}

