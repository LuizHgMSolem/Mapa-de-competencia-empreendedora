<?php
session_start();
include_once "conexao.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$retorno_perguntas = "SELECT * FROM perguntas ORDER BY id asc LiMIT  $inicio, $qnt_result_pg";
$resultado_perguntas = mysqli_query($conn, $retorno_perguntas);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_perguntas) && ($resultado_perguntas->num_rows != 0)){
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
			while($row_perguntas = mysqli_fetch_assoc($resultado_perguntas)){
				
				?>
			
				
				<div>
					<h4><br><br>
					<?= $row_perguntas['id'];?>
					<?= $row_perguntas['pergunta'];?>
					</h4>
				</div>
					
				
   					
            	
		
				<?php 
					$marcacao = 	array (
						"Nunca" => 1,
						"Raramente" => 2,
						"Algumas Vezes" => 3,
						"Maioria da Vezes" => 4,
						"Sempre" => 5,
					);
					
					?>
					
					<div id='perguntas-<?= $row_perguntas['id']?>'>	




					<?php
					
					foreach ($marcacao as $mark => $value) {
						# code...
						

					?>

					<input type='checkbox' value='<?= $mark?>' name='perguntas<?= $row_perguntas['id']?>' class='perguntas<?= $row_perguntas['id']?>' id='<?= $mark.$row_perguntas['id']?>' onclick='onlyone(this)'><label for='<?=$mark.$row_perguntas['id']?>'> <?= $mark?></label>
					<br/>
					


					<?php 
					
					}
					
					?>
				
				<script type='text/javascript'> 
						// len_perguntas = function() {['<?= $row_perguntas['id'] ?>']}
						// i = 0;
						// while (i < 2){
						// 	paramentro = [i]

						// 	console.log(paramentro[0])
						

						// 	i++
						// }

					

						
					</script>

				<?php 
				
				$_SESSION["qtd_linhas_perg"] = $row_perguntas['id'];
				
				?>

				
					
				</div>

				<?php
				
				}

				?>

<script type='text/javascript'> 	
	
		let length_perguntas = '<?=$_SESSION["qtd_linhas_perg"]?>';
		let idPerguntas_php = [];
		let i = 0;
	
							for (let index = 1; index <= length_perguntas; index++) {
								 idPerguntas_php[index] = index;
							// define que só poderá acionar um checkbox por vez
							inputs = [
						"Nunca",
						"Raramente",
						"Algumas Vezes",
						"Maioria da Vezes",
						"Sempre",
							]

									 check = $(`.perguntas${idPerguntas_php[index]}`);
								
									 funcheck = check.on('change', function() { 
									
									let Check_perguntas =	$(`.perguntas${idPerguntas_php[index]}`).not(this).prop('checked', false)
								
									if (Check_perguntas) {
										let select_valor = document.querySelectorAll(`[id]`)
									
										arrayfrom = array.from(select_valor, (node) => node.Attribute('href'));
										console.log(arrayfrom);
									}
								

										// let Check_rep = [];
									// console.log(	idPerguntas_php[i])
										// Check_rep[idPerguntas_php[index]] = document.querySelector(`[id^="${id_input[idPerguntas_php[index]]}"]`)
										// console.log(Check_rep[1])
									
									
									return Check_perguntas;
									});
									
									

									// id_input.forEach(function() {
										
									// 		let select_resp = []
									// 		select_resp = id_input[i];
									// 		rep_per = document.querySelectorAll(`[id^='${select_resp}']`)

									// });
									
									// console.log(rep_per[0]);	
									i++;
							}		

</script>

	<script type='text/javascript'> 
			console.log('oi');
						



					if (funcheck[0].checked) {
					
					
					qtd_item_check = funcheck['length'];
					console.log(qtd_item_check);					
					alert('ok')			
				}
				console.log(qtd_item_check);					

					item_rep = 0
					while (item_rep < qtd_item_check) {

						if (funcheck[item_rep]) {
							// console.log(item_rep);
						}	

						item_rep++
					}
			


					

					






						
					// 	const inputs = [...document.querySelectorAll("input[type='checkbox']")];

					// 	const res = document.getElementById("perguntas-<?= $row_perguntas['id']?>");

					// 	const valor = res.querySelector('[value="perguntas<?= $row_perguntas['id']?>"]');
					// 	const result = <?= $value?>

					// 	const calcular = () => {
					// 		valor.value = inputs.filter(el => el.checked).reduce((sum, el) => sum + Number(el.value), 0);
					// 	}
					// 	inputs.forEach(x => x.addEventListener("change", calcular));

					// 	function listar_perguntas(pagina, qnt_result_pg){

					// 		var dados = {
					// 			pagina: pagina,
					// 			qnt_result_pg: qnt_result_pg
					// 		}
					// 		$.post('gerenciar_perguntas.php', dados , function(retorna){
					// 			//Subtitui o valor no seletor id="conteudo"
					// 			$("#conteudo").html(retorna);
								

					// 		});
					// }

					</script>
					
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

echo "<input type='button' value='Primeira' onclick='listar_perguntas(1, $qnt_result_pg)'> ";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
	if($pag_ant >= 1){
		echo " <input type='button' value='$pag_ant' onclick='listar_perguntas($pag_ant, $qnt_result_pg)'> </a> ";
	}
}

echo " $pagina ";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
	if($pag_dep <= $quantidade_pg){
		echo " <input type='button' value='$pag_dep' onclick='listar_perguntas($pag_dep, $qnt_result_pg)'></a> ";
	}
}

echo " <input type=button value='última' onclick='listar_perguntas($quantidade_pg, $qnt_result_pg)'>";
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
?>