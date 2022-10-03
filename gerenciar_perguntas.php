<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_usuario = "SELECT * FROM perguntas ORDER BY id asc LIMIT $inicio, $qnt_result_pg";
$resultado_usuario = mysqli_query($conn, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) && ($resultado_usuario->num_rows != 0)){
	?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script defer src="js/showbtn.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
	<title>paginação</title>
</head>
<body>
<table class="table table-striped table-bordered table-hover">
		
		<tbody>

<form action="tratamento.php" method="POST">

<section class="container-formulario">		
	<div class="perguntas-formulario">

		<?php

		$n=0;
		
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>
					
					<?php 
					$marcacao = 	array (
						"Nunca" => 1,
						"raramente" => 2,
						"Algumas Vezes" => 3,
						"Maioria da Vezes" => 4,
						"Sempre" => 5,
					);
					?>
				
					
					<?php echo $row_usuario['id'];?>
					<?php echo $row_usuario['pergunta'];?>
					
				
   					
            	

					
					<div id='perguntas-<?=$n?>'>	
					<?php
					foreach ($marcacao as $mark => $value) {
						# code...
					?>

					
					<?php echo "<input type='checkbox' value='$value' name='perguntas$n' class='perguntas".$n."' id='".$mark.$n."' onclick='onlyone(this)'><label for='".$mark.$n."'> ".$mark."</label>"; ?>
					<?php echo "<script type='text/javascript'> $('.perguntas".$n."').on('change', function() { $('.perguntas".$n."').not(this).prop('checked',false) }); </script>"; ?>
				
				
					<?php 
					}
					?>
					</div>
				<?php
				$n++;	
				}
				?>

		</div>
			



			<div class="item-formulario">

			<button class="btn-enviar" type="submit" style="display:block">enviar</button>
			
			</div>		
			
		</section>
</form>


</body>
</html>


	
<?php
//Paginação - Somar a quantidade de usuários
$result_pg = "SELECT COUNT(id) AS num_result FROM perguntas";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

//Quantidade de pagina
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os link antes depois
$max_links = 2;

echo "<input type='button' value='Primeira' onclick='listar_usuario(1, $qnt_result_pg)'> ";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
	if($pag_ant >= 1){
		echo " <input type='button' value='$pag_ant' onclick='listar_usuario($pag_ant, $qnt_result_pg)'> </a> ";
	}
}

echo " $pagina ";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
	if($pag_dep <= $quantidade_pg){
		echo " <input type='button' value='$pag_dep' onclick='listar_usuario($pag_dep, $qnt_result_pg)'></a> ";
	}
}

echo " <input type=button value='última' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>";
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
?>