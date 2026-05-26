<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../LoginService.php';
require_once __DIR__ . '/UserRepositoryStub.php';

class LoginServiceTest extends TestCase
{
    public function testLoginBerhasil()
    {
        $user = [
            'email' => 'admin@gmail.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT)
        ];

        $stub = new UserRepositoryStub($user);

        $service = new LoginService($stub);

        $this->assertTrue(
            $service->login(
                'admin@gmail.com',
                '123456'
            )
        );
    }

    public function testLoginGagal()
    {
        $user = [
            'email' => 'admin@gmail.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT)
        ];

        $stub = new UserRepositoryStub($user);

        $service = new LoginService($stub);

        $this->assertFalse(
            $service->login(
                'admin@gmail.com',
                'salah'
            )
        );
    }
}