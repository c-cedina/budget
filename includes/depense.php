<?php


if (isset($_POST['formenregistrer'])) {

    extract($_POST);

    if (!empty($titre_depense) && !empty($montant)) {





        if (isset($_POST['formenregistrer'])) {
            // Autres traitements de formulaire ici...

            if ($_POST['date_type'] === 'date_actuelle') {
                // Utiliser la date actuelle
                $date_depense = date('Y-m-d'); // Format : Année-Mois-Jour (ex. 2023-09-15)
            } else {
                // Utiliser la date personnalisée
                $date_depense = $_POST['date_personnelle_input'];
            }

            // Reste du traitement de formulaire...
        }


        $q = $db->prepare("INSERT INTO depense(titre,montant,categorie,necessite,date,id_utilisateurs) VALUES(:titre,:montant,:categorie,:necessite,:date,:id_utilisateurs)");
        $q->execute([
            'titre' => $titre_depense,

            'montant' => $montant,
            'categorie' => $categorie,
            'necessite' => $achat_necessaire,
            'date' => $date_depense,
            'id_utilisateurs' => $id['id']


        ]);

        $e = $db->prepare("SELECT id FROM utilisateurs WHERE email = :email");
        $e->execute(['email' => $_SESSION['email']]);
        $id = $e->fetch();

        $qr = $db->prepare("SELECT SUM(montant) as total_depenses FROM depense WHERE id_utilisateurs = :id_utilisateurs");
        $qr->execute(['id_utilisateurs' => $id['id']]);
        $resultat = $qr->fetch();
        $somme_total_d['valeur'] = $resultat['total_depenses'];




        ?>


        <script>alert("dépense envoyée")</script>
        <?php



    } else {
        ?>
        <script>alert("tout les champs ne sont pas remplies ")</script>
        <?php
    }

}




?>