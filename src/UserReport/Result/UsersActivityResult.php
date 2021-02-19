<?php

namespace A3020\UserReport\Result;

class UsersActivityResult
{
    /** @var int */
    private $numberOfUsers;
    private $year;
    private $month;

    /**
     * @param int $numberOfUsers
     * @param string $year
     * @param string $month
     */
    public function __construct($numberOfUsers, $year, $month)
    {
        $this->numberOfUsers = $numberOfUsers;
        $this->year = $year;
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getNumberOfUsers()
    {
        return $this->numberOfUsers;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return (int) $this->year;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return (int) $this->month;
    }
}
