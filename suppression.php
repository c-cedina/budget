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
$id_depense_rqt = $id_depense[$indice];
if (isset($_POST['formdelete'])) {
    $q = $db->prepare("DELETE FROM depense WHERE id = :id_depense");
    $q->execute(['id_depense' => $id_depense_rqt]);
?>
    <script>
        alert("dépense modifiée")
        window.location.href = "https://gestiond-depense-50c701015e05.herokuapp.com/";
    </script>
<?php
}
?>
<div id=ajtdepense>
    <h1>Suppression de la Dépenses <?= $id_depense_url ?></h1>
    <p id="toute_depense">
        Achat au nom de
        "<?= $titre[$indice] ?>" <br>
        du montant de
        "<?= $montant[$indice] ?>"
        € à la date de
        <?php
        // creer cette fonction to do
        $year_depense_get = substr($date_depense[$indice], 0, 4);
        $month_depense_get = substr($date_depense[$indice], 5, 2);
        $day_depense_get = substr($date_depense[$indice], 8, 2);
        $date_depense_get = $day_depense_get . '-' . $month_depense_get . '-' . $year_depense_get;
        ?>
        "<?= $date_depense_get ?>" <br>
        de categorie
        "<?= $categorie[$indice] ?>"
        et
        "<?= $necessite[$indice] ?>". <br>
    </p>
    <form id="delete_dps" method="post">
        <input type="submit" id="formdelete" name="formdelete" value="Supprimer">
    </form>
    <script>
        document.getElementById('delete_dps').onsubmit = function() {
            return confirm('Êtes-vous sûr de vouloir faire cette Modification ?');
        }
    </script>
</div>