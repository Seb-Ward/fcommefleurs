<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity {
    private int $id;
    private ?string $name;
    private ?string $surname;
    private ?string $reset_password;
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getResetPassword(): ?string
    {
        return $this->reset_password;
    }

    /**
     * @param string|null $reset_password
     */
    public function setResetPassword(?string $reset_password): void
    {
        $this->reset_password = $reset_password;
    }

    /**
     * @return Privilege|null
     */
    public function getPrivilege(): ?Privilege
    {
        return $this->privilege;
    }

    /**
     * @param Privilege|null $privilege
     */
    public function setPrivilege(?Privilege $privilege): void
    {
        $this->privilege = $privilege;
    }

}

?>