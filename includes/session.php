<?php

if (isset($_SESSION['email'])) {

    include 'includes/requetes_session.php';
    ?>
    <script>
        signupDiv.style.display = "none";
        loginDiv.style.display = "none";
        btnSignup.style.display = "none";
        btnLogin.style.display = "none";
    </script>
    <header>
        <div id="deco">
            <a href="https://gestiond-depense-50c701015e05.herokuapp.com/">
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
                            window.location.href = "https://gestiond-depense-50c701015e05.herokuapp.com/"; // Rediriger vers la page de redirection
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


    <?php if ($somme_total_d_mois['valeur'] == 'null') {
        $somme_total_d_mois['valeur'] = '0';
    } ?>
    <?php if ($somme_total_d['valeur'] == 'null') {
        $somme_total_d['valeur'] = '0';
    } ?>
    <div id='contenu'>
        <h1>
            Coucou
            <?= $_SESSION['prenom']; ?>
        </h1>
        <div id="intro">
            <p>
                Je t'attendais le rat.
            </p>

            <p>
                Tu as depensé
                <?= $somme_total_d_mois['valeur'] ?>
                € ce mois-ci.

            </p>

            <p>
                Tu as depensé
                <?= $somme_total_d['valeur'] ?>
                € au total. <br>
                Tu as enregistré
                <?= $nbdepense ?>
                dépense au total
                <br>
                Tu nous as rejoint la team des rats depuis le
                <?= $_SESSION['date_creation'] ?>
                <br><br>
            </p>
        </div>

        <!-- formulaire recherche -->
        <div id="formrp">
            <form method="post">
                Je veux savoir combien j'ai dépensé au mois de
                <select id="mois_dps" name="mois_dps">

                    <option value="01%">janvier</option>
                    <option value="02%">fevrier</option>
                    <option value="03%">mars</option>
                    <option value="04%">avril</option>
                    <option value="05%">mai</option>
                    <option value="06%">juin</option>
                    <option value="07%">juillet</option>
                    <option value="08%">aout</option>
                    <option value="09%">septembre</option>
                    <option value="10%">octobre</option>
                    <option value="11%">novembre</option>
                    <option value="12%">decembre</option>
                    <option value="%"> janvier à decembre (soit durant toute l'année)</option>

                </select>
                en
                <select id="annee_dps" name="annee_dps">

                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>

                </select>
                dans la catégorie
                <select id="categorie_dps" name="categorie_dps">

                    <option value="activité">activité</option>
                    <option value="cadeaux">cadeaux</option>
                    <option value="habit">habit</option>
                    <option value="abonnements">abonnements</option>
                    <option value="objet_numerique">objet Numérique</option>
                    <option value="objet_quotidien">objet du Quotidien</option>
                    <option value="frais_banquaire">frais banquaire</option>
                    <option value="nourriture">nourriture</option>
                    <option value="transport">transport</option>
                    <option value="%">sans connaitre la catégorie</option>

                </select>
                et
                <select id="achat_necessaire_dps" name="achat_necessaire_dps" required>

                    <option value="necessaire">Nécessaire</option>
                    <option value="non_necessaire">non nécessaire</option>
                    <option value="n%">sans connaitre la nécessité</option>

                </select>
                ?

                <input type="submit" id="formrenseignement" name="formrenseignement" value="Rechercher">


            </form>
            <br>
        </div>
        <?php include 'includes/recherche_dps.php'; ?>

        <?php
        // mise en place des valeurs
        if ($rp['valeur'] == '') {
            $rp['valeur'] = '0';
        }
        $phrase = '';
        if ($annee_dps != '?') {
            $annee_dps = substr($annee_dps, 0, 4);
            $phrase = "Ne t'inquiete pas le rat je te le dis tout de suite. <br>";
        }
        if ($categorie_dps == '%') {
            $categorie_dps = "sans connaitre la catégorie";
        }
        if ($achat_necessaire_dps == 'n%') {
            $achat_necessaire_dps = "sans connaitre la nécessité";
        }


        // Mise en place des mois
    
        if ($mois_dps == '01%') {
            $mois_dps = 'janvier';
        }
        if ($mois_dps == '02%') {
            $mois_dps = 'fevrier';
        }
        if ($mois_dps == '03%') {
            $mois_dps = 'mars';
        }
        if ($mois_dps == '04%') {
            $mois_dps = 'avril';
        }
        if ($mois_dps == '05%') {
            $mois_dps = 'mai';
        }
        if ($mois_dps == '06%') {
            $mois_dps = 'juin';
        }
        if ($mois_dps == '07%') {
            $mois_dps = 'juillet';
        }
        if ($mois_dps == '08%') {
            $mois_dps = 'août';
        }
        if ($mois_dps == '09%') {
            $mois_dps = 'septembre';
        }
        if ($mois_dps == '10%') {
            $mois_dps = 'octobre';
        }
        if ($mois_dps == '11%') {
            $mois_dps = 'novembre';
        }
        if ($mois_dps == '12%') {
            $mois_dps = 'decembre';
        }
        if ($mois_dps == '%') {
            $mois_dps = "janvier à decembre (soit durant toute l'année)";
        }
        // Fin des calcule des
        ?>




        <div id="rp">
            <p>
                <?= $phrase ?>
                Tu as dépensé

                <?= $rp['valeur'] ?>
                € au mois de
                <?= $mois_dps ?>
                en
                <?= $annee_dps ?>
                dans la catégorie
                <?= $categorie_dps ?>
                et
                <?= $achat_necessaire_dps ?>

            </p>
        </div>



        <div id="formrp">
            <!-- conaitre depense du mois
           
            <form method="post">
                Je veux voir mes dépenses du mois
                <select id="mois_dps" name="mois_dps">

                    <option value="01%">janvier</option>
                    <option value="02%">fevrier</option>
                    <option value="03%">mars</option>
                    <option value="04%">avril</option>
                    <option value="05%">mai</option>
                    <option value="06%">juin</option>
                    <option value="07%">juillet</option>
                    <option value="08%">aout</option>
                    <option value="09%">septembre</option>
                    <option value="10%">octobre</option>
                    <option value="11%">novembre</option>
                    <option value="12%">decembre</option>


                </select>
                en
                <select id="annee_dps" name="annee_dps">

                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>

                </select>
                <input type="submit" id="formrenseignement" name="formrenseignement" value="Rechercher">



            </form> -->

            <button id="afficherButton">Afficher toutes les dépenses</button>
            <button id="supprimerButton">Supprimer le paragraphe</button>

            <script>
                // Fonction pour afficher le paragraphe
                document.getElementById('afficherButton').addEventListener('click', function () {
                    var p = document.getElementById('toute_depense');
                    p.style.display = 'block';
                });

                // Fonction pour supprimer le paragraphe
                document.getElementById('supprimerButton').addEventListener('click', function () {
                    var p = document.getElementById('toute_depense');
                    p.style.display = 'none';
                });
            </script>

            <p id="toute_depense">
                <?php
                $j = 0;
                $i = $nbdepense_toute - 1;
                while ($j < $nbdepense_toute) {
                    ?>
                    Achat au nom de
                    "
                    <?= $titre[$i] ?>" <br>
                    du montant de
                    "
                    <?= $montant[$i] ?>"
                    € à la date de
                    "
                    <?= $date_depense[$i] ?>" <br>
                    de categorie
                    "
                    <?= $categorie[$i] ?>"
                    et
                    "
                    <?= $necessite[$i] ?>"
                    .

                    <br>
                    <br>
                    <?php
                    $i--;
                    $j++;
                }

                ?>

            </p>
        </div>

    </div>

    <!-- Formulaire ajout depense -->
    <div id=ajtdepense>
        <h1>Enregistrement de Dépenses</h1>
        <form method="post">

            <label for="titre_depense">Titre de la dépense :</label>
            <input type="text" id="titre_depense" name="titre_depense" placeholder="ecran plat full hd" required><br><br>

            <!-- <label for="commentaire_depense">Commentaire :</label>
            <textarea id="commentaire_depense" name="commentaire_depense" rows="4" cols="50"></textarea><br><br> -->


            <label for="montant">Montant de la dépense :</label>
            <input type="text" id="montant" name="montant" placeholder="578.80" required
                pattern="^[0-9]+(\.[0-9]{0,1,2})?$"><br>
            <span class="error"> format d'ecritur sous forme xxx.xx <br>
                de format ecriture "12.34" ou bien "12.3" ou "12" </span><br><br>


            <label for="categorie">Catégorie de dépense :</label>
            <select id="categorie" name="categorie">
                <option value="activité">Activité</option>
                <option value="cadeaux">Cadeaux</option>
                <option value="transport">Transport</option>
                <option value="nourriture">Nourriture</option>
                <option value="habit">Habit</option>
                <option value="frais_banquaire">frais banquaire</option>
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
        <br>

    </div>

    <?php
}


?>