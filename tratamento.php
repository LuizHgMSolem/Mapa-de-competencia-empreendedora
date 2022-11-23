
<?php
session_start();

$temErro = error_reporting(0);
$mostrarerros = ini_set('display_error',0);

$dados = filter_input_array(INPUT_POST);

foreach ($dados as $key => $value) {
  
  if (!is_null($value) && count($dados) == '85'){
    $_SESSION['dadosValidaos'] = true;
  }else {
    $_SESSION['dadosValidaos'] = false;
  }
}


if (isset($dados)) {

$result[1] = $dados['pergunta1']+$dados['pergunta18']+$dados['pergunta35']+$dados['pergunta52']+$dados['pergunta69'];
$result[2] = $dados['pergunta2']+$dados['pergunta19']+$dados['pergunta36']+$dados['pergunta53']+$dados['pergunta70'];
$result[3] = $dados['pergunta3']+$dados['pergunta20']+$dados['pergunta37']+$dados['pergunta54']+$dados['pergunta71'];
$result[4] = $dados['pergunta4']+$dados['pergunta21']+$dados['pergunta38']+$dados['pergunta55']+$dados['pergunta72'];
$result[5] = $dados['pergunta5']+$dados['pergunta22']+$dados['pergunta39']+$dados['pergunta56']+$dados['pergunta73'];
$result[6] = $dados['pergunta6']+$dados['pergunta23']+$dados['pergunta40']+$dados['pergunta57']+$dados['pergunta74'];
$result[7] = $dados['pergunta7']+$dados['pergunta24']+$dados['pergunta41']+$dados['pergunta58']+$dados['pergunta75'];
$result[8] = $dados['pergunta8']+$dados['pergunta25']+$dados['pergunta42']+$dados['pergunta59']+$dados['pergunta76'];
$result[9] = $dados['pergunta9']+$dados['pergunta26']+$dados['pergunta43']+$dados['pergunta60']+$dados['pergunta77'];
$result[10] = $dados['pergunta10']+$dados['pergunta27']+$dados['pergunta44']+$dados['pergunta61']+$dados['pergunta78'];
$result[11] = $dados['pergunta11']+$dados['pergunta28']+$dados['pergunta45']+$dados['pergunta62']+$dados['pergunta79'];
$result[12] = $dados['pergunta12']+$dados['pergunta29']+$dados['pergunta46']+$dados['pergunta63']+$dados['pergunta80'];
$result[13] = $dados['pergunta13']+$dados['pergunta30']+$dados['pergunta47']+$dados['pergunta64']+$dados['pergunta81'];
$result[14] = $dados['pergunta14']+$dados['pergunta31']+$dados['pergunta48']+$dados['pergunta65']+$dados['pergunta82'];
$result[15] = $dados['pergunta15']+$dados['pergunta32']+$dados['pergunta49']+$dados['pergunta66']+$dados['pergunta83'];
$result[16] = $dados['pergunta16']+$dados['pergunta33']+$dados['pergunta50']+$dados['pergunta67']+$dados['pergunta84'];
$result[17] = $dados['pergunta17']-$dados['pergunta34']-$dados['pergunta51']-$dados['pergunta68']+$dados['pergunta85'];


  
if ($_SESSION['dadosValidaos']){

?>


<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
<body>z 

<canvas id="myChart" style="width:100%;max-width:900px; height:500px; margin:0 auto;"></canvas>

<script>
var pergunta = ["tem iniciativa", "busco oportunidades", "Persistência", "Busca Informações", "Exigência de Qualidade", 
"Cumprimento de contratos de trabalho", "Orientação para eficiência", "Orientação para objetivos", "Planejamento sistemático", 
"Resolução de problemas", "Assertividades", "Autoconfiança", "Correr riscos moderados", "Uso da estratégia de influência",
"Monitoramento", "Preocupação com gestões financeiras", "Fator de correção"
];
let resultado = [<?php echo $result[1]?>, <?=$result[2]?>, <?=$result[3]?>, <?=$result[4]?>, <?=$result[5]?>, 
<?=$result[6]?>, <?=$result[7]?>, <?=$result[8]?>, <?=$result[9]?>, <?=$result[10]?>, <?=$result[11]?>, 
<?=$result[12]?>, <?=$result[13]?>, <?=$result[14]?>, <?=$result[15]?>, <?=$result[16]?>, <?=$result[17]?> ];
console.log(resultado);
const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'line',
  data: {
    labels: pergunta,
    datasets: [{
      label: '# of Votes',
      data: resultado ,
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
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