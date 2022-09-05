
<style type="text/css">
	#inp{
		border-spacing: 50px;
		padding: 5px;
	}
</style>
<div>	

<form id="form">
  
<table>
	<tr>
		<td>No Invoice</td>
		<td>:</td>
		<td><input type="" name="inpNoFaktur" class="form-control" value="<?php echo $queryautokode ?>" readonly="readonly"></td>
		<td>&nbsp;</td><br>
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
		<td>Tgl Pemesanan</td>
		<td>:</td>
		<td><input type="date" name="inpTglPesan"  class="form-control" value="<?php echo date('Y-m-d') ?>"></td>
	</tr>
  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<!-- <td><button class="btn btn-info" id="inppesanbarang"><i class="fa fa-save"></i> Input Pesan Barang</button></td> -->
    <td><button class="btn btn-success" id="inpitembarang"><i class="fa fa-cart-plus"></i> Input Item Barang</button></td>
	</tr>
</table><br>

<div>
  
<table id="result2">
  <tr>
    <td>Nama Barang</td>
    <td>:</td>
    <td><input type="text" name="inpNamaBarang[]"   class="form-control typeaheads" ></td>
    <td>&nbsp;</td>
    <td>Qty Barang</td>
    <td>:</td>
    <td><input type="number" name="inpQtyOrder[]"  class="form-control" min="" max="1000" value=""></td>
    <td>&nbsp;</td>
    <td>Harga</td>
    <td>:</td>
    <td><input type="" name="inpHarga[]" class="form-control"></td>
  </tr>
</table><br>

</div>
   <button type="submit" class="btn btn-info" id="inppesanbarang" style="margin-left: 110px;"><i class="fa fa-save"></i> Input Pesan Barang</button>
</div>  
</form> 

 <hr>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>No Invoice</th>
			<th>Nama Supplier</th>
 			<th>Tgl Pemesanan</th>
      <th>Tgl Terima</th>
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
				$label = "<button type='button'  class='btn btn-outline-success btn-sm'><b>Barang Di Terima&nbsp;&nbsp;</b></button>";
			}

		?>
			<tr>
				<td><?php echo $key['Invoice'] ?></td>
        <td><?php echo $key['NamaSupplier'] ?></td>
				<td><?php echo $key['TglOrder'] ?></td>
        <td><span class="label label-danger"><?php echo $key['TglKirim'] ?></span></td>
				<td><a href="#" data-toggle="modal" data-backdrop="static" data-target="#myModal1" data-NoFaktur="<?php echo $key['Invoice']; ?>"><i class="fa fa-eye"></i></a></td>
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
        <form class="formModal">
        <!-- Modal body -->
        <div class="modal-body">
          <div>
          	<div class="tab-content">
          		<div role="tabpanel" class="tab-pane active" id="home_add1">
       				<div class="row">
       					<div class="col-md-4 col-sm-6">
       						<label for="nip">No Faktur</label>
       						<input type="text" id="nip_add" name="NoFaktur" class="form-control" value="" readonly="readonly">
       					</div>
       					<div class="col-md-4 col-sm-6">
       						<label for="nama">Nama Supplier</label>
       						<input type="text" name="NamaSupplier" class="form-control" readonly="readonly">
       					</div>
                <div class="col-md-4 col-sm-6">
                  <label for="nama">Tgl Order</label>
                  <input type="date" name="TglOrder" class="form-control" readonly="readonly">
                </div>
              </div>
       				</div>
       				<br>
              <div class="row" id="row2">
                
              </div>  
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnTerima">Terima Barang</button> 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
</form>

