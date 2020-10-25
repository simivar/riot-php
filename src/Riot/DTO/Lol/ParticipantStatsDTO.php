<?php

declare(strict_types=1);

namespace Riot\DTO\Lol;

use Riot\DTO\DTOInterface;

final class ParticipantStatsDTO implements DTOInterface
{
    private int $item0;

    private int $item2;

    private int $totalUnitsHealed;

    private int $item1;

    private int $largestMultiKill;

    private int $goldEarned;

    private bool $firstInhibitorKill;

    private int $physicalDamageTaken;

    private ?int $nodeNeutralizeAssist;

    private int $totalPlayerScore;

    private int $champLevel;

    private int $damageDealtToObjectives;

    private int $totalDamageTaken;

    private int $neutralMinionsKilled;

    private int $deaths;

    private int $tripleKills;

    private int $magicDamageDealtToChampions;

    private int $wardsKilled;

    private int $pentaKills;

    private int $damageSelfMitigated;

    private int $largestCriticalStrike;

    private ?int $nodeNeutralize;

    private int $totalTimeCrowdControlDealt;

    private bool $firstTowerKill;

    private int $magicDamageDealt;

    private int $totalScoreRank;

    private ?int $nodeCapture;

    private int $wardsPlaced;

    private int $totalDamageDealt;

    private int $timeCCingOthers;

    private int $magicalDamageTaken;

    private int $largestKillingSpree;

    private int $totalDamageDealtToChampions;

    private int $physicalDamageDealtToChampions;

    private int $neutralMinionsKilledTeamJungle;

    private int $totalMinionsKilled;

    private bool $firstInhibitorAssist;

    private int $visionWardsBoughtInGame;

    private int $objectivePlayerScore;

    private int $kills;

    private bool $firstTowerAssist;

    private int $combatPlayerScore;

    private int $inhibitorKills;

    private int $turretKills;

    private int $participantId;

    private int $trueDamageTaken;

    private bool $firstBloodAssist;

    private ?int $nodeCaptureAssist;

    private int $assists;

    private ?int $teamObjective;

    private ?int $altarsNeutralized;

    private int $goldSpent;

    private int $damageDealtToTurrets;

    private ?int $altarsCaptured;

    private bool $win;

    private int $totalHeal;

    private int $unrealKills;

    private int $visionScore;

    private int $physicalDamageDealt;

    private bool $firstBloodKill;

    private int $longestTimeSpentLiving;

    private int $killingSprees;

    private int $sightWardsBoughtInGame;

    private int $trueDamageDealtToChampions;

    private int $neutralMinionsKilledEnemyJungle;

    private int $doubleKills;

    private int $trueDamageDealt;

    private int $quadraKills;

    private int $item4;

    private int $item3;

    private int $item6;

    private int $item5;

    private int $playerScore0;

    private int $playerScore1;

    private int $playerScore2;

    private int $playerScore3;

    private int $playerScore4;

    private int $playerScore5;

    private int $playerScore6;

    private int $playerScore7;

    private int $playerScore8;

    private int $playerScore9;

    private int $perk0;

    private int $perk0Var1;

    private int $perk0Var2;

    private int $perk0Var3;

    private int $perk1;

    private int $perk1Var1;

    private int $perk1Var2;

    private int $perk1Var3;

    private int $perk2;

    private int $perk2Var1;

    private int $perk2Var2;

    private int $perk2Var3;

    private int $perk3;

    private int $perk3Var1;

    private int $perk3Var2;

    private int $perk3Var3;

    private int $perk4;

    private int $perk4Var1;

    private int $perk4Var2;

    private int $perk4Var3;

    private int $perk5;

    private int $perk5Var1;

    private int $perk5Var2;

    private int $perk5Var3;

    private int $perkPrimaryStyle;

    private int $perkSubStyle;

    private int $statPerk0;

    private int $statPerk1;

    private int $statPerk2;

