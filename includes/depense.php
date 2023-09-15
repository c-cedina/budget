<?php


if (isset($_POST['formenregistrer'])) {

    extract($_POST);
    ?>
    <script>alert("debut")</script>
    <?php
    if (!empty($titre_depense) && !empty($montant)) {

        ?>
        <script>alert("essaie")</script>
        <?php



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


        $q = $db->prepare("INSERT INTO depense(titre,commentaire,montant,categorie,necessite,date,id_utilisateurs) VALUES(:titre,:commentaire,:montant,:categorie,:necessite,:date,:id_utilisateurs)");
        $q->execute([
            'titre' => $titre_depense,
            'commentaire' => $commentaire_depense,
            'montant' => $montant,
            'categorie' => $categorie,
            'necessite' => $achat_necessaire,
            'date' => $date_depense,
            'id_utilisateurs' => $id['id']


        ]);
        echo $date_type;
    } else {
        echo "erreur mot de passe";
    }

}


?>