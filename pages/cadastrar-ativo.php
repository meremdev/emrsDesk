<?php verificaPermissaoPagina(2);?>
<!-- Modal cadastro -->
<div class="modal fade" id="cadAtivoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">Dados do ativo</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>

		<form method="post">
			<?php

				if(isset($_POST['acaocad'])){
					$nome = strtolower($_POST['nome']);
					if($nome == ''){
						Painel::alert('erro','O campo nome não pode ficar vázio!');
					}else{
						//Apenas cadastrar no banco de dados!
						$verificar = MySql::conectar()->prepare("SELECT * FROM `ativos` WHERE nome = ?");
						$verificar->execute(array($_POST['nome']));
						if($verificar->rowCount() == 0){
						//$slug = Painel::generateSlug($nome);

						$arr = ['nome'=>$nome,'nome_tabela'=>'ativos'];
						Painel::insert($arr);
						Painel::alert('sucesso','O cadastro do ativo foi realizado com sucesso!');
						Painel::redirect(INCLUDE_PATH.'ativos');
						}else{
							Painel::alert("erro",'Já existe uma ativo com este nome!');
						}
					}
					
				}
			?>
			<div class="modal-body">
				<div class="mb-3">
					<label class="form-label">Nome do ativo</label>
					<input type="text" name="nome" class="form-control" placeholder="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary" name="acaocad" value="cadastrar">
			</div>
		</form>
    </div>
  </div>
</div>