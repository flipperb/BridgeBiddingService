<?php

namespace bbs;

class Observer
{
	use hasName;

	private $subscribers;
	private $events;

	public function __construct($name, $subscribers)
	{
		$this->subscribers = is_array($subscribers) ? $subscribers : [$subscribers];
		$this->events = [];
	}

	public function observe($object, $name, $method, $params)
	{
		$newEvent = new Event($this, $object, $name, $method, $params);
		$this->addEvent($newEvent);
		$this->publishEvent($newEvent);
	}

	public function getSubcribers()
	{
		return $this->subscribers;
	}

	protected function addSubscriber($subscriber)
	{
		return $this->subscribers[] = $subscriber;
	}

	protected function addEvent(Event $event)
	{
		$this->events[] = $event;
	}

	protected function publishEvent($event)
	{
		foreach ($this->getSubcribers() as $subscribers) {
			$subscribers->informEvent($event);
		}
	}
}

