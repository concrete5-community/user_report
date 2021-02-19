<?php

namespace A3020\UserReport\Statistics;

use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Database\Connection\Connection;

class General
{
    /**
     * @var Connection
     */
    private $db;

    /**
     * @var Repository
     */
    private $config;

    public function __construct(Connection $db, Repository $config)
    {
        $this->db = $db;
        $this->config = $config;
    }

    public function getTotalUsers()
    {
        return (int) $this->db->fetchColumn('SELECT COUNT(1) FROM Users');
    }

    public function getTotalActive()
    {
        return (int) $this->db->fetchColumn('SELECT COUNT(1) FROM Users WHERE uIsActive = 1');
    }

    public function getTotalInActive()
    {
        return (int) $this->db->fetchColumn('SELECT COUNT(1) FROM Users WHERE uIsActive = 0');
    }

    public function getTotalValidated()
    {
        return (int) $this->db->fetchColumn('SELECT COUNT(1) FROM Users WHERE uIsValidated = 1');
    }

    public function getTotalNotValidated()
    {
        return (int) $this->db->fetchColumn('SELECT COUNT(1) FROM Users WHERE uIsValidated = 0');
    }

    public function getTotalGroups()
    {
        return (int) $this->db->fetchColumn('SELECT COUNT(1) FROM `Groups`');
    }

    public function getTotalGroupSets()
    {
        return (int) $this->db->fetchColumn('SELECT COUNT(1) FROM GroupSets');
    }
}
