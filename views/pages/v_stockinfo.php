<hr>
<label style="font-size: 25px;"><b>Stock Barang&nbsp;</b></label><a href="<?php echo base_url('StockPrint') ?>" id="Print"><img src="<?php echo base_url('assetsPoints/dist/img/pdf.jpg') ?>" style="width: 50px;height: 37px;"></a>
<div class="Stock">
	<div class="row">

		<?php foreach ($queryStock as $key): ?>			
		<div class="col-md-2 col-sm-3" style="margin: 25px;">			
			<a href="<?php echo base_url('assetsPoints/dist/img/Barang/'.$key['Picture']) ?>" data-lightbox="mygalery">
				<img src="<?php echo base_url('assetsPoints/dist/img/Barang/'.$key['Picture'])?>">
				<label>Kode : <?php echo $key['KodeBarang']; ?></label><br>
				<label>Nama : <?php echo $key['NamaBarang'] ?></label><br>
				<label>Stock : <?php echo $key['Jumlah'] ?> &nbsp; <?php echo $key['Satuan']; ?></label><br>
			</a>
		</div>
		<?php endforeach ?>
	</div>
</div>
