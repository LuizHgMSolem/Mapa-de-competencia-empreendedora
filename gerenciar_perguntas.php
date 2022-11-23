<script type='text/javascript'>
	

	let blocoPerguntas = document.querySelectorAll('[class^="blocopergunta"]')

	blocoPerguntas.forEach(function(bloco, num, chaves) {

	 let perguntareferente = bloco.name
	 let perguntaid = bloco.id
	 let Cookiesget = Cookies.get(perguntareferente)

	 perguntareferente2  = bloco.checked
	 let cheke = $(`#${Cookiesget}`);
	 cheke.attr('checked', true)
	 
	 
	 
});


</script>





<script type='text/javascript'> 	

let pergutnasqtd = document.querySelectorAll(`[id^=perguntas-n]`)
pergutnasqtd.forEach(function(pergunta, num, chaves) {
num++
perguntaUncica = pergunta.id



funcheck = $(`.blocopergunta${num}`).on('change', function() {

 check = $(`.blocopergunta${num}`);

 let Check_perguntas =	check.not(this).prop('checked', false)
 check.attr('checked', true)
 
 if (Check_perguntas) {
	 check.not(this).attr('checked', false)
 }

let checkedSelecionado = $("[id^='Nunca']").attr('checked', true)
		 
 let allChecked = document.querySelectorAll('[checked="checked"]')

 allChecked.forEach(function(pergunta, num, chaves) {
	 let resposta = pergunta.id
	 let respostaReferente = pergunta.name
	 Cookies.set(respostaReferente, resposta ,{expires:1})
 });
 
	 
		 
	 });
})

 
</script>
<?php
session_start();
include_once "conexao.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização

$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;



//consultar no banco de dados
$result_usuario = "SELECT * FROM perguntas ORDER BY id ASC ";
$resultado_usuario = mysqli_query($conn, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) && ($resultado_usuario->num_rows != 0)){
	?>
<table class="table table-striped table-bordered table-hover">
		
		<tbody>

<form action="tratamento.php" method="POST">

<section class="container-formulario">		
	<div class="perguntas-formulario">

		<?php

			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
		

				?>
					
					<?php 
					$marcacao = 	array (
						"Nunca" => 1,
						"Raramente" => 2,
						"Algumas_Vezes" => 3,
						"Maioria_da_Vezes" => 4,
						"Sempre" => 5,
					);
					?>
			
					<h4 id="perguntas-n<?= $row_usuario['id']?>"><br/	>
					<?php echo $row_usuario['id'];?>
					<?php echo $row_usuario['pergunta'];?>
					</h4>
				
				
            	

					
					<div class="bloco_checkbox">	
					<?php
					foreach ($marcacao as $mark => $value) {
						# code...
					?>

						<div class="perguntas_checkbox">
							<input type='checkbox' value='<?= $value?>' name='pergunta<?= $row_usuario["id"]?>' class='blocopergunta<?= $row_usuario["id"]?>' id='<?= $mark.$row_usuario["id"]?>' onclick='onlyone(this)'><label for='<?= $mark.$row_usuario["id"]?>'> <?= str_replace("_"," ",$mark); $mark?></label>
						</div>
				
					<?php 
					}
					?>
					</div>
				
					
				<?php
		$_SESSION["qtd_linhas_perg"] = $row_usuario["id"];
				}
				?>

		</div>
			

			<div class="item-formulario">

			<button class="btn-enviar" type="submit" style="display:block" >enviar</button>
			
			</div>		
			
		</section>
</form>



	
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
