<?php

namespace bbs;

class BiddingSystem
{
    use hasName;

    public function __construct($name)
    {
        $this->setName($name);
    }

    /*
    abstract public function getShapes();
    abstract public function getHcpRanges();
    abstract public function getSuitQualities();
    */
}