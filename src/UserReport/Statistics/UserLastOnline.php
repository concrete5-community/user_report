<?php

namespace A3020\UserReport\Statistics;

use A3020\UserReport\Result\UserLastOnlineResult;
use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Database\Connection\Connection;

class UserLastOnline
{
    /** @var Connection */
    private $db;

    /** @var Repository */
    private $config;

    /**
     * @param Connection $db
     * @param Repository $config
     */
    public function __construct(Connection $db, Repository $config)
    {
        $this->db = $db;
        $this->config = $config;
    }

    /**
     * Get a list of page templates and how many pages each template has
     *
     * @return UserLastOnlineResult[]
     */
    public function get()
    {
        $results = [];
        foreach ($this->getResults(100) as $result) {
            $results[] = new UserLastOnlineResult(
                $result['uID'],
                $result['uName'],
                $result['uEmail'],
                $result['uLastOnline']
            );
        }

        return $results;
    }

    private function getResults($limit)
    {
        return $this->db->fetchAll('SELECT uID, uName, uEmail, uLastOnline FROM Users 
          ORDER BY uLastOnline DESC
          LIMIT 0, '.$limit
        );
    }
}
