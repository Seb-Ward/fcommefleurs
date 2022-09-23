<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Privilege extends Entity {
    private int $id;
    private string $role;

    /**
     * @param int $id
     * @param string $role
     */
    public function __construct(int $id, string $role)
    {
        $this->id = $id;
        $this->role = $role;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}