<?php
	header('Content-Type: application/json;'); 
	header('Access-Control-Allow-Origin: *'); 
    require_once './controlleurs/AstrotubeAvis.php';
    $controlleurAstrotubeAvis=new ControlleurAstrotubeAvis;

	switch($_SERVER['REQUEST_METHOD']) { 
		case 'GET': 
			if(isset($_GET['id'])) { 
				
                $controlleurAstrotubeAvis->afficherFicheJSON($_GET['id']);
			} else { 
				 
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