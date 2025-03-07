<?php

require_once __DIR__ . '/../models/Produit.php';

class ProduitController {

    // Propriétés privées
    private $modeleProduit;

    // Constructeur
    public function __construct()
    {
        $this->modeleProduit = new Produit();
    }

    public function infosProduit() {
        $infosProduit = $this->modeleProduit->infosProduit();
    }

    /**
     * Afficher la liste des produits
     * @return void
     */
    public function listeProduits() {
        $listeProduits = $this->modeleProduit->listeProduits();

        // On le met dans la vue
        include __DIR__ . '/../views/listeProduits.php';
    }

    public function ajouterProduit()
    {
        // On regarde si les données existent
        if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['stock'])) {
            $nom = $_POST['nom'];
            $prix = $_POST['prix'];
            $stock = $_POST['stock'];

            // On appelle la fonction de la classe
            if ($this->modeleProduit->ajouter($nom, $prix, $stock)) {
                // On retourne à l'accueil
                header("Location: index.php?action=liste");
                exit();
            }

        }
        // On le met dans la vue
        require __DIR__ . '/../views/ajouterProduit.php';
    }

    public function modifierProduit() {
        $id = $_GET['id'];

        if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['stock'])) {
            $nom = $_POST['nom'];
            $prix = $_POST['prix'];
            $stock = $_POST['stock'];

            if ($this->modeleProduit->modifier($nom, $prix, $stock, $id)) {
                // On retourne à l'accueil
                header("Location: index.php?action=liste");
                exit();
            }

        }
            // On le met dans la vue
            require __DIR__ . '/../views/modifierProduit.php';
    }

    public function supprimerProduit() {
        $id = $_GET['id'];
        $this->modeleProduit->supprimer($id);
        header("Location: index.php?action=liste");
        exit();
    }



}