<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Gender extends Entity
{
    private int $id;
    private string $short_description;
    private string $long_description;

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
    public function getShortDescription(): string
    {
        return $this->short_description;
    }

    /**
     * @param string $short_description
     */
    public function setShortDescription(string $short_description): void
    {
        $this->short_description = $short_description;
    }

    /**
     * @return string
     */
    public function getLongDescription(): string
    {
        return $this->long_description;
    }

    /**
     * @param string $long_description
     */
    public function setLongDescription(string $long_description): void
    {
        $this->long_description = $long_description;
    }

}