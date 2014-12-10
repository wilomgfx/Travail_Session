<?php include '../view/header.php'; ?>

    <!-- Section Consulter/Modifier Entraineur -->
    <section>
        <div class="wrapper">
            <h2>Information Entraineur</h2>
            <form class ="grille_12" action="index.php" method="post">
                <input type="hidden" value="afficher_entraineur" name="action">
                <table>
                    <tr>
                        <td align="right">
                            Entraineur:
                            <input list="lstEntraineur" name="listePersonne">
                            <?php foreach($entraineurs as $entraineur):?>
                            <datalist id="lstEntraineur">
                                <option value="<?php echo $entraineur['nom'];?>">
                            </datalist>
                           <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><input type="submit" value="Afficher"></td>
                    </tr>
                </table>
            </form>

            <form class ="grille_12" action="index.php">

                <input type="hidden" value="Modifier" name="action">
                <table>
                    <tr>
                        <td align="right">
                            Nom:
                            <input type="text" name="Nom">
                        </td>
                        <td align="right">
                            Prenom:
                            <input type="text" name="Prenom">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            No téléphone:
                            <input type="text" name="Tel">
                        </td>
                        <td align="right">
                            No Cellulaire:
                            <input type="text" name="Cell">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Adresse:
                            <input type="text" name="Adresse">
                        </td>
                        <td align="right">
                            Ville:
                            <input type="text" name="Ville">
                        </td>
                        <td align="right">
                            Code Postal:
                            <input type="text" name="CodePostal">
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Age:
                            <input type="number" name="Age">
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Date inscription:
                            <input type="date" name="DateInsc">
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Courriel:
                            <input type="email" name="Courriel">
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            <input type="submit" value="Modifier">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </section>

    <!-- Section inscription Entraineur -->
    <section>
        <div class="wrapper">
            <h2>Inscrire un Entraineur</h2>

            <form class ="grille_12" action="index.php" method="post">
                <input type="hidden" value="add_entraineur" name="action">
                <table>
                    <tr>
                        <td align="right">Nom d'usager: <input type="text" name="user"</td>
                        <td align="right">Mot de passe: <input type="text" name="password"</td>
                        <td align="right"> Statut: <input list="lstStatut" name="statut">
                            <datalist id="lstStatut">
                                <option value="utilisateur">
                                <option value="admin">
                                <option value="super_admin">
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Nom:
                            <input type="text" name="nom">
                        </td>
                        <td align="right">
                            Prenom:
                            <input type="text" name="prenom">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            No téléphone:
                            <input type="text" name="tel">
                        </td>
                        <td align="right">
                            No Cellulaire:
                            <input type="text" name="cell">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Adresse:
                            <input type="text" name="Adresse">
                        </td>
                        <td align="right">
                            Ville:
                            <input type="text" name="Ville">
                        </td>
                        <td align="right">
                            Code Postal:
                            <input type="text" name="CodePostal">
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Age:
                            <input type="number" name="Age">
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Date inscription:
                            <input type="date" name="DateInsc">
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Courriel:
                            <input type="email" name="Courriel">
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            <input type="submit" value="Inscrire">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </section>

<?php include '../view/footer.php'; ?>