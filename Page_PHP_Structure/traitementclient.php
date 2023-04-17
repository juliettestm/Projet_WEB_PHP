<?php
session_start();

	function valider_donnees($donnees){
		$donnees=trim($donnees);
		$donnees=stripslashes($donnees);
		$donnees=htmlspecialchars($donnees);
		return $donnees;
	}

		if($_SERVER['REQUEST_METHOD']== 'POST' && !empty($_POST['Envoyer'])){
			if($_FILES['image']['size']<100000000000 && ($_FILES['image']['type'] =="image/png" || $_FILES['image']['type'] =="image/gif" || $_FILES['image']['type'] =="image/jpg")){
				move_uploaded_file($_FILES['image']['tmp_name'],"./images/". basename($_FILES['image']['name']));
                $ok=1;
			}
		}  
        header("Location:../Page_PHP_Planetes_Index/serv_client.php");
?>