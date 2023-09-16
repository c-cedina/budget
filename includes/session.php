<?php

if (isset($_SESSION['email'])) {

    include 'includes/requetes_session.php'
        ?>
    <script>
        signupDiv.style.display = "none";
        loginDiv.style.display = "none";
        btnSignup.style.display = "none";
        btnLogin.style.display = "none";
    </script>
    <header>
        <div id="deco">
            <a href="logout.php">
                <button id="btnDeco" class="btn">Deconnexion</button>
            </a>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#btnDeco").click(function () {
                    // Envoi d'une demande AJAX au serveur pour supprimer les variables de session
                    $.ajax({
                        url: "includes/deconnexion.php", // Le script serveur qui gère la suppression des variables de session
                        method: "POST",        // Vous pouvez utiliser POST ou GET selon votre configuration
                        success: function (data) {
                            // Actualiser la page pour que l'utilisateur soit déconnecté
                            window.location.href = "http://localhost/appGestionFinance/"; // Rediriger vers la page de redirection
                        },
                        error: function (xhr, status, error) {
                            // Gérer les erreurs en cas de problème avec la demande AJAX
                            console.error(error);
                        }
                    });
                });
            });
        </script>
    </header>



    <div id='contenu'>
        <h1>
            Coucou
            <?= $_SESSION['prenom']; ?>
        </h1>
        <p>
            je t'attendais le rat
        </p>

        <p>
            Tu as depensé
            <?= $somme_total_d_mois['valeur'] ?>
            € ce mois ci
        </p>

        <p>
            Tu as depensé
            <?= $somme_total_d['valeur'] ?>
            € depuis ton inscription le
            <?= $_SESSION['date_creation'] ?>
        </p>
    </div>
    <div id=ajtdepense>
        <h1>Enregistrement de Dépenses</h1>
        <form method="post">

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

            <script>         document.getElementById("date_personnelle").addEventListener("change", function () { document.getElementById("date_personnelle_input").disabled = !this.checked; });
            </script>
            <br><br>




            <input type="submit" id="formenregistrer" name="formenregistrer" value="Enregistrer">


        </form>
        <br> <br>
    </div>

    <?php
}


?>