    public function __construct(
        int $item0,
        int $item2,
        int $totalUnitsHealed,
        int $item1,
        int $largestMultiKill,
        int $goldEarned,
        bool $firstInhibitorKill,
        int $physicalDamageTaken,
        ?int $nodeNeutralizeAssist,
        int $totalPlayerScore,
        int $champLevel,
        int $damageDealtToObjectives,
        int $totalDamageTaken,
        int $neutralMinionsKilled,
        int $deaths,
        int $tripleKills,
        int $magicDamageDealtToChampions,
        int $wardsKilled,
        int $pentaKills,
        int $damageSelfMitigated,
        int $largestCriticalStrike,
        ?int $nodeNeutralize,
        int $totalTimeCrowdControlDealt,
        bool $firstTowerKill,
        int $magicDamageDealt,
        int $totalScoreRank,
        ?int $nodeCapture,
        int $wardsPlaced,
        int $totalDamageDealt,
        int $timeCCingOthers,
        int $magicalDamageTaken,
        int $largestKillingSpree,
        int $totalDamageDealtToChampions,
        int $physicalDamageDealtToChampions,
        int $neutralMinionsKilledTeamJungle,
        int $totalMinionsKilled,
        bool $firstInhibitorAssist,
        int $visionWardsBoughtInGame,
        int $objectivePlayerScore,
        int $kills,
        bool $firstTowerAssist,
        int $combatPlayerScore,
        int $inhibitorKills,
        int $turretKills,
        int $participantId,
        int $trueDamageTaken,
        bool $firstBloodAssist,
        ?int $nodeCaptureAssist,
        int $assists,
        ?int $teamObjective,
        ?int $altarsNeutralized,
        int $goldSpent,
        int $damageDealtToTurrets,
        ?int $altarsCaptured,
        bool $win,
        int $totalHeal,
        int $unrealKills,
        int $visionScore,
        int $physicalDamageDealt,
        bool $firstBloodKill,
        int $longestTimeSpentLiving,
        int $killingSprees,
        int $sightWardsBoughtInGame,
        int $trueDamageDealtToChampions,
        int $neutralMinionsKilledEnemyJungle,
        int $doubleKills,
        int $trueDamageDealt,
        int $quadraKills,
        int $item4,
        int $item3,
        int $item6,
        int $item5,
        int $playerScore0,
        int $playerScore1,
        int $playerScore2,
        int $playerScore3,
        int $playerScore4,
        int $playerScore5,
        int $playerScore6,
        int $playerScore7,
        int $playerScore8,
        int $playerScore9,
        int $perk0,
        int $perk0Var1,
        int $perk0Var2,
        int $perk0Var3,
        int $perk1,
        int $perk1Var1,
        int $perk1Var2,
        int $perk1Var3,
        int $perk2,
        int $perk2Var1,
        int $perk2Var2,
        int $perk2Var3,
        int $perk3,
        int $perk3Var1,
        int $perk3Var2,
        int $perk3Var3,
        int $perk4,
        int $perk4Var1,
        int $perk4Var2,
        int $perk4Var3,
        int $perk5,
        int $perk5Var1,
        int $perk5Var2,
        int $perk5Var3,
        int $perkPrimaryStyle,
        int $perkSubStyle,
        int $statPerk0,
        int $statPerk1,
        int $statPerk2
    ) {
        $this->item0 = $item0;
        $this->item2 = $item2;
        $this->totalUnitsHealed = $totalUnitsHealed;
        $this->item1 = $item1;
        $this->largestMultiKill = $largestMultiKill;
        $this->goldEarned = $goldEarned;
        $this->firstInhibitorKill = $firstInhibitorKill;
        $this->physicalDamageTaken = $physicalDamageTaken;
        $this->nodeNeutralizeAssist = $nodeNeutralizeAssist;
        $this->totalPlayerScore = $totalPlayerScore;
        $this->champLevel = $champLevel;
        $this->damageDealtToObjectives = $damageDealtToObjectives;
        $this->totalDamageTaken = $totalDamageTaken;
        $this->neutralMinionsKilled = $neutralMinionsKilled;
        $this->deaths = $deaths;
        $this->tripleKills = $tripleKills;
        $this->magicDamageDealtToChampions = $magicDamageDealtToChampions;
        $this->wardsKilled = $wardsKilled;
        $this->pentaKills = $pentaKills;
        $this->damageSelfMitigated = $damageSelfMitigated;
        $this->largestCriticalStrike = $largestCriticalStrike;
        $this->nodeNeutralize = $nodeNeutralize;
        $this->totalTimeCrowdControlDealt = $totalTimeCrowdControlDealt;
        $this->firstTowerKill = $firstTowerKill;
        $this->magicDamageDealt = $magicDamageDealt;
        $this->totalScoreRank = $totalScoreRank;
        $this->nodeCapture = $nodeCapture;
        $this->wardsPlaced = $wardsPlaced;
        $this->totalDamageDealt = $totalDamageDealt;
        $this->timeCCingOthers = $timeCCingOthers;
        $this->magicalDamageTaken = $magicalDamageTaken;
        $this->largestKillingSpree = $largestKillingSpree;
        $this->totalDamageDealtToChampions = $totalDamageDealtToChampions;
        $this->physicalDamageDealtToChampions = $physicalDamageDealtToChampions;
        $this->neutralMinionsKilledTeamJungle = $neutralMinionsKilledTeamJungle;
        $this->totalMinionsKilled = $totalMinionsKilled;
        $this->firstInhibitorAssist = $firstInhibitorAssist;
        $this->visionWardsBoughtInGame = $visionWardsBoughtInGame;
        $this->objectivePlayerScore = $objectivePlayerScore;
        $this->kills = $kills;
        $this->firstTowerAssist = $firstTowerAssist;
        $this->combatPlayerScore = $combatPlayerScore;
        $this->inhibitorKills = $inhibitorKills;
        $this->turretKills = $turretKills;
        $this->participantId = $participantId;
        $this->trueDamageTaken = $trueDamageTaken;
        $this->firstBloodAssist = $firstBloodAssist;
        $this->nodeCaptureAssist = $nodeCaptureAssist;
        $this->assists = $assists;
        $this->teamObjective = $teamObjective;
        $this->altarsNeutralized = $altarsNeutralized;
        $this->goldSpent = $goldSpent;
        $this->damageDealtToTurrets = $damageDealtToTurrets;
        $this->altarsCaptured = $altarsCaptured;
        $this->win = $win;
        $this->totalHeal = $totalHeal;
        $this->unrealKills = $unrealKills;
        $this->visionScore = $visionScore;
        $this->physicalDamageDealt = $physicalDamageDealt;
        $this->firstBloodKill = $firstBloodKill;
        $this->longestTimeSpentLiving = $longestTimeSpentLiving;
        $this->killingSprees = $killingSprees;
        $this->sightWardsBoughtInGame = $sightWardsBoughtInGame;
        $this->trueDamageDealtToChampions = $trueDamageDealtToChampions;
        $this->neutralMinionsKilledEnemyJungle = $neutralMinionsKilledEnemyJungle;
        $this->doubleKills = $doubleKills;
        $this->trueDamageDealt = $trueDamageDealt;
        $this->quadraKills = $quadraKills;
        $this->item4 = $item4;
        $this->item3 = $item3;
        $this->item6 = $item6;
        $this->item5 = $item5;
        $this->playerScore0 = $playerScore0;
        $this->playerScore1 = $playerScore1;
        $this->playerScore2 = $playerScore2;
        $this->playerScore3 = $playerScore3;
        $this->playerScore4 = $playerScore4;
        $this->playerScore5 = $playerScore5;
        $this->playerScore6 = $playerScore6;
        $this->playerScore7 = $playerScore7;
        $this->playerScore8 = $playerScore8;
        $this->playerScore9 = $playerScore9;
        $this->perk0 = $perk0;
        $this->perk0Var1 = $perk0Var1;
        $this->perk0Var2 = $perk0Var2;
        $this->perk0Var3 = $perk0Var3;
        $this->perk1 = $perk1;
        $this->perk1Var1 = $perk1Var1;
        $this->perk1Var2 = $perk1Var2;
        $this->perk1Var3 = $perk1Var3;
        $this->perk2 = $perk2;
        $this->perk2Var1 = $perk2Var1;
        $this->perk2Var2 = $perk2Var2;
        $this->perk2Var3 = $perk2Var3;
        $this->perk3 = $perk3;
        $this->perk3Var1 = $perk3Var1;
        $this->perk3Var2 = $perk3Var2;
        $this->perk3Var3 = $perk3Var3;
        $this->perk4 = $perk4;
        $this->perk4Var1 = $perk4Var1;
        $this->perk4Var2 = $perk4Var2;
        $this->perk4Var3 = $perk4Var3;
        $this->perk5 = $perk5;
        $this->perk5Var1 = $perk5Var1;
        $this->perk5Var2 = $perk5Var2;
        $this->perk5Var3 = $perk5Var3;
        $this->perkPrimaryStyle = $perkPrimaryStyle;
        $this->perkSubStyle = $perkSubStyle;
        $this->statPerk0 = $statPerk0;
        $this->statPerk1 = $statPerk1;
        $this->statPerk2 = $statPerk2;
    }

