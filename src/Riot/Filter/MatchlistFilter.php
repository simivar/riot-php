<?php

declare(strict_types=1);

namespace Riot\Filter;

use InvalidArgumentException;
use Webmozart\Assert\Assert;

class MatchlistFilter implements FilterInterface
{
    private const ONE_WEEK_IN_MILLISECONDS = 604800000;
    public const MAX_TIME_DIFFERENCE = self::ONE_WEEK_IN_MILLISECONDS;
    public const MAX_COUNT = 100;
    /** @var array<int> */
    private array $queue;
    private int $type;
    private int $endTime;
    private int $startTime;
    private int $count;
    private int $start;

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
     * @throws InvalidArgumentException
     */
    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setEndTime(int $unixtimestamp): self
    {
        if (isset($this->startTime)) {
            $this->validateStartTimeAndEndTime($this->startTime, $unixtimestamp);
        }
        $this->endTime = $unixtimestamp;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setStartTime(int $unixtimestamp): self
    {
        if (isset($this->endTime)) {
            $this->validateStartTimeAndEndTime($unixtimestamp, $this->endTime);
        }
        $this->startTime = $unixtimestamp;

        return $this;
    }

    public function setCount(int $count): self
    {
        if (isset($this->start)) {
            $this->validateStartAndCount($this->start, $count);
        }

        $this->count = $count;

        return $this;
    }

    public function setStart(int $start): self
    {
        if (isset($this->count)) {
            $this->validateStartAndCount($start, $this->count);
        }
        $this->start = $start;

        return $this;
    }

    public function getAsHttpQuery(): string
    {
        $parameters = [
            'queue' => isset($this->queue) ? implode(',', $this->queue) : null,
            'type' => $this->type ?? null,
            'endTime' => $this->endTime ?? null,
            'startTime' => $this->startTime ?? null,
            'count' => $this->count ?? null,
            'start' => $this->start ?? null,
        ];

        return http_build_query($parameters);
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validateStartTimeAndEndTime(int $startTime, int $endTime): void
    {
        Assert::greaterThan(
            $endTime,
            $startTime,
            'Expected endTime (%1$s) to have a value greater than startTime (%2$s).',
        );
        Assert::lessThanEq(
            $endTime - $startTime,
            self::MAX_TIME_DIFFERENCE,
            'Difference between startTime and endTime must be less than or equal to %2$s. Got: %1$s'
        );
    }

    private function validateStartAndCount(int $start, int $count): void
    {
        Assert::greaterThan(
            $start,
            0,
            'Expected start (%1$s) to have a value greater than 0.'
        );
        Assert::greaterThan(
            $count,
            0,
            'Expected count (%1$s) to have a value greater than 0.'
        );
        Assert::lessThanEq(
            $count,
            self::MAX_COUNT,
            'Difference between beginIndex and endIndex must be less than or equal to %2$s. Got: %1$s'
        );
    }
}
