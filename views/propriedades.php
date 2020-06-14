<div class="page-title-group">
	<h4 class="page-title">Propriedades</h4>
	<h5 class="text-muted page-title-alt">Listagem de Propriedades</h5>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card-box">
			<div class="card-box-content form-compoenent">
				<div class="cb-res-table">
					<div class="cb-table-search">
						<div class="dropdown pull-left ">
							<div class="dropdown pull-left ">
								<a href="<?php echo BASE_URL; ?>/propriedades/add" class="btn btn-primary btn-sm">Adicionar</a>
							</div>
						</div>
						<div class="input-group pull-right cb-ta-search">
							<input id="search" type="text" class="form-control" placeholder="Procurar..." data-type="search_propriedades">
						</div>						
					</div>
				</div>
				<div class="clearfix"></div>
				<br>
				<div class="table-responsive data-table">
					<table class="table table-bordred table-striped">
						<thead>
							<tr>
								<th style="text-align: left">Ref</th>
								<th style="text-align: left">Tipo</th>
								<th style="text-align: left">Prédio</th>
								<th class="text-center"><b>Ações</b></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($propriedades_list as $p): ?>
							<tr>
								<td width="50"><?php echo $p['id']; ?></td>
								<td><?php echo $p['tipo_imovel']; ?></td>
								<td><?php echo $p['predio']; ?></td>
								<td width="250">
									<a class="btn btn-primary btn-sm" href="<?php echo BASE_URL; ?>/propriedades/edit/<?php echo $p['id']; ?>">Editar</a>
									<a class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>/propriedades/delete/<?php echo $p['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir o registro?')">Excluir</a>
									<a class="btn btn-success btn-sm" href="<?php echo BASE_URL; ?>/propriedades/sinc/<?php echo $p['id']; ?>" onclick="return confirm('Tem certeza que deseja sincronizar registro?')">SincWp</a>
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
							<li class="<?php echo ($pagina==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/propriedades?p=<?php echo 1; ?>"><span class="fa fa-angle-double-left"></span></a></li>
							<li class="<?php echo ($pagina==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/propriedades?p=<?php echo $pagina-1; ?>"><span class="fa fa-angle-left"></span></a></li>

							<?php for($q=($pagina<4?1:($pagina-3)); $q<=($pagina<4?7:($pagina+3)); $q++): ?>
								<li class="<?php echo ($q==$pagina)?'pag_active':''; ?> <?php echo ($paginas_count<$q)?'pag_invisible':''; ?>">
									<a href="<?php echo BASE_URL; ?>/propriedades?p=<?php echo $q; ?>"><?php echo $q; ?></a>
								</li>
							<?php endfor; ?>

							<li class="<?php echo ($pagina==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/propriedades?p=<?php echo $pagina+1; ?>"><span class="fa fa-angle-right"></span></a></li>
							<li class="<?php echo ($pagina==1)?'pag_inactive':''; ?>"><a href="<?php echo BASE_URL; ?>/propriedades?p=<?php echo $paginas_count; ?>"><span class="fa fa-angle-double-right"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>