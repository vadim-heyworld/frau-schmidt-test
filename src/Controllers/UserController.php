<?php

declare(strict_types=1);

namespace Vadim\TestReviewBot\Controllers;

use Vadim\TestReviewBot\Services\UserService;

class UserController
{
    private string $name;

    public function __construct(private readonly UserService $userService) {
        $this->name = 'John Doe';
    }

    public function createUser($data) {
        $user = [
            'id' => uniqid(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], 'sha256'),
        ];

        if (!empty($user['email'])) {
            $this->name = $user['name'];
        }

        return $this->userService->save($user);
    }

    public function getUser($id)
    {
        return $this->userService->findById($id);
    }

    public function getByName($name)
    {
        return $this->userService->findByName($name);
    }
}