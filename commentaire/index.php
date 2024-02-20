<?php
	header('Content-Type: application/json;'); 
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Headers: Content-Type');
	header("Access-Control-Allow-Methods: POST, DELETE, PUT, OPTIONS");
    require_once '../controlleurs/AstrotubeAvis.php';
    $controlleurAstrotubeAvis=new ControlleurAstrotubeAvis;

	switch($_SERVER['REQUEST_METHOD']) { 
		case 'GET': 
			if(isset($_GET['id_commentaire'])) { 
				
                $controlleurAstrotubeAvis->afficherFicheJSON($_GET['id_commentaire']);
			} else if (isset($_GET['id_video'])) { 
				$controlleurAstrotubeAvis->afficherListeJSON($_GET['id_video']);
			}
				else {
				 
                $controlleurAstrotubeAvis->afficherJSON();
			} 
			break; 
		case 'POST':
            $corpsJSON = file_get_contents('php://input'); 
            $data = json_decode($corpsJSON, TRUE);
            $controlleurAstrotubeAvis->ajouterJSON($data);
			break; 
		case 'PUT': 
			
			$corpsJSON = file_get_contents('php://input'); 
			$data = json_decode($corpsJSON, TRUE);
			$controlleurAstrotubeAvis->modifierJSON($data);
		
			break; 
		case 'DELETE': 
			
			$controlleurAstrotubeAvis->supprimerJSON(); 
			
		break; 
		default: 
} 
?>