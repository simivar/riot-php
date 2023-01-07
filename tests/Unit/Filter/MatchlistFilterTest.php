<?php

declare(strict_types=1);

namespace Unit\Filter;

use PHPUnit\Framework\TestCase;
use Riot\Filter\MatchlistFilter;

final class MatchlistFilterTest extends TestCase
{
    private MatchlistFilter $matchlistFilter;

    public function setUp(): void
    {
        $this->matchlistFilter = new MatchlistFilter();
    }

    /**
     * @dataProvider provideNonIntegerValues
     * @dataProvider provideAssocArray
     *
     * @param mixed $value
     */
    public function testSetQueueThrowsExceptionOnNonIntegerValue($value): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->matchlistFilter->setQueue($value);
    }

    public function testSetEndTimeThrowsExceptionWhenLowerThanStartTime(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected endTime (5) to have a value greater than startTime (10).');

        $this->matchlistFilter->setStartTime(10);
        $this->matchlistFilter->setEndTime(5);
    }

    public function testSetEndTimeThrowsExceptionWhenDifferenceGreaterThanOneWeek(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Difference between startTime and endTime must be less than or equal to 604800000. Got: 604800001');

        $this->matchlistFilter->setStartTime(1);
        $this->matchlistFilter->setEndTime(604800002);
    }

    public function testEndTimeIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setEndTime(5);
        self::assertSame('endTime=5', $this->matchlistFilter->getAsHttpQuery());
    }

    public function testSetBeginTimeThrowsExceptionWhenLowerThanStartTime(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected endTime (5) to have a value greater than startTime (10).');

        $this->matchlistFilter->setEndTime(5);
        $this->matchlistFilter->setStartTime(10);
    }

    public function testSetBeginTimeThrowsExceptionWhenDifferenceGreaterThanOneWeek(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Difference between startTime and endTime must be less than or equal to 604800000. Got: 604800001');

        $this->matchlistFilter->setEndTime(604800002);
        $this->matchlistFilter->setStartTime(1);
    }

    public function testBeginTimeIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setStartTime(5);
        self::assertSame('startTime=5', $this->matchlistFilter->getAsHttpQuery());
    }

    public function testCountIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setCount(5);
        self::assertSame('count=5', $this->matchlistFilter->getAsHttpQuery());
    }

    public function testStartIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setStart(5);
        self::assertSame('start=5', $this->matchlistFilter->getAsHttpQuery());
    }

    public function testGetAsQueryReturnsProperString(): void
    {
        $this->matchlistFilter->setStartTime(5);
        $this->matchlistFilter->setEndTime(10);
        $this->matchlistFilter->setStart(5);
        $this->matchlistFilter->setCount(10);
        $this->matchlistFilter->setQueue([3, 4]);
        self::assertSame(
            'queue=3%2C4&endTime=10&startTime=5&count=10&start=5',
            $this->matchlistFilter->getAsHttpQuery()
        );
    }

    public function testGetAsQueryReturnsEmptyStringWhenNoSet(): void
    {
        self::assertSame('', $this->matchlistFilter->getAsHttpQuery());
    }

    /**
     * @return array<array<mixed>>
     */
    public function provideNonIntegerValues(): array
    {
        return [
            [['string']],
            [[1.2]],
            [[false]],
            [[[]]],
            [[new \stdClass()]],
        ];
    }

    /**
     * @return array<array<array<string, int>>>
     */
    public function provideAssocArray(): array
    {
        return [
            [['a' => 1]],
        ];
    }
}
