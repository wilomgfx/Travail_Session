<?php include '../view/header.php'; ?>
<link href="../css/client_rapport.css" rel="stylesheet">
<?php
$userID = get_userID_by_username($_SESSION['user']['username']);
$client = get_client_by_userID($userID);
$entraineur = get_entraineur_by_ID($client['FK_entraineurID']);
$rapports = get_rapports_quotidiens_by_clientID($client['clientID']);
$cpt = 0;
?>
<div class="wrapper">
    <h2>Rapports quotidiens</h2>
    <form class="grille_12" action="." method="post">
        <table>
            <tr class="headerDeTable">
                <th>Entrainement</th>
                <th>Nombre de Calories / entrainement</th>
                <th>Max Battement par minute</th>
                <th>Calories Ingérées</th>
                <th>Date</th>
                <th>VO2 Max</th>
                <th>Poids</th>
            </tr>
            <?php foreach( $rapports as $rap ) :
                ?>
                <tr>
                    <td>
                        <?php echo $rap['entrainement']; ?>
                    </td>
                    <td>
                        <?php echo $rap['nbrCalorieDepense']; ?>
                    </td>
                    <td>
                        <?php echo $rap['maxBattement']; ?>
                    </td>
                    <td>
                        <?php echo $rap['nbrCalorieIngere']; ?>
                    </td>
                    <td>
                        <?php echo $rap['dateEntrainement']; ?>
                    </td>
                    <td>
                        <?php echo $rap['vo2Max']; ?>
                    </td>
                    <td>
                        <?php echo $rap['poids']; ?>
                    </td>
                </tr>
                <?php $cpt++; ?>
            <?php endforeach; ?>
            <?php
                if($cpt == 0) :
            ?>
                    <tr>
                        <td>
                            Aucun
                        </td>
                        <td>
                            Aucun
                        </td>
                        <td>
                            Aucun
                        </td>
                        <td>
                            Aucun
                        </td>
                        <td>
                            Aucun
                        </td>
                        <td>
                            Aucun
                        </td>
                        <td>
                            Aucun
                        </td>
                    </tr>
            <?php endif; ?>
        </table>
    </form>
    <form class="grille_12" action="." method="post">
        <input type="hidden" name="action" value="ajouter_rapport"/>
        <input type="hidden" name="clientIDAjout" value="<?php echo $client['clientID']; ?>" />
        <h3>Nouveau rapport :</h3>
        <table>
            <tr class="headerDeTable">
                <th>Entrainement</th>
                <th>Nombre de Calories / entrainement</th>
                <th>Max Battement par minute</th>
                <th>Calories Ingérées</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="entrainementAjout" />
                </td>
                <td>
                    <input type="text" name="nbrCaloriesEntrainementAjout" />
                </td>
                <td>
                    <input type="text" name="maxBattementParMinuteAjout" />
                </td>
                <td>
                    <input type="text" name="nbrCaloriesIngereAjout" />
                </td>
            </tr>
            <tr>
                <th>Date</th>
                <th>VO2 Max</th>
                <th>Poids</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="dateAjout" />
                </td>
                <td>
                    <input type="text" name="vo2MaxAjout" />
                </td>
                <td>
                    <input type="text" name="poidsAjout" />
                </td>
                <td>
                    <input type="submit" value="Ajouter" />
                </td>
            </tr>
        </table>
    </form>
    </div>
<div class="wrapper">
    <?php
    $cpt2 = 0;
    $rendezVous = get_rendezvous_by_clientID($client['clientID']);
    ?>
    <h2>Rendez-vous</h2>
    <form class="grille_12" action="." method="post">
        <table>
            <tr class="headerDeTable">
                <th>Date</th>
                <th>Entraineur</th>
            </tr>
            <?php foreach( $rendezVous as $rdv ) :
                ?>
                <tr>
                    <td>
                        <?php echo $rdv['date']; ?>
                    </td>
                    <td>
                        <?php
                        $entraineur = get_entraineur_by_ID($rdv['FK_entraineurID']);
                        echo $entraineur['nom'];
                        ?>
                    </td>
                </tr>
                <?php $cpt2++; ?>
            <?php endforeach; ?>
            <?php
            if($cpt2 == 0) :
                ?>
                <tr>
                    <td>
                        Aucun
                    </td>
                    <td>
                        Aucun
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </form>
</div>
<div class="wrapper">
    <?php
    $cpt3 = 0;
    $objectifs = get_objectifs_by_clientID($client['clientID']);
    ?>
    <h2>Objectifs</h2>
    <form class="grille_12" action="." method="post">
        <table>
            <tr class="headerDeTable">
                <th>Nombre d'entrainement</th>
                <th>Calorie Dépensées/Semaine</th>
                <th>Objectif Battements/Minute</th>
                <th>Calorie Ingérées par jour</th>
                <th>Date</th>
            </tr>
            <?php foreach( $objectifs as $obj ) :
                ?>
                <tr>
                    <td>
                        <?php echo $obj['nbrEntrainement']; ?>
                    </td>
                    <td>
                        <?php echo $obj['nbrCalorieDepenseSemaine']; ?>
                    </td>
                    <td>
                        <?php echo $obj['maxBattementObj']; ?>
                    </td>
                    <td>
                        <?php echo $obj['nbrCalorieIngereParJour']; ?>
                    </td>
                    <td>
                        <?php echo $obj['date']; ?>
                    </td>
                </tr>
                <?php $cpt3++; ?>
            <?php endforeach; ?>
            <?php
            if($cpt3 == 0) :
                ?>
                <tr>
                    <td>
                        Aucun
                    </td>
                    <td>
                        Aucun
                    </td>
                    <td>
                        Aucun
                    </td>
                    <td>
                        Aucun
                    </td>
                    <td>
                        Aucun
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </form>
</div>

<div class="wrapper">
    <?php
    $cpt4 = 0;
    $message = get_message_by_clientID($client['clientID']);
    ?>
    <h2>Messages</h2>
    <form class="grille_12" action="." method="post">
        <table>
            <tr class="headerDeTable">
                <th>Message</th>
                <th>Nom de l'Entraineur</th>
            </tr>
            <?php foreach( $message as $msg ) :
                ?>
                <tr>
                    <td>
                        <?php echo $msg['message']; ?>
                    </td>
                    <td>
                        <?php echo $msg['nomEntraineur']; ?>
                    </td>
                </tr>
                <?php $cpt4++; ?>
            <?php endforeach; ?>
            <?php
            if($cpt4 == 0) :
                ?>
                <tr>
                    <td>
                        Aucun
                    </td>
                    <td>
                        Aucun
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </form>
</div>
<?php include '../view/footer.php'; ?>

