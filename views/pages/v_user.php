<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 -->
<style type="text/css">
	#inp{
		border-spacing: 50px;
		padding: 5px;
	}
</style>
<div>	
<table >
	<tr>
		<td>Nama Karyawan</td>
		<td>:</td>
		<td><input type="" name="NamaKaryawan" class="form-control"></td>
		<td>&nbsp;</td>
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
	</tr>
	<tr>
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
		<td>&nbsp;</td>
		<td>Alamat</td>
		<td>:</td>
		<td><textarea class="form-control" name="Alamat"></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><button class="btn btn-success" id="SimpanKaryawan"><i class="fa fa-plus"></i> Tambahkan</button></td>
	</tr>
</table>

 <hr>

 <table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>Kode Karyawan</th>
			<th>Nama Karyawan</th>
			<th>Tgl Lahir</th>
			<th>Email</th>
			<th>No Telpon</th>
			<th>Alamat</th>
			<th>User</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="showsupplier">
		<?php foreach ($query as $key ): ?>
			
		<tr>
		 	<td><?php echo $key['ID']?></td> 
			<td><?php echo $key['Nama'] ?></td>
			<td><?php echo $key['TglLahir'] ?></td>
			<td><?php echo $key['NoTelp'] ?></td>
			<td><?php echo $key['Email'] ?></td> 
			<td><?php echo $key['Alamat'] ?></td> 
			<?php 
				$StatUser = '';
				if($key['Log_Nip'] == ''){
					$StatUser = "<button type='button' class='btn btn-outline-warning btn-sm'><b>Belum memiliki user login</b></button>";
				}
				else{
					$StatUser = "<button type='button' class='btn btn-outline-primary btn-sm'><b>Ubah user login</b></button>";
				}
			 ?>
			<td>
				<a href="#" data-UserLogin="<?php echo $key['ID'] ?>" data-toggle="modal" data-backdrop="static" data-target="#UserLogin" ><?php echo $StatUser ?></a> 
			</td>
			<td>
				<a href="#" data-editMasterKaryawan="<?php echo $key['ID'] ?>" data-toggle="modal" data-backdrop="static" data-target="#EditKaryawan<?=$key['ID']?>"><i class="fa fa-edit text-success"></i></a> | 
				<a href="#" data-deleteUser="<?php echo $key['ID'] ?>" id="deleteUser"><i class="fa fa-trash text-danger"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>



<!-- ------------------------------------------------------------------------------------------------------------- -->

<!-- <?php $no=0;foreach ($query as  $value) :$no++;
  # code...
?> -->
 <div class="modal fade" id="UserLogin" tabindex="-1" role="dialog" aria-label="myModalLabel"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <!-- <form> -->
            <h5 class="modal-body">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label>ID</label>
                    <input type="text" name="setIDKaryawan" class="form-control" placeholder="ID" disabled="disabled" >
                </div>
                <div class="col-md-6 col-sm-6">
                    <label>Nama Karyawan</label>
                    <input type="text" name="setNamaKaryawan" class="form-control" placeholder="NamaKaryawan" disabled="disabled" >
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label>Username</label>
                    <input type="text" name="setUsername" value="<?php echo $value['Username']; ?>" class="form-control" placeholder="Username"  >
                </div>
                <div class="col-md-6 col-sm-6">
                    <label>Password</label>
                    <input type="text" name="setPassword" class="form-control" placeholder="Password" >
                </div>
            </div><br>
            </h5>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" id="SimpanPassword" name="SimpanPassword" value="Simpan Password">
                <input type="submit" class="btn btn-success" name="UbahPassword" value="Ubah Password">
                <button type="button" class="btn btn-danger" data-dismiss="modal" name="close">Close</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div> 
<!-- <?php endforeach ?> -->
<!-- ------------------------------------------------------------------------------------------------------------- -->

<?php $no=0;foreach ($query as  $value) :$no++;
  # code...
?>
   <div class="modal fade" id="EditKaryawan<?=$value['ID']?>" tabindex="-1" role="dialog" aria-label="myModalLabel"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Divisi </h4>
            </div>
            <form method="post" action="<?php echo site_url('C_Divisi/tbl_set_Dept') ?>">
            <h5 class="modal-body">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label>Nama Divisi</label>
                    <input type="text" name="Nama_Dept" value="<?php echo $value['Nama'] ?>" class="form-control" placeholder="Nama Departement"  required="required" />
                </div>
                <div class="col-md-6 col-sm-6">
                    <label>Keterangan</label>
                    <input type="text" name="Keterangan" class="form-control" placeholder="Keterangan" required="required" />
                </div>
            </div><br>
            </h5>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" name="next" value="Lanjutkan">
                <button type="button" class="btn btn-danger" data-dismiss="modal" name="close">Close</button>
            </div>
            </form>
        </div>
    </div>
</div> 
<?php endforeach ?>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#SimpanPassword').click(function(event) {
        var IDKaryawan =  $('input[name="setIDKaryawan"]').val();
        var Username =  $('input[name="setUsername"]').val();
        var Password =  $('input[name="setPassword"]').val();


        if($('input[name="setUsername"]').val() == '' || $('input[name="setPassword"]').val() == ''){
          swal('UserName atau Password tidak boleh ada yang kosong','','error');
        }
        else{
          Swal.fire({
              title: 'Apakah anda yakin ingin menambahkan Data User Login?',
              text: "User Login akan di simpan ",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Simpan item!'
            }).then((result) => {
              if (result.value) {
                $.ajax({
                  url: '<?php echo base_url('C_Main/InsertUserLoginKasir') ?>',
                  type: 'POST',
                  data: {IDKaryawan:IDKaryawan,Username:Username,Password:Password},
                  success : function (argument) {
                    console.log(argument);
                    Swal.fire('User Login Berhasil DiSimpan','Harap periksa kembali di Master Karyawan','success')
                    .then((result) => {
                      if (result.value) {
                     window.location.assign('<?php echo base_url('C_Main/UserKasir') ?>');
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

    $(document).on('click','#deleteUser',function (argument)  {
        var IDKaryawan = $(this).attr('data-deleteUser');
        console.log(IDKaryawan);
         Swal.fire({
            title: 'Apakah anda yakin ingin Menghapus Barang ini ?',
            text: "Data Karyawan akan Terhapus",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Lanjutkan Penghapusan!'
          }).then((result) => {
            if (result.value) {
             $.ajax({
               url:'<?php echo base_url('C_Main/DeleteMasterKaryawan')?>',
               type:"POST",
               dataType : 'JSON',
               data:{IDKaryawan:IDKaryawan},
                success: function(data){
                    // alert("Upload Image Berhasil.");
                  console.log(data);
                  Swal.fire('Data Master Karyawan Berhasil Di hapus','','success')
                  .then((result) => {
                    if (result.value) {
                     window.location.assign('<?php echo base_url('C_Main/UserKasir') ?>');
                    }
                 });

             }
           });
              }
              })
      });

  });
</script>