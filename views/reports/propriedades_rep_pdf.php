<h1>Relatório de Propriedades</h1>

<table border="0" width="100%">
	<tr>
		<th style="text-align: left">REF</th>
		<th style="text-align: left">MOD</th>
		<th style="text-align: left">IMÓVEL</th>
		<th style="text-align: left">NUM</th>
		<th style="text-align: left">Q</th>
		<th style="text-align: left">S</th>
		<th style="text-align: left">V</th>
		<th style="text-align: left">CH</th>
		<th style="text-align: left">PIS</th>
		<th style="text-align: left">ÚTIL</th>
		<th style="text-align: left">PREÇO</th>
		<th style="text-align: left">PROPRIETÁRIO</th>
		<th style="text-align: left">CHAVES</th>
		<th style="text-align: left">ATUAL.</th>
	</tr>	
	<?php foreach($propriedades_list as $p): ?>
	<tr>
		<td width="50"><?php echo $p['id']; ?></td>
		<td><?php echo $p['bairro']; ?></td>
		<td><?php echo $p['predio']; ?></td>
		<td><?php echo $p['num_ap']; ?></td>
		<td><?php echo $p['dormitorio']; ?></td>
		<td><?php echo $p['suite']; ?></td>
		<td><?php echo $p['vagas_garagem']; ?></td>
		<td><?php echo $p['mostrar_valores']; ?></td>
		<td><?php echo $p['mostrar_valores']; ?></td>
		<td><?php echo $p['area_construida']; ?></td>
		<td><?php echo $p['valor_venda']; ?></td>
		<td><?php echo $p['prop_nome']; ?></td>
		<td><?php echo $p['chave_com']; ?></td>
		<td><?php echo $p['predio']; ?></td>
	</tr>
	<?php endforeach; ?>	
</table>