<?php

namespace bbs;

class Publisher
{
	use hasName;

	private $events = [];
	private $subscribers = [];

	public function __construct($name, $subscribers)
	{
		$this->setName($name);
		$this->subscribers = is_array($subscribers) ? $subscribers : [$subscribers];
	}

	public function informObserved($observer, $object, $method, $in, $out)
	{
		$event = $this->createEvent($observer, $object, $method, $in, $out);
		$this->addEvent($event);
		echo $this->publishTitle($event) . "\n";
	}

	protected function createEvent($observer, $object, $method, $in, $out)
	{
		$event = new Event($this, $observer, $object, $method, $in, $out);
		return $event;
	}

	protected function addEvent($event)
	{
		$this->events[] = $event;
		return count($this->events);
	}

	public function publishEvent(Event $event)
	{
		$this->publishObserver($event);
		$this->publishTitle($event);
		$this->publishSummary($event);
		$this->publishDetails($event);
	}

	public function publishObserver(Event $event)
	{
		$msg = "By " . $event->getObservedBy()->getName();
	}

	public function publishTitle(Event $event)
	{
		$msg = $event->getClassName();
		$msg .= " " . $event->getObjectName();
		$msg .= " did " . $event->getFunction();
		//$msg .= " with " . implode($event->getIns());
		return $msg;
	}

	public function publishIns(Event $event)
	{
		$msg = [];
		$ins = $event->getIns();
		foreach ($ins as $in) {
			$msg = get_class($in);
		}
		return implode(',', $msg);
	}

	public function publishOuts(Event $event)
	{
		$msg = [];
		$outs = $event->getOuts();
		foreach ($outs as $out) {
			$msg = get_class($out);
		}
		return implode(',', $msg);
	}

	public function publishSummary(Event $event)
	{
		$lines = [
			'TIME' => $event->getTime(),
			'MICROTIME' => $event->getMicrotime(),
			'BY' => $event->getObservedBy()->getName(),
			'CLASS' => $event->getClassName(),
			'FUNCTION' => $event->getMethod(),
			'RESULTS' => $this->publishOuts($event),
			'WHAT' => $event->getObjectName(),
			'WITH' => $this->publishIns($event),
		];

		return serialize($lines);
	}

	public function publishDetails(Event $event)
	{
		$msg = serialize($event);
		return $msg;
	}
}

