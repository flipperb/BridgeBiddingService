<?php

namespace bbs;


class DeBolleHarten extends SystemCard
{
	public function getOpeningBids()
	{
		return new DeBolleHartenOpeningBids();
	}

}


