<?php include '../view/header.php'; ?>

<!-- Section Consulter/Modifier Clients -->
<section>
    <div class="wrapper">
        <h2>Objectifs de <?php echo "AREMPLACER"; ?></h2>
        <form class ="grille_12" action="index.php" method="post">
            <input type="hidden" value="Afficher" name="action">
            <table>
                <tr>
                    <td align="right">
                        Client:
                        <input list="lstClient" name="listePersonne" value="Veuillez choisir un client">
                        <datalist id="lstClient">
                            <option value="Veuillez choisir un client.">
                                <?php foreach($client as $clients) : ?>
                            <option value="<?php echo $clients['nom'] . $clients['prenom'] ?>">
                                <?php endforeach; ?>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="Afficher"></td>
                </tr>
            </table>
        </form>
    </div>
</section>

<?php include '../view/footer.php'; ?>