<?php

namespace App\Model;

class Animal
{
    private int $id;
    private string $name;
    private array $types;
    private bool $isAdopted;
    private ?string $image;

    public function __construct()
    {
        $this->isAdopted = false;
        $this->image = null;
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
     *
     * @return Animal
     */
    public function setId(int $id): Animal
    {
        $this->id = $id;

        return $this;
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
     *
     * @return Animal
     */
    public function setName(string $name): Animal
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param array $types
     *
     * @return Animal
     */
    public function setTypes(array $types): Animal
    {
        $this->types = $types;

        return $this;
    }

      /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     *
     * @return Pokemon
     */
    public function setImage(?string $image): Pokemon
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAdopted(): bool
    {
        return $this->isAdopted;
    }

    /**
     * @param bool $isAdopted
     *
     * @return Pokemon
     */
    public function setisAdopted(bool $isAdopted): Pokemon
    {
        $this->isAdopted = $isAdopted;

        return $this;
    }
}