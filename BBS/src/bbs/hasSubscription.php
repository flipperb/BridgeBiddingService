<?php

namespace bbs;

trait hasSubscription
{
	private $events = [];

	public function informEvent(Event $event)
	{
		$this->events[] = $event;
		return $event;
	}
}

