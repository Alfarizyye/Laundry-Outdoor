<?php

class LoginService
{
    private $userRepository;

    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($email, $password)
    {
        $user = $this->userRepository->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }

        return false;
    }
}