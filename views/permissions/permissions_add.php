<div class="page-title-group">
	<h4 class="header-title"><b>Permissões</b></h4>
	<h5 class="text-muted page-title-alt">Adicionar Permissão</h5>
</div>

<div class="row">	
	<div class="col-md-12">
		<div class="card-box">
			<?php if(isset($error) && !empty($error)): ?>
			    <div class="alert alert_warning">
			        <?php echo $error; ?>
			    </div>
			<?php endif; ?>		
			<div class="card-box-content form-compoenent">
				<form method="POST">
					<div class="form-group">
						<label for="name">Nome Permissão</label>
						<input type="text" class="form-control" name="name" required/>
					</div>										
					
					<button type="submit" class="btn btn-success btn-md">Salvar</button>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>