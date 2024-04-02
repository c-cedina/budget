<?php session_start();

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css ">
    <link rel="stylesheet" type="text/css" href="css/session.css ">
    <link rel="stylesheet" type="text/css" href="css/login.css ">
    <link rel="stylesheet" type="text/css" href="css/signup.css ">
    <title>AppFinance</title>
    <link rel="icon" type="image/x-icon" href="image/logo.ico">

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





</body>

</html>