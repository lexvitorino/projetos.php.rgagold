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
								<select class="form-control" name="id_imobiliaria">
									<option value=""></option>
									<?php foreach ($imobiliarias_list as $item): ?>
									<option value="<?php echo $item['id'] ?>" <?php echo ($item['id']==$data['id_imobiliaria'])?'selected="selected"':''; ?>> <?php echo $item['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Operações</label>
								<div class="col-sm-12">
									<?php foreach($operacoes_list as $p): ?>
										<div class="checkbox checkbox-primary col-md-2">
											<input type="checkbox" class="form-control" name="operacoes[]" value="<?php echo $p['id']; ?>" id="<?php echo $p['id']; ?>" <?php echo (in_array($p['id'], $data['operacoes'])) ? 'checked="checked"' : ''; ?> />	
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
											<input type="checkbox" class="form-control" name="tipoImoveis[]" value="<?php echo $p['id']; ?>" id="<?php echo $p['id']; ?>" <?php echo (in_array($p['id'], $data['tipoImoveis'])) ? 'checked="checked"' : ''; ?> />	
											<label for="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
										</div>	
									<?php endforeach; ?>
								</div>	
							</div>

							<div class="form-group">
								<label for="predio">Nome do Prédio</label>
								<input type="text" class="form-control" name="predio" value="<?php echo $data['predio']; ?>"/>
							</div>

							<div class="form-group">
								<label for="num_ap">Num. Ap.</label>
								<input type="text" class="form-control" name="num_ap" value="<?php echo $data['num_ap']; ?>" />
							</div>

							<div class="form-group">
								<label for="id_cidade">Cidade</label>
								<select class="form-control" name="id_cidade" class="form-control">
									<option value=""></option>
									<?php foreach ($cidades_list as $item): ?>
										<option value="<?php echo $item['id'] ?>" <?php echo ($item['id']==$data['id_cidade'])?'selected="selected"':''; ?>> <?php echo $item['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="id_bairro">Bairro</label>
								<select class="form-control" name="id_bairro" class="form-control">
									<option value=""></option>
									<?php foreach ($bairros_list as $item): ?>
										<option value="<?php echo $item['id'] ?>" <?php echo ($item['id']==$data['id_bairro'])?'selected="selected"':''; ?>> <?php echo $item['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="endereco">Endereço</label>
								<input type="text" class="form-control" name="endereco" value="<?php echo $data['endereco']; ?>"/>
							</div>

							<div class="form-group">
								<label for="descricao_destaque">Descrição de destaque</label>
								<textarea class="form-control" name="descricao_destaque"/><?php echo $data['descricao_destaque']; ?></textarea>
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-2">
									<input type="checkbox" class="form-control" name="destaque_dia" id="destaque_dia" value="S" <?php echo ($data['destaque_dia']=='S') ? 'checked="checked"' : ''; ?>/>	
									<label for="destaque_dia">Destaque no site</label>
								</div>	
							</div>

							<div class="clearfix"></div>

							<div class="form-group">
								<label for="area_total_terreno">Área total do terreno</label>
								<input type="number" class="form-control" name="area_total_terreno" value="<?php echo $data['area_total_terreno']; ?>"/>
							</div>

							<div class="form-group">
								<label for="area_construida">Área construída</label>
								<input type="number" class="form-control" name="area_construida" value="<?php echo $data['area_construida']; ?>"/>
							</div>

							<div class="form-group">
								<label for="distancia_mar">Distância do Mar</label>
								<input type="number" class="form-control" name="distancia_mar" value="<?php echo $data['distancia_mar']; ?>"/>
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="frente_mar" id="frente_mar" value="S" <?php echo ($data['frente_mar']=='S') ? 'checked="checked"' : ''; ?>/>	
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
								<input type="number" class="form-control" name="dormitorio" value="<?php echo $data['dormitorio']; ?>"/>
							</div>

							<div class="form-group">
								<label for="suite">Suíte(s)</label>
								<input type="number" class="form-control" name="suite" value="<?php echo $data['suite']; ?>"/>
							</div>

							<div class="form-group">
								<label for="sala">Sala(s)</label>
								<input type="number" class="form-control" name="sala" value="<?php echo $data['sala']; ?>"/>
							</div>

							<div class="form-group">
								<label for="cozinha">Cozinha</label>
								<input type="number" class="form-control" name="cozinha" value="<?php echo $data['cozinha']; ?>"/>
							</div>

							<div class="form-group">
								<label for="banheiro">Banheiro(s)</label>
								<input type="number" class="form-control" name="banheiro" value="<?php echo $data['banheiro']; ?>"/>
							</div>

							<div class="form-group">
								<label for="lavabo">Lavabo(s)</label>
								<input type="number" class="form-control" name="lavabo" value="<?php echo $data['lavabo']; ?>"/>
							</div>

							<div class="form-group">
								<label for="lavanderia">lavandeira(s)</label>
								<input type="number" class="form-control" name="lavanderia" value="<?php echo $data['lavanderia']; ?>"/>
							</div>

							<div class="form-group">
								<label for="dep_empregada">Dep. empregada(s)</label>
								<input type="number" class="form-control" name="dep_empregada" value="<?php echo $data['dep_empregada']; ?>"/>
							</div>

							<div class="form-group">
								<label for="edicula">Edícula(s)</label>
								<input type="number" class="form-control" name="edicula" value="<?php echo $data['edicula']; ?>"/>
							</div>

							<div class="form-group">
								<label for="vagas_garagem">Vaga(s) Garagem</label>
								<input type="number" class="form-control" name="vagas_garagem" value="<?php echo $data['vagas_garagem']; ?>"/>
							</div>

							<div class="form-group">
								<label>Infra-Estrutura e utensílios</label>
								<div class="col-sm-12">
									<?php foreach($opcionais_list as $p): ?>
										<div class="checkbox checkbox-primary col-md-3">
											<input type="checkbox" class="form-control" name="opcionais[]" value="<?php echo $p['id']; ?>" id="<?php echo $p['id']; ?>" <?php echo (in_array($p['id'], $data['opcionais'])) ? 'checked="checked"' : ''; ?> />
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
									<option value="R" <?php echo ($data['moeda']=='R')?'selected="selected"':''; ?>>Real R$</option>		
									<option value="D" <?php echo ($data['moeda']=='D')?'selected="selected"':''; ?>>Dolar U$</option>
								</select>
							</div>

							<div class="form-group">
								<label for="valor_venda">Valor para venda</label>
								<input type="text" class="form-control" name="valor_venda" value="<?php echo $data['valor_venda']; ?>"/>
							</div>

							<div class="form-group">
								<label for="valor_entrada">Valor da entrada</label>
								<input type="text" class="form-control" name="valor_entrada" value="<?php echo $data['valor_entrada']; ?>"/>
							</div>

							<div class="form-group">
								<label for="qtde_parcelas">Quantidade de parcelas</label>
								<select class="form-control" name="qtde_parcelas">
								<?php for ($i=0;$i<=100;$i++): ?>
								<option value="<?php echo $i; ?>" <?php echo ($i==$data['qtde_parcelas'])?'selected="selected"':''; ?>> <?php echo $i; ?></option>
								<?php endfor; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="valor_parcela">Valor das parcelas</label>
								<input type="text" class="form-control" name="valor_parcela" value="<?php echo $data['valor_parcela']; ?>"/>
							</div>

							<div class="form-group">
								<label for="valor_intermediarias">Valor das intermediárias</label>
								<input type="text" class="form-control" name="valor_intermediarias" value="<?php echo $data['valor_intermediarias']; ?>"/>
							</div>

							<div class="form-group">
								<label for="valor_condominio">Valor do Condomínio</label>
								<input type="text" class="form-control" name="valor_condominio" value="<?php echo $data['valor_condominio']; ?>"/>
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="mostrar_valores" id="mostrar_valores" value="S" <?php echo ($data['mostrar_valores']=='S') ? 'checked="checked"' : ''; ?>/>					
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
								<input type="number" class="form-control" name="acomodacoes" value="<?php echo $data['acomodacoes']; ?>"/>
							</div>

							<div class="form-group">
								<label for="aluguel_mensal">Aluguel Mensa</label>
								<input type="text" class="form-control" name="aluguel_mensal" value="<?php echo $data['aluguel_mensal']; ?>"/>
							</div>

							<div class="form-group">
								<label for="aluguel_anual">Aluguel Anual</label>
								<input type="text" class="form-control" name="aluguel_anual" value="<?php echo $data['aluguel_anual']; ?>"/>
							</div>

							<div class="form-group">
								<label for="aluguel_reveillon">Aluguel Reveillon</label>
								<input type="text" class="form-control" name="aluguel_reveillon" value="<?php echo $data['aluguel_reveillon']; ?>"/>
							</div>

							<div class="form-group">
								<label for="aluguel_carnava">Aluguel Carnaval</label>
								<input type="text" class="form-control" name="aluguel_carnaval" value="<?php echo $data['aluguel_carnaval']; ?>"/>
							</div>

							<div class="form-group">
								<label for="aluguel_temporada">Aluguel Temporada</label>
								<input type="text" class="form-control" name="aluguel_temporada" value="<?php echo $data['aluguel_temporada']; ?>"/>
							</div>

							<div class="form-group">
								<label for="aluguel_pacote">Preço do Pacote</label>
								<input type="text" class="form-control" name="aluguel_pacote" value="<?php echo $data['aluguel_pacote']; ?>"/>
							</div>

							<div class="form-group">
								<label for="observacoes">Observação</label>
								<textarea class="form-control" name="observacoes"/><?php echo $data['observacoes']; ?></textarea>
							</div>

							<div class="form-group">
								<label for="chave_com">Chave com</label>
								<input type="text" class="form-control" name="chave_com" value="<?php echo $data['chave_com']; ?>"/>
							</div>

							<div class="clearfix"></div>
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab5">
							<h4 class="text-center">Dados complementares</h4>
							
							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="documento_posse" id="documento_posse" value="S" <?php echo ($data['documento_posse']=='S') ? 'checked="checked"' : ''; ?>/>	
									<label for="documento_posse">Documento de posse</label>
								</div>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="planta_aprovada" id="planta_aprovada" value="S" <?php echo ($data['planta_aprovada']=='S') ? 'checked="checked"' : ''; ?>/>	
									<label for="planta_aprovada">Planta aprovada</label>
								</div>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="escritura_definitiva" id="escritura_definitiva" value="S" <?php echo ($data['escritura_definitiva']=='S') ? 'checked="checked"' : ''; ?>/>	
									<label for="escritura_definitiva">Escritura definitiva</label>
								</div>	
							</div>
							
							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="desmembrado" id="desmembrado" value="S" <?php echo ($data['desmembrado']=='S') ? 'checked="checked"' : ''; ?>/>	
									<label for="desmembrado">Desmembrado</label>
								</div>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="habitese" id="habitese" value="S" <?php echo ($data['habitese']=='S') ? 'checked="checked"' : ''; ?>/>	
									<label for="habitese">Habite-se</label>
								</div>	
							</div>

							<div class="form-group">
								<label for="documentacao_imovel">Documentação do imóvel</label>
								<textarea class="form-control" name="documentacao_imovel"/><?php echo $data['documentacao_imovel']; ?></textarea>
							</div>

							<div class="form-group">
								<label for="registro">Registro nº</label>
								<input type="text" class="form-control" name="registro" value="<?php echo $data['registro']; ?>"/>
							</div>

							<div class="form-group">
								<label for="matricula">Matrícula de registro de imóveis nº</label>
								<input type="text" class="form-control" name="matricula" value="<?php echo $data['matricula']; ?>"/>
							</div>

							<div class="form-group">
								<label for="comarca">Comarca de</label>
								<input type="text" class="form-control" name="comarca" value="<?php echo $data['comarca']; ?>"/>
							</div>

							<div class="form-group">
								<label for="estado">Estado de</label>
								<select class="form-control" name="estado">
									<option value="AC" <?php echo ($data['estado']=='AC')?'selected="selected"':''; ?>>Acre </option>
									<option value="AL" <?php echo ($data['estado']=='AL')?'selected="selected"':''; ?>>Alagoas</option>
									<option value="AP" <?php echo ($data['estado']=='AP')?'selected="selected"':''; ?>>Amap&#225; </option>
									<option value="AM" <?php echo ($data['estado']=='AM')?'selected="selected"':''; ?>>Amazonas </option>
									<option value="BA" <?php echo ($data['estado']=='BA')?'selected="selected"':''; ?>>Bahia</option>
									<option value="CE" <?php echo ($data['estado']=='CE')?'selected="selected"':''; ?>>Cear&#225;</option>
									<option value="DF" <?php echo ($data['estado']=='DF')?'selected="selected"':''; ?>>Distrito Federal</option>
									<option value="ES" <?php echo ($data['estado']=='ES')?'selected="selected"':''; ?>>Esp&#237;rito Santo</option>
									<option value="GO" <?php echo ($data['estado']=='GO')?'selected="selected"':''; ?>>Goi&#225;s</option>
									<option value="MA" <?php echo ($data['estado']=='MA')?'selected="selected"':''; ?>>Maranh&#227;o</option>
									<option value="MT" <?php echo ($data['estado']=='MT')?'selected="selected"':''; ?>>Mato Grosso</option>
									<option value="MS" <?php echo ($data['estado']=='MS')?'selected="selected"':''; ?>>Mato Grosso do Sul</option>
									<option value="MG" <?php echo ($data['estado']=='MG')?'selected="selected"':''; ?>>Minas Gerais</option>
									<option value="PA" <?php echo ($data['estado']=='PA')?'selected="selected"':''; ?>>Par&#225; </option>
									<option value="PB" <?php echo ($data['estado']=='PB')?'selected="selected"':''; ?>>Para&#237;ba</option>
									<option value="PR" <?php echo ($data['estado']=='PR')?'selected="selected"':''; ?>>Paran&#225;</option>
									<option value="PE" <?php echo ($data['estado']=='PE')?'selected="selected"':''; ?>>Pernambuco</option>
									<option value="PI" <?php echo ($data['estado']=='PI')?'selected="selected"':''; ?>>Piau&#237;</option>
									<option value="RJ" <?php echo ($data['estado']=='RJ')?'selected="selected"':''; ?>>Rio de Janeiro</option>
									<option value="RN" <?php echo ($data['estado']=='RN')?'selected="selected"':''; ?>>Rio Grande do Norte</option>
									<option value="RS" <?php echo ($data['estado']=='RS')?'selected="selected"':''; ?>>Rio Grande do Sul</option>
									<option value="RO" <?php echo ($data['estado']=='RO')?'selected="selected"':''; ?>>Rond&#244;nia </option>
									<option value="RR" <?php echo ($data['estado']=='RR')?'selected="selected"':''; ?>>Roraima </option>
									<option value="SC" <?php echo ($data['estado']=='SC')?'selected="selected"':''; ?>>Santa Catarina</option>
									<option value="SP" <?php echo ($data['estado']=='SP')?'selected="selected"':''; ?>>S&#227;o Paulo</option>
									<option value="SE" <?php echo ($data['estado']=='SE')?'selected="selected"':''; ?>>Sergipe</option>
									<option value="TO" <?php echo ($data['estado']=='TO')?'selected="selected"':''; ?>>Tocantins</option>
								</select>
							</div>

							<div class="form-group">
								<label for="cadastrado_sob">Cadastrado sob o nº</label>
								<input type="text" class="form-control" name="cadastrado_sob" value="<?php echo $data['cadastrado_sob']; ?>"/>
							</div>
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab6">
							<h4 class="text-center">Fotos</h4>

							<div class="form-group col-md-12 img_imovel">	
								<?php for ($i=1;$i<=15;$i++): ?>
								<div id="<?php echo 'dfoto'.$i; ?>" class="col-md-2" style="<?php echo ($data['foto'.$i]!='')?'display: block':'display: none'; ?>">
									<img src="<?php echo BASE_URL; ?>/assets/specs/images/fotos/<?php echo $data['foto'.$i]; ?>" alt="<?php echo $data['foto'.$i]; ?>">
									<br/>
									<a id="<?php echo 'foto'.$i; ?>" href="javascript:;" onclick="excluiFoto(this);" data-id="<?php echo $data['id']; ?>" data-file="<?php echo $data['foto'.$i]; ?>">Excluir</a>
								</div>
								<?php endfor; ?>				
							</div>	

							<?php for ($i=1;$i<=15;$i++): ?>
								<div id="<?php echo 'filename'.$i; ?>" class="form-group col-md-6" style="<?php echo ($data['foto'.$i]!='')?'display: none':'display: block'; ?>">
									<input type="file" class="form-control" name="<?php echo 'foto'.$i; ?>"/>
								</div>
							<?php endfor; ?>	
							
						</div>
						<!-- Active Contact -->
						<div class="tab-pane active" id="cl-tab7">
							<h4 class="text-center">Dados do Proprietário</h4>
							
							<div class="form-group">
								<label for="prop_nome">Nome</label>
								<input type="text" class="form-control" name="prop_nome" value="<?php echo $data['prop_nome']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_nacionalidade">Nacionalidade</label>
								<input type="text" class="form-control" name="prop_nacionalidade" value="<?php echo $data['prop_nacionalidade']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_cpf">CPF</label>
								<input type="text" class="form-control" name="prop_cpf" value="<?php echo $data['prop_cpf']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_rg">RG</label>
								<input type="text" class="form-control" name="prop_rg" value="<?php echo $data['prop_rg']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_dtnascimento">Data de Nascimento</label>
								<input type="date" class="form-control" name="prop_dtnascimento" value="<?php echo $data['prop_dtnascimento']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_estadocivil">Estado Civil</label>
								<select class="form-control" name="prop_estadocivil">
									<option value="C" <?php echo ($data['prop_estadocivil']=='C')?'selected="selected"':''; ?>>Casado</option>
									<option value="S" <?php echo ($data['prop_estadocivil']=='S')?'selected="selected"':''; ?>>Solteiro</option>
								</select>
							</div>

							<div class="form-group">
								<label for="prop_conjuge">Cônjuge</label>
								<input type="text" class="form-control" name="prop_conjuge" value="<?php echo $data['prop_conjuge']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_endereco">Endereço</label>
								<input type="text" class="form-control" name="prop_endereco" value="<?php echo $data['prop_endereco']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_cidade">Cidade</label>
								<input type="text" class="form-control" name="prop_cidade" value="<?php echo $data['prop_cidade']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_estado">Estado</label>
								<select class="form-control" name="prop_estado">
									<option value="AC" <?php echo ($data['prop_estado']=='AC')?'selected="selected"':''; ?>>Acre </option>
									<option value="AL" <?php echo ($data['prop_estado']=='AL')?'selected="selected"':''; ?>>Alagoas</option>
									<option value="AP" <?php echo ($data['prop_estado']=='AP')?'selected="selected"':''; ?>>Amap&#225; </option>
									<option value="AM" <?php echo ($data['prop_estado']=='AM')?'selected="selected"':''; ?>>Amazonas </option>
									<option value="BA" <?php echo ($data['prop_estado']=='BA')?'selected="selected"':''; ?>>Bahia</option>
									<option value="CE" <?php echo ($data['prop_estado']=='CE')?'selected="selected"':''; ?>>Cear&#225;</option>
									<option value="DF" <?php echo ($data['prop_estado']=='DF')?'selected="selected"':''; ?>>Distrito Federal</option>
									<option value="ES" <?php echo ($data['prop_estado']=='ES')?'selected="selected"':''; ?>>Esp&#237;rito Santo</option>
									<option value="GO" <?php echo ($data['prop_estado']=='GO')?'selected="selected"':''; ?>>Goi&#225;s</option>
									<option value="MA" <?php echo ($data['prop_estado']=='MA')?'selected="selected"':''; ?>>Maranh&#227;o</option>
									<option value="MT" <?php echo ($data['prop_estado']=='MT')?'selected="selected"':''; ?>>Mato Grosso</option>
									<option value="MS" <?php echo ($data['prop_estado']=='MS')?'selected="selected"':''; ?>>Mato Grosso do Sul</option>
									<option value="MG" <?php echo ($data['prop_estado']=='MG')?'selected="selected"':''; ?>>Minas Gerais</option>
									<option value="PA" <?php echo ($data['prop_estado']=='PA')?'selected="selected"':''; ?>>Par&#225; </option>
									<option value="PB" <?php echo ($data['prop_estado']=='PB')?'selected="selected"':''; ?>>Para&#237;ba</option>
									<option value="PR" <?php echo ($data['prop_estado']=='PR')?'selected="selected"':''; ?>>Paran&#225;</option>
									<option value="PE" <?php echo ($data['prop_estado']=='PE')?'selected="selected"':''; ?>>Pernambuco</option>
									<option value="PI" <?php echo ($data['prop_estado']=='PI')?'selected="selected"':''; ?>>Piau&#237;</option>
									<option value="RJ" <?php echo ($data['prop_estado']=='RJ')?'selected="selected"':''; ?>>Rio de Janeiro</option>
									<option value="RN" <?php echo ($data['prop_estado']=='RN')?'selected="selected"':''; ?>>Rio Grande do Norte</option>
									<option value="RS" <?php echo ($data['prop_estado']=='RS')?'selected="selected"':''; ?>>Rio Grande do Sul</option>
									<option value="RO" <?php echo ($data['prop_estado']=='RO')?'selected="selected"':''; ?>>Rond&#244;nia </option>
									<option value="RR" <?php echo ($data['prop_estado']=='RR')?'selected="selected"':''; ?>>Roraima </option>
									<option value="SC" <?php echo ($data['prop_estado']=='SC')?'selected="selected"':''; ?>>Santa Catarina</option>
									<option value="SP" <?php echo ($data['prop_estado']=='SP')?'selected="selected"':''; ?>>S&#227;o Paulo</option>
									<option value="SE" <?php echo ($data['prop_estado']=='SE')?'selected="selected"':''; ?>>Sergipe</option>
									<option value="TO" <?php echo ($data['prop_estado']=='TO')?'selected="selected"':''; ?>>Tocantins</option>
								</select>
							</div>

							<div class="form-group">
								<label for="prop_cep">CEP</label>
								<input type="text" class="form-control" name="prop_cep" value="<?php echo $data['prop_cep']; ?>"/>	
							</div>

							<div class="form-group">
								<label for="prop_residencial">Residencial</label>
								<input type="text" class="form-control" name="prop_residencial" value="<?php echo $data['prop_residencial']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_celular">Celular</label>
								<input type="text" class="form-control" name="prop_celular" value="<?php echo $data['prop_celular']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_comercial">Comercial</label>
								<input type="text" class="form-control" name="prop_comercial" value="<?php echo $data['prop_comercial']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_fax">Fax</label>
								<input type="text" class="form-control" name="prop_fax" value="<?php echo $data['prop_fax']; ?>"/>
							</div>

							<div class="form-group">
								<label for="prop_email">Email</label>
								<input type="text" class="form-control" name="prop_email" value="<?php echo $data['prop_email']; ?>"/>
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="prop_indisponivel" id="prop_indisponivel" <?php echo ($data['prop_indisponivel']=='S') ? 'checked="checked"' : ''; ?>/>	
									<label for="prop_indisponivel">Imóvel vendido e/ou indisponível</label>
								</div>	
							</div>

							<div class="form-group">
								<div class="checkbox checkbox-primary col-md-12">
									<input type="checkbox" class="form-control" name="prop_senha" id="prop_senha" <?php echo ($data['prop_senha']=='S') ? 'checked="checked"' : ''; ?>/>	
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