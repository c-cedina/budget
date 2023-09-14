<?php

if (isset($_SESSION['email'])) {
    $e = $db->prepare("SELECT id FROM utilisateurs WHERE email = :email");
    $e->execute(['email' => $_SESSION['email']]);
    $id = $e->fetch();

    $qr = $db->prepare("SELECT * FROM depense WHERE id_utilisateurs = :id_utilisateurs");
    $qr->execute(['id_utilisateurs' => $id['id']]);
    $depense = $qr->fetch();

    while ($depense = $qr->fetch()) {
        var_dump($depense);
    }

    ?>

    <h1> bienvenue le ratus economicus</h1>
    <p> votre email est /
        <?= $_SESSION['email']; ?>
    </p>

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


    <?php
}


?>