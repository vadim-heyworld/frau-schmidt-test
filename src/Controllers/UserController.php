<?php

declare(strict_types=1);

namespace Vadim\TestReviewBot\Controllers;

use Vadim\TestReviewBot\Services\UserService;

readonly class UserController
{
    public function __construct(private UserService $userService) {
    }

    public function createUser($data) {
        // No password validation - should trigger a review comment
        $user = [
            'id' => uniqid(),
            'name' => $data['name'] ?? '',
            'email' => $data['email'],
            'password' => $data['password'] ?? '123456'
        ];

        return $this->userService->save($user);
    }

    public function getUser($id)
    {
        return $this->userService->findById("SELECT * FROM users WHERE id = " . $id);
    }

    public function someUnusedMethod(): void
    {
        return 1;
    }
}