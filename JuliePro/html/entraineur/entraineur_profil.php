<?php include '../view/header.php'; ?>
<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
$userID = get_userID_by_username($_SESSION['user']['username']);
$entraineur = get_entraineur_by_userID($userID);
?>

<div class="wrapper">

    <h2>Mon Profil</h2>

<form class ="grille_12" action="index.php" method="post">
    <!-- Pour avoir le id de l'entraineur -->
    <input type="hidden" value="<?php echo $entraineur['entraineurID'] ;?>" name="entraineurID">

    <input type="hidden" value="Modifier" name="action">
    <table>
        <tr>
            <td align="right">
                Nom:
                <input type="text" name="nom" value="<?php echo $entraineur['nom'] ;?>">
            </td>
            <td align="right">
                Prenom:
                <input type="text" name="prenom" value="<?php echo $entraineur['prenom'] ;?>">
            </td>
        </tr>
        <tr>
            <td align="right">
                No téléphone:
                <input type="text" name="tel" value="<?php echo $entraineur['numTel'] ;?>">
            </td>
            <td align="right">
                No Cellulaire:
                <input type="text" name="cell" value="<?php echo $entraineur['numCell'] ;?>">
            </td>
        </tr>
        <tr>
            <td align="right">
                Adresse:
                <input type="text" name="Adresse" value="<?php echo $entraineur['adresse'] ;?>">
            </td>
            <td align="right">
                Ville:
                <input type="text" name="Ville" value="<?php echo $entraineur['ville'] ;?>">
            </td>
            <td align="right">
                Code Postal:
                <input type="text" name="CodePostal" value="<?php echo $entraineur['codePostal'] ;?>"
            </td>
        </tr>

        <tr>
            <td align="right">
                Age:
                <input type="number" name="Age" value="<?php echo $entraineur['age'] ;?>">
            </td>
        </tr>

        <tr>
            <td align="right">
                Date inscription:
                <input type="text" name="DateInsc" value="<?php echo $entraineur['dateInscription'] ;?>">
            </td>
        </tr>

        <tr>
            <td align="right">
                Courriel:
                <input type="email" name="Courriel" value="<?php echo $entraineur['courriel'] ;?>">
            </td>
        </tr>

    </table>
</form>
</div>

<?php include '../view/footer.php'; ?>
