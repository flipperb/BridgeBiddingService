<?php

namespace bbs;


class BridgeCommentator extends Commentator
{
	public function playStarted(Board $board)
	{
		$this->comment('Board', $board);

		$this->comment('Play', 'started');
		$this->comment('Board', $board->getDeal()->getNumber());
	}

	public function playersTurn(Board $board, Player $player)
	{
		$this->comment('Player', $player->getName());
		$this->whisperHand('Hand', $board->getPlayerHand($player));
	}

	protected function whisperHand($about, Hand $hand) {
		$line = '';
		foreach ($hand->getSuits() as $key => $suit) {
			$line .= $key . $suit . ' ';
		}
		$this->whisper($about, $line);
	}

	public function playerBids(Board $board, Player $player, Bid $bid)
	{
		$this->comment('Player', $player->getName());
		$this->comment('bids', $bid->getName());
	}
}



