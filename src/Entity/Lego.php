<?php

namespace App\Entity;

class Lego
{
    private int $id;
    private string $name;
    private string $collection;
    private int $pieces;
    private float $price;
    private string $description;
    private string $boxImage;
    private string $legoImage;

    public function __construct(
        int $id,
        string $name,
        string $collection,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->collection = $collection;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getCollection(): string
    {
        return $this->collection;
    }
    public function getPieces(): int
    {
        return $this->pieces;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getBoxImage(): string
    {
        return $this->boxImage;
    }
    public function getLegoImage(): string
    {
        return $this->legoImage;
    }

    // Setters
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setCollection(string $collection): void
    {
        $this->collection = $collection;
    }
    public function setPieces(int $pieces): void
    {
        $this->pieces = $pieces;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setBoxImage(string $boxImage): void
    {
        $this->boxImage = $boxImage;
    }
    public function setLegoImage(string $legoImage): void
    {
        $this->legoImage = $legoImage;
    }
}
