<?php

declare(strict_types=1);

namespace Riot\Filter;

use InvalidArgumentException;
use Webmozart\Assert\Assert;

class MatchlistFilter implements FilterInterface
{
    private const ONE_WEEK_IN_MILLISECONDS = 604800000;

    public const MAX_TIME_DIFFERENCE = self::ONE_WEEK_IN_MILLISECONDS;

    public const MAX_INDEX_DIFFERENCE = 100;

    /** @var array<int> */
    private array $champion;

    /** @var array<int> */
    private array $queue;

    /** @var array<int> */
    private array $season;

    private int $endTime;

    private int $beginTime;

    private int $endIndex;

    private int $beginIndex;

    /**
     * @param array<int> $champion
     *
     * @throws InvalidArgumentException
     */
    public function setChampion(array $champion): self
    {
        Assert::isList($champion);
        Assert::allInteger($champion);

        $this->champion = $champion;

        return $this;
    }

    /**
     * @param array<int> $queue
     *
     * @throws InvalidArgumentException
     */
    public function setQueue(array $queue): self
    {
        Assert::isList($queue);
        Assert::allInteger($queue);

        $this->queue = $queue;

        return $this;
    }

    /**
     * @param array<int> $season
     *
     * @throws InvalidArgumentException
     *
     * @deprecated
     */
    public function setSeason(array $season): self
    {
        Assert::isList($season);
        Assert::allInteger($season);

        $this->season = $season;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setEndTime(int $miliseconds): self
    {
        if (isset($this->beginTime)) {
            $this->validateBeginAndEndTime($this->beginTime, $miliseconds);
        }
        $this->endTime = $miliseconds;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setBeginTime(int $miliseconds): self
    {
        if (isset($this->endTime)) {
            $this->validateBeginAndEndTime($miliseconds, $this->endTime);
        }
        $this->beginTime = $miliseconds;

        return $this;
    }

    public function setEndIndex(int $endIndex): self
    {
        if (isset($this->beginIndex)) {
            $this->validateBeginAndEndIndex($this->beginIndex, $endIndex);
        }

        $this->endIndex = $endIndex;

        return $this;
    }

    public function setBeginIndex(int $beginIndex): self
    {
        if (isset($this->endIndex)) {
            $this->validateBeginAndEndIndex($beginIndex, $this->endIndex);
        }
        $this->beginIndex = $beginIndex;

        return $this;
    }

    public function getAsHttpQuery(): string
    {
        $parameters = [
            'champion' => isset($this->champion) ? implode(',', $this->champion) : null,
            'queue' => isset($this->queue) ? implode(',', $this->queue) : null,
            'season' => isset($this->season) ? implode(',', $this->season) : null,
            'endTime' => $this->endTime ?? null,
            'beginTime' => $this->beginTime ?? null,
            'endIndex' => $this->endIndex ?? null,
            'beginIndex' => $this->beginIndex ?? null,
        ];

        return http_build_query($parameters);
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validateBeginAndEndTime(int $beginTime, int $endTime): void
    {
        Assert::greaterThan(
            $endTime,
            $beginTime,
            'Expected endTime (%1$s) to have a value greater than beginTime (%2$s).',
        );
        Assert::lessThanEq(
            $endTime - $beginTime,
            self::MAX_TIME_DIFFERENCE,
            'Difference between beginTime and endTime must be less than or equal to %2$s. Got: %1$s'
        );
    }

    private function validateBeginAndEndIndex(int $beginIndex, int $endIndex): void
    {
        Assert::greaterThan(
            $endIndex,
            $beginIndex,
            'Expected endIndex (%1$s) to have a value greater than beginIndex (%2$s).',
        );
        Assert::lessThanEq(
            $endIndex - $beginIndex,
            self::MAX_INDEX_DIFFERENCE,
            'Difference between beginIndex and endIndex must be less than or equal to %2$s. Got: %1$s'
        );
    }
}
