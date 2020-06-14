<div class="page-title-group">
	<h4 class="header-title"><b>Permissões</b></h4>
	<h5 class="text-muted page-title-alt">Adicionar Propriedade</h5>
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
				<form method="POST" enctype="multipart/form-data">
					<div class="contact-list-link">
						<ul class="nav nav-tabs tabs">
							<li class="active tab"><a href="#cl-tab1" data-toggle="tab" aria-expanded="false">Grupos de Permissões</a></li>
							<li class="tab"><a href="#cl-tab2" data-toggle="tab" aria-expanded="false">Permissões</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane active" id="cl-tab1">
							
							<div class="card-box-content form-compoenent">
								<div class="cb-res-table">
									<div class="cb-table-search">
										<div class="dropdown pull-left ">
											<div class="dropdown pull-left ">
												<a href="<?php echo BASE_URL; ?>/permissions/add_group" class="btn btn-primary btn-sm">Adicionar</a>
											</div>
										</div>
										<div class="input-group pull-right cb-ta-search" style="display: none">
											<input type="text" class="form-control" placeholder="Procurar...">
											<span class="input-group-btn">
											<button class="btn btn-default" type="button">OK</button>
											</span>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<br>
								<div class="table-responsive data-table">
									<table class="table table-bordred table-striped">
										<thead>
											<tr>
												<th style="text-align: left">ID</th>
												<th style="text-align: left">Nome</th>
												<th class="text-center"><b>Ações</b></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($permission_groups_list as $p): ?>
											<tr>
												<td width="50"><?php echo $p['id']; ?></td>
												<td><?php echo $p['name']; ?></td>
												<td width="170">
													<a class="btn btn-primary btn-sm" href="<?php echo BASE_URL; ?>/permissions/edit_group/<?php echo $p['id']; ?>">Editar</a>
													<a class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>/permissions/delete_group/<?php echo $p['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir o registro?')">Excluir</a>
												</td>
											</tr>
											<?php endforeach; ?>						
										</tbody>
									</table>
								</div>
								<br/>
								<div class="row mob-center <?php echo ($paginas_groups_count<=1)?'pag_inactive':''; ?>">
									<div class="col-sm-12">
										<ul class="pagination pull-right">
											<li class="<?php echo ($pagina_groups==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/permissions?p_groups=<?php echo 1; ?>"><span class="fa fa-angle-double-left"></span></a></li>
											<li class="<?php echo ($pagina_groups==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/permissions?p_groups=<?php echo $pagina_groups-1; ?>"><span class="fa fa-angle-left"></span></a></li>

											<?php for($q_groups=($pagina_groups<4?1:($pagina_groups-3)); $q_groups<=($pagina_groups<4?7:($pagina_groups+3)); $q_groups++): ?>
												<li class="<?php echo ($q_groups==$pagina_groups)?'pag_active':''; ?> <?php echo ($paginas_groups_count<$q_groups)?'pag_invisible':''; ?>">
													<a href="<?php echo BASE_URL; ?>/permissions?p_groups=<?php echo $q_groups; ?>"><?php echo $q_groups; ?></a>
												</li>
											<?php endfor; ?>

											<li class="<?php echo ($pagina_groups==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/permissions?p_groups=<?php echo $pagina_groups+1; ?>"><span class="fa fa-angle-right"></span></a></li>
											<li class="<?php echo ($pagina_groups==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/permissions?p_groups=<?php echo $paginas_groups_count; ?>"><span class="fa fa-angle-double-right"></span></a></li>
										</ul>
									</div>
								</div>
							</div>							

							<div class="clearfix"></div>
						</div>
						<div class="tab-pane active" id="cl-tab2">
							
							<div class="card-box-content form-compoenent">
								<div class="cb-res-table">
									<div class="cb-table-search">
										<div class="dropdown pull-left ">
											<div class="dropdown pull-left ">
												<a href="<?php echo BASE_URL; ?>/permissions/add_param" class="btn btn-primary btn-sm">Adicionar</a>
											</div>
										</div>
										<div class="input-group pull-right cb-ta-search" style="display: none">
											<input type="text" class="form-control" placeholder="Procurar...">
											<span class="input-group-btn">
											<button class="btn btn-default" type="button">OK</button>
											</span>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<br>
								<div class="table-responsive data-table">
									<table class="table table-bordred table-striped">
										<thead>
											<tr>
												<th style="text-align: left">ID</th>
												<th style="text-align: left">Nome</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($permission_params_list as $p): ?>
											<tr>
												<td width="50"><?php echo $p['id']; ?></td>
												<td><?php echo $p['name']; ?></td>
											</tr>
											<?php endforeach; ?>						
										</tbody>
									</table>
								</div>
								<br/>
								<div class="row mob-center <?php echo ($paginas_params_count<=1)?'pag_inactive':''; ?>">
									<div class="col-sm-12">
										<ul class="pagination pull-right">
											<li class="<?php echo ($pagina_params==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/permissions?p_params=<?php echo 1; ?>"><span class="fa fa-angle-double-left"></span></a></li>
											<li class="<?php echo ($pagina_params==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/permissions?p_params=<?php echo $pagina_params-1; ?>"><span class="fa fa-angle-left"></span></a></li>

											<?php for($q_params=($pagina_params<4?1:($pagina_params-3)); $q_params<=($pagina_params<4?7:($pagina_params+3)); $q_params++): ?>
												<li class="<?php echo ($q_params==$pagina_params)?'pag_active':''; ?> <?php echo ($paginas_params_count<$q_params)?'pag_invisible':''; ?>">
													<a href="<?php echo BASE_URL; ?>/permissions?p_params=<?php echo $q_params; ?>"><?php echo $q_params; ?></a>
												</li>
											<?php endfor; ?>

											<li class="<?php echo ($pagina_params==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/permissions?p_params=<?php echo $pagina_params+1; ?>"><span class="fa fa-angle-right"></span></a></li>
											<li class="<?php echo ($pagina_params==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/permissions?p_params=<?php echo $paginas_params_count; ?>"><span class="fa fa-angle-double-right"></span></a></li>
										</ul>
									</div>
								</div>
							</div>							

							<div class="clearfix"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>