    public function getItem0(): int
    {
        return $this->item0;
    }

    public function getItem2(): int
    {
        return $this->item2;
    }

    public function getTotalUnitsHealed(): int
    {
        return $this->totalUnitsHealed;
    }

    public function getItem1(): int
    {
        return $this->item1;
    }

    public function getLargestMultiKill(): int
    {
        return $this->largestMultiKill;
    }

    public function getGoldEarned(): int
    {
        return $this->goldEarned;
    }

    public function isFirstInhibitorKill(): bool
    {
        return $this->firstInhibitorKill;
    }

    public function getPhysicalDamageTaken(): int
    {
        return $this->physicalDamageTaken;
    }

    public function getNodeNeutralizeAssist(): ?int
    {
        return $this->nodeNeutralizeAssist;
    }

    public function getTotalPlayerScore(): int
    {
        return $this->totalPlayerScore;
    }

    public function getChampLevel(): int
    {
        return $this->champLevel;
    }

    public function getDamageDealtToObjectives(): int
    {
        return $this->damageDealtToObjectives;
    }

    public function getTotalDamageTaken(): int
    {
        return $this->totalDamageTaken;
    }

    public function getNeutralMinionsKilled(): int
    {
        return $this->neutralMinionsKilled;
    }

    public function getDeaths(): int
    {
        return $this->deaths;
    }

