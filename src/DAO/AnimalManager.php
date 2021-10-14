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
            $animals[] = $this->buildObject($animal);
        }

        return $animals;
    }

    public function findLast(): array
    {
        $result = $this->createQuery('SELECT * FROM animal ORDER BY Id DESC LIMIT 10');

        $animals = [];
        foreach ($result->fetchAll() as $animal) {
            $animals[] = $this->buildObject($animal);
        }

        return $animals;
    }

    public function create(Animal $animal): int
    {
        return $this->createQuery(
            'INSERT INTO animal (name, types, image, is_adopted) VALUES (?, ?, ?, ?)',
            $this->buildValues($animal)
        );
    }

    public function delete(Animal $animal): bool
    {
        $result = $this->createQuery('DELETE FROM animal WHERE id = ?', [$animal->getId()]);

        return 1 <= $result->rowCount();
    }

    public function findOneBy(string $attribute, $value): ?Animal
    {
        $result = $this->createQuery("SELECT * FROM animal WHERE {$attribute} = ?", [$value]);

        if (false === $object = $result->fetchObject()) {
            return null;
        }

        return $this->buildObject($object);
    }

    //** PRIVATE FUNCTIONS */


    private function buildValues(Animal $animal): array
    {
        try {
            $types = json_encode($animal->getTypes(), JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            $types = '';
        }

        return [
            $animal->getName(),
            $types,
            $animal->getImage(),
            $animal->isAdopted() ? 1 : 0,
        ];
    }

    private function buildObject(object $animal): Animal
    {
        try {
            $types = json_decode($animal->types, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            $types = [];
        }

        try {
            $seenAt = new \DateTimeImmutable($animal->seen_at);
        } catch (\Exception $e) {
            $seenAt = new \DateTimeImmutable();
        }

        return (new Animal())
            ->setId($animal->id)
            ->setName($animal->name)
            ->setTypes($types)
            ->setImage($animal->image)
            ->setIsAdopted($animal->is_adopted)
        ;
    }
}