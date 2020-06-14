<div class="page-title-group">
	<h4 class="header-title"><b>Permissões</b></h4>
	<h5 class="text-muted page-title-alt">Editar Grupo de Permissões</h5>
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
						<label for="name">Nome Grupo</label>
						<input type="text" class="form-control" name="name" value="<?php echo $permission_group['name']; ?>" required/>
					</div>	

					<div class="form-group">
						<label>Permissões</label>
						<div class="col-sm-12">
							<?php foreach($permission_params_list as $p): ?>
								<div class="checkbox checkbox-primary col-md-4">
									<input type="checkbox" class="form-control" name="permissions[]" value="<?php echo $p['id']; ?>" id="<?php echo $p['id']; ?>" <?php echo (in_array($p['id'], $permission_group['params'])) ? 'checked="checked"' : ''; ?> />	
									<label for="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
								</div>
							<?php endforeach; ?>
						</div>
					</div>														

					<button type="submit" class="btn btn-success btn-md">Salvar</button>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>