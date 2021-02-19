<?php

namespace A3020\UserReport\Result;

use Concrete\Core\Support\Facade\Url;

class UserLastOnlineResult
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $email;

    /** @var string */
    private $date;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $date
     */
    public function __construct($id, $name, $email, $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getLink()
    {
        return URL::to('/dashboard/users/search/view/'.$this->id);
    }
}
