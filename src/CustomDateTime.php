<?php


namespace App;

use Exception;

/**
 * Class CustomDateTime
 * @package App
 */
class CustomDateTime
{
    private int $year;

    private int $month;

    private int $date;

    /**
     * CustomDateTime constructor.
     * @param int $year
     * @param int $month
     * @param int $date
     * @throws Exception
     */
    public function __construct(int $year, int $month, int $date)
    {
        if (!checkdate($month, $date, $year)) {
            throw new Exception('[error]:: Bad args to create a CustomDateTime instance');
        }
        $this->year = $year;
        $this->month = $month;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    public function toString(): string
    {
        return $this->date . '-' . $this->month . '-' . $this->year;
    }

    /**
     * @param CustomDateTime $comparable
     * @return CustomDateTime
     */
    public function compare(CustomDateTime $comparable ): CustomDateTime
    {

        if ($this->getYear() > $comparable->getYear()) {
            echo $this->toString() . ' is greater than ' . $comparable->toString() . PHP_EOL;
            return $this;
        }

        if ($this->getMonth() > $comparable->getMonth()) {
            echo $this->toString() . ' is greater than ' . $comparable->toString() . PHP_EOL;
            return $this;
        }

        if ($this->getDate() > $comparable->getDate()) {
            echo $this->toString() . ' is greater than ' . $comparable->toString() . PHP_EOL;
            return $this;
        }

        if ($this->isDateEqual($comparable)) {
            echo $comparable->toString() . ' is equal with ' . $this->toString() . PHP_EOL;
            return $comparable;
        }

        echo $comparable->toString() . ' is greater than ' . $this->toString() . PHP_EOL;

        return $comparable;

    }

    /**
     * @param CustomDateTime $dateTime
     * @return bool
     */
    private function isDateEqual(CustomDateTime $dateTime): bool
    {
        if (($this->getYear() === $dateTime->getYear()) &&
            ($this->getMonth() === $dateTime->getMonth()) &&
            ($this->getDate() === $dateTime->getDate())) {
            return true;
        }
        return false;
    }
}