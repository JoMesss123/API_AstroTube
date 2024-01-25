<?php

header('Content-Type: application/json;');
header('Access-Control-Allow-Origin: *');
require_once "../include/config.php";

$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli -> connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
    exit();
}


switch($_SERVER['REQUEST_METHOD']) {
    case 'PATCH':
        $reponse = new stdClass();
        $reponse->message = "Augmentation du score";
        if(isset($_GET['id'])) {
            if ($requete = $mysqli ->prepare ("UPDATE api_video SET score = score+1 WHERE id=?;")){  
                $requete->bind_param("i", $_GET['id']);
              
                if($requete->execute()){
                    $reponse->message .= "Succès";
                } else {
                    $reponse->message .= "Échec";
                    }

                    
                $requete->close();
            }

        }
        else{
            $reponse->message = "Échec";
        }

        echo json_encode($reponse);
    default:
}

$mysqli->close();

?>