<?php

class UserRepositoryStub
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function findByEmail($email)
    {
        return $this->user;
    }
}