<script>
	jQuery(document).ready(function($) {
var count = 1;

      $('#inpitembarang').click(function(event) {
        event.preventDefault();

          $('#result2').append('<tr><td>Nama Barang</td><td>:</td><td><input type="text" name="inpNamaBarang[]"   class="form-control typeaheads1'+(++count)+'" ></td><td>&nbsp;</td><td>Qty Barang</td><td>:</td><td><input type="number" name="inpQtyOrder[]"  class="form-control" min="0" max="1000" value=""></td><td>&nbsp;</td><td>Harga</td><td>:</td><td><input type="" name="inpHarga[]" class="form-control"></td></tr>');
    

    var sample_data = new Bloodhound({
      datumTokenizer : Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer : Bloodhound.tokenizers.whitespace,
      prefetch : '<?php echo base_url('C_Main/fetch') ?>',
      remote : {
        url : '<?php echo base_url('C_Main/fetch/%QUERY') ?>',
        wildcard : '%QUERY'
      }
    });




    $('.typeaheads1'+count).typeahead(null, {
      name : 'sample_data1',
      display : 'NamaBarang',
      source : sample_data,
      templates:{
        suggestion:Handlebars.compile('<div class="row"><img src="<?php echo base_url() ?>/assetsPoints/dist/img/Barang/{{Picture}}"  width="40"/><div class="col-md-10" style="padding-right:5px;padding-left:5px;">{{NamaBarang}}</div></div>')
      } 
    });

});


function initTypeahead() {
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
}

	    $('#inppesanbarang').click(function(event) {
        event.preventDefault();
        // var NoFaktur = $('input[name="inpNoFaktur"]').val();
        // var KodeSupplier = $('select[name="inpKodeSupplier"]').val();
        // var NamaBarang = $('input[name="inpNamaBarang"]').val();
        // // var TglOrder = $('input[name="inpTglPesan"]').val();
        // var QtyOrder = $('input[name="inpQtyOrder"]').val();
        // var Harga = $('input[name="inpHarga"]').val();
        // console.log($('input[name="inpNamaBarang"]').val());

        // if(NamaBarang == '' || QtyOrder == '' || Harga == ''){
        //   swal('Data Pengajuan Tidak Boleh Ada yang kosong','','error');
        // }
        // else{
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
                url: '<?php echo base_url('C_Main/PesanBarang12') ?>',
                type: 'POST',
                data: $('#form').serialize(),
                success : function ($data1) {
                if (!$.trim($data1) || $data1 == 'null'){ 
                    // swal('Data Gagal Disimpan Karna Kolom ada yang kosong','','warning');
                    Swal.fire('Data Gagal Disimpan Karna Kolom ada yang kosong','','warning')
                    .then((result) => {
                      if (result.value) {
                       window.location.assign('<?php echo base_url('PesanBarang') ?>');
                      }
                 });
                }
                else{
                    Swal.fire('Pengajuan Barang berhasil di input','','success')
                    .then((result) => {
                      if (result.value) {
                       window.location.assign('<?php echo base_url('PesanBarang') ?>');
                      }
                 });
                }
                 },
                error : function() {
                  swal('Data Gagal Disimpan','','warning');
                }   
              })}
              })

    });


    // $('#btnTerima').click(function(event) {
    //   alert($('.formModal').serialize());

    //   var NoFaktur = $('input[name="NoFaktur"]').val();
    //   var QtyTerima = $('input[name="QtyTerima"]').val();
    //   var TglTerima = $('input[name="TglTerima"]').val();
    //   var QtyRetur = $('input[name="QtyRetur"]').val();
    //   var Keterangan = $('input[name="Keterangan"]').val();

    //    Swal.fire({
    //     title: 'Apakah anda Sudah yakin Menerima Barang ini ?',
    //     text: "Mohon Untuk Memindahkan Stock Ketika Menerima Barang Ini ",
    //     type: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Yes, Lanjutkan Terima Barang!'
    //   }).then((result) => {
    //     if (result.value) {
    //       $.ajax({
    //         url: '<?php echo base_url('C_Main/TerimaBarang') ?>',
    //         type: 'POST',
    //         data: {NoFaktur:NoFaktur,QtyTerima:QtyTerima,TglTerima:TglTerima,QtyRetur:QtyRetur,Keterangan:Keterangan},
    //         success : function () {

    //               Swal.fire('Berhasil Ditambahkan Ke Stock','Harap periksa kembali di Stock Barang','success')
    //               .then((result) => {
    //                 if (result.value) {
    //                  window.location.assign('<?php echo base_url('PesanBarang') ?>');
    //             }
    //           });
    //          },
    //         error : function() {
    //           swal('Data Gagal Disimpan','','warning');
    //         }   
    //       })}
    //       })
    // });

      $('#btnTerima').click(function(event) {
      // alert($('.formModal').serialize());

      // var NoFaktur = $('input[name="NoFaktur"]').val();
      // var QtyTerima = $('input[name="QtyTerima"]').val();
      // var TglTerima = $('input[name="TglTerima"]').val();
      // var QtyRetur = $('input[name="QtyRetur"]').val();
      // var Keterangan = $('input[name="Keterangan"]').val();

       Swal.fire({
        title: 'Apakah anda Sudah yakin Menerima Barang ini ?',
        text: "Mohon Untuk Memindahkan Stock Ketika Menerima Barang Ini ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Lanjutkan Terima Barang!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: '<?php echo base_url('C_Main/TerimaBarang') ?>',
            type: 'POST',
            data: $('.formModal').serialize(),
            success : function (data1) {
                  alert(data1);
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
    });

   initTypeahead();

	});
</script>
