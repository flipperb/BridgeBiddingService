<?php

namespace bbs;

class CarmaOpeningBids extends OpeningBids
{
	public function createBids()
	{
		$this->addBid('pass', new SystemBid('PASS', 'NON_FORCING', [
				new Meaning('PASS', 'HCP_WEAK, HCP_VERYWEAK, HCP_INVITATIONAL', ''),
			]
		));
		$this->addBid('1c', new SystemBid('DOUBLETON', 'NON_FORCING', [
			new Meaning('BALANCED', 'HCP_WEAK_NO,HCP_STRONGER_NO', 'BALANCED, SEMIBALANCED'),
				new Meaning('+5C', 'HCP_OPENING,HCP_STRONG', 'BALANCED, SEMIBALANCED'),
			]
		));
		$this->addBid('1d', new SystemBid('NATURAL', 'NON_FORCING', [
			new Meaning('+4D', 'HCP_OPENING,HCP_STRONG','UNBALANCED, SEMIBALANCED',['-4,-4,+4,-4', '+0,+0,+5,=5']),
			]
		));
		$this->addBid('1h', new SystemBid('NATURAL', 'NON_FORCING', [
			new Meaning('+5H', 'HCP_OPENING', 'BALANCED, SEMIBALANCED'),
			]
		));
		$this->addBid('1s', new SystemBid('NATURAL', 'FORCING', [
			new Meaning('+5S', 'HCP_OPENING, HCP_STRONG, HCP_VERYSTRONG','UNBALANCED, ONESUITED',['=1,=4,=4,=4', '=4,=1,=4,=4', '-3,-3,+5,+0']),
			]
		));
		$this->addBid('1n', new SystemBid('BALANCED', 'NON_FORCING', [
			new Meaning('BALANCED', 'HCP_STRONG_NO', 'BALANCED, SEMIBALANCED'),
			]
		));
		$this->addBid('2c', new SystemBid('NATURAL', 'NON_FORCING', [
				new Meaning('+5C', 'HCP_OPENING','UNBALANCED, ONESUITED',['-3,-3,-4,+5', '-3,-3,=5,+6']),
			]
		));
		$this->addBid('2d', new SystemBid('MULTI', 'FORCING', [
				new Meaning('=6H', 'HCP_PREEMPTIVE','UNBALANCED, ONESUITED',['-3,=6,-4,-4']),
				new Meaning('=6S', 'HCP_PREEMPTIVE','UNBALANCED, ONESUITED',['=6,-3,-4,-4']),
				new Meaning('BALANCED', 'HCP_THREE_NO, HCP_FOUR_NO, HCP_FIVE_NO, HCP_SIX_NO, HCP_SEVEN_NO', 'BALANCED, SEMIBALANCED'),
			]
		));
		$this->addBid('2h', new SystemBid('NATURAL', 'NON_FORCING', [
				new Meaning('+5C', 'HCP_STRONG','UNBALANCED, ONESUITED',['-3,-3,-4,+5', '-3,-3,=5,+6']),
			]
		));
		$this->addBid('2s', new SystemBid('MUIDERBERG', 'NON_FORCING', [
				new Meaning('=5H4m', 'HCP_PREEMPTIVE','TWOSUITED',['=5,-3,+4,+0', '=5,-3,+0,+3']),
			]
		));
		$this->addBid('2n', new SystemBid('BALANCED', 'NON_FORCING', [
				new Meaning('BALANCED', 'HCP_STRONG_NO', 'BALANCED, SEMIBALANCED'),
			]
		));
		$this->addBid('3c, 3d, 3h, 3s', new SystemBid('PREEMPTIVE', 'NON-FORCING', [
				new Meaning('=6?', 'HCP_PREEMPTIVE', 'ONESUITED, SKEWED')
			]
		));
		$this->addBid('3n', new SystemBid('PREEMPTIVE', 'NON-FORCING', [
				new Meaning('=7AKQm', 'HCP_PREEMPTIVE', 'ONESUITED, SKEWED')
			]
		));
		$this->addBids('4c, 4d, 4h, 4s', new SystemBid('PREEMPTIVE', 'NON-FORCING', [
				new Meaning('=7', 'HCP_PREEMPTIVE', 'ONESUITED, SKEWED')
			]
		));
	}
}
