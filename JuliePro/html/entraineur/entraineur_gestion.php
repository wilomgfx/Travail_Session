<?php
include '../view/header.php';
if (session_status() == PHP_SESSION_NONE)
    session_start();
$userID = get_userID_by_username($_SESSION['user']['username']);
$entraineur = get_entraineur_by_userID($userID);
?>
<script src="../javascript/jquery-2.1.1.js"></script>
<script src="../javascript/jquery.validate.js"></script>
<script src="../javascript/validationClient.js"></script>
    <!-- Section Consulter/Modifier Clients -->
    <section>
        <div class="wrapper">
            <h2>Information Client</h2>
            <form class ="grille_12" action="index.php" method="post">
                <input type="hidden" value="Afficher" name="action">
                <table>
                    <tr>
                        <td align="right">
                            <label>Client:</label>
                            <select name="clientID">
                                <?php foreach($clients as $key => $clientAfficher) :
                                    $id = $clientAfficher['clientID'];
                                    $name = $clientAfficher['nom'];
                                    ?>
                                    <option value="<?php echo $id; ?>">
                                        <?php echo $name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><input type="submit" value="Afficher"></td>
                    </tr>
                </table>
            </form>
            <?php if (isset($client)) : ?>
                <form class ="grille_12" action="index.php"  method="post">
                    <!-- Pour avoir le id de l'entraineur -->
                    <input type="hidden" value="<?php echo $client['clientID'] ;?>" name="clientID">

                    <input type="hidden" value="Modifier" name="action">
                    <table>
                        <tr>
                            <td align="right">
                                Nom:
                                <input type="text" name="Nom" value="<?php echo $client['nom'] ;?>">
                            </td>
                            <td align="right">
                                Prenom:
                                <input type="text" name="Prenom" value="<?php echo $client['prenom'] ;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                No téléphone:
                                <input type="text" name="Tel" value="<?php echo $client['numTel'] ;?>" />
                            </td>
                            <td align="right">
                                No Cellulaire:
                                <input type="text" name="Cell" value="<?php echo $client['numCell'] ;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Adresse:
                                <input type="text" name="Adresse" value="<?php echo $client['adresse'] ;?>" />
                            </td>
                            <td align="right">
                                Ville:
                                <input type="text" name="Ville" value="<?php echo $client['ville'] ;?>" />
                            </td>
                            <td align="right">
                                Code Postal:
                                <input type="text" name="CodePostal" value="<?php echo $client['codePostal'] ;?>" />
                            </td>
                        </tr>

                        <tr>
                            <td align="right">
                                Age:
                                <input type="number" name="Age" value="<?php echo $client['age'] ;?>" />
                            </td>
                        </tr>

                        <tr>
                            <td align="right">
                                Date inscription:
                                <input type="text" name="DateInsc" value="<?php echo $client['dateInscription'] ;?>" />

                            </td>
                        </tr>

                        <tr>
                            <td align="right">
                                Courriel:
                                <input type="email" name="Courriel" value="<?php echo $client['courriel'] ;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="submit" value="Modifier">
                            </td>
                        </tr>

                    </table>
                </form>
                <?php $clientEnvoyer = $client; ?>
                <form class ="grille_12" action="index.php" method="post">
                    <input type="hidden" value="obtenirRapport" name="action">
                    <input type="hidden" value="<?php echo $clientEnvoyer['clientID']; ?>" name="clientIDEnvoyer">
                    <input type="submit" value="Obtenir les Rapports">
                </form>
            <?php endif; ?>
        </div>
    </section>

    <!-- Section inscription Client -->
    <section>
        <div class="wrapper">
            <h2>Inscrire un Client</h2>
            <form class ="grille_12" action="index.php"  method="post" id="inscriptionClient">
                <input type="hidden" value="Inscrire" name="action">
                <table>
                    <tr>
                        <td align="right">
                            Nom:
                            <input type="text" name="Nom" id="Nom">
                        </td>
                        <td align="right">
                            Prénom:
                            <input type="text" name="Prenom" id="Prenom">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Nom d'usager:<input type="text" name="Username" id="username"</td>
                        <td align="right">Mot de passe:<input type="password" name="Password" id="password"</td>
                        <td align="right"> Statut: <input list="Statut" name="Statut" value="utilisateur" readonly id="Statut"></td>
                    </tr>

                    <tr>
                        <td align="right">
                            No téléphone:
                            <input type="text" name="Tel" id="Tel">
                        </td>
                        <td align="right">
                            No Cellulaire:
                            <input type="text" name="Cell" id="Cell">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Adresse:
                            <input type="text" name="Adresse" id="Adresse">
                        </td>
                        <td align="right">
                            Ville:
                            <input type="text" name="Ville" id="Ville">
                        </td>
                        <td align="right">
                            Code Postal:
                            <input type="text" name="CodePostal" id="CodePostal">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Âge:
                            <input type="number" name="Age" id="Age">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Date inscription:
                            <input type="date" name="DateInsc" id="DateInsc" placeholder="aaaa / mm/ jj">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Courriel:
                            <input type="email" name="Courriel" id="Courriel">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Nom de famille de l'Entraineur:
                            <input type="text" name="Entraineur" id="Entraineur" value="<?php echo $entraineur['nom'];?>" readonly>
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