<style type="text/css">
	#inp{
		border-spacing: 50px;
		padding: 5px;
	}
</style>
<div>	
<table >
	<tr>
		<td>Kode Supplier</td>
		<td>:</td>
		<td><input type="" name="KodeSupplier" class="form-control"></td>
		<td>&nbsp;</td>
		<td>Nama Supplier</td>
		<td>:</td>
		<td><input type="" name="NamaSupplier" class="form-control"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td>
			<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="Email" class="form-control">
             </div>
		</td>
		<td>&nbsp;</td>
		<td>NoTelpon</td>
		<td>:</td>
		<td>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input name="NoTelp" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                </div>
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><textarea class="form-control" name="Alamat"></textarea></td>
		<td>&nbsp;</td>

		<td><button class="btn btn-success" id="simpansupplier"><i class="fa fa-plus"></i> Tambahkan</button></td>
	</tr>
</table>

 <hr>
<!-- <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a> -->
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>Kode Supplier</th>
			<th>Nama Supplier</th>
			<th>Email</th>
			<th>No Telpon</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="showsupplier">
		<?php foreach ($query as $key ): ?>
			
		<tr>
			<td><?php echo $key['KodeSupplier']?></td>
			<td><?php echo $key['NamaSupplier'] ?></td>
			<td><?php echo $key['Email'] ?></td>
			<td><?php echo $key['Telp'] ?></td>
			<td><?php echo $key['Alamat'] ?></td>
			<td>
				<a href="#" data-editSupplier="<?php echo $key['KodeSupplier'] ?>" data-toggle="modal" data-backdrop="static" data-target="#myModalMasterSupplier"><i class="fa fa-edit text-success"></i></a> | 
				<a href="#" data-deleteSupplier="<?php echo $key['KodeSupplier'] ?>" id="deleteSupplier"><i class="fa fa-trash text-danger"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>

  <div class="modal fade" id="myModalMasterSupplier">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Master Barang</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                	<div>
          	<div class="tab-content">
          		<div role="tabpanel" class="tab-pane active" id="home_add1">
       				<div class="row">
       					<div class="col-md-6 col-sm-6">
       						<label for="nip">Kode Suplier</label>
       						<input type="text" id="" name="editKodeSupplier" class="form-control" value="" disabled="disabled">
       					</div>
       					<div class="col-md-6 col-sm-6">
       						<label for="nama">Nama Supplier</label>
       						<input type="text" name="editNamaSupplier" class="form-control">
       					</div>
       				</div>
       				<br>
       				<div class="row">
       					<div class="col-md-6 col-sm-6">
       						<label>Email</label>	
       						<input type="text" name="editEmail" class="form-control">
       					</div>
       					<div class="col-md-6 col-sm-6">
       						<label for="nama">No Telpon</label>
       						<input type="text" name="editNoTelp" class="form-control">
       					</div>
       				</div><br>
       				<div class="row">
       					<div class="col-md-6 col-sm-6">
       						<label>Alamat</label>	
       						<textarea style="width: 450px;" name="editAlamat" class="form-control"></textarea>
       					</div>
       				</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="btneditSupplier">Ubah Supplier</button> 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>



<script type="text/javascript">
	jQuery(document).ready(function($) {
		  $('#simpansupplier').click(function(event) {
	      var KodeSupplier =  $('input[name="KodeSupplier"]').val();
	      var NamaSupplier =  $('input[name="NamaSupplier"]').val();
	      var Email =  $('input[name="Email"]').val();
	      var NoTelp =  $('input[name="NoTelp"]').val();
	      var Alamat =  $('textarea[name="Alamat"]').val();

	      console.log(Alamat);
	      
	      if (KodeSupplier == '' || NamaSupplier == '' || Email == '' || NoTelp == '' || Alamat == '') {
	        swal('Data Tidak Boleh Ada yang kosong','','error');
	      }
	      else{
	          Swal.fire({
	            title: 'Apakah anda yakin ingin menambahkan data ?',
	            text: "Item akan bertambah ketika di simpan ",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            confirmButtonText: 'Yes, Simpan item!'
	          }).then((result) => {
	            if (result.value) {
	              $.ajax({
	                url: '<?php echo base_url('C_Main/InsertSupplier') ?>',
	                type: 'POST',
	                data: {KodeSupplier:KodeSupplier,NamaSupplier:NamaSupplier,Email:Email,NoTelp:NoTelp,Alamat:Alamat},
	                success : function () {

	                  Swal.fire('Data Supplier Berhasil Ditambahkan','Harap periksa kembali di Master Supplier','success')
	                  .then((result) => {
	                    if (result.value) {
	                   window.location.assign('<?php echo base_url('Supplier') ?>');
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


		$('#btneditSupplier').click(function(event) {

			var KodeSupplier = $('input[name="editKodeSupplier"]').val();			
			var NamaSupplier = $('input[name="editNamaSupplier"]').val();			
			var Email = $('input[name="editEmail"]').val();			
			var NoTelp = $('input[name="editNoTelp"]').val();	
			var Alamat = $('textarea[name="editAlamat"]').val();	

		      if (KodeSupplier == '' || NamaSupplier == '' || Email == '' || NoTelp == '' || Alamat == '') {
			        swal('Data Tidak Boleh Ada yang kosong','','error');
			      }
			      else{
			          Swal.fire({
			            title: 'Apakah anda yakin ingin Mengubah data ini ?',
			            text: "Data Transaksi akan ikut terubah jika data ini di rubah ",
			            type: 'warning',
			            showCancelButton: true,
			            confirmButtonColor: '#3085d6',
			            cancelButtonColor: '#d33',
			            confirmButtonText: 'Yes, Ubah Data Supplier!'
			          }).then((result) => {
			            if (result.value) {
			              $.ajax({
			                url: '<?php echo base_url('C_Main/UbahSupplier') ?>',
			                type: 'POST',
			                data: {KodeSupplier:KodeSupplier,NamaSupplier:NamaSupplier,Email:Email,NoTelp:NoTelp,Alamat:Alamat},
			                success : function () {

			                  Swal.fire('Berhasil Diubah','Harap periksa kembali Data Supplier','success')
			                  .then((result) => {
			                    if (result.value) {
			                   window.location.assign('<?php echo base_url('Supplier') ?>');
			                  }
			                });
			                 },
			                error : function() {
			                  swal('Data Gagal Diubah','','warning');
			                }   
			              })}
			              })
			      }
	

		});


	    $(document).on('click','#deleteSupplier',function (argument)  {
	    	var deleteSupplier = $(this).attr('data-deleteSupplier');
	    	console.log(deleteSupplier);
	       Swal.fire({
            title: 'Apakah anda yakin ingin Menghapus Barang ini ?',
            text: "Data Supplier akan Terhapus",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Lanjutkan Penghapusan!'
          }).then((result) => {
            if (result.value) {
             $.ajax({
	             url:'<?php echo base_url('C_Main/DeleteMasterSupplier')?>',
	             type:"POST",
	             dataType : 'JSON',
	             data:{deleteSupplier:deleteSupplier},
	              success: function(data){
	                  // alert("Upload Image Berhasil.");
	                console.log(data);
                  Swal.fire('Data Supplier Berhasil Di hapus','','success')
                  .then((result) => {
                    if (result.value) {
                     window.location.assign('<?php echo base_url('Supplier') ?>');
                    }
                 });

	           }
	         });
              }
              })
	    });

	});
</script>