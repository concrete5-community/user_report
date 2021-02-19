<?php

namespace A3020\UserReport\Result;

class UserLocaleResult
{
    /** @var string */
    private $locale;

    /** @var int */
    private $users;

    /**
     * @param string $locale
     * @param int $users
     */
    public function __construct($locale, $users)
    {
        $this->locale = $locale;
        $this->users = $users;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    public function getNumberOfUsers()
    {
        return (int) $this->users;
    }
}
