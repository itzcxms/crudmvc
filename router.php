<?php

require_once 'controllers/ProduitController.php';

$controller = new ProduitController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'liste';
}

switch ($action) {
    case 'ajouter':
        $controller->ajouterProduit();
        break;
    case 'modifier':
        $controller->modifierProduit();
        break;
    case 'supprimer':
        $controller->supprimerProduit();
        break;
    default:
        $controller->listeProduits();
        break;
}