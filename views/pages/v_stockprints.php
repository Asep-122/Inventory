<table>
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Qty Barang</th>
			<th>Satuan Barang</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $key): ?>
			
		<tr>
			<td><?php echo $key['KodeBarang'] ?></td>
			<td><?php echo $key['NamaBarang'] ?></td>
			<td><?php echo $key['Qty'] ?></td>
			<td><?php echo $key['Satuan'] ?></td>
		</tr>
	</tbody>
		<?php endforeach ?>
</table>