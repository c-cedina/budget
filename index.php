<?php session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css ">
    <link rel="stylesheet" type="text/css" href="css/ajtdepense.css ">
    <link rel="stylesheet" type="text/css" href="css/login.css ">
    <link rel="stylesheet" type="text/css" href="css/signup.css ">
    <title>Formulaire de Dépenses</title>

</head>

<body>
    <?php include 'includes/database.php'; ?>
    <?php include 'includes/login.php'; ?>
    <?php include 'includes/signup.php'; ?>
    <div id="button-container">
        <button id="btnSignup" class="btn">Inscription</button>
        <button id="btnLogin" class="btn">Connexion </button>
    </div>
    <script src="js/siglog.js"></script>
    <?php include 'includes/session.php'; ?>
    <?php include 'includes/depense.php'; ?>




</body>

</html>