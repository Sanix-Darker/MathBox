<link rel="stylesheet" href="css/style.css">
<?php 
  if(!isset($_REQUEST['iframe'])){ ?>
    <div style="background:grey;width:102%;position:absolute;padding:20px;margin-top:-39px;margin-left:-39px;"></div>
     <h2>Noyau MathBOX - Terminal de commande MathBox(TIM)</h2>
     <style>body{margin:30px;}.gradientCont{width:60%;height:26.7em;}</style>
<?php  }
?>
<div class="gradientCont">
	<div class="mainCont">
		<div class="terminalCont">
			<div id="terminalReslutsCont" <?php if(isset($_REQUEST['iframe'])){ echo 'style="height:430px;"';} ?>></div>
			<form>
				<input id="terminalTextInput" type="text" placeholder="Entrez une commande MathBox ou tapez sur help" autocomplete="off">
			</form>
		</div>
	</div>
</div>

<div id="pretty" style="display:none;">$$$$</div>
<div id="result" style="display:none;"></div>
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/math.js"></script>
<script src="js/index.js"></script>

