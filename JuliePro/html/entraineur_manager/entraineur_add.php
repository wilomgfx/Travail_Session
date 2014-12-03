<?php include '../view/header.php'; ?>

    <!--  Section PROMO
    ========================================== -->

    <section>
        <div class="wrapper">
            <h2>Inscrire un Entraineur</h2>
            <form class ="grille_12">
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
                            <input type="submit" value="Inscrire">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </section>

    <!--  FOOTER
    ========================================== -->
<?php include '../view/footer.php'; ?>