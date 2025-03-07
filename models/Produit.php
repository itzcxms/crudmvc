<?php

require_once 'Database.php';
class Produit
{
    //propriéte privée
    private $pdo;

    //Constructeur
    public function __construct()
    {
        //Retourne une instance de Database
        $this->pdo = Database::getInstance()->getConnection();
    }

    /** Ajout d'un nouveau produit dans la base de donnée
     *@param string $nom le nom du produit
     *@param float $prix le prix
     *@param int $stock la quantité
     *@return boolean true si ajout Ok sinon False
     */

    public function ajouter($nom, $prix, $stock)
    {
        $stmt = $this->pdo->prepare("INSERT INTO produits VALUES (NULL,(?), (?), (?))");
        return $stmt->execute([$nom, $prix, $stock]);
    }

    /**
     * Liste des produits dans la db
     * @return array Tableau associatif contenant les produits
     */

    public function listeProduits()
    {
        $stmt = $this->pdo->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function supprimer($id) {
        $stmt = $this->pdo->prepare("DELETE FROM produits WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function modifier($nom, $prix, $stock, $id) {
        $query = "UPDATE produits SET nom = ? , prix = ? , stock = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$nom, $prix, $stock, $id]);
    }


    public function infosProduit($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}