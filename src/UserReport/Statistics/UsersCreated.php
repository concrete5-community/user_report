<?php

namespace A3020\UserReport\Statistics;

use A3020\UserReport\Result\UsersCreatedResult;
use Concrete\Core\Database\Connection\Connection;

class UsersCreated
{
    /** @var Connection */
    private $db;

    /**
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function get()
    {
        $results = [];
        foreach ($this->getResults() as $result) {
            $results[] = new UsersCreatedResult(
                $result['numberOfUsers'],
                $result['addedYear'],
                $result['addedMonth']
            );
        }

        return $results;
    }

    private function getResults()
    {
        return $this->db->fetchAll("
            SELECT DATE_FORMAT(u.uDateAdded, '%Y') as addedYear, DATE_FORMAT(u.uDateAdded, '%m') as addedMonth, COUNT(1) as numberOfUsers 
            FROM Users u
            GROUP BY YEAR(u.uDateAdded), MONTH(u.uDateAdded)
        ");
    }
}
