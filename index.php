<?php session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css ">
    <title>Formulaire de Dépenses</title>

</head>
<body>
    <?php include 'includes/database.php'; ?>
    <?php include 'includes/login.php'; ?>
    <?php include 'includes/sigin.php'; ?>

    <?php

if (isset($_SESSION['email'])){
    ?>

<h1> bienvenue le ratus economicus</h1>
<p> votre email est / <?= $_SESSION['email'];?> </p>

<h1>Enregistrement de Dépenses</h1>
    <form action="traitement.php" method="post">

    <label for="titre_depense">Titre de la dépense :</label>
<input type="text" id="titre_depense" name="titre_depense" required><br><br>

<label for="commentaire_depense">Commentaire :</label>
<textarea id="commentaire_depense" name="commentaire_depense" rows="4" cols="50"></textarea><br><br>


        <label for="montant">Montant de la dépense :</label>
        <input type="text" id="montant" name="montant" required pattern="^[0-9]+(\.[0-9]{0,1,2})?$"> 
        <span class="error"> exemple de format ecriture "12.34" ou bien "12.3" ou "12" </span><br><br>


        <label for="categorie">Catégorie de dépense :</label>
        <select id="categorie" name="categorie">
            <option value="transport">Transport</option>
            <option value="nourriture">Nourriture</option>
            <option value="activité">Activité</option>
            <option value="cadeaux">Cadeaux</option>
            <option value="habit">Habit</option>
            <option value="abonnements">Abonnements</option>
            <option value="objet_numerique">Objet Numérique</option>
            <option value="objet_quotidien">Objet du Quotidien</option>
        </select><br><br>

        <label for="achat_necessaire">Achat nécessaire ou non :</label>
<select id="achat_necessaire" name="achat_necessaire" required>
    <option value="necessaire">Nécessaire</option>
    <option value="non_necessaire">Non nécessaire</option>
</select><br><br>


<label for="date_depense">Date de la dépense :</label>
<input type="radio" id="date_actuelle" name="date_type" value="date_actuelle" checked>
<label for="date_actuelle">Date actuelle</label>

<input type="radio" id="date_personnelle" name="date_type" value="date_personnelle">
<label for="date_personnelle">Date personnalisée :</label>
<input type="date" id="date_personnelle_input" name="date_personnelle_input" disabled>

<script>
    document.getElementById("date_personnelle").addEventListener("change", function () {
        document.getElementById("date_personnelle_input").disabled = !this.checked;
    });
</script>
<br><br>



        <input type="submit" value="Enregistrer">
    </form>
    <br> <br>


    <?php
}


?>



   
    <h2>Connexion</h2>
    <form method="post">
        <label for="email">Email :</label>
        <input type="email" id="lemail" name="lemail" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="lpassword" name="lpassword" required><br><br>

        <input type="submit" id="formlogin" name="formlogin" value="Se Connecter">
    </form>


    

    <h2>Inscription</h2>
    <form  method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="cemail">Confirmation Email :</label>
        <input type="email" id="cemail" name="cemail" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="cpassword">Confirmation Mot de passe :</label>
        <input type="password" id="cpassword" name="cpassword" required><br><br>

        <input type="submit" name="formsend" id="formsend" value="S'inscrire">
    </form>




    





</body>
</html>
