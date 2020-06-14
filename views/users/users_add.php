<div class="page-title-group">
	<h4 class="header-title"><b>Usuários</b></h4>
	<h5 class="text-muted page-title-alt">Adicionar Usuário</h5>
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
						<label for="name">Nome</label>
						<input type="text" class="form-control" name="name" required/>
					</div>		

					<div class="form-group">
						<label for="login">Login</label>
						<input type="text" class="form-control" name="login" required/>
					</div>		

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" required/>
					</div>			

					<div class="form-group">
						<select class="form-control" name="id_group" required>
						<?php foreach ($permission_groups_list as $item): ?>
						<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
						<?php endforeach; ?>						
						</select>
					</div>								
					
					<button type="submit" class="btn btn-success btn-md">Salvar</button>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>