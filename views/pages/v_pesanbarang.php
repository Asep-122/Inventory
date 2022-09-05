
<style type="text/css">
	#inp{
		border-spacing: 50px;
		padding: 5px;
	}
</style>
<div>	
<table >
	<tr>
		<td>No Faktur</td>
		<td>:</td>
		<td><input type="" name="inpNoFaktur" class="form-control" value="<?php echo $queryautokode ?>" disabled="disabled"></td>
		<td>&nbsp;</td>
		<td>Nama Supplier</td>
		<td>:</td>
		<td>
			<select  class="form-control" name="inpKodeSupplier">
				<?php foreach ($querysupplier as $key): ?>
					<option value='<?php echo $key['KodeSupplier'] ?>' ><?php echo $key['NamaSupplier']; ?></option>>
				<?php endforeach ?>
			</select>	
		</td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td><input type="text" name="inpNamaBarang"   class="form-control typeaheads" ></td>
		<td>&nbsp;</td>
		<td>Tgl Pemesanan</td>
		<td>:</td>
		<td><input type="date" name="inpTglPesan"  class="form-control" value="<?php echo date('Y-m-d') ?>"></td>
	</tr>
	<tr>
		<td>Qty Barang</td>
		<td>:</td>
		<td><input type="number" name="inpQtyOrder"  class="form-control" min="1" max="1000" value="1"></td>
		<td>&nbsp;</td>
		<td>Harga</td>
		<td>:</td>
		<td><input type="" name="inpHarga" class="form-control"></td>

	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><button class="btn btn-info" id="inppesanbarang"><i class="fa fa-save"></i> Input Pesan Barang</button></td>
	</tr>
</table>




 <hr>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>No Faktur</th>
			<th>Nama Supplier</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Tgl Pemesanan</th>
			<th>Qty Order</th>
			<th>Riwayat Barang</th>
			<th>Status Pemesanan</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pesanbarang as $key): 
			$label = '';
			if($key['StatusPemesanan'] == 0){
				$label =  "<button type='button' class='btn btn-outline-warning btn-sm'><b>Barang On Process</b></button>";
			}
			else{
				$label = "<button type='button' class='btn btn-outline-success btn-sm'><b>Barang Di Terima&nbsp;&nbsp;</b></button>";
			}

		?>
			<tr>
				<td><?php echo $key['NoFaktur'] ?></td>
				<td><?php echo $key['NamaSupplier'] ?></td>
				<td><?php echo $key['KodeBarang'] ?></td>
				<td><?php echo $key['NamaBarang'] ?></td>
				<td><span class="label label-danger"><?php echo $key['TglPemesanan'] ?></span></td>
				<td><?php echo $key['QtyOrder'] ?></td>
				<td><a href="#" data-toggle="modal" data-backdrop="static" data-target="#myModal1" data-NoFaktur="<?php echo $key['NoFaktur']; ?>"><i class="fa fa-eye"></i></a></td>
				<td><?php echo $label;
				 ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

  <div class="modal fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Keranjang</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                	<div>
          	<div class="tab-content">
          		<div role="tabpanel" class="tab-pane active" id="home_add1">
       				<div class="row">
       					<div class="col-md-6 col-sm-6">
       						<label for="nip">No Faktur</label>
       						<input type="text" id="nip_add" name="NoFaktur" class="form-control" value="" disabled="disabled">
       					</div>
       					<div class="col-md-6 col-sm-6">
       						<label for="nama">Nama Supplier</label>
       						<input type="text" name="NamaSupplier" class="form-control" disabled="disabled">
       					</div>
       				</div>
       				<br>
       				<div class="row">
       					<div class="col-md-6 col-sm-6">
       						<label for="nip">Qty Order</label>
       						<input type="number" id="nip_add" name="QtyOrder" class="form-control" disabled="disabled">
       					</div>
       					<div class="col-md-6 col-sm-6">
       						<label for="nama">Tgl Order</label>
       						<input type="date" name="TglOrder" class="form-control" disabled="disabled">
       					</div>
       				</div><br>
       				<div class="row">
       					<div class="col-md-6 col-sm-6">
       						<label for="nip">Qty Terima</label>
       						<input type="number" id="nip_add" name="QtyTerima" class="form-control" min="1" >
       					</div>
       					<div class="col-md-6 col-sm-6">
       						<label for="nama">Tgl Terima</label>
       						<input type="date" name="TglTerima" class="form-control" value="<?php echo date('Y-m-d') ?>">
       					</div>
       				</div>
       				<div class="row">
       					<div class="col-md-6 col-sm-6">
       						<label for="nip">Qty Retur</label>
       						<input type="number" id="nip_add" name="QtyRetur" class="form-control" disabled="disabled">
       					</div>
       					<div class="col-md-6 col-sm-6">
       						<label for="nama">Keterangan</label>
       						<textarea class="form-control" name="Keterangan"></textarea>
       					</div>
       				</div>
      
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnTerima">Terima Barang</button> 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>


<script>
	jQuery(document).ready(function($) {


		var sample_data = new Bloodhound({
			datumTokenizer : Bloodhound.tokenizers.obj.whitespace('value'),
			queryTokenizer : Bloodhound.tokenizers.whitespace,
			prefetch : '<?php echo base_url('C_Main/fetch') ?>',
			remote : {
				url : '<?php echo base_url('C_Main/fetch/%QUERY') ?>',
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

	    $('#inppesanbarang').click(function(event) {
        var NoFaktur = $('input[name="inpNoFaktur"]').val();
        var KodeSupplier = $('select[name="inpKodeSupplier"]').val();
        var NamaBarang = $('input[name="inpNamaBarang"]').val();
        var TglOrder = $('input[name="inpTglPesan"]').val();
        var QtyOrder = $('input[name="inpQtyOrder"]').val();
        var Harga = $('input[name="inpHarga"]').val();

        if(NoFaktur == '' || KodeSupplier == '' || NamaBarang == '' || TglOrder == '' || QtyOrder == '' || Harga == ''){
          swal('Data Pengajuan Tidak Boleh Ada yang kosong','','error');
        }
        else{
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
                url: '<?php echo base_url('C_Main/PengajuanBarang') ?>',
                type: 'POST',
                data: {NoFaktur:NoFaktur,KodeSupplier:KodeSupplier,NamaBarang:NamaBarang,TglOrder:TglOrder,QtyOrder:QtyOrder,Harga:Harga},
                success : function ($data) {

                  Swal.fire('Berhasil Ditambahkan Ke Stock','Harap periksa kembali di Stock Barang','success')
                  .then((result) => {
                    if (result.value) {
                     window.location.assign('<?php echo base_url('PesanBarang') ?>');
                    }
                 });
                 },
                error : function() {
                  swal('Data Gagal Disimpan','','warning');
                }   
              })}
              })

        }
    });	
   
	});
</script>
