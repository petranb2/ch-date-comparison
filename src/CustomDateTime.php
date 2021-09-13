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

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->date . '-' . $this->month . '-' . $this->year;
    }

    /**
     * @param CustomDateTime $comparable
     * @return CustomDateTime
     * @throws Exception
     */
    public function compare(CustomDateTime $comparable): CustomDateTime
    {

        if ($this->getYear() > $comparable->getYear()) {
            echo $this->toString() . ' is greater than ' . $comparable->toString() . PHP_EOL;
            return $this;

        } elseif ($this->getYear() === $comparable->getYear()) {
            return $this->compareMonths($comparable);

        } else {
            echo $comparable->toString() . ' is greater than ' . $this->toString() . PHP_EOL;
            return $comparable;

        }
    }


    /**
     * @param CustomDateTime $comparable
     * @return CustomDateTime
     * @throws Exception
     */
    private function compareMonths(CustomDateTime $comparable): CustomDateTime
    {
        if ($this->getYear() !== $comparable->getYear()) {
            throw new Exception('Year must be equal to compare months');
        }

        if ($this->getMonth() > $comparable->getMonth()) {

            echo $this->toString() . ' is greater than ' . $comparable->toString() . PHP_EOL;
            return $this;

        } elseif ($this->getMonth() === $comparable->getMonth()) {

            return $this->compareDates($comparable);

        } else {
            echo $comparable->toString() . ' is greater than ' . $this->toString() . PHP_EOL;
            return $comparable;
        }
    }

    /**
     * @param CustomDateTime $comparable
     * @return CustomDateTime
     * @throws Exception
     */
    private function compareDates(CustomDateTime $comparable): CustomDateTime
    {
        if (($this->getYear() !== $comparable->getYear()) &&
            ($this->getMonth() !== $comparable->getMonth())) {
            throw new Exception('Year and month must be equal to compare dates');
        }

        if ($this->getDate() > $comparable->getDate()) {
            echo $this->toString() . ' is greater than ' . $comparable->toString() . PHP_EOL;
            return $this;

        } elseif ($this->getDate() === $comparable->getDate()) {
            echo $comparable->toString() . ' is equal with ' . $this->toString() . PHP_EOL;
            return $comparable;

        } else {
            echo $comparable->toString() . ' is greater than ' . $this->toString() . PHP_EOL;
            return $comparable;

        }
    }

}