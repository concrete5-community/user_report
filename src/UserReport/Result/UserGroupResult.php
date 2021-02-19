<?php

namespace A3020\UserReport\Result;

use Concrete\Core\Support\Facade\Url;

class UserGroupResult
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $users;

    /**
     * @param int $id
     * @param string $name
     * @param int $users
     */
    public function __construct($id, $name, $users)
    {
        $this->id = $id;
        $this->name = $name;
        $this->users = $users;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumberOfUsers()
    {
        return (int) $this->users;
    }

    public function getLink()
    {
        return URL::to('/dashboard/users/groups/edit/'.$this->id);
    }
}
