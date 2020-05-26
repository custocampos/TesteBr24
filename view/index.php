<?php


include_once __DIR__ ."/header.php";
require_once("../model/db_connect.php");
include_once __DIR__ . "/message.php";



?>
<nav>
    <div class="nav-wrapper black">
      <h5  class="brand-logo center">Empresas Cadastradas</h5>
    </div>
  </nav>

<div class="row">
	<div class="col s12 m8 push-m2">
		<table class="striped">
			<thead>
				<tr>
					<th>Empresa:</th>
					<th>Telefone:</th>
					<th>Email:</th>
				</tr>
			</thead>

			<tbody>
				<?php
				
				$resultadoJs = getCompanyList();
				
				$resultadoFull = (array)json_decode($resultadoJs);
				$resultado = $resultadoFull["result"];
				
				foreach($resultado as $dado){
					$dado = (array) $dado;
				?>
				<tr>
					<td><?=$dado['TITLE']; ?></td>
					<td><?=$dado['PHONE'][0]->VALUE; ?></td>
					<td><?=$dado['EMAIL'][0]->VALUE; ?></td>
					<td><a href="editar.php?id=<?=$dado['ID']; ?>" class="btn-floating blue lighten-2"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?=$dado['ID']; ?>" class="btn-floating black modal-trigger"><i class="material-icons">delete</i></a></td>

					<!-- Modal Structure -->
					  <div id="modal<?=$dado['ID']; ?>" class="modal">
					    <div class="modal-content">
					      <h4>Opa!</h4>
					      <p>Tem certeza que deseja excluir o cadastro dessa empresa?</p>
					    </div>
					    <div class="modal-footer">					     

					      <form action="../controller/delete.php" method="POST">
					      	<input type="hidden" name="id" value="<?=$dado['ID']; ?>">
					      	<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

					      	 <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

					      </form>

					    </div>
					  </div>


				</tr>
			   <?php 
				//endforeach;
				}
				//else: ?>


			   <?php 
				//endif;
			   ?>

			</tbody>
		</table>
		<br>
        <a href="adicionar.php" class="btn-large grey darken-2">Adicionar cliente</a>
	</div>
</div>

<?php
// Footer
include_once __DIR__ ."/footer.php";
?>