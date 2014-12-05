<head>
    <link href="../css/grille-base.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styleLogin.css">
</head>
<body>
<!-- Login form -->
<section class="loginform cf">
    <div class="wrapper">
        <img src="../img/julieProLogoPetit.png">
        <form name="login" action="." method="post" accept-charset="utf-8">
            <input type="hidden" name="action" value="login"/>
            <ul>
                <li>
                    <label for="user">Utilisateur</label>
                    <input type="text" name="username" placeholder="Votre utilisateur" required>
                </li>
                <li>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="Votre mot de passe" required></li>
                <li>
                    <input type="submit" value="Se connecter">
                </li>
            </ul>
        </form>
    </div>
    <?php if (isset($failed)) : ?>
        <p id="erreur">Erreur: L'utilisateur ou le mot de passe est incorrect.</p>
    <?php endif; ?>
</section>
</body>