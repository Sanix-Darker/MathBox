<?php
	include('../include/db.php');
	session_start();

	if(isset($_GET['conn'])){  /*Connexion tout cours*/

			/*On control si l'utilisateur a bel et bien Un compte*/
			$R1=$BD->prepare('SELECT ID_USER FROM user WHERE (EMAIL_USER=? OR MATRICULE_USER=?) AND PASS_USER=?');
			$R1->execute(array(a($_GET['matricule']),a($_GET['matricule']),a(md5($_GET['pass']))));
			$dr=$R1->fetch();
			$R1->closecursor();

			if(!$dr){ //Si le compte ne correspond pas
				echo '<i style="color:red;font-size:12px;">Cet Identifiant et mot de passe ne correspondent pas</i>';
			}
			else{// Si le compte correspond

				setcookie('mathbox_matricule',$_GET['matricule'],time()+725760,null,null,false,true);//On enregistre les cookies
				setcookie('mathbox_pass',md5($_GET['pass']),time()+725760,null,null,false,true);

				$R1=$BD->prepare('SELECT * FROM user WHERE (EMAIL_USER=? OR MATRICULE_USER=?) AND PASS_USER=?');
				$R1->execute(array(a($_GET['matricule']),a($_GET['matricule']),a(md5($_GET['pass']))));
				$dr=$R1->fetch();
				
				$_SESSION['id']=$dr['ID_USER'];
				$_SESSION['nom']=$dr['NOM_USER'];
				$_SESSION['matricule']=$dr['MATRICULE_USER'];
				$_SESSION['email']=$dr['EMAIL_USER'];
				$R1->closecursor();			

				echo '<svg class="loader" width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><circle class="circle" fill="none" stroke-width="2" stroke-linecap="round" cx="16" cy="16" r="14"></circle></svg>
							<span class="loading-txt text-muted"></span>
							<script>document.location="page/index.php?Welcome_'.$_SESSION['nom'].'";</script>';
			}
	}
	else if(isset($_GET['ins'])){/*Si l'utilisateur veu s'inscrire */
		
		if(strlen($_GET['email'])>6 AND strlen($_GET['pass'])>5 AND strlen($_GET['nom'])>3 AND strlen($_GET['matricule'])>7){
				
				$R1=$BD->prepare('SELECT ID_USER FROM user WHERE (EMAIL_USER=? OR MATRICULE_USER=?) AND PASS_USER=?');
				$R1->execute(array(a($_GET['matricule']),a($_GET['matricule']),a(md5($_GET['pass']))));
				$re=$R1->fetch();

				if($re){
					echo '<i style="color:red;">Ces informations appartiennent d&eacute;ja &agrave; un compte!</i>';
				}else{
					
					$R=$BD->prepare('INSERT INTO user(MATRICULE_USER, NOM_USER, EMAIL_USER, PASS_USER, DATE_CREATIONUSER) VALUES(?,?,?,?,NOW())');
					$R->execute(array(a($_GET['matricule']),a($_GET['nom']),a($_GET['email']),a(md5($_GET['pass']))));
					
					setcookie('mathbox_matricule',$_GET['matricule'],time()+725760,null,null,false,true);//On enregistre les cookies
					setcookie('mathbox_pass',md5($_GET['pass']),time()+725760,null,null,false,true);
					
					//On recupere le dernier ID
					$stmt = $BD->query("SELECT LAST_INSERT_ID()");
					$lastId = $stmt->fetch(PDO::FETCH_NUM);
					$lastId = $lastId[0];
					
					$_SESSION['id']=$lastId;
					$_SESSION['nom']=$_GET['nom'];
					$_SESSION['matricule']=$_GET['matricule'];
					$_SESSION['email']=$_GET['email'];

				
				echo '<center><svg class="loader" width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><circle class="circle" fill="none" stroke-width="2" stroke-linecap="round" cx="16" cy="16" r="14"></circle></svg>
				</center><script>document.location="page/index.php?Welcome_'.$_SESSION['nom'].'";</script>';
				}
		}else{
			if (strlen($_GET['email'])>6) {
				echo '<i style="color:red;font-size:12px;">L\'email doit avoir plus de 6 caractères</i>';
			}
			if (strlen($_GET['pass'])>5) {
				echo '<i style="color:red;font-size:12px;">Le mot de passe doit avoir plus de 5 caractères</i>';
			}
			if (strlen($_GET['nom'])>3) {
				echo '<i style="color:red;font-size:12px;">Le nom doit avoir plus de 3 caractères</i>';
			}
			if (strlen($_GET['matricule'])>8) {
				echo '<i style="color:red;font-size:12px;">Le numéro doit avoir plus de 8 caractères</i>';
			}
			
		}
	}