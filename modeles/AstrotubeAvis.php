<?php

require_once "./include/config.php";

class modele_avis {
    public $id_commentaire; 
    public $note;
    public $commentaire;
    public $date;
    public $auteur; 

   
    public function __construct($id_commentaire, $note, $commentaire, $date, $auteur) {
        $this->id_commentaire = $id_commentaire;
        $this->note = $note;
        $this->commentaire = $commentaire;
        $this->date = $date;
        $this->auteur = $auteur;
        
        
    }

    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        
        if ($mysqli -> connect_errno) {
            http_response_code(500); 
            $erreur = new stdClass();
            $erreur->message = "DEBOGAGE : Échec de connexion à la base de données MySQL: ";
            $erreur->error = $mysqli -> connect_error;
            echo json_encode($erreur);
            exit();
        } 

        return $mysqli;
    }

    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM commentaire ORDER BY id_commentaire");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_avis($enregistrement['id_commentaire'], $enregistrement['note'], $enregistrement['commentaire'], $enregistrement['date'], $enregistrement['auteur']);
        }

        return $liste;
    }



    public static function ObtenirUn($id_commentaire) {
        $resultat = new stdClass();

        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM commentaire WHERE id_commentaire=?")) {  
            $requete->bind_param("i", $id_commentaire); 

            $requete->execute(); 

            $resultat_requete = $requete->get_result(); 
            
            if($enregistrement = $resultat_requete->fetch_assoc()) { 
                $avis = new modele_avis($enregistrement['id_commentaire'], $enregistrement['note'], $enregistrement['commentaire'], $enregistrement['date'], $enregistrement['auteur']);
            } else {
                http_response_code(404);
                $resultat->message = "Erreur: Aucun avis trouvé";
                return $resultat;
            }   
            
            $requete->close(); 
            return $avis; 
        } else {
            http_response_code(500); 
            $resultat->message = "Une erreur a été détectée dans la requête utilisée : ";
            $resultat->erreur = $mysqli->error;
            return $resultat;
        }        
    }

   
    public static function ajouter( $note, $commentaire, $date, $auteur) {
        $resultat = new stdClass();

        $mysqli = self::connecter();
        
        
        if ($requete = $mysqli->prepare("INSERT INTO commentaire( note, commentaire, date, auteur ) VALUES( ?, ?, ?, ?)")) {      


        $requete->bind_param("isss",  $note, $commentaire, $date, $auteur);

        if($requete->execute()) { 
            $resultat->message = "Avis ajouté";  
        } else {
            http_response_code(500);
            $resultat->message =  "Une erreur est survenue lors de l'ajout";  
            $resultat->erreur = $requete->error;
        }

        $requete->close(); 

        } else {
            http_response_code(500); 
            $resultat->message = "Une erreur a été détectée dans la requête utilisée : ";
            $resultat->erreur = $mysqli->error;
        }

        return $resultat;
    }

    public static function modifier($id_commentaire, $note, $commentaire, $date, $auteur) {
        $resultat = new stdClass();

        $mysqli = self::connecter();
        
       
        if ($requete = $mysqli->prepare("UPDATE commentaire SET note=?, commentaire=?, date=?, auteur=? WHERE id=?")) {      

      
        $requete->bind_param("isssi", $note, $commentaire, $date, $auteur, $id_commentaire);

        if($requete->execute()) { 
            $resultat->message = "Avis modifié";  
        } else {
            http_response_code(500); 
            $resultat->message =  "Une erreur est survenue lors de l'édition: ";  
            $resultat->erreur = $requete->error;
        }

        $requete->close(); 

        } else  {
            http_response_code(500); 
            $resultat->message = "Une erreur a été détectée dans la requête utilisée : ";
            $resultat->erreur = $mysqli->error;
        }

        return $resultat;
    }

   
    public static function supprimer($id) {
        $resultat = new stdClass();

        $mysqli = self::connecter();
        
        
        if ($requete = $mysqli->prepare("DELETE FROM commentaire WHERE id=?")) {      

       

        $requete->bind_param("i", $id);

        if($requete->execute()) { 
            $resultat->message = "Avis supprimé";  
        } else {
            http_response_code(500); 
            $resultat->message = "Une erreur est survenue lors de la suppression: ";  
            $resultat->erreur = $requete->error;
        }

        $requete->close(); 

        } else  {
            http_response_code(500); 
            $resultat->message = "Une erreur a été détectée dans la requête utilisée : ";
            $resultat->erreur = $mysqli->error;
        }

        return $resultat;
    }
}

?>