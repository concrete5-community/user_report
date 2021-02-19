<?php

namespace A3020\UserReport\Statistics;

use A3020\UserReport\Result\UserLocaleResult;
use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Database\Connection\Connection;

class UserLocales
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
     * @return UserLocaleResult[]
     */
    public function get()
    {
        $defaultLocale = $this->config->get('concrete.locale');

        $results = [];
        foreach ($this->getResults() as $result) {
            if ($result['locale'] === null) {
                $result['locale'] = t('Default').' ('.$defaultLocale.')';
            }

            $results[] = new UserLocaleResult(
                $result['locale'],
                $result['numberOfUsers']
            );
        }

        return $results;
    }

    private function getResults()
    {
        return $this->db->fetchAll('
            SELECT uDefaultLanguage as locale, COUNT(1) as numberOfUsers FROM Users
            GROUP BY uDefaultLanguage
            ORDER BY numberOfUsers DESC
      ');
    }
}
