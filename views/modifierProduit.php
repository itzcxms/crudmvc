<?php
require_once __DIR__ . '/../models/Produit.php';

$produitObj = new Produit();
$id = $_GET['id'];
$produit = $produitObj->infosProduit($id);
?>

<h1>Modifier un produit</h1>
<form action="index.php?action=modifier&id=<?= $produit['id'] ?>" method="POST">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($produit['nom']) ?>">
    <br><br>
    <label>Prix :</label>
    <input type="text" name="prix" value="<?= htmlspecialchars($produit['prix']) ?>">
    <br><br>
    <label>Stock :</label>
    <input type="text" name="stock" value="<?= htmlspecialchars($produit['stock']) ?>">
    <br><br>
    <input type="submit" value="Modifier">
</form>
<a href="index.php?action=liste">Retour</a>