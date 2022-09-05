<form id="formMasterBarang" enctype='multipart/form-data'>
<table >
	<tr>
		<td>Kode Barang</td>
		<td>:</td>
		<td><input type="text" name="masterkodebarang" class="form-control" value="<?php echo $queryautokode ?>" readonly/></td>
		<td>&nbsp;</td>
		<td>Nama Barang</td>
		<td>:</td>
		<td><input type="text" name="masternamabarang"  class="form-control"></td>
	
	</tr>
	<tr>
			<td>Satuan</td>
		<td>:</td>
		<td>
			<select  class="form-control" name="mastersatuan">
				<?php foreach ($querysatuan as $key): ?>
					<option value="<?php echo $key['Id'] ?>" ><?php echo $key['AliasSatuan']; ?></option>
				<?php endforeach ?>
			</select>	
		</td>
		<td>&nbsp;</td>
		<td>Gambar</td>
		<td>:</td>
		<td>
			<div class="form-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><Button type="submit" class="btn btn-info" id="inpdatabarang"><i class="fa fa-save"></i> Tambahkan Data Barang</Button></td>
	</tr>
</table>
</form>

<hr>
<!-- <a href="#" data-toggle="modal" class="btn btn-primary" data-backdrop="static" data-target="#MasterBarang"><i class="fa fa-plus"></i> Tambahkan Barang</a><br><br> -->
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Satuan</th>
			<th>Picture</th>
			<th>User Entry</th>
			<th>TglEntry</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $key): ?>
			<tr>
				<td><?php echo $key['KodeBarang'] ?></td>
				<td><?php echo $key['NamaBarang'] ?></td>
				<td><?php echo $key['Satuan'] ?></td>
				<td><a href="<?php echo base_url('assetsPoints/dist/img/Barang/'.$key['Picture']) ?>" data-lightbox="mygalery"><img src="<?php echo base_url("assetsPoints/dist/img/Barang/".$key['Picture'])?>" style="width: 35px;"></a></td>
				<td><?php echo $key['UserCreate'] ?></td>
				<td><?php echo $key['TglCreate']?></td>
				<td>
					<a href="#" data-toggle="modal" data-backdrop="static" data-target="#myModalMasterBarang" data-MasterBarang="<?php echo $key['KodeBarang'] ?>"><i class="fa fa-edit text-success"></i></a> |
					<a href="#" id="hapusMasterBarang" data-delete="<?php echo $key['KodeBarang']; ?>" ><i class="fa fa-trash text-danger"></i></a>
				</td>	
			</tr>
		<?php endforeach ?>
	</tbody>
</table>


  <div class="modal fade" id="myModalMasterBarang">
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
       						<label for="nip">Kode Barang</label>
       						<input type="text" id="" name="KodeBarang" class="form-control" value="" disabled="disabled">
       					</div>
       					<div class="col-md-6 col-sm-6">
       						<label for="nama">Nama Barang</label>
       						<input type="text" name="NamaBarang" class="form-control">
       					</div>
       				</div>
       				<br>
       				<div class="row">
       					<div class="col-md-6 col-sm-6">
       						<label>Satuan</label>	
       						<select class="form form-control" name="Satuan" id="Satuan">
       							<?php foreach ($querysatuan as $key ): ?>
       								<option value="<?php echo $key['Id'] ?>"><?php echo $key['AliasSatuan'] ?></option>
       							<?php endforeach ?>
       								<!-- <option value="<?php echo $key['Satuan'] ?>"><?php echo $key['Satuan'] ?></option>> -->
       						</select>
       					</div>
       					<div class="col-md-6 col-sm-6">
       						<label for="nama">Gambar</label>
									<div class="form-group">
						                    <div class="custom-file">
						                      <input type="file" class="custom-file-input" id="customFile">
						                      <label class="custom-file-label" for="customFile">Choose file</label>
						                    </div>
						                  </div>
       					</div>
       				</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnTerima">Terima Barang</button> 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>


<script type="text/javascript">
	$(document).ready(function () {
		$('#formMasterBarang').submit(function(event) {
			event.preventDefault();

			if($('input[name="masternamabarang"]').val() == '' || $('input[name="mastergambar"]').val() == ''){
				swal('Data barang tidak boleh ada yang kosong','','error');
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
		             url:'<?php echo base_url('C_Main/InsertMasterBarang')?>',
		             type:"post",
		             data:new FormData(this),
		             processData:false,
		             contentType:false,
		             cache:false,
		             async:false,
		              success: function(data){
		                  // alert("Upload Image Berhasil.");
	                  Swal.fire('Barang Berhasil di Tambahkan','','success')
	                  .then((result) => {
	                    if (result.value) {
	                     window.location.assign('<?php echo base_url('DataBarang') ?>');
	                    }
	                 });

		           }
		         });
	              }
	              })
	

         }
		});

		    $('#myModalMasterBarang').on('show.bs.modal',function (argument) {
	   	        var KodeBarang = $(argument.relatedTarget).attr('data-MasterBarang');
	   	        console.log(KodeBarang);	
	   	        $.ajax({
	   	        	url: 'C_Main/GetMasterBarang',
	   	        	type: 'POST',
	   	        	dataType: 'JSON',
	   	        	data: {KodeBarang:KodeBarang },
	   	        	success:function (argument) {
	   	        		console.log(argument[0].Picture);
	   	        		$('input[name="KodeBarang"]').val(argument[0].KodeBarang);
	   	        		$('input[name="NamaBarang"]').val(argument[0].NamaBarang);
	   	        		$('select[name="Satuan"]').val(argument[0].ID);
	   	        		$('input[name="file1"]').val(argument[0].Picture);
	   	        	}
	   	        })

		    });

   		    $(document).on('click','#hapusMasterBarang',function (argument)  {
		    	var databarang = $(this).attr('data-delete');
		    	console.log(databarang);
		       Swal.fire({
	            title: 'Apakah anda yakin ingin Menghapus Barang ini ?',
	            text: "Item akan Terhapus Pada Stock Barang ",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            confirmButtonText: 'Yes, Lanjutkan Penghapusan Barang!'
	          }).then((result) => {
	            if (result.value) {
	             $.ajax({
		             url:'<?php echo base_url('C_Main/DeleteMasterBarang')?>',
		             type:"POST",
		             dataType : 'JSON',
		             data:{databarang:databarang},
		              success: function(data){
		                  // alert("Upload Image Berhasil.");
		                console.log(data);
	                  Swal.fire('Barang Berhasil Di hapus','','success')
	                  .then((result) => {
	                    if (result.value) {
	                     window.location.assign('<?php echo base_url('DataBarang') ?>');
	                    }
	                 });

		           }
		         });
	              }
	              })
		    });
});
</script>