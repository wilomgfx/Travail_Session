<!--  FOOTER
========================================== -->
<footer>
    <div class="wrapper">
        <nav class="grille_12">
        </nav>

        <nav class="grille_12">
            <ul id="menu_footer">
                <?php if ($user['statut'] == 'super_admin') : ?>
                    <li><a href="../index/indexbase.php">Accueil</a></li>
                    <li><a href="../client_manager">Gestion Client</a></li>
                    <li><a href="../entraineur_manager/index.php">Gestion entraineur</a></li>
                <?php endif; ?>
                <?php if ($user['statut'] == 'admin') : ?>
                    <li><a href="../index/indexbase.php">Accueil</a></li>
                    <li><a href="../entraineur">Profil</a></li>
                    <li><a href="../entraineur/index.php?action=mesClients">Mes clients</a></li>
                <?php endif; ?>
                <?php if ($user['statut'] == 'utilisateur') : ?>
                    <li><a href="../index/indexbase.php">Accueil</a></li>
                    <li><a href="../client">Profil</a></li>
                    <li><a href="../client/index.php?action=rapport">Mon programme</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <p class="grille_12">Julie Pro 2014 - Tous droits réservés</p>
    </div>
</footer>

</body>
</html>