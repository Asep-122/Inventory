<div>	
<table>
	<tr>
		<td>No Penjualan</td>
		<td>:</td>
		<td><input type="text" name="inpNoPj" class="form-control" value="<?php echo $AutoKodeBK ?>" readonly="readonly"></td>
		<td>&nbsp;</td>
		<td>Nama Barang</td>
		<td>:</td>
		<td><input type="text" name="inpKodeBarang"  id="inpKodeBarang" class="form-control typeaheads"></td>
	</tr>
	<tr>
		<td>Qty Stock</td>
		<td>:</td>
		<td><input type="text" name="inpQtyStock" class="form-control" readonly="readonly"></td>
		<td>&nbsp;</td>
		<td>Qty Jual</td>
		<td>:</td>
		<td><input type="number" name="inpQtyOrder"  class="form-control" min="1" max="1000" value="1"></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td><input type="" name="inpHarga" class="form-control" readonly="readonly"></td>
		<td>&nbsp;</td>
		<td>Tgl Penjualan</td>
		<td>:</td>
		<td><input type="date" name="inpTglJual"  class="form-control" value="<?php echo date('Y-m-d') ?>"></td>

	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><button class="btn btn-info" id="inppesanbarang"><i class="fa fa-save"></i> Proses Transaksi Barang</button></td>
	</tr>
</table>
</div>
<hr>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No Penjualan</th>
			<th>Kode Barang</th>
			<th>Qty</th>
			<th>Harga</th>
			<th>Tgl Transaksi</th>
			<th>User</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($queryBK as $key): ?>
			<tr>
				<td><?php echo $key['NoPenjualan'] ?></td>
				<td><?php echo $key['KodeBarang'] ?></td>
				<td><?php echo abs($key['Qty']) ?></td>
				<td><?php echo $key['Harga'] ?></td>
				<td><?php echo $key['TglEntry'] ?></td>
				<td><?php echo $key['UserEntry'] ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>



<script type="text/javascript">
	jQuery(document).ready(function($) {
		var sample_data = new Bloodhound({
		datumTokenizer : Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer : Bloodhound.tokenizers.whitespace,
		prefetch : '<?php echo base_url('C_Main/fetchBK') ?>',
		remote : {
			url : '<?php echo base_url('C_Main/fetchBK/%QUERY') ?>',
			wildcard : '%QUERY'
		}
	});

		$('.typeaheads').typeahead(null, {
			name : 'sample_data',
			display : 'NamaBarang',
			source : sample_data,
			templates:{
				suggestion:Handlebars.compile('<div class="row"><img src="<?php echo base_url() ?>/assetsPoints/dist/img/Barang/{{Picture}}"  width="40"/><div class="col-md-10" style="padding-right:5px;padding-left:5px;">{{NamaBarang}}</div></div>')
			} 
		});

	$('#inpKodeBarang').keyup(function(event) {
		/* Act on the event */
		var KodeBarang = $('#inpKodeBarang').val();
		// console.log(KodeBarang);
		$.ajax({
			url: '<?php echo base_url('C_Main/prosesBK') ?>',
			type : 'post',
			dataType : 'json',
			data: {KodeBarang:KodeBarang},
			success : function (argument) {
				var Jumlah = '';
				var Harga = '';
				for (var i = 0; i<argument.length; i++) {
					Jumlah = argument[i].Jumlah;
					Harga = argument[i].Harga;
				}
				$('input[name="inpQtyStock"]').val(Jumlah);
				$('input[name="inpHarga"]').val(Harga);
				console.log(Harga);
			}
		})
	});

	$('#inpKodeBarang').on('change',function(event) {
		var qtystock = $('input[name="inpQtyStock"]').val();
		if($('input[name="inpQtyOrder"]').val() > $('input[name="inpQtyStock"]').val()){
			$('input[name="inpQtyOrder"]').val($('input[name="inpQtyStock"]').val());
		}
		console.log('QtyStock : '+qtystock);
		$('input[name="inpQtyOrder"]').attr({'max' : qtystock});
	});
		
	$('#inppesanbarang').click(function(event) {
		var NoPJ = $('input[name="inpNoPj"]').val();
		var KodeBarang = $('input[name="inpKodeBarang"]').val();
		var QtyStock = $('input[name="inpQtyStock"]').val();
		var QtyOrder = $('input[name="inpQtyOrder"]').val();
		var Harga = $('input[name="inpHarga"]').val();
		var inpTglJual = $('input[name="inpTglJual"]').val();

		if(QtyStock != 0){

          swal.fire({
            title: 'Apakah anda sudah yakin dengan data pengajuan ini ?',
            text: "Untuk melakukan proses menerima barang Harap ke Menu Riwayat Barang ! ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Lanjutkan Pengajuan!'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                url: '<?php echo base_url('C_Main/Penjualan') ?>',
                type: 'POST',
                data: {NoPJ:NoPJ,KodeBarang:KodeBarang,QtyOrder:QtyOrder,Harga:Harga,inpTglJual:inpTglJual},
                success : function (data) {
                	console.log(data);

                  Swal.fire('Berhasil Ditambahkan Ke Stock','Harap periksa kembali di Stock Barang','success')
                  .then((result) => {
                    if (result.value) {
                     window.location.assign('<?php echo base_url('BarangKeluar') ?>');
                    }
                 });
                 },
                error : function() {
                  swal('Data Gagal Disimpan','','warning');
                }   
              })}
              })
		
		}
		else{
			swal('Tidak Bisa Input Transaksi di karenakan tidak ada Stock ','Silahkan Isi Stock Terlebih Dahulu','error');
		}
	});	

	});
</script>