<?php
session_start();

$temErro = error_reporting(0);
$mostrarerros = ini_set('display_error',0);

$dados = filter_input_array(INPUT_POST);
for ($i=1; $i <= 85; $i++) { 
$allDados[$i] =  $dados['perguntas'.$i];

$lendados = count($allDados);
if (!empty($allDados[$i]) && $lendados == '85'){
  $_SESSION['dadosValidaos'] = true;
  
}else{
  $_SESSION['dadosValidaos'] = false;
}

}


if (isset($dados)) {

$result1 = $dados['perguntas1']+$dados['perguntas18']+$dados['perguntas35']+$dados['perguntas52']+$dados['perguntas69'];
$result2 = $dados['perguntas2']+$dados['perguntas19']+$dados['perguntas36']+$dados['perguntas53']+$dados['perguntas70'];
$result3 = $dados['perguntas3']+$dados['perguntas20']+$dados['perguntas37']+$dados['perguntas54']+$dados['perguntas71'];
$result4 = $dados['perguntas4']+$dados['perguntas21']+$dados['perguntas38']+$dados['perguntas55']+$dados['perguntas72'];
$result5 = $dados['perguntas5']+$dados['perguntas22']+$dados['perguntas39']+$dados['perguntas56']+$dados['perguntas73'];
$result6 = $dados['perguntas6']+$dados['perguntas23']+$dados['perguntas40']+$dados['perguntas57']+$dados['perguntas74'];
$result7 = $dados['perguntas7']+$dados['perguntas24']+$dados['perguntas41']+$dados['perguntas58']+$dados['perguntas75'];
$result8 = $dados['perguntas8']+$dados['perguntas25']+$dados['perguntas42']+$dados['perguntas59']+$dados['perguntas76'];
$result9 = $dados['perguntas9']+$dados['perguntas26']+$dados['perguntas43']+$dados['perguntas60']+$dados['perguntas77'];
$result10 = $dados['perguntas10']+$dados['perguntas27']+$dados['perguntas44']+$dados['perguntas61']+$dados['perguntas78'];
$result11 = $dados['perguntas11']+$dados['perguntas28']+$dados['perguntas45']+$dados['perguntas62']+$dados['perguntas79'];
$result12 = $dados['perguntas12']+$dados['perguntas29']+$dados['perguntas46']+$dados['perguntas63']+$dados['perguntas80'];
$result13 = $dados['perguntas13']+$dados['perguntas30']+$dados['perguntas47']+$dados['perguntas64']+$dados['perguntas81'];
$result14 = $dados['perguntas14']+$dados['perguntas31']+$dados['perguntas48']+$dados['perguntas65']+$dados['perguntas82'];
$result15 = $dados['perguntas15']+$dados['perguntas32']+$dados['perguntas49']+$dados['perguntas66']+$dados['perguntas83'];
$result16 = $dados['perguntas16']+$dados['perguntas33']+$dados['perguntas50']+$dados['perguntas67']+$dados['perguntas84'];
$result17 = $dados['perguntas17']-$dados['perguntas34']-$dados['perguntas51']-$dados['perguntas68']+$dados['perguntas85'];


  
if ($_SESSION['dadosValidaos']){

?>


<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<body>

<div id="myPlot" style="width:100%;max-width:900px; height:500px; margin:0 auto;">

<script>
var xArray = ["tem iniciativa", "busco oportunidades", "Persistência", "Busca Informações", "Exigência de Qualidade", 
"Cumprimento de contratos de trabalho", "Orientação para eficiência", "Orientação para objetivos", "Planejamento sistemático", 
"Resolução de problemas", "Assertividades", "Autoconfiança", "Correr riscos moderados", "Uso da estratégia de influência",
"Monitoramento", "Preocupação com gestões financeiras", "Fator de correção"
];
var yArray = [<?php echo $result1?>, <?=$result2?>, <?=$result3?>, <?=$result4?>, <?=$result5?>, 
<?=$result6?>, <?=$result7?>, <?=$result8?>, <?=$result9?>, <?=$result10?>, <?=$result11?>, 
<?=$result12?>, <?=$result13?>, <?=$result14?>, <?=$result15?>, <?=$result16?>, <?=$result17?> ];

var data = [{
  x:xArray,
  y:yArray,
  type:"bar"
}];

var layout = {title:"resultado das perguntas"};

Plotly.newPlot("myPlot", data, layout);
</script>
<div>
<br><br>

<?php
}else {
  
  $_SESSION['modal']="<script>exibirmodal()</script>";
  echo "<h2>ERROS ENCONTRADOS</h2>";

  header("Location: index.php");
}

}else{

  echo "<h2>DADOS NÂO ENCONTRADOS</h2>";
  $_SESSION['modal']="<script>exibirmodal()</script>";

  header("Location: index.php");
}

?>  