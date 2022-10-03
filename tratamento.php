<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);
if (isset($dados)) {

$soma = $dados['perguntas0']+$dados['perguntas1'];
echo $soma;

}else{

    echo "<h2>DADOS NÂO ENCONTRADOS</h2>";

}
?>