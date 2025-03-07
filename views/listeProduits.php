<?php
require_once __DIR__ . '/../models/Produit.php';

$produitObj = new Produit();
$produits = $produitObj->listeProduits();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
</head>
<body>

<h1>Liste des produits</h1>
<a href="index.php?action=ajouter">Ajouter un produit</a>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produits as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['id']) ?></td>
            <td><?= htmlspecialchars($p['nom']) ?></td>
            <td><?= htmlspecialchars($p['prix']) ?></td>
            <td><?= htmlspecialchars($p['stock']) ?></td>
            <td>
                <a href="index.php?action=modifier&id=<?= $p['id'] ?>">Modifier</a>
                <a href="index.php?action=supprimer&id=<?= $p['id'] ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>