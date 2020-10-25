<?php

declare(strict_types=1);

namespace Unit\DTO\Lol;

use PHPUnit\Framework\TestCase;
use Riot\Collection\Lol\MasteryDTOCollection;
use Riot\Collection\Lol\RuneDTOCollection;
use Riot\DTO\Lol\ParticipantDTO;
use Riot\DTO\Lol\ParticipantStatsDTO;
use Riot\DTO\Lol\ParticipantTimelineDTO;

final class ParticipantDTOTest extends TestCase
{
    public function testCreateFromArrayCreatesProperObject(): void
    {
        $data = [
            'participantId' => 1,
            'teamId' => 100,
            'championId' => 74,
            'spell1Id' => 4,
            'spell2Id' => 21,
            'stats' => [
                'participantId' => 1,
                'win' => true,
                'item0' => 3165,
                'item1' => 3157,
                'item2' => 3285,
                'item3' => 3020,
                'item4' => 3151,
                'item5' => 0,
                'item6' => 3340,
                'kills' => 10,
                'deaths' => 15,
                'assists' => 9,
                'largestKillingSpree' => 3,
                'largestMultiKill' => 2,
                'killingSprees' => 3,
                'longestTimeSpentLiving' => 568,
                'doubleKills' => 1,
                'tripleKills' => 0,
                'quadraKills' => 0,
                'pentaKills' => 0,
                'unrealKills' => 0,
                'totalDamageDealt' => 162511,
                'magicDamageDealt' => 134989,
                'physicalDamageDealt' => 20162,
                'trueDamageDealt' => 7359,
                'largestCriticalStrike' => 0,
                'totalDamageDealtToChampions' => 45961,
                'magicDamageDealtToChampions' => 40493,
                'physicalDamageDealtToChampions' => 2596,
                'trueDamageDealtToChampions' => 2872,
                'totalHeal' => 5520,
                'totalUnitsHealed' => 1,
                'damageSelfMitigated' => 19942,
                'damageDealtToObjectives' => 9840,
                'damageDealtToTurrets' => 2910,
                'visionScore' => 20,
                'timeCCingOthers' => 35,
                'totalDamageTaken' => 37016,
                'magicalDamageTaken' => 21018,
                'physicalDamageTaken' => 14338,
                'trueDamageTaken' => 1658,
                'goldEarned' => 14093,
                'goldSpent' => 13800,
                'turretKills' => 1,
                'inhibitorKills' => 0,
                'totalMinionsKilled' => 153,
                'neutralMinionsKilled' => 12,
                'neutralMinionsKilledTeamJungle' => 4,
                'neutralMinionsKilledEnemyJungle' => 4,
                'totalTimeCrowdControlDealt' => 267,
                'champLevel' => 18,
                'visionWardsBoughtInGame' => 0,
                'sightWardsBoughtInGame' => 0,
                'wardsPlaced' => 11,
                'wardsKilled' => 0,
                'firstBloodKill' => false,
                'firstBloodAssist' => false,
                'firstTowerKill' => false,
                'firstTowerAssist' => false,
                'firstInhibitorKill' => false,
                'firstInhibitorAssist' => false,
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
                'perk0' => 8112,
                'perk0Var1' => 2752,
                'perk0Var2' => 0,
                'perk0Var3' => 0,
                'perk1' => 8126,
                'perk1Var1' => 1217,
                'perk1Var2' => 0,
                'perk1Var3' => 0,
                'perk2' => 8138,
                'perk2Var1' => 30,
                'perk2Var2' => 0,
                'perk2Var3' => 0,
                'perk3' => 8135,
                'perk3Var1' => 4388,
                'perk3Var2' => 5,
                'perk3Var3' => 0,
                'perk4' => 8009,
                'perk4Var1' => 2927,
                'perk4Var2' => 500,
                'perk4Var3' => 0,
                'perk5' => 8299,
                'perk5Var1' => 2105,
                'perk5Var2' => 0,
                'perk5Var3' => 0,
                'perkPrimaryStyle' => 8100,
                'perkSubStyle' => 8000,
                'statPerk0' => 5007,
                'statPerk1' => 5008,
                'statPerk2' => 5001,
            ],
            'timeline' => [
                'participantId' => 1,
                'creepsPerMinDeltas' => [],
                'xpPerMinDeltas' => [],
                'goldPerMinDeltas' => [],
                'csDiffPerMinDeltas' => [],
                'xpDiffPerMinDeltas' => [],
                'damageTakenPerMinDeltas' => [],
                'damageTakenDiffPerMinDeltas' => [],
                'role' => 'SOLO',
                'lane' => 'MIDDLE',
            ],
        ];
        $object = ParticipantDTO::createFromArray($data);
        self::assertSame(1, $object->getParticipantId());
        self::assertSame(100, $object->getTeamId());
        self::assertSame(74, $object->getChampionId());
        self::assertSame(4, $object->getSpell1Id());
        self::assertSame(21, $object->getSpell2Id());
        self::assertInstanceOf(ParticipantStatsDTO::class, $object->getStats());
        self::assertInstanceOf(ParticipantTimelineDTO::class, $object->getTimeline());
        self::assertInstanceOf(RuneDTOCollection::class, $object->getRunes());
        self::assertInstanceOf(MasteryDTOCollection::class, $object->getMasteries());
        self::assertNull($object->getHighestAchievedSeasonTier());
    }
}
