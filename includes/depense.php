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
?>
        <script>
            alert("dépense envoyée")
        </script>
    <?php
        header("Refresh: 1");
    } else {
    ?>
        <script>
            alert("tout les champs ne sont pas remplies ")
        </script>
<?php
    }
}
