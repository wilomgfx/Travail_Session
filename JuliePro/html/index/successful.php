
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
        <p>Bonjour <?php echo $user['username'] ?>! Redirection en cours...</p>
    </div>
</section>
</body>
<?php $user = $_SESSION['user']; ?>
<?php header("Refresh: 5; URL=indexbase.php"); ?>