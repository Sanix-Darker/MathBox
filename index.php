<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>MathBox</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
		<link rel="stylesheet" href="css/style.css">
	</head>
<style>.info a:hover{text-decoration:none;}</style>
	<body>
		<div class="container" style="margin-top:-20px;">
		  <div class="info" style="color:white!important;">
			<h1 style="color:white;font-size:3em;  text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);">MathBox</h1><!--<i style="color:white;">Fait par <a href="https://github.com/Sanix-Darker" style="color:white;">SAA DJIO</a> et <u>MOUTAPAM</u></a></i>-->
		  </div>
		</div>
		<div class="form">
		  <div class="thumbnail" style="background:white!important;"><img src="logo.png" style="width:100%;"/></div>
		  <form class="register-form">
			<center><div id="resulti"></div></center>
			<input type="text" placeholder="Votre Nom" name="nom" id="nom"/>
			<input type="text" placeholder="Votre Matricule" name="matricule" id="matricule"/>
			<input type="password" placeholder="Votre Mot de passe" name="pass" id="pass"/>
			<input type="text" placeholder="Votre Adresse Email(Ex: moi@yahoo.fr)" name="email" id="email"/>
			<button id="ins">Inscription</button>
			<p class="message">Deja un compte? <a href="#">Connectez vous</a></p>
		  </form>
		  <form class="login-form">
			<center><div id="resultc"></div></center>
			<input type="text" placeholder="Matricule ou Email" name="matricule" id="matriculec"/>
			<input type="password" placeholder="Mot de passe" name="pass" id="passc"/>
			<button  id="conn">Connexion</button>
			<p class="message">Pas de compte? <a href="#" >Creer un compte</a></p>
		  </form>
		</div>
		<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
		  <source src="svideo.mp4" type="video/mp4"/>
		</video>
		<script src="js/jquery.min.js"></script>
		
<script>
	//Connexion
	$('#conn').click(function(e){
		if(document.getElementById('matriculec').value!='' && document.getElementById('passc').value!=''){
			$('#resultc').html('<i style="color:red;"><b>Chargement en cours...</b></i>');
			var xh;//on déclare l'instance
			
			if (window.XMLHttpRequest)
				xh = new XMLHttpRequest();//Firefox, Opera, Konqueror, Safari, IE 7...
			else if (window.ActiveXObject)
				xh = new ActiveXObject('Microsoft.XMLHTTP'); // Internet Explorer < 7.
			else
				alert('JavaScript : Ce navigateur ne supporte pas les objets XMLHttpRequest...'); // vieux nav
			
			xh.open('GET','ajax/auth.php?conn=1OPD21Re4dPOL32h4UIOR&matricule='+document.getElementById('matriculec').value+'&pass='+document.getElementById('passc').value,true);
			xh.onreadystatechange = function()
			{
				if(xh.readyState == 4){
					//alert(xh.responseText);
					$('#resultc').html(xh.responseText);
				}
			}
			xh.send(null);
			return false;
		} else {$('#resultc').html("<i style='color:red;'>Veuillez tout remplir convenablement</i>");}
	});

	//inscription
	$('#ins').click(function(e){
		if(document.getElementById('email').value!='' && document.getElementById('pass').value!='' && document.getElementById('matricule').value!=''){
			$('#resulti').html('<i style="color:red;"><b>Chargement en cours...</b></i>');

			var xh;//on déclare l'instance
			if (window.XMLHttpRequest)
				xh = new XMLHttpRequest();//Firefox, Opera, Konqueror, Safari, IE 7...
			else if (window.ActiveXObject)
				xh = new ActiveXObject('Microsoft.XMLHTTP'); // Internet Explorer < 7.
			else
				alert('JavaScript : Ce navigateur ne supporte pas les objets XMLHttpRequest...');// vieux nav

			
			xh.open('GET','ajax/auth.php?ins=1Q4DrKAJ@SA&email='+document.getElementById('email').value+'&nom='+document.getElementById('nom').value+'&matricule='+document.getElementById('matricule').value+'&pass='+document.getElementById('pass').value,true);
			xh.onreadystatechange = function()
			{
				if(xh.readyState == 4){$('#resulti').html(xh.responseText);}
			}
			xh.send(null);
			return false;
		} else
			$('#resulti').html("<i style='color:red;'>Veuillez tout remplir convenablement</i>");
	});
</script>
		<script src="js/index.js"></script>
		
	</body>
</html>
