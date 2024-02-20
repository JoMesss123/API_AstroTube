<?php

header('Content-Type: application/json;'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Headers: Content-Type');
header("Access-Control-Allow-Methods: POST, DELETE, PUT, OPTIONS");

$mysqli = new mysqli(Db::$host,Db:: $username,Db:: $password,Db:: $database);
if ($mysqli -> connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
    exit();
}


switch($_SERVER['REQUEST_METHOD']) {
    case 'PATCH':
        $reponse = new stdClass();
        $reponse->message = "diminuer du score";
        if(isset($_GET['id'])) {
            if ($requete = $mysqli ->prepare ("UPDATE api_video SET score = score-1 WHERE id=?;")){  
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
        break;
    default:
}

$mysqli->close();

?>