<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity {//Name of my class
    private int $id;
    private string $name;
    private string $surname;
    private bool $reset_password;
    private ?Privilege $privilege;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return bool
     */
    public function isResetPassword(): bool
    {
        return $this->reset_password;
    }

    /**
     * @param bool $reset_password
     */
    public function setResetPassword(bool $reset_password): void
    {
        $this->reset_password = $reset_password;
    }

    /**
     * @return Privilege
     */
    public function getPrivilege(): Privilege
    {
        return $this->privilege;
    }

    /**
     * @param Privilege $privilege
     */
    public function setPrivilege(Privilege $privilege): void
    {
        $this->privilege = $privilege;
    }

}

?>