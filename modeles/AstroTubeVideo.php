<?php

require_once "./include/config.php";

class modele_video {
    public $id; 
    public $titre; 
    public $description;
    public $code;      
    public $url;
    public $source;
    public $date_apparution;
    public $duree;
    public $nb_vue;
    public $nb_like;
    public $score;  
    public $nb_commentaire;
    public $sous_titre;
    public $verified;
    public $presentation;
    public $categories;


    
    public function __construct($id, $titre, $description, $code, $url, $source, $date_apparution, $duree, $nb_vue, $nb_like, $score, $nb_commentaire, $sous_titre, $verified, $presentation, $categories) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->code = $code;
        $this->url = $url;
        $this->source = $source;
        $this->date_apparution = $date_apparution;
        $this->duree = $duree;
        $this->nb_vue = $nb_vue;
        $this->nb_like = $nb_like;
        $this->score = $score;       
        $this->nb_commentaire = $nb_commentaire;
        $this->sous_titre = $sous_titre;
        $this->verified = $verified;
        $this->presentation = $presentation;
        $this->categories = $categories;

    }

   
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   
            exit();
        } 

        return $mysqli;
    }

   
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM api_video ORDER BY id");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_video($enregistrement['id'], $enregistrement['titre'], $enregistrement['description'], $enregistrement['code'], $enregistrement['url'], $enregistrement['source'], $enregistrement['date_apparution'], $enregistrement['duree'], $enregistrement['nb_vue'], $enregistrement['nb_like'], $enregistrement['score'], $enregistrement['nb_commentaire'], $enregistrement['sous_titre'], $enregistrement['verified'], $enregistrement['presentation'], $enregistrement['categories']);
        }

        return $liste;
    }

    
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM api_video WHERE id=?")) {  
            $requete->bind_param("i", $id); 

            $requete->execute();

            $result = $requete->get_result(); 
            
            if($enregistrement = $result->fetch_assoc()) { 
                $video = new modele_video($enregistrement['id'], $enregistrement['titre'], $enregistrement['description'], $enregistrement['code'], $enregistrement['url'],$enregistrement['source'], $enregistrement['date_apparution'], $enregistrement['duree'], $enregistrement['nb_vue'], $enregistrement['nb_like'], $enregistrement['score'], $enregistrement['nb_commentaire'],  $enregistrement['sous_titre'], $enregistrement['verified'], $enregistrement['presentation'], $enregistrement['categories']);
            } else {
                
                return null;
            }   
            
            $requete->close(); 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   
            echo $mysqli->error;
            return null;
        }

        return $video;
    }

    
    public static function ajouter($titre, $description, $code,  $url, $source, $date_apparution, $duree, $nb_vue, $nb_like, $score, $nb_commentaire, $sous_titre, $verified, $presentation, $categories) {
        $message = '';

        $mysqli = self::connecter();
        
       
        if ($requete = $mysqli->prepare("INSERT INTO api_video(titre, description, code,  url, source, date_apparution, duree, nb_vue, nb_like, score, nb_commentaire, sous_titre, verified, presentation, categories) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);" ))  {      

       
        $requete->bind_param("ssssssiiiiisiis", $titre, $description, $code,  $url, $source, $date_apparution, $duree, $nb_vue, $nb_like, $score, $nb_commentaire, $sous_titre, $verified, $presentation, $categories);

        if($requete->execute()) { 
            $message = "Vidéo ajouter";  
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  
        }

        $requete->close(); 

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

   
    public static function modifier($id, $titre, $description, $code,  $url, $source, $date_apparution, $duree, $nb_vue, $nb_like, $score,  $nb_commentaire, $sous_titre, $verified, $presentation, $categories) {
        $message = '';

        $mysqli = self::connecter();
        
        
        if ($requete = $mysqli->prepare("UPDATE api_video SET titre=?, description=?, code=?,  url=?, source=?, date_apparution=?, duree=?, nb_vue=?, nb_like=?, score=?, nb_commentaire=?, sous_titre=?, verified=?, presentation=?, categories=?  WHERE id=?")) {      

       

        $requete->bind_param("ssssssiiiiisiiisi", $titre, $description, $code,  $url, $source, $date_apparution, $duree, $nb_vue, $nb_like, $score,  $nb_commentaire, $sous_titre, $verified, $presentation, $categories, $id);

        if($requete->execute()) { 
            $message = "Vidéo modifié";  
        } else {
            $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;  
        }

        $requete->close(); 

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

   
    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
        
        
        if ($requete = $mysqli->prepare("DELETE FROM api-video WHERE id=?")) {      

        

        $requete->bind_param("i", $id);

        if($requete->execute()) { 
            $message = "Vidéo supprimé";  
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  
        }

        $requete->close(); 

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}

?>