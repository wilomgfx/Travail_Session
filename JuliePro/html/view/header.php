<!-- On garde la session -->
<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
?>
<?php $user = $_SESSION['user']; ?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>JuliePro</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	 <link href="../css/grille-base.css" rel="stylesheet">
    <link href="../css/style-base.css" rel="stylesheet">
</head>
<body>
<!--  HEADER
========================================== -->
<header>
    <div class="wrapper">
        <nav class="grille_12">
            <ul id="menu_header">
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
                <li><a class="current" href="#"><?php echo $user['username'];?></a> </li>
                <li><a href="../index/logout.php">Déconnection</a></li>
            </ul>
        </nav>
    </div>
</header>