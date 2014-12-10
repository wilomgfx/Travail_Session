<?php include '../view/header.php'; ?>

<!-- Section Consulter/Modifier Clients -->
<section>
    <div class="wrapper">
        <h2>Information Client</h2>
        <form class ="grille_12" action="index.php" method="post">
            <input type="hidden" value="Afficher" name="action">
            <table>
                 <tr>
                     <td align="right">
                           Client:
                         <input list="lstClient" name="listePersonne" value="Veuillez choisir un client">
                         <datalist id="lstClient">
                         <option value="Veuillez choisir un client.">
                         <?php foreach($client as $clients) :
                             $nom = $clients['nom'];
                             $prenom = $clients['prenom']; ?>
                         <option value="<?php echo $nom?>">
                         <?php endforeach; ?>
                         </datalist>
                     </td>
                     </tr>
                <tr>
                    <td align="right"><input type="submit" value="Afficher"></td>
                </tr>
                    </table>
            </form>

            <form class ="grille_12" action="index.php"  method="post">

            <input type="hidden" value="Modifier" name="action">
            <table>
                <tr>
                    <td align="right">
                        Nom:
                        <input type="text" name="Nom" value="">
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
                        Entraineur:
                        <input type="text" name="Entraineur">
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

<!-- Section inscription Client -->
<section>
    <div class="wrapper">
        <h2>Inscrire un Client</h2>
         <form class ="grille_12" action="index.php"  method="post">
             <input type="hidden" value="Inscrire" name="action">
            <table>
                <tr>
                    <td align="right">Username: <input type="text" name="Username"</td>
                    <td align="right">Password: <input type="password" name="Password"</td>
                    <td align="right"> Statut: <input list="lstStatut" name="LstStatut">
                                      <datalist id="lstStatut">
                                      <option value="utilisateur">
                                      <option value="admin">
                                      <option value="super_admin">
                                      </datalist></td>
                </tr>
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
                          Entraineur:
                         <input type="text" name="Entraineur">
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