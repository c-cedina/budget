<?php
$e = $db->prepare("SELECT id FROM utilisateurs WHERE email = :email");
$e->execute(['email' => $_SESSION['email']]);
$id = $e->fetch();

include 'includes/depense.php';

$qr = $db->prepare("SELECT * FROM depense WHERE id_utilisateurs = :id_utilisateurs");
$qr->execute(['id_utilisateurs' => $id['id']]);
$depense = $qr->fetch();
$nbdepense = $qr->rowCount();

// affiche les dépenses

$qr_toute = $db->prepare("SELECT * FROM depense WHERE id_utilisateurs = :id_utilisateurs ");
$qr_toute->execute(['id_utilisateurs' => $id['id']]);
$nbdepense_toute = $qr_toute->rowCount();
$i = 0;
while ($depense_toute = $qr_toute->fetch()) {

    $titre[$i] = $depense_toute['titre'];
    $montant[$i] = $depense_toute['montant'];
    $necessite[$i] = $depense_toute['necessite'];
    $date_depense[$i] = $depense_toute['date'];
    $categorie[$i] = $depense_toute['categorie'];

    // var_dump($depense_toute);
    $i++;
}




$qsm = $db->prepare("SELECT SUM(montant)valeur FROM depense WHERE id_utilisateurs = :id_utilisateurs");
$qsm->execute(['id_utilisateurs' => $id['id']]);
$somme_total_d = $qsm->fetch();

// // while ($depense = $qr->fetch()) {
// var_dump($somme_total_d);
// }
$ce_mois = date('Y-m') . '%';
$qsm_mois = $db->prepare("SELECT SUM(montant)valeur FROM depense WHERE id_utilisateurs = :id_utilisateurs and date LIKE :mois ");
$qsm_mois->execute(['id_utilisateurs' => $id['id'], 'mois' => $ce_mois]);
$somme_total_d_mois = $qsm_mois->fetch();
