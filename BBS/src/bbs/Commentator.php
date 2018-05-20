<?php

namespace bbs;

define('NEWLINE',"\n");

class Commentator extends Player
{
	use hasSubscription;

	public function __construct($name, $description = '')
	{
		parent::__construct($name, $description);
		$this->setName($name, $description);
	}

	public function handleEvent($event)
	{

	}

	public function comment($about, $comment)
	{
		$this->writeLine($about, NEWLINE . ucfirst($this->getName()) . ': "' . $comment . '"');
	}

	public function whisper($about, $comment)
	{
		$this->writeLine($about, NEWLINE . ucfirst($this->getName()) . ' whispers: "' . $comment . '"');
	}

	protected function writeLine($about, $commentLine)
	{
		echo "$about: " . $commentLine;
	}
}

