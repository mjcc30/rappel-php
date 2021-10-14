<?php

namespace App\DAO;

use App\Model\Animal;

class AnimalManager extends DAO
{
    public function findAll(): array
    {
        $result = $this->createQuery('SELECT * FROM animal');

        $animals = [];
        foreach ($result->fetchAll() as $animal) {
            try {
                $types = json_decode($animal->types, true, 512, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                $types = [];
            }

            $animals[] = (new Animal())
                ->setName($animal->name)
                ->setTypes($types)
            ;
        }

        return $animals;
    }

    public function create(animal $animal): bool
    {
        $sql = 'INSERT INTO animal (name, types) VALUES (?, ?)';

        try {
            $types = json_encode($animal->getTypes(), JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            $types = '';
        }

        $this->createQuery(
            $sql,
            [
                $animal->getName(),
                $types,
            ]
        );

        return true;
    }
}