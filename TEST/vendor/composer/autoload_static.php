<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9d0889a63b35c498aef40e909fbab348
{
    public static $prefixesPsr0 = array (
        'b' => 
        array (
            'bbs\\' => 
            array (
                0 => __DIR__ . '/../..' . '/../BBS/src/bbs',
            ),
        ),
    );

    public static $fallbackDirsPsr0 = array (
        0 => __DIR__ . '/../..' . '/src',
        1 => 'c:/Users/Flip/PhpstormProjects/BridgeBiddingService/TEST/tests',
    );

    public static $classMap = array (
        'bbs\\Bid' => __DIR__ . '/../..' . '/../BBS/src/bbs/Bid.php',
        'bbs\\BiddingSequence' => __DIR__ . '/../..' . '/../BBS/src/bbs/BiddingSequence.php',
        'bbs\\BiddingSystem' => __DIR__ . '/../..' . '/../BBS/src/bbs/BiddingSystem.php',
        'bbs\\Board' => __DIR__ . '/../..' . '/../BBS/src/bbs/Board.php',
        'bbs\\BridgeBiddingService' => __DIR__ . '/../..' . '/../BBS/src/bbs/BridgeBiddingService.php',
        'bbs\\DeBolleHarten' => __DIR__ . '/../..' . '/../BBS/src/bbs/DeBolleHarten.php',
        'bbs\\DeBolleHartenOpeningBids' => __DIR__ . '/../..' . '/../BBS/src/bbs/DeBolleHartenOpeningBids.php',
        'bbs\\Deal' => __DIR__ . '/../..' . '/../BBS/src/bbs/Deal.php',
        'bbs\\Expert' => __DIR__ . '/../..' . '/../BBS/src/bbs/Expert.php',
        'bbs\\Gadget' => __DIR__ . '/../..' . '/../BBS/src/bbs/Gadget.php',
        'bbs\\Hand' => __DIR__ . '/../..' . '/../BBS/src/bbs/Hand.php',
        'bbs\\HumanPlayer' => __DIR__ . '/../..' . '/../BBS/src/bbs/HumanPlayer.php',
        'bbs\\MatchOnDistribution' => __DIR__ . '/../..' . '/../BBS/src/bbs/MatchOnDistribution.php',
        'bbs\\MatchOnHCP' => __DIR__ . '/../..' . '/../BBS/src/bbs/MatchOnHCP.php',
        'bbs\\MatchOnMHCP' => __DIR__ . '/../..' . '/../BBS/src/bbs/MatchOnMHCP.php',
        'bbs\\MatchOnShape' => __DIR__ . '/../..' . '/../BBS/src/bbs/MatchOnShape.php',
        'bbs\\MatchOnSuit' => __DIR__ . '/../..' . '/../BBS/src/bbs/MatchOnSuit.php',
        'bbs\\Matcher' => __DIR__ . '/../..' . '/../BBS/src/bbs/Match.php',
        'bbs\\Meaning' => __DIR__ . '/../..' . '/../BBS/src/bbs/Meaning.php',
        'bbs\\MultiBid' => __DIR__ . '/../..' . '/../BBS/src/bbs/MultiBid.php',
        'bbs\\OpeningBids' => __DIR__ . '/../..' . '/../BBS/src/bbs/OpeningBids.php',
        'bbs\\Pair' => __DIR__ . '/../..' . '/../BBS/src/bbs/Pair.php',
        'bbs\\Pass' => __DIR__ . '/../..' . '/../BBS/src/bbs/Pass.php',
        'bbs\\Player' => __DIR__ . '/../..' . '/../BBS/src/bbs/Player.php',
        'bbs\\RandomDeal' => __DIR__ . '/../..' . '/../BBS/src/bbs/RandomDeal.php',
        'bbs\\RobotPlayer' => __DIR__ . '/../..' . '/../BBS/src/bbs/RobotPlayer.php',
        'bbs\\SingleBid' => __DIR__ . '/../..' . '/../BBS/src/bbs/SingleBid.php',
        'bbs\\SuitQuality' => __DIR__ . '/../..' . '/../BBS/src/bbs/SuitQuality.php',
        'bbs\\SystemBid' => __DIR__ . '/../..' . '/../BBS/src/bbs/SystemBid.php',
        'bbs\\SystemBids' => __DIR__ . '/../..' . '/../BBS/src/bbs/SystemBids.php',
        'bbs\\SystemCard' => __DIR__ . '/../..' . '/../BBS/src/bbs/SystemCard.php',
        'bbs\\hasName' => __DIR__ . '/../..' . '/../BBS/src/bbs/hasName.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit9d0889a63b35c498aef40e909fbab348::$prefixesPsr0;
            $loader->fallbackDirsPsr0 = ComposerStaticInit9d0889a63b35c498aef40e909fbab348::$fallbackDirsPsr0;
            $loader->classMap = ComposerStaticInit9d0889a63b35c498aef40e909fbab348::$classMap;

        }, null, ClassLoader::class);
    }
}
