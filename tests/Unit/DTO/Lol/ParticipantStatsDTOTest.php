<?php

declare(strict_types=1);

namespace Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\DTO\Lol\ParticipantStatsDTO;

final class ParticipantStatsDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'participantId' => 2,
            'win' => true,
            'item0' => 1401,
            'item1' => 3001,
            'item2' => 3117,
            'item3' => 3075,
            'item4' => 3742,
            'item5' => 3110,
            'item6' => 3340,
            'kills' => 8,
            'deaths' => 9,
            'assists' => 15,
            'largestKillingSpree' => 3,
            'largestMultiKill' => 1,
            'killingSprees' => 2,
            'longestTimeSpentLiving' => 842,
            'doubleKills' => 0,
            'tripleKills' => 0,
            'quadraKills' => 0,
            'pentaKills' => 0,
            'unrealKills' => 0,
            'totalDamageDealt' => 197290,
            'magicDamageDealt' => 140899,
            'physicalDamageDealt' => 43505,
            'trueDamageDealt' => 12884,
            'largestCriticalStrike' => 55,
            'totalDamageDealtToChampions' => 21165,
            'magicDamageDealtToChampions' => 16002,
            'physicalDamageDealtToChampions' => 3123,
            'trueDamageDealtToChampions' => 2039,
            'totalHeal' => 12240,
            'totalUnitsHealed' => 4,
            'damageSelfMitigated' => 75109,
            'damageDealtToObjectives' => 13459,
            'damageDealtToTurrets' => 1517,
            'visionScore' => 25,
            'timeCCingOthers' => 48,
            'totalDamageTaken' => 50566,
            'magicalDamageTaken' => 20893,
            'physicalDamageTaken' => 24500,
            'trueDamageTaken' => 5172,
            'goldEarned' => 15747,
            'goldSpent' => 15150,
            'turretKills' => 1,
            'inhibitorKills' => 0,
            'totalMinionsKilled' => 40,
            'neutralMinionsKilled' => 155,
            'neutralMinionsKilledTeamJungle' => 110,
            'neutralMinionsKilledEnemyJungle' => 8,
            'totalTimeCrowdControlDealt' => 949,
            'champLevel' => 18,
            'visionWardsBoughtInGame' => 0,
            'sightWardsBoughtInGame' => 0,
            'wardsPlaced' => 10,
            'wardsKilled' => 2,
            'firstBloodKill' => false,
            'firstBloodAssist' => false,
            'firstTowerKill' => false,
            'firstTowerAssist' => false,
            'firstInhibitorKill' => false,
            'firstInhibitorAssist' => true,
            'combatPlayerScore' => 0,
            'objectivePlayerScore' => 0,
            'totalPlayerScore' => 0,
            'totalScoreRank' => 0,
            'playerScore0' => 0,
            'playerScore1' => 0,
            'playerScore2' => 0,
            'playerScore3' => 0,
            'playerScore4' => 0,
            'playerScore5' => 0,
            'playerScore6' => 0,
            'playerScore7' => 0,
            'playerScore8' => 0,
            'playerScore9' => 0,
            'perk0' => 8439,
            'perk0Var1' => 1409,
            'perk0Var2' => 0,
            'perk0Var3' => 0,
            'perk1' => 8463,
            'perk1Var1' => 756,
            'perk1Var2' => 0,
            'perk1Var3' => 0,
            'perk2' => 8429,
            'perk2Var1' => 70,
            'perk2Var2' => 30,
            'perk2Var3' => 15,
            'perk3' => 8242,
            'perk3Var1' => 95,
            'perk3Var2' => 0,
            'perk3Var3' => 0,
            'perk4' => 9111,
            'perk4Var1' => 1435,
            'perk4Var2' => 460,
            'perk4Var3' => 0,
            'perk5' => 9104,
            'perk5Var1' => 15,
            'perk5Var2' => 50,
            'perk5Var3' => 0,
            'perkPrimaryStyle' => 8400,
            'perkSubStyle' => 8000,
            'statPerk0' => 5005,
            'statPerk1' => 5002,
            'statPerk2' => 5002,
        ];
        $object = ParticipantStatsDTO::createFromArray($data);
        self::assertSame(2, $object->getParticipantId());
        self::assertTrue($object->isWin());
        self::assertSame(1401, $object->getItem0());
        self::assertSame(3001, $object->getItem1());
        self::assertSame(3117, $object->getItem2());
        self::assertSame(3075, $object->getItem3());
        self::assertSame(3742, $object->getItem4());
        self::assertSame(3110, $object->getItem5());
        self::assertSame(3340, $object->getItem6());
        self::assertSame(8, $object->getKills());
        self::assertSame(9, $object->getDeaths());
        self::assertSame(15, $object->getAssists());
        self::assertSame(3, $object->getLargestKillingSpree());
        self::assertSame(1, $object->getLargestMultiKill());
        self::assertSame(2, $object->getKillingSprees());
        self::assertSame(842, $object->getLongestTimeSpentLiving());
        self::assertSame(0, $object->getDoubleKills());
        self::assertSame(0, $object->getTripleKills());
        self::assertSame(0, $object->getQuadraKills());
        self::assertSame(0, $object->getPentaKills());
        self::assertSame(0, $object->getUnrealKills());
        self::assertSame(197290, $object->getTotalDamageDealt());
        self::assertSame(140899, $object->getMagicDamageDealt());
        self::assertSame(43505, $object->getPhysicalDamageDealt());
        self::assertSame(12884, $object->getTrueDamageDealt());
        self::assertSame(55, $object->getLargestCriticalStrike());
        self::assertSame(21165, $object->getTotalDamageDealtToChampions());
        self::assertSame(16002, $object->getMagicDamageDealtToChampions());
        self::assertSame(3123, $object->getPhysicalDamageDealtToChampions());
        self::assertSame(2039, $object->getTrueDamageDealtToChampions());
        self::assertSame(12240, $object->getTotalHeal());
        self::assertSame(4, $object->getTotalUnitsHealed());
        self::assertSame(75109, $object->getDamageSelfMitigated());
        self::assertSame(13459, $object->getDamageDealtToObjectives());
        self::assertSame(1517, $object->getDamageDealtToTurrets());
        self::assertSame(25, $object->getVisionScore());
        self::assertSame(48, $object->getTimeCCingOthers());
        self::assertSame(50566, $object->getTotalDamageTaken());
        self::assertSame(20893, $object->getMagicalDamageTaken());
        self::assertSame(24500, $object->getPhysicalDamageTaken());
        self::assertSame(5172, $object->getTrueDamageTaken());
        self::assertSame(15747, $object->getGoldEarned());
        self::assertSame(15150, $object->getGoldSpent());
        self::assertSame(1, $object->getTurretKills());
        self::assertSame(0, $object->getInhibitorKills());
        self::assertSame(40, $object->getTotalMinionsKilled());
        self::assertSame(155, $object->getNeutralMinionsKilled());
        self::assertSame(110, $object->getNeutralMinionsKilledTeamJungle());
        self::assertSame(8, $object->getNeutralMinionsKilledEnemyJungle());
        self::assertSame(949, $object->getTotalTimeCrowdControlDealt());
        self::assertSame(18, $object->getChampLevel());
        self::assertSame(0, $object->getVisionWardsBoughtInGame());
        self::assertSame(0, $object->getSightWardsBoughtInGame());
        self::assertSame(10, $object->getWardsPlaced());
        self::assertSame(2, $object->getWardsKilled());
        self::assertFalse($object->isFirstBloodKill());
        self::assertFalse($object->isFirstBloodAssist());
        self::assertFalse($object->isFirstTowerKill());
        self::assertFalse($object->isFirstTowerAssist());
        self::assertFalse($object->isFirstInhibitorKill());
        self::assertTrue($object->isFirstInhibitorAssist());
        self::assertSame(0, $object->getCombatPlayerScore());
        self::assertSame(0, $object->getObjectivePlayerScore());
        self::assertSame(0, $object->getTotalPlayerScore());
        self::assertSame(0, $object->getTotalScoreRank());
        self::assertSame(0, $object->getPlayerScore0());
        self::assertSame(0, $object->getPlayerScore1());
        self::assertSame(0, $object->getPlayerScore2());
        self::assertSame(0, $object->getPlayerScore3());
        self::assertSame(0, $object->getPlayerScore4());
        self::assertSame(0, $object->getPlayerScore5());
        self::assertSame(0, $object->getPlayerScore6());
        self::assertSame(0, $object->getPlayerScore7());
        self::assertSame(0, $object->getPlayerScore8());
        self::assertSame(0, $object->getPlayerScore9());
        self::assertSame(8439, $object->getPerk0());
        self::assertSame(1409, $object->getPerk0Var1());
        self::assertSame(0, $object->getPerk0Var2());
        self::assertSame(0, $object->getPerk0Var3());
        self::assertSame(8463, $object->getPerk1());
        self::assertSame(756, $object->getPerk1Var1());
        self::assertSame(0, $object->getPerk1Var2());
        self::assertSame(0, $object->getPerk1Var3());
        self::assertSame(8429, $object->getPerk2());
        self::assertSame(70, $object->getPerk2Var1());
        self::assertSame(30, $object->getPerk2Var2());
        self::assertSame(15, $object->getPerk2Var3());
        self::assertSame(8242, $object->getPerk3());
        self::assertSame(95, $object->getPerk3Var1());
        self::assertSame(0, $object->getPerk3Var2());
        self::assertSame(0, $object->getPerk3Var3());
        self::assertSame(9111, $object->getPerk4());
        self::assertSame(1435, $object->getPerk4Var1());
        self::assertSame(460, $object->getPerk4Var2());
        self::assertSame(0, $object->getPerk4Var3());
        self::assertSame(9104, $object->getPerk5());
        self::assertSame(15, $object->getPerk5Var1());
        self::assertSame(50, $object->getPerk5Var2());
        self::assertSame(0, $object->getPerk5Var3());
        self::assertSame(8400, $object->getPerkPrimaryStyle());
        self::assertSame(8000, $object->getPerkSubStyle());
        self::assertSame(5005, $object->getStatPerk0());
        self::assertSame(5002, $object->getStatPerk1());
        self::assertSame(5002, $object->getStatPerk2());
        self::assertNull($object->getNodeNeutralizeAssist());
        self::assertNull($object->getNodeNeutralize());
        self::assertNull($object->getNodeCapture());
        self::assertNull($object->getNodeCaptureAssist());
        self::assertNull($object->getTeamObjective());
        self::assertNull($object->getAltarsNeutralized());
        self::assertNull($object->getAltarsCaptured());
    }
}