    public function getTripleKills(): int
    {
        return $this->tripleKills;
    }

    public function getMagicDamageDealtToChampions(): int
    {
        return $this->magicDamageDealtToChampions;
    }

    public function getWardsKilled(): int
    {
        return $this->wardsKilled;
    }

    public function getPentaKills(): int
    {
        return $this->pentaKills;
    }

    public function getDamageSelfMitigated(): int
    {
        return $this->damageSelfMitigated;
    }

    public function getLargestCriticalStrike(): int
    {
        return $this->largestCriticalStrike;
    }

    public function getNodeNeutralize(): ?int
    {
        return $this->nodeNeutralize;
    }

    public function getTotalTimeCrowdControlDealt(): int
    {
        return $this->totalTimeCrowdControlDealt;
    }

    public function isFirstTowerKill(): bool
    {
        return $this->firstTowerKill;
    }

    public function getMagicDamageDealt(): int
    {
        return $this->magicDamageDealt;
    }

    public function getTotalScoreRank(): int
    {
        return $this->totalScoreRank;
    }

    public function getNodeCapture(): ?int
    {
        return $this->nodeCapture;
    }

    public function getWardsPlaced(): int
    {
        return $this->wardsPlaced;
    }

    public function getTotalDamageDealt(): int
    {
        return $this->totalDamageDealt;
    }

    public function getTimeCCingOthers(): int
    {
        return $this->timeCCingOthers;
    }

    public function getMagicalDamageTaken(): int
    {
        return $this->magicalDamageTaken;
    }

    public function getLargestKillingSpree(): int
    {
        return $this->largestKillingSpree;
    }

    public function getTotalDamageDealtToChampions(): int
    {
        return $this->totalDamageDealtToChampions;
    }

    public function getPhysicalDamageDealtToChampions(): int
    {
        return $this->physicalDamageDealtToChampions;
    }

    public function getNeutralMinionsKilledTeamJungle(): int
    {
        return $this->neutralMinionsKilledTeamJungle;
    }

    public function getTotalMinionsKilled(): int
    {
        return $this->totalMinionsKilled;
    }

    public function isFirstInhibitorAssist(): bool
    {
        return $this->firstInhibitorAssist;
    }

    public function getVisionWardsBoughtInGame(): int
    {
        return $this->visionWardsBoughtInGame;
    }

