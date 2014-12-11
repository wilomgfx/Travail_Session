
<head>
    <meta charset="utf-8">
    <link href="../css/grille-base.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styleLogin.css">
</head>
<body>
<!-- Login form -->
<section class="loginform cf">
    <div class="wrapper">
        <img src="../img/julieProLogoPetit.png">
        <br>
        <h2>Bonjour <span id="span"><?php echo $user['username'] ?></span>! Redirection en cours...</h2>
    </div>
</section>
</body>
<?php $user = $_SESSION['user']; ?>

<?php if ($user['statut'] == 'utilisateur') : ?>
    <?php header("Refresh: 5; URL=indexbase.php"); ?>
<?php endif; ?>

<?php if ($user['statut'] == 'admin') : ?>
    <?php header("Refresh: 5; URL=indexbase.php"); ?>
<?php endif; ?>

<?php if ($user['statut'] == 'super_admin') : ?>
    <?php header("Refresh: 5; URL=indexbase.php"); ?>
<?php endif; ?>