<?php

require_once './modeles/AstroTubeVideo.php';

class ControlleurAstroTubeVideo {

    function afficherJSON() {
        $video = modele_video::ObtenirTous();
        echo json_encode($video);
    }

    function afficherFicheJSON($id_video) {
        $video = modele_video::ObtenirUn($id_video);
        echo json_encode($video);
    }

    function ajouterJSON($data) {
        $resultat = new stdClass();
        if (isset($data['titre']) && isset($data['description']) && isset($data['code']) && isset($data['url']) && isset($data['source']) && isset($data['date_apparution']) && 
            isset($data['duree'])&& isset($data['nb_vue']) && isset($data['nb_like']) && isset($data['score']) && isset($data['nb_commentaire']) && isset($data['sous_titre']) && 
            isset($data['verified']) && isset($data['presentation']) && isset($data['categories'])) {
            $resultat->message = modele_video::ajouter($data['titre'], $data['description'], $data['code'], $data['url'], $data['source'], $data['date_apparution'], $data['duree'], $data['nb_vue'], $data['nb_like'], $data['score'], $data['nb_commentaire'], $data['sous_titre'], $data['verified'], $data['presentation'], $data['categories']);
        } else {
            http_response_code(500); 
            $resultat->message = "Impossible d'ajouter une vidéo. Des informations sont manquantes";
        }
        echo json_encode($resultat);
    }

    function modifierJSON($data) {
        $resultat = new stdClass();
        if(isset($_GET['id'])){
            if (isset($_GET['id']) && isset($data['titre']) && isset($data['description']) && isset($data['code']) && isset($data['url']) && isset($data['source']) 
                && isset($data['date_apparution']) && isset($data['duree']) && isset($data['nb_vue']) && isset($data['nb_like']) && isset($data['score']) 
                && isset($data['nb_commentaire']) && isset($data['sous_titre']) && isset($data['verified']) && isset($data['presentation']) && isset($data['categories'])) 
            {
            $resultat->message = modele_video::modifier($_GET['id'], $data['titre'], $data['description'], $data['code'], $data['url'], $data['source'], $data['date_apparution'], 
                $data['duree'], $data['nb_vue'], $data['nb_like'], $data['score'], $data['nb_commentaire'], $data['sous_titre'], $data['verified'], $data['presentation'], 
                $data['categories']);
            } else {
            http_response_code(500); 
                $resultat = "Impossible de modifier la video . Des informations sont manquantes";
            }
        } else {
            http_response_code(500); 
            $resultat->message = "ID manquant";
        }  

        echo json_encode($resultat);
    }

    function supprimerJSON($id) {
        $resultat = new stdClass();
        $resultat->message = modele_video::supprimer($_GET['id']);
        echo json_encode($resultat);
    }

}
?>
