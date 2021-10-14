<?php

namespace App\Model;

class Animal
{
    private int $id;
    private string $name;
    private array $types;

    public function __construct()
    {
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
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     *
     * @return Animal
     */
    public function setNumber(string $number): Animal
    {
        $this->number = $number;

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
}