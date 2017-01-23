<?php

namespace bbs;


class Publisher
{
	use hasName;

	private $events = [];
	private $publications = [];

	public function __construct($name)
	{
		$this->setName($name);
	}

	public function addEvent(Event $event)
	{
		$this->events[] = $event;
		$this->publishTitle($event);
	}

	public function publishAll(Event $event)
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
		$msg .= " did " . $event->getFunctionName();
		$msg .= " with " . $event->getIns();
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
			'FUNCTION' => $event->getFunctionName(),
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

