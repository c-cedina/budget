<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css ">
    <link rel="stylesheet" type="text/css" href="css/session.css ">
    <link rel="stylesheet" type="text/css" href="css/login.css ">
    <link rel="stylesheet" type="text/css" href="css/signup.css ">
    <title>Formulaire de Dépenses</title>

</head>


<?php
include 'includes/database.php';

$email_s = base64_decode($_GET['session']);
// Trouver id
$e = $db->prepare("SELECT id FROM utilisateurs WHERE email = :email");
$e->execute(['email' => $email_s]);
$id = $e->fetch();

// affiche toutes les dépenses
$qr_toute = $db->prepare("SELECT * FROM depense WHERE id_utilisateurs = :id_utilisateurs ");
$qr_toute->execute(['id_utilisateurs' => $id['id']]);
$nbdepense_toute = $qr_toute->rowCount();
$i = 0;
while ($depense_toute = $qr_toute->fetch()) {
    $id_depense[$i] = $depense_toute['id'];
    $titre[$i] = $depense_toute['titre'];
    $montant[$i] = $depense_toute['montant'];
    $necessite[$i] = $depense_toute['necessite'];
    $date_depense[$i] = $depense_toute['date'];
    $categorie[$i] = $depense_toute['categorie'];

    // var_dump($depense_toute);
    $i++;
}
if (isset($_GET['depense'])) {
    $id_depense_url = $_GET['depense'];
    $indice = $id_depense_url - 1;
}
if (isset($_POST['formupdate'])) {
    extract($_POST);
    if (!empty($titre_depense) && !empty($montant)) {
        if (isset($_POST['formupdate'])) {
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
        $id_depense_rqt = $id_depense[$indice];
        $q = $db->prepare("UPDATE depense SET titre=:titre, montant=:montant, categorie=:categorie, necessite=:necessite, date=:date, id_utilisateurs=:id_utilisateurs WHERE id=:id_depense");
        $q->execute([
            'titre' => $titre_depense,
            'montant' => $montant,
            'categorie' => $categorie,
            'necessite' => $achat_necessaire,
            'date' => $date_depense,
            'id_utilisateurs' => $id['id'],
            'id_depense' => $id_depense_rqt // Assurez-vous que cette valeur correspond à l'ID de la dépense que vous souhaitez mettre à jour.
        ]);

?>
        <script>
            alert("dépense modifiée")
            window.location.href = "https://gestiond-depense-50c701015e05.herokuapp.com/";
        </script>

        <script>
            alert("tout les champs ne sont pas remplies ")
        </script>
<?php
    }
}

$year_depense_upd = substr($date_depense[$indice], 0, 4);
$month_depense_upd = substr($date_depense[$indice], 5, 2);
$day_depense_upd = substr($date_depense[$indice], 8, 2);
$date_depense_upd = $day_depense_upd . '-' . $month_depense_upd . '-' . $year_depense_upd;
?>


<div id=ajtdepense>
    <h1>Modification de la Dépenses <?= $id_depense_url ?></h1>
    <form id="update_dps" method="post">
        <label for="titre_depense">Titre de la dépense :</label>
        <input type="text" id="titre_depense" name="titre_depense" value="<?= $titre[$indice] ?>" placeholder="ecran plat full hd" required><br><br>

        <!-- <label for="commentaire_depense">Commentaire :</label>
    <textarea id="commentaire_depense" name="commentaire_depense" rows="4" cols="50"></textarea><br><br> -->


        <label for="montant">Montant de la dépense :</label>
        <input type="text" id="montant" name="montant" value="<?= $montant[$indice] ?>" placeholder="578.80" required pattern="^[0-9]+(\.[0-9]{0,1,2})?$"><br>
        <span class="error"> format d'écriture sous forme xxx.xx avec un point <br>
            Exemples "12" ou bien "12.3" ou "12.34" </span><br><br>
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
        </select><br>
        Anciennement : <?= $categorie[$indice] ?><br><br>

        <label for="achat_necessaire">Achat nécessaire ou non :</label>
        <select id="achat_necessaire" name="achat_necessaire" required>
            <option value="necessaire">Nécessaire</option>
            <option value="non_necessaire">Non nécessaire</option>
        </select> <br>
        Anciennement : <?= $necessite[$indice] ?><br><br>


        <label for="date_depense">Date de la dépense :</label>
        <input type="radio" id="date_actuelle" name="date_type" value="date_actuelle" checked>
        <label for="date_actuelle">Date actuelle</label>

        <input type="radio" id="date_personnelle" name="date_type" value="date_personnelle">
        <label for="date_personnelle">Date personnalisée :</label>
        <input type="date" id="date_personnelle_input" name="date_personnelle_input" disabled>

        <script>
            document.getElementById("date_personnelle").addEventListener("change", function() {
                document.getElementById("date_personnelle_input").disabled = !this.checked;
            });
        </script><br>
        Anciennement : <?= $date_depense_upd ?>
        <br><br>
        <input type="submit" id="formupdate" name="formupdate" value="Modifier">
    </form>
    <br>
    <script>
        document.getElementById('update_dps').onsubmit = function() {
            return confirm('Êtes-vous sûr de vouloir faire cette Modification ?');
        }
    </script>
</div>