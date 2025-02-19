<?php

// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;

use App\Entity\Lego;
use \PDO;

class LegoService
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=tp-symfony-mysql;dbname=lego_store', 'root', 'root', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
    public function getLegos()
    {
        $query = 'SELECT * FROM lego';
        $statement = $this->pdo->query($query);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $legos = [];

        foreach ($results as $row) {
            $lego = new Lego(
                $row['id'],
                $row['name'],
                $row['collection_id'],
            );
            $lego->setDescription($row['description']);
            $lego->setPrice($row['price']);
            $lego->setPieces($row['pieces']);
            $lego->setBoxImage($row['box_image']);
            $lego->setLegoImage($row['lego_image']);
            $legos[] = $lego;
        }
        return $legos;
    }
    public function getLegosByCollection($collection)
    {
        $query = 'SELECT * FROM lego WHERE collection_id = :collection_id';
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':collection_id', $collection, PDO::PARAM_STR);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $legos = [];

        foreach ($results as $row) {
            $lego = new Lego(
                $row['id'],
                $row['name'],
                $row['collection_id']
            );
            $lego->setDescription($row['description']);
            $lego->setPrice($row['price']);
            $lego->setPieces($row['pieces']);
            $lego->setBoxImage($row['box_image']);
            $lego->setLegoImage($row['lego_image']);
            $legos[] = $lego;
        }
        return $legos;
    }
}
