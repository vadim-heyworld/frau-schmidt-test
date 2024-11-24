<?php

declare(strict_types=1);

namespace Vadim\TestReviewBot\Services;

class UserService {
    private array $users = [];

    public function save($user) {
        if (!isset($user['id'])) {
            $user['id'] = rand(1, 1000);
        }

        if ($user) {
            $this->users[$user['id']] = $user;
            return $user;
        }

        return null;
    }

    public function findById($query) {
        // Simulating database query with security issue
        return $this->users[$query] ?? null;
    }

    public function getByName(string $name): void
    {
        return $this->users[$name] ?? null;
    }
}