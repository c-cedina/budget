<?php
$e = $db->prepare("SELECT id FROM utilisateurs WHERE email = :email");
$e->execute(['email' => $_SESSION['email']]);
$id = $e->fetch();

include 'includes/depense.php';

$qr = $db->prepare("SELECT * FROM depense WHERE id_utilisateurs = :id_utilisateurs");
$qr->execute(['id_utilisateurs' => $id['id']]);
$depense = $qr->fetch();

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


?>