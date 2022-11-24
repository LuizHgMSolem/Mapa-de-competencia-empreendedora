<?php
session_start();


error_reporting(0);
ini_set('display_error',0);
?>
<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
        <meta charset="utf-8">
        <title>Celke - Listar com JavaScript</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
		
    </head>
    <body>

		<section class="modal" id="usuarioInvalido" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">DADOS INCORRETOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="info-modal">DADOS PREENCHIDOS INCORRETAMENTE</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</section> 


<form action="tratamento.php" method="POST">

			
		<section class="container-formulario">		
			<div class="perguntas-formulario">
			<span id="conteudo"><span>
			</div>

				

		</section>
</form>		

		<script type="text/javascript">
			var qnt_result_pg = 85; //quantidade de registro por página
			var pagina = 1; //página inicial
			$(document).ready(function () {
				return listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
			});
			
			function listar_usuario(pagina, qnt_result_pg){
				dados = {
					pagina: pagina,
					qnt_result_pg: qnt_result_pg
				}
				$.post('gerenciar_perguntas', dados , function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
					

				});
			}
</script>




<script>
function exibirmodal(){
  $('#usuarioInvalido').modal('show');
}
</script>

<?php

if ($_SESSION['modal']) {
	echo $_SESSION['modal'];
  	unset($_SESSION['modal']);
}

?>
    </body>
</html>
