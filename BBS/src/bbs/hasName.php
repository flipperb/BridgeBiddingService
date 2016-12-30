<?php

namespace bbs;

trait hasName
{
    private $name = "";
    private $description = "";
	private $formatter = null;

	protected function setName($name, $description = '')
    {
        if (is_string($name)) {
            $this->name = $name;
        }
        if (is_string($description)) {
            $this->description = $description;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

	protected function setFormatter(Formatter $formatter)
	{
		$this->formatter = $formatter;
	}
}