    public function getObjectivePlayerScore(): int
    {
        return $this->objectivePlayerScore;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function isFirstTowerAssist(): bool
    {
        return $this->firstTowerAssist;
    }

    public function getCombatPlayerScore(): int
    {
        return $this->combatPlayerScore;
    }

    public function getInhibitorKills(): int
    {
        return $this->inhibitorKills;
    }

    public function getTurretKills(): int
    {
        return $this->turretKills;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getTrueDamageTaken(): int
    {
        return $this->trueDamageTaken;
    }

    public function isFirstBloodAssist(): bool
    {
        return $this->firstBloodAssist;
    }

    public function getNodeCaptureAssist(): ?int
    {
        return $this->nodeCaptureAssist;
    }

    public function getAssists(): int
    {
        return $this->assists;
    }

    public function getTeamObjective(): ?int
    {
        return $this->teamObjective;
    }

    public function getAltarsNeutralized(): ?int
    {
        return $this->altarsNeutralized;
    }

    public function getGoldSpent(): int
    {
        return $this->goldSpent;
    }

    public function getDamageDealtToTurrets(): int
    {
        return $this->damageDealtToTurrets;
    }

    public function getAltarsCaptured(): ?int
    {
        return $this->altarsCaptured;
    }

    public function isWin(): bool
    {
        return $this->win;
    }

    public function getTotalHeal(): int
    {
        return $this->totalHeal;
    }

    public function getUnrealKills(): int
    {
        return $this->unrealKills;
    }

    public function getVisionScore(): int
    {
        return $this->visionScore;
    }

    public function getPhysicalDamageDealt(): int
    {
        return $this->physicalDamageDealt;
    }

    public function isFirstBloodKill(): bool
    {
        return $this->firstBloodKill;
    }

    public function getLongestTimeSpentLiving(): int
    {
        return $this->longestTimeSpentLiving;
    }

    public function getKillingSprees(): int
    {
        return $this->killingSprees;
    }

    public function getSightWardsBoughtInGame(): int
    {
        return $this->sightWardsBoughtInGame;
    }

    public function getTrueDamageDealtToChampions(): int
    {
        return $this->trueDamageDealtToChampions;
    }

    public function getNeutralMinionsKilledEnemyJungle(): int
    {
        return $this->neutralMinionsKilledEnemyJungle;
    }

    public function getDoubleKills(): int
    {
        return $this->doubleKills;
    }

    public function getTrueDamageDealt(): int
    {
        return $this->trueDamageDealt;
    }

    public function getQuadraKills(): int
    {
        return $this->quadraKills;
    }

    public function getItem4(): int
    {
        return $this->item4;
    }

    public function getItem3(): int
    {
        return $this->item3;
    }

    public function getItem6(): int
    {
        return $this->item6;
    }

    public function getItem5(): int
    {
        return $this->item5;
    }

    public function getPlayerScore0(): int
    {
        return $this->playerScore0;
    }

    public function getPlayerScore1(): int
    {
        return $this->playerScore1;
    }

    public function getPlayerScore2(): int
    {
        return $this->playerScore2;
    }

    public function getPlayerScore3(): int
    {
        return $this->playerScore3;
    }

    public function getPlayerScore4(): int
    {
        return $this->playerScore4;
    }

    public function getPlayerScore5(): int
    {
        return $this->playerScore5;
    }

    public function getPlayerScore6(): int
    {
        return $this->playerScore6;
    }

    public function getPlayerScore7(): int
    {
        return $this->playerScore7;
    }

    public function getPlayerScore8(): int
    {
        return $this->playerScore8;
    }

    public function getPlayerScore9(): int
    {
        return $this->playerScore9;
    }

    public function getPerk0(): int
    {
        return $this->perk0;
    }

    public function getPerk0Var1(): int
    {
        return $this->perk0Var1;
    }

    public function getPerk0Var2(): int
    {
        return $this->perk0Var2;
    }

    public function getPerk0Var3(): int
    {
        return $this->perk0Var3;
    }

    public function getPerk1(): int
    {
        return $this->perk1;
    }

    public function getPerk1Var1(): int
    {
        return $this->perk1Var1;
    }

    public function getPerk1Var2(): int
    {
        return $this->perk1Var2;
    }

    public function getPerk1Var3(): int
    {
        return $this->perk1Var3;
    }

    public function getPerk2(): int
    {
        return $this->perk2;
    }

    public function getPerk2Var1(): int
    {
        return $this->perk2Var1;
    }

    public function getPerk2Var2(): int
    {
        return $this->perk2Var2;
    }

    public function getPerk2Var3(): int
    {
        return $this->perk2Var3;
    }

    public function getPerk3(): int
    {
        return $this->perk3;
    }

    public function getPerk3Var1(): int
    {
        return $this->perk3Var1;
    }

    public function getPerk3Var2(): int
    {
        return $this->perk3Var2;
    }

    public function getPerk3Var3(): int
    {
        return $this->perk3Var3;
    }

    public function getPerk4(): int
    {
        return $this->perk4;
    }

    public function getPerk4Var1(): int
    {
        return $this->perk4Var1;
    }

    public function getPerk4Var2(): int
    {
        return $this->perk4Var2;
    }

    public function getPerk4Var3(): int
    {
        return $this->perk4Var3;
    }

    public function getPerk5(): int
    {
        return $this->perk5;
    }

    public function getPerk5Var1(): int
    {
        return $this->perk5Var1;
    }

    public function getPerk5Var2(): int
    {
        return $this->perk5Var2;
    }

    public function getPerk5Var3(): int
    {
        return $this->perk5Var3;
    }

    public function getPerkPrimaryStyle(): int
    {
        return $this->perkPrimaryStyle;
    }

    public function getPerkSubStyle(): int
    {
        return $this->perkSubStyle;
    }

    public function getStatPerk0(): int
    {
        return $this->statPerk0;
    }

    public function getStatPerk1(): int
    {
        return $this->statPerk1;
    }

    public function getStatPerk2(): int
    {
        return $this->statPerk2;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['item0'],
            $data['item2'],
            $data['totalUnitsHealed'],
            $data['item1'],
            $data['largestMultiKill'],
            $data['goldEarned'],
            $data['firstInhibitorKill'],
            $data['physicalDamageTaken'],
            $data['nodeNeutralizeAssist'] ?? null,
            $data['totalPlayerScore'],
            $data['champLevel'],
            $data['damageDealtToObjectives'],
            $data['totalDamageTaken'],
            $data['neutralMinionsKilled'],
            $data['deaths'],
            $data['tripleKills'],
            $data['magicDamageDealtToChampions'],
            $data['wardsKilled'],
            $data['pentaKills'],
            $data['damageSelfMitigated'],
            $data['largestCriticalStrike'],
            $data['nodeNeutralize'] ?? null,
            $data['totalTimeCrowdControlDealt'],
            $data['firstTowerKill'],
            $data['magicDamageDealt'],
            $data['totalScoreRank'],
            $data['nodeCapture'] ?? null,
            $data['wardsPlaced'],
            $data['totalDamageDealt'],
            $data['timeCCingOthers'],
            $data['magicalDamageTaken'],
            $data['largestKillingSpree'],
            $data['totalDamageDealtToChampions'],
            $data['physicalDamageDealtToChampions'],
            $data['neutralMinionsKilledTeamJungle'],
            $data['totalMinionsKilled'],
            $data['firstInhibitorAssist'],
            $data['visionWardsBoughtInGame'],
            $data['objectivePlayerScore'],
            $data['kills'],
            $data['firstTowerAssist'],
            $data['combatPlayerScore'],
            $data['inhibitorKills'],
            $data['turretKills'],
            $data['participantId'],
            $data['trueDamageTaken'],
            $data['firstBloodAssist'],
            $data['nodeCaptureAssist'] ?? null,
            $data['assists'],
            $data['teamObjective'] ?? null,
            $data['altarsNeutralized'] ?? null,
            $data['goldSpent'],
            $data['damageDealtToTurrets'],
            $data['altarsCaptured'] ?? null,
            $data['win'],
            $data['totalHeal'],
            $data['unrealKills'],
            $data['visionScore'],
            $data['physicalDamageDealt'],
            $data['firstBloodKill'],
            $data['longestTimeSpentLiving'],
            $data['killingSprees'],
            $data['sightWardsBoughtInGame'],
            $data['trueDamageDealtToChampions'],
            $data['neutralMinionsKilledEnemyJungle'],
            $data['doubleKills'],
            $data['trueDamageDealt'],
            $data['quadraKills'],
            $data['item4'],
            $data['item3'],
            $data['item6'],
            $data['item5'],
            $data['playerScore0'],
            $data['playerScore1'],
            $data['playerScore2'],
            $data['playerScore3'],
            $data['playerScore4'],
            $data['playerScore5'],
            $data['playerScore6'],
            $data['playerScore7'],
            $data['playerScore8'],
            $data['playerScore9'],
            $data['perk0'],
            $data['perk0Var1'],
            $data['perk0Var2'],
            $data['perk0Var3'],
            $data['perk1'],
            $data['perk1Var1'],
            $data['perk1Var2'],
            $data['perk1Var3'],
            $data['perk2'],
            $data['perk2Var1'],
            $data['perk2Var2'],
            $data['perk2Var3'],
            $data['perk3'],
            $data['perk3Var1'],
            $data['perk3Var2'],
            $data['perk3Var3'],
            $data['perk4'],
            $data['perk4Var1'],
            $data['perk4Var2'],
            $data['perk4Var3'],
            $data['perk5'],
            $data['perk5Var1'],
            $data['perk5Var2'],
            $data['perk5Var3'],
            $data['perkPrimaryStyle'],
            $data['perkSubStyle'],
            $data['statPerk0'],
            $data['statPerk1'],
            $data['statPerk2'],
        );
    }
}
