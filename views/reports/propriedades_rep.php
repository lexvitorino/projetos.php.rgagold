
<div class="page-title-group">
	<h4 class="header-title"><b>Relatórios</b></h4>
	<h5 class="text-muted page-title-alt">Relatório de Propriedades</h5>
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
				<form method="GET" onsubmit="return openPopupPropriedades(this)">
					<div class="report_filter">
						<div class="form-group">
							<label for="id">Ref Nº</label>
							<input type="text" class="form-control" name="id" />
						</div>
							
						<div class="form-group">	
							<label for="id_bairro">Bairro</label>
							<select name="id_bairro" class="form-control">
								<option value=""></option>
								<?php foreach ($bairros_list as $item): ?>
									<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
							
						<div class="form-group">	
							<label for="tipo">Tipo de Imóveis</label>
							<select name="tipo" class="form-control">
								<option value=""></option>
								<?php foreach ($tipoImoveis_list as $item): ?>
									<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>	
							
						<div class="form-group">
							<div class="checkbox checkbox-primary col-md-12">
								<input type="checkbox" class="form-control" name="destaque_dia" value="S" id="destaque_dia" />
								<label for="destaque_dia">Imóveis destacados</label>
							</div>	
						</div>

						<div class="form-group">
							<div class="checkbox checkbox-primary col-md-12">
								<input type="checkbox" class="form-control" name="prop_indisponivel" value="S" id="prop_indisponivel" />
								<label for="prop_indisponivel">Imóveis vendidos e/ou indisponíveis</label>
							</div>	
						</div>

						<div class="form-group">
							<div class="checkbox checkbox-primary col-md-12">
								<input type="checkbox" class="form-control" name="vendidos" value="S" id="vendidos" />
								<label for="vendidos">Ocultar os imóveis vendidos da lista</label>
							</div>	
						</div>

						<div class="form-group">
							<div class="checkbox checkbox-primary col-md-12">
								<input type="checkbox" class="form-control" name="avenda" value="S" id="avenda" />
								<label for="avenda">Mostrar imóveis em venda</label>
							</div>	
						</div>
						
						<div class="form-group">
							<div class="checkbox checkbox-primary col-md-12">
								<input type="checkbox" class="form-control" name="locacao" value="S" id="locacao" />
								<label for="locacao">Mostrar imóveis para locação</label>
							</div>	
						</div>
					</div>

					<input class="btn btn-success btn-md" type="submit" value="Gerar Relatório" />
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/specs/js/script_report.js"></script>