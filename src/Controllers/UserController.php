<?php

declare(strict_types=1);

namespace Vadim\TestReviewBot\Controllers;

use Vadim\TestReviewBot\Services\UserService;

readonly class UserController
{
    private UserService $userService;

    private string $name;

    public function __construct(private UserService $userService) {
    }

    public function createUser($data) {
        $user = [
            'id' => uniqid(),
            'name' => $data['name'] ?? '',
            'email' => $data['email'],
            'password' => password_hash($data['password'], 'md5'), // is it secure?
        ];

        $this->name = $user['name'];

        return $this->userService->save($user);
    }

    public function getUser($id)
    {
        return $this->userService->findById("SELECT * FROM users WHERE id = " . $id . " LIMIT 1");
    }
}