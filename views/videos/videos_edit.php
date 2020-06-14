<div class="page-title-group">
	<h4 class="header-title"><b>Videos</b></h4>
	<h5 class="text-muted page-title-alt">Editar Video</h5>
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
						<input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required/>
					</div>										

					<div class="form-group">
						<label for="name">URL (YouTube)</label>
						<input type="text" class="form-control" name="url" value="<?php echo $data['url']; ?>" required/>
					</div>				
					
					<button type="submit" class="btn btn-success btn-md">Salvar</button>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
