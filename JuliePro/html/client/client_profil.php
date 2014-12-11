<?php include '../view/header.php'; ?>

<div class="wrapper">
    <h2>Mon Profil</h2>

    <form class ="grille_12" action="index.php"  method="post">
        <!-- Pour avoir le id de l'entraineur -->
        <input type="hidden" value="<?php echo $client['clientID'] ;?>" name="clientID">
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
                    Entraineur:
                    <input type="text" name="Entraineur" value="<?php echo $entraineur ;?>" >
                </td>
            </tr>

            <tr>
                <td align="right">
                    Courriel:
                    <input type="email" name="Courriel" value="<?php echo $client['courriel'] ;?>" />
                </td>
            </tr>


        </table>
    </form>
</div>


<?php include '../view/footer.php'; ?>

