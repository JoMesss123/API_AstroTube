<?php
header('Content-Type: application/json;'); 
header('Access-Control-Allow-Origin: *'); 
require_once './controlleurs/AstroTubeVideo.php';
$controlleurAstroTubeVideo=new ControlleurAstroTubeVideo;


switch($_SERVER['REQUEST_METHOD']) { 
    case 'GET': 
        if(isset($_GET['id'])) { 
        $controlleurAstroTubeVideo->afficherFicheJSON($_GET['id']);
        } else {
        $controlleurAstroTubeVideo->afficherJSON();
    } 
    break; 
    case 'POST': 
        $corpsJSON = file_get_contents('php://input'); 
        $data = json_decode($corpsJSON, TRUE);
        $controlleurAstroTubeVideo->ajouterJSON($data);
    break; 
    case 'PUT': 
        if(isset($_GET['id'])) { 
        $corpsJSON = file_get_contents('php://input'); 
        $data = json_decode($corpsJSON, TRUE);
        $controlleurAstroTubeVideo->modifierJSON($data);
        } 
    break; 
    case 'DELETE': 
        if(isset($_GET['id'])) { 
        $controlleurAstroTubeVideo->supprimerJSON($_GET['id']); 
        } 
    break; 
    default: 
} 
?>