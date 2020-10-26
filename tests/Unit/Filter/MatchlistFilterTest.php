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
    public function testSetChampionThrowsExceptionOnNonIntegerValue($value): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->matchlistFilter->setChampion($value);
    }

    public function testChampionIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setChampion([21, 18]);
        self::assertSame('champion=21%2C18', $this->matchlistFilter->getAsHttpQuery());
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

    /**
     * @dataProvider provideNonIntegerValues
     * @dataProvider provideAssocArray
     *
     * @param mixed $value
     */
    public function testSetSeasonThrowsExceptionOnNonIntegerValue($value): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->matchlistFilter->setSeason($value);
    }

    public function testSeasonIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setSeason([12, 13]);
        self::assertSame('season=12%2C13', $this->matchlistFilter->getAsHttpQuery());
    }

    public function testSetEndTimeThrowsExceptionWhenLowerThanStartTime(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected endTime (5) to have a value greater than beginTime (10).');

        $this->matchlistFilter->setBeginTime(10);
        $this->matchlistFilter->setEndTime(5);
    }

    public function testSetEndTimeThrowsExceptionWhenDifferenceGreaterThanOneWeek(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Difference between beginTime and endTime must be less than or equal to 604800000. Got: 604800001');

        $this->matchlistFilter->setBeginTime(1);
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
        $this->expectExceptionMessage('Expected endTime (5) to have a value greater than beginTime (10).');

        $this->matchlistFilter->setEndTime(5);
        $this->matchlistFilter->setBeginTime(10);
    }

    public function testSetBeginTimeThrowsExceptionWhenDifferenceGreaterThanOneWeek(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Difference between beginTime and endTime must be less than or equal to 604800000. Got: 604800001');

        $this->matchlistFilter->setEndTime(604800002);
        $this->matchlistFilter->setBeginTime(1);
    }

    public function testBeginTimeIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setBeginTime(5);
        self::assertSame('beginTime=5', $this->matchlistFilter->getAsHttpQuery());
    }

    public function testSetEndIndexThrowsExceptionWhenLowerThanStartIndex(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected endIndex (5) to have a value greater than beginIndex (10).');

        $this->matchlistFilter->setBeginIndex(10);
        $this->matchlistFilter->setEndIndex(5);
    }

    public function testSetEndIndexThrowsExceptionWhenDifferenceGreaterThanOneWeek(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Difference between beginIndex and endIndex must be less than or equal to 100. Got: 101');

        $this->matchlistFilter->setBeginIndex(1);
        $this->matchlistFilter->setEndIndex(102);
    }

    public function testEndIndexIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setEndIndex(5);
        self::assertSame('endIndex=5', $this->matchlistFilter->getAsHttpQuery());
    }

    public function testSetBeginIndexThrowsExceptionWhenLowerThanStartIndex(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected endIndex (5) to have a value greater than beginIndex (10).');

        $this->matchlistFilter->setEndIndex(5);
        $this->matchlistFilter->setBeginIndex(10);
    }

    public function testSetBeginIndexThrowsExceptionWhenDifferenceGreaterThanOneWeek(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Difference between beginIndex and endIndex must be less than or equal to 100. Got: 101');

        $this->matchlistFilter->setEndIndex(102);
        $this->matchlistFilter->setBeginIndex(1);
    }

    public function testBeginIndexIsReturnedInQuery(): void
    {
        $this->matchlistFilter->setBeginIndex(5);
        self::assertSame('beginIndex=5', $this->matchlistFilter->getAsHttpQuery());
    }

    public function testGetAsQueryReturnsProperString(): void
    {
        $this->matchlistFilter->setBeginTime(5);
        $this->matchlistFilter->setEndTime(10);
        $this->matchlistFilter->setBeginIndex(5);
        $this->matchlistFilter->setEndIndex(10);
        $this->matchlistFilter->setChampion([1, 2]);
        $this->matchlistFilter->setQueue([3, 4]);
        $this->matchlistFilter->setSeason([5, 6]);
        self::assertSame(
            'champion=1%2C2&queue=3%2C4&season=5%2C6&endTime=10&beginTime=5&endIndex=10&beginIndex=5',
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
