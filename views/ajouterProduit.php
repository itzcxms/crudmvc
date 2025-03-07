<h1>Ajouter un produit</h1>

<form action="index.php?action=ajouter" method="POST">
    <label>Nom :</label>
    <input type="text" name="nom">
    <br><br>
    <label>Prix :</label>
    <input type="text" name="prix">
    <br><br>
    <label>Stock :</label>
    <input type="text" name="stock">
    <br><br>
    <input type="submit" value="Ajouter">
</form>
<a href="index.php?action=liste">Retour</a>