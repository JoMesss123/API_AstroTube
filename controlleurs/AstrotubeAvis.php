<?php

require_once '../modeles/AstrotubeAvis.php';

class ControlleurAstrotubeAvis {

    
    function afficherJSON() {
        $resultat = modele_avis::ObtenirTous();
        echo json_encode($resultat);
    }

    function afficherFicheJSON($id_commentaire) {
        $resultat = modele_avis::ObtenirUn($id_commentaire);
        echo json_encode($resultat);
    }
    
    
    function afficherListeJSON($id_video) {
        $resultat = modele_avis::ObtenirTousPourVideo($id_video);
        echo json_encode($resultat);
    }

    
    function ajouterJSON($data) {
        $resultat = new stdClass();

        if(isset($data['note']) && isset($data['commentaire']) && isset($data['date']) && isset($data['auteur']) && isset($data['id_video']))
    {
            $resultat = modele_avis::ajouter($data['note'], $data['commentaire'], $data['date'], $data['auteur'], $data['id_video']);
        } else {
            http_response_code(500); 
            $resultat->message = "Impossible d'ajouter un avis. Des informations sont manquantes";
        }
        echo json_encode($resultat);
    }

  
    function modifierJSON($data) {
        $resultat = new stdClass();
        if(isset($_GET['id_commentaire'])) {
           if(isset($_GET['id_commentaire']) && isset($data['note']) && isset($data['commentaire']) && isset($data['date']) && isset($data['auteur']) && isset($data['id_video']) )
             {
                $resultat = modele_avis::modifier($_GET['id_commentaire'], $data['note'], $data['commentaire'], $data['date'], $data['auteur'], $data['id_video']); 
            } else {
                http_response_code(500); 
                $resultat = "Impossible de modifier l'avis. Des informations sont manquantes";
            }
            
        } else {
            http_response_code(500); 
            $resultat->message = "ID manquant";
        }  
        echo json_encode($resultat);     
    }

    

    function supprimerJSON() {
        $resultat = new stdClass();
        if(isset($_GET['id_commentaire'])) {
            $resultat = modele_avis::supprimer($_GET['id_commentaire']);
        } else {
            http_response_code(500); 
            $resultat->message = "ID manquant";
        }  
        echo json_encode($resultat);
    }
}

?>