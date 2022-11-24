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



funcheck = $(`.blocopergunta${num}`).on('change', function() {

 check = $(`.blocopergunta${num}`);

 let Check_perguntas =	check.not(this).prop('checked', false)
 check.attr('checked', true)
 
 if (Check_perguntas) {
	 check.not(this).attr('checked', false)
 }

// let checkedSelecionado = $("[id^='Nunca']").attr('checked', true)
		 
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

	<div id="tituloformato">
		<br>
	<h2 id="titulo">Mapa de Competência empreendedora</h2>
	</div>
	<label for="nome" id="txtnome">Nome
					<input type="text" name="Nome" id="nome">
	</label>
		<?php
				while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>
				<div class="bloco-Perguntas">
					<h4 id="perguntas-n<?= $row_usuario['id']?>"><br/	>
					<?php echo $row_usuario['id'];?>
					<?php echo $row_usuario['pergunta'];?>
					</h4>
					
						<div class="bloco_checkbox">	

						
<?php 
	$marcacao = 	array (
		"Nunca" => 1,
		"Raramente" => 2,
		"Algumas_Vezes" => 3,
		"Maioria_da_Vezes" => 4,
		"Sempre" => 5,
	);

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
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
?>