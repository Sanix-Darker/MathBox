<!DOCTYPE html>
<html>
<head>
  <title>MATHBOX</title>
  <script src="js/math.js"></script>

  <!-- load http://maurizzzio.github.io/function-plot/ -->
  <script src="js/d3.min.js"></script>
  <script src="js/function-plot@1.14.0.js"></script>

  <style>
/*    input[type=text] {
      width: 300px;
    }
    input {
      padding: 6px;
    }
    body, html, input {
      font-family: sans-serif;
      font-size: 11pt;

    }
    form {
      margin: 20px 0;
    }*/
  </style>
</head>
<body>
<?php 
  if(!isset($_REQUEST['iframe'])){ ?>
    <div style="background:grey;width:96.9%;position:fixed;padding:20px;margin-top:-39px;margin-left:-39px;"></div>
     <h2>Noyau MathBOX - Module des courbes</h2>
     <style>body{padding:30px;}#eq{width:33%;}#plot .canvas{width:70em!important;}</style>
<?php  }
?>

<form id="form">
  <label for="eq">Entrez une equation:</label>
  <input type="text" id="eq" value="log(x)"/>
  <input type="submit" value="Tracer"/>
</form>

<div id="plot"></div>

<!--<p>
  Plot library: <a href="https://github.com/maurizzzio/function-plot">https://github.com/maurizzzio/function-plot</a>
</p>-->

<script>
  function draw() {
    try {
      functionPlot({
        target: '#plot',
        data: [{
          fn: document.getElementById('eq').value,
          sampler: 'builtIn',
          graphType: 'polyline'
        }]
      });
    }
    catch (err) {
      console.log(err);
      alert(err);
    }
  }

  document.getElementById('form').onsubmit = function (event) {
    event.preventDefault();
    draw();
  };

  draw();
</script>

</body>
</html>