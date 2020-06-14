<div class="page-title-group">
	<h4 class="page-title">Cidades</h4>
	<h5 class="text-muted page-title-alt">Listagem de Cidades</h5>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card-box">
			<div class="card-box-content form-compoenent">
				<div class="cb-res-table">
					<div class="cb-table-search">
						<div class="dropdown pull-left ">
							<div class="dropdown pull-left ">
								<a href="<?php echo BASE_URL; ?>/cidades/add" class="btn btn-primary btn-sm">Adicionar</a>
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
							<?php foreach($cidades_list as $p): ?>
							<tr>
								<td width="50"><?php echo $p['id']; ?></td>
								<td><?php echo $p['name']; ?></td>
								<td width="170">
									<a class="btn btn-primary btn-sm" href="<?php echo BASE_URL; ?>/cidades/edit/<?php echo $p['id']; ?>">Editar</a>
									<a class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>/cidades/delete/<?php echo $p['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir o registro?')">Excluir</a>
								</td>
							</tr>
							<?php endforeach; ?>						
						</tbody>
					</table>
				</div>
				<br/>
				<div class="row mob-center <?php echo ($paginas_count<=1)?'pag_inactive':''; ?>">
					<div class="col-sm-12">
						<ul class="pagination pull-right">
							<li class="<?php echo ($pagina==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/cidades?p=<?php echo 1; ?>"><span class="fa fa-angle-double-left"></span></a></li>
							<li class="<?php echo ($pagina==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/cidades?p=<?php echo $pagina-1; ?>"><span class="fa fa-angle-left"></span></a></li>

							<?php for($q=($pagina<4?1:($pagina-3)); $q<=($pagina<4?7:($pagina+3)); $q++): ?>
								<li class="<?php echo ($q==$pagina)?'pag_active':''; ?> <?php echo ($paginas_count<$q)?'pag_invisible':''; ?>">
									<a href="<?php echo BASE_URL; ?>/cidades?p=<?php echo $q; ?>"><?php echo $q; ?></a>
								</li>
							<?php endfor; ?>

							<li class="<?php echo ($pagina==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/cidades?p=<?php echo $pagina+1; ?>"><span class="fa fa-angle-right"></span></a></li>
							<li class="<?php echo ($pagina==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/cidades?p=<?php echo $paginas_count; ?>"><span class="fa fa-angle-double-right"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>