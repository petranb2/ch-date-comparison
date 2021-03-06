<?php
declare(strict_types=1);

use App\CustomDateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class CustomDateTimeTest
 */
final class CustomDateTimeTest extends TestCase
{


    /**
     * @dataProvider invalidDatesDataProvider
     * @throws Exception
     */
    public function testShouldThrowExceptionWithInvalidData(int $year, int $month, int $date)
    {
        // Arrange - Assert
        $this->expectException(Exception::class);
        // Act - SUT
        new CustomDateTime($year, $month, $date);
    }

    /**
     * @dataProvider datesDataProvider
     * @throws Exception
     */
    public function testEqualDates(int $year, int $month, int $date): void
    {
        // Arrange (sut -> system under test)
        $sut = new CustomDateTime($year, $month, $date);
        $dateTime2 = new CustomDateTime($year, $month, $date);
        // Act
        $result = $sut->compare($dateTime2);
        // Assert
        $this->assertEquals($sut, $result);
        $this->assertEquals($dateTime2, $result);

    }

    /**
     * @dataProvider datesDataProvider
     * @throws Exception
     */
    public function testGreaterComparable(int $year, int $month, int $date): void
    {
        // Arrange (sut -> system under test)
        $sut = new CustomDateTime(2020, 10, 10);
        $dateTime2 = new CustomDateTime($year, $month, $date);
        // Act
        $result = $sut->compare($dateTime2);
        // Assert
        $this->assertEquals($dateTime2, $result);

    }

    /**
     * @dataProvider datesDataProvider
     * @throws Exception
     */
    public function testLesserComparable(int $year, int $month, int $date): void
    {
        // Arrange (sut -> system under test)
        $sut = new CustomDateTime(2050, 10, 10);
        $dateTime2 = new CustomDateTime($year, $month, $date);
        // Act
        $result = $sut->compare($dateTime2);
        // Assert
        $this->assertEquals($sut, $result);

    }

    /**
     * @return string[][]
     */
    public function datesDataProvider(): array
    {
        return [
            [2021, 5, 5],
            [2022, 6, 6],
            [2023, 7, 7],
            [2020, 10, 10],
        ];
    }

    /**
     * @return string[][]
     */
    public function invalidDatesDataProvider(): array
    {
        return [
            [2021, 50, 5],
            [2022, 6, 50],
            [2023, -1, 7],
            [20201548759, 10, 10]
        ];
    }
}