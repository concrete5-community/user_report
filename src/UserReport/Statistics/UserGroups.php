<?php

namespace A3020\UserReport\Statistics;

use A3020\UserReport\Result\UserGroupResult;
use Concrete\Core\Database\Connection\Connection;

class UserGroups
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

    /**
     * Get a list of page templates and how many pages each template has
     *
     * @return UserGroupResult[]
     */
    public function get()
    {
        $results = [];
        foreach ($this->getResults() as $result) {
            $results[] = new UserGroupResult(
                $result['gID'],
                $result['gName'],
                $result['numberOfUsers']
            );
        }

        return $results;
    }

    private function getResults()
    {
        return $this->db->fetchAll('
            SELECT g.gID, g.gName, COUNT(1) AS numberOfUsers FROM UserGroups ug
            INNER JOIN `Groups` g ON g.gID = ug.gID
            GROUP BY ug.gID
            ORDER BY numberOfUsers DESC
      ');
    }
}
