<?php


// Rechercher la depense 
$rp['valeur'] = '?';

$mois_dps = '?';

$annee_dps = '?';

$categorie_dps = '?';

$achat_necessaire_dps = '?';

if (isset($_POST['formrenseignement'])) {

    extract($_POST);


    if (!empty($mois_dps) && !empty($annee_dps) && !empty($categorie_dps) && !empty($achat_necessaire_dps)) {




        $date_dps = $annee_dps . "-" . $mois_dps;




        $e = $db->prepare(
            "SELECT id 
        FROM utilisateurs
        WHERE email = :email"
        );
        $e->execute(['email' => $_SESSION['email']]);
        $id = $e->fetch();
        if ($categorie_dps == '%') {
            $qrp = $db->prepare(
                "SELECT SUM(montant)valeur FROM depense
            WHERE id_utilisateurs = :id_utilisateurs 
            and date like :dateDps 
            and necessite like :necessite"
            );
            $qrp->execute([

                'necessite' => $achat_necessaire_dps,
                'dateDps' => $date_dps,
                'id_utilisateurs' => $id['id']


            ]);
        } else {
            $qrp = $db->prepare("SELECT SUM(montant)valeur FROM depense
         WHERE id_utilisateurs = :id_utilisateurs 
         and date like :dateDps 
         and categorie like :categorie 
         and necessite like :necessite  ");

            $qrp->execute([


                'categorie' => $categorie_dps,
                'necessite' => $achat_necessaire_dps,
                'dateDps' => $date_dps,
                'id_utilisateurs' => $id['id']


            ]);
        }

        $rp = $qrp->fetch();
        // var_dump($rp);




    }
}
