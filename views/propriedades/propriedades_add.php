<div class="page-title-group">
	<h4 class="header-title"><b>Propriedade</b></h4>
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
							<li class="active tab"><a href="#cl-tab1" data-toggle="tab" aria-expanded="false">Gerais</a></li>
							<li class="tab"><a href="#cl-tab2" data-toggle="tab" aria-expanded="false">Detalhes</a></li>
							<li class="tab"><a href="#cl-tab3" data-toggle="tab" aria-expanded="false">Venda</a></li>
							<li class="tab"><a href="#cl-tab4" data-toggle="tab" aria-expanded="false">Locação</a></li>
							<li class="tab"><a href="#cl-tab5" data-toggle="tab" aria-expanded="false">Complementar</a></li>
							<li class="tab"><a href="#cl-tab6" data-toggle="tab" aria-expanded="false">Fotos</a></li>
							<li class="tab"><a href="#cl-tab7" data-toggle="tab" aria-expanded="false">Proprietário</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane active" id="cl-tab1">
							<h4 class="text-center">Gerais</h4>
							
							<div class="form-group">
								<label for="id_imobiliaria">Imobiliária</label>
								<select class="form-control" name="id_imobiliaria" required>
									<option value=""></option>
									<?php foreach ($imobiliarias_list as $item): ?>
										<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Operações</label>
								<div class="col-sm-12">
									<?php foreach($operacoes_list as $p): ?>
										<div class="checkbox checkbox-primary col-md-2">
											<input type="checkbox" class="form-control" name="operacoes[]" value="<?php echo $p['id']; ?>" id="<?php echo $p['id']; ?>" >	
											<label for="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
										</div>
									<?php endforeach; ?>
								</div>
							</div>

							<div class="form-group">
								<label>Tipo</label>
								<div class="col-sm-12">
									<?php foreach($tipoImoveis_list as $p): ?>
										<div class="checkbox checkbox-primary col-md-2">
											<input type="checkbox" class="form-control" name="tipoImoveis[]" value="<?php echo $p['id']; ?>" id="<?php echo $p['id']; ?>" />	
											<label for="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
										</div>	
									<?php endforeach; ?>
								</div>	
							</div>

							<div class="form-group">
								<label for="predio">Nome do Prédio</label>
								<input type="text" class="form-control" name="predio" required/>
							</div>

							<div class="form-group">
								<label for="num_ap">Num. Ap.</label>
								<input type="text" name="num_ap" class="form-control"/>
							</div>

							<div class="form-group">
								<label for="id_cidade">Cidade</label>
								<select name="id_cidade" class="form-control">
									<option value=""></option>
									<?php foreach ($cidades_list as $item): ?>
										<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
									<?php endforeach; ?>
								</select>
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
								<label for="endereco">Endereço</label>
								<input type="text" class="form-control" name="endereco"/>
							</div>

							<div class="form-group">
								<label for="descricao_destaque">Descrição de destaque</label>
								<textarea class="form-control" name="descricao_destaque"/></textarea>
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-2">
									<input type="checkbox" class="form-control" name="destaque_dia" value="S" id="destaque_dia" />	
									<label for="destaque_dia">Destaque no site</label>
								</div>	
							</div>

							<div class="clearfix"></div>

							<div class="form-group">
								<label for="area_total_terreno">Área total do terreno</label>
								<input type="number" class="form-control" name="area_total_terreno"/>
							</div>

							<div class="form-group">
								<label for="area_construida">Área construída</label>
								<input type="number" class="form-control" name="area_construida"/>
							</div>

							<div class="form-group">
								<label for="distancia_mar">Distância do Mar</label>
								<input type="number" class="form-control" name="distancia_mar"/>
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="frente_mar" value="S" id="frente_mar" />	
									<label for="destaque_dia">Frente ao mar</label>
								</div>	
							</div>

							<div class="clearfix"></div>
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab2">
							<h4 class="text-center">Detalhes do imóvel</h4>

							<div class="form-group">
							    <label for="dormitorio">Dormitório(s)</label>
								<input type="number" class="form-control" name="dormitorio"/>
							</div>

							<div class="form-group">
								<label for="suite">Suíte(s)</label>
								<input type="number" class="form-control" name="suite"/>
							</div>

							<div class="form-group">
								<label for="sala">Sala(s)</label>
								<input type="number" class="form-control" name="sala"/>
							</div>

							<div class="form-group">
								<label for="cozinha">Conzinha(s)</label>
								<input type="number" class="form-control" name="cozinha"/>
							</div>

							<div class="form-group">
								<label for="banheiro">Banheiro(s)</label>
								<input type="number" class="form-control" name="banheiro"/>
							</div>

							<div class="form-group">
								<label for="lavabo">Lavabo(s)</label>
								<input type="number" class="form-control" name="lavabo"/>
							</div>

							<div class="form-group">
								<label for="lavanderia">lavandeira(s)</label>
								<input type="number" class="form-control" name="lavanderia"/>
							</div>

							<div class="form-group">
								<label for="dep_empregada">Dep. empregada(s)</label>
								<input type="number" class="form-control" name="dep_empregada"/>
							</div>

							<div class="form-group">
								<label for="edicula">Edícula(s)</label>
								<input type="number" class="form-control" name="edicula"/>
							</div>

							<div class="form-group">
								<label for="vagas_garagem">Vaga(s) Garagem</label>
								<input type="number" class="form-control" name="vagas_garagem"/>
							</div>

							<div class="form-group">
								<label>Infra-Estrutura e utensílios</label>
								<div class="col-sm-12">
									<?php foreach($opcionais_list as $p): ?>
										<div class="checkbox checkbox-primary col-md-3">
											<input type="checkbox" class="form-control" name="tipoImoveis[]" value="<?php echo $p['id']; ?>" id="<?php echo $p['id']; ?>" />	
											<label for="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
										</div>	
									<?php endforeach; ?>
								</div>	
							</div>

							<div class="clearfix"></div>
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab3">
							<h4 class="text-center">Preços e valores de venda</h4>
							
							<div class="form-group">
								<label for="moeda">Moeda</label>
								<select class="form-control" name="moeda">
									<option value="R">Real R$</option>
									<option value="D">Dolar U$</option>
								</select>
							</div>

							<div class="form-group">
								<label for="valor_venda">Valor para venda</label>
								<input type="number" class="form-control" name="valor_venda"/>
							</div>

							<div class="form-group">
								<label for="valor_entrada">Valor da entrada</label>
								<input type="number" class="form-control" name="valor_entrada"/>
							</div>

							<div class="form-group">
								<label for="qtde_parcelas">Quantidade de parcelas</label>
								<select class="form-control" name="qtde_parcelas">
								<?php for ($i=0;$i<=100;$i++): ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php endfor; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="valor_parcela">Valor das parcelas</label>
								<input type="number" class="form-control" name="valor_parcela"/>
							</div>

							<div class="form-group">
								<label for="valor_intermediarias">Valor das intermediárias</label>
								<input type="number" class="form-control" name="valor_intermediarias"/>
							</div>

							<div class="form-group">
								<label for="valor_condominio">Valor do Condomínio</label>
								<input type="number" class="form-control" name="valor_condominio"/>
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="mostrar_valores" value="S" id="mostrar_valores" />	
									<label for="mostrar_valores">Mostrar valores para os clientes</label>
								</div>	
							</div>

							<div class="clearfix"></div>
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab4">
							<h4 class="text-center">Detalhes da Locação</h4>
							
							<div class="form-group">
								<label for="acomodacoes">Acomodação</label>
								<input type="number" class="form-control" name="acomodacoes"/>
							</div>

							<div class="form-group">
								<label for="aluguel_mensal">Aluguel Mensa</label>
								<input type="number" class="form-control" name="aluguel_mensal"/>
							</div>

							<div class="form-group">
								<label for="aluguel_anual">Aluguel Anual</label>
								<input type="number" class="form-control" name="aluguel_anual"/>
							</div>

							<div class="form-group">
								<label for="aluguel_reveillon">Aluguel Reveillon</label>
								<input type="number" class="form-control" name="aluguel_reveillon"/>
							</div>

							<div class="form-group">
								<label for="aluguel_carnaval">Aluguel Carnaval</label>
								<input type="number" class="form-control" name="aluguel_carnaval"/>
							</div>

							<div class="form-group">
								<label for="aluguel_temporada">Aluguel Temporada</label>
								<input type="number" class="form-control" name="aluguel_temporada"/>
							</div>

							<div class="form-group">
								<label for="aluguel_pacote">Preço do Pacote</label>
								<input type="number" class="form-control" name="aluguel_pacote"/>
							</div>

							<div class="form-group">
								<label for="observacoes">Observação</label>
								<textarea class="form-control" name="observacoes"/></textarea>
							</div>

							<div class="form-group">
								<label for="chave_com">Chave com</label>
								<input type="text" class="form-control" name="chave_com"/>							
							</div>

							<div class="clearfix"></div>
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab5">
							<h4 class="text-center">Dados complementares</h4>
							
							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="documento_posse" value="S" id="documento_posse" />	
									<label for="documento_posse">Documento de posse</label>
								</div>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="planta_aprovada" value="S" id="planta_aprovada" />	
									<label for="planta_aprovada">Planta aprovada</label>
								</div>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="escritura_definitiva" value="S" id="escritura_definitiva" />	
									<label for="escritura_definitiva">Escritura definitiva</label>
								</div>	
							</div>
							
							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="desmembrado" value="S" id="desmembrado" />	
									<label for="desmembrado">Desmembrado</label>
								</div>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" class="form-control" name="habitese" value="S" id="habitese" />	
									<label for="habitese">Habite-se</label>
								</div>	
							</div>

							<div class="form-group">
								<label for="documentacao_imovel">Documentação do imóvel</label>
								<textarea class="form-control" name="documentacao_imovel"/></textarea>
							</div>

							<div class="form-group">
								<label for="registro">Registro nº</label>
								<input type="text" class="form-control" name="registro"/>
							</div>

							<div class="form-group">
								<label for="matricula">Matrícula de registro de imóveis nº</label>
								<input type="text" class="form-control" name="matricula"/>
							</div>

							<div class="form-group">
								<label for="comarca">Comarca de</label>
								<input type="text" class="form-control" name="comarca"/>
							</div>

							<div class="form-group">
								<label for="estado">Estado de</label>
								<select class="form-control" name="estado">
									<option value="AC">Acre </option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amap&#225; </option>
									<option value="AM">Amazonas </option>
									<option value="BA">Bahia</option>
									<option value="CE">Cear&#225;</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Esp&#237;rito Santo</option>
									<option value="GO">Goi&#225;s</option>
									<option value="MA">Maranh&#227;o</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Par&#225; </option>
									<option value="PB">Para&#237;ba</option>
									<option value="PR">Paran&#225;</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piau&#237;</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rond&#244;nia </option>
									<option value="RR">Roraima </option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">S&#227;o Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
							</div>

							<div class="form-group">
								<label for="cadastrado_sob">Cadastrado sob o nº</label>
								<input type="text" class="form-control" name="cadastrado_sob"/>
							</div>
														
							<div class="clearfix"></div>		
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab6">
							<h4 class="text-center">Fotos</h4>

							<?php for ($i=1;$i<=15;$i++): ?>
								<div class="form-group col-md-6">
									<div id="<?php echo 'filename'.$i; ?>" ">
										<input type="file" class="form-control" name="<?php echo 'foto'.$i; ?>"/>
									</div>
								</div>
							<?php endfor; ?>					

							<div class="clearfix"></div>		
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab7">
							<h4 class="text-center">Dados do Proprietário</h4>
							
							<div class="form-group">
								<label for="prop_nome">Nome</label>
								<input type="text" class="form-control" name="prop_nome"/>
							</div>

							<div class="form-group">
								<label for="prop_nacionalidade">Nacionalidade</label>
								<input type="text" class="form-control" name="prop_nacionalidade"/>
							</div>

							<div class="form-group">
								<label for="prop_cpf">CPF</label>
								<input type="text" class="form-control" name="prop_cpf"/>
							</div>

							<div class="form-group">
								<label for="prop_rg">RG</label>
								<input type="text" class="form-control" name="prop_rg"/>
							</div>

							<div class="form-group">
								<label for="prop_dtnascimento">Data de Nascimento</label>
								<input type="date" class="form-control" name="prop_dtnascimento"/>
							</div>

							<div class="form-group">
								<label for="prop_estadocivil">Estado Civil</label>
								<select class="form-control" name="prop_estadocivil">
									<option value="C">Casado</option>
									<option value="S">Solteiro</option>
								</select>
							</div>

							<div class="form-group">
								<label for="prop_conjuge">Cônjuge</label>
								<input type="text" class="form-control" name="prop_conjuge"/>
							</div>

							<div class="form-group">
								<label for="prop_endereco">Endereço</label>
								<input type="text" class="form-control" name="prop_endereco"/>
							</div>

							<div class="form-group">
								<label for="prop_cidade">Cidade</label>
								<input type="text" class="form-control" name="prop_cidade"/>
							</div>

							<div class="form-group">
								<label for="prop_estado">Estado</label>
								<select class="form-control" name="prop_estado">
									<option value="AC">Acre </option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amap&#225; </option>
									<option value="AM">Amazonas </option>
									<option value="BA">Bahia</option>
									<option value="CE">Cear&#225;</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Esp&#237;rito Santo</option>
									<option value="GO">Goi&#225;s</option>
									<option value="MA">Maranh&#227;o</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Par&#225; </option>
									<option value="PB">Para&#237;ba</option>
									<option value="PR">Paran&#225;</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piau&#237;</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rond&#244;nia </option>
									<option value="RR">Roraima </option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">S&#227;o Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
							</div>

							<div class="form-group">
								<label for="prop_cep">CEP</label>
								<input type="text" class="form-control" name="prop_cep"/>
							</div>

							<div class="form-group">
								<label for="prop_residencial">Residencial</label>
								<input type="text" class="form-control" name="prop_residencial"/>
							</div>

							<div class="form-group">
								<label for="prop_celular">Celular</label>
								<input type="text" class="form-control" name="prop_celular"/>
							</div>

							<div class="form-group">
								<label for="prop_comercial">Comercial</label>
								<input type="text" class="form-control" name="prop_comercial"/>
							</div>

							<div class="form-group">
								<label for="prop_fax">Fax</label>
								<input type="text" class="form-control" name="prop_fax"/>
							</div>

							<div class="form-group">
								<label for="prop_email">Email</label>
								<input type="text" class="form-control" name="prop_email"/>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" class="form-control" name="prop_indisponivel" value="S" id="prop_indisponivel" />	
									<label for="prop_indisponivel">Imóvel vendido e/ou indisponível</label>
								</div>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" class="form-control" name="prop_senha" value="S" id="prop_senha" />	
									<label for="prop_senha">Senha Exclusiva</label>
								</div>	
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-success btn-md">Salvar</button>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>