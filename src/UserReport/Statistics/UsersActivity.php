<?php

namespace A3020\UserReport\Statistics;

use A3020\UserReport\Result\UsersActivityResult;
use Concrete\Core\Database\Connection\Connection;

class UsersActivity
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
            if ($result['onlineYear'] == '1970') {
                continue;
            }

            $results[] = new UsersActivityResult(
                $result['numberOfUsers'],
                $result['onlineYear'],
                $result['onlineMonth']
            );
        }

        return $results;
    }

    private function getResults()
    {
        return $this->db->fetchAll("
            SELECT YEAR(FROM_UNIXTIME(u.uLastOnline)) as onlineYear, MONTH(FROM_UNIXTIME(u.uLastOnline)) as onlineMonth, COUNT(1) as numberOfUsers
            FROM Users u
            GROUP BY onlineYear, onlineMonth
            ORDER BY u.uLastOnline DESC
        ");
    }
}
