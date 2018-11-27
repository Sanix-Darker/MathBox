<?php 
	include('db.php');
	session_start();

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Historique MathBox</title>
</head>
<body>
	<header>
		<h1 style="font-size:6.3em;text-shadow: 0 5px 7px rgba(0,0,0,0.9);">Mon Historique <i>MathBox</i></h1>

	</header>

	<section id="cd-timeline" class="cd-container">

		<?php 
			// $R=$BD->query('');
			// while ($d=$R->fetch()) {
			// 	echo '
			// 		<div class="cd-timeline-block">
			// 			<div class="cd-timeline-img cd-picture">
			// 				<img src="img/cd-icon-picture.svg" alt="Picture">
			// 			</div>
			// 			<div class="cd-timeline-content">
			// 				<h2>Operation: </h2>
			// 				<p>Resultat: .</p>
			// 				<span class="cd-date">10 Mars</span>
			// 			</div>
			// 		</div>
			// 	';
			// }
		?>
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div>
			<div class="cd-timeline-content">
				<h2>Operation: [[34,10,5],[1,27,3]]+[[4,3,106],[14,11,7]]</h2>
				<p>Resultat: [[38, 13, 111], [15, 38, 10]]</p>
				<span class="cd-date">10 Mars</span>
			</div>
		</div>		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div>
			<div class="cd-timeline-content">
				<h2>Operation: det([[38, 13, 111], [15, 38, 10], [5, 8, 144]])</h2>
				<p>Resultat: 1.69696e+5</p>
				<span class="cd-date">10 Mars</span>
			</div>
		</div>		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div>
			<div class="cd-timeline-content">
				<h2>Operation: 3*[2,45]</h2>
				<p>Resultat: [6, 135]</p>
				<span class="cd-date">10 Mars</span>
			</div>
		</div>		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div>
			<div class="cd-timeline-content">
				<h2>Operation: cot([[38, 13, 111], [15, 38, 10]])</h2>
				<p>Resultat: [[3.222587388333856, 2.159728636267592, 0.5812775167435176], [-1.1682333052318372, 3.222587388333856, 1.5423510453569202]]</p>
				<span class="cd-date">10 Mars</span>
			</div>
		</div>

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div>
			<div class="cd-timeline-content">
				<h2>Operation: 27/3456</h2>
				<p>Resultat: 0.0078125</p>
				<span class="cd-date">10 Mars</span>
			</div>
		</div>


	</section> <!-- cd-timeline -->
<script src="../js/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>