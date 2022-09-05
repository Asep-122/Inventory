<style type="text/css">
	.Stock .row{
		padding: 30px;
		padding-bottom: 15px; 
		margin: 10px;		
	}
	.Stock img{
		transition: 1s;
		width: 250px;
		height: 200px;
		opacity: 1;
	}


	.Stock img:hover{
		filter : grayscale(100%);
		transform: scale(1.1);
	}

</style>

<?php  
	$barangmasuk = '';
	foreach ($query as $key) {
		
		$arraykey[] = $key;		
		if(count($key)==0){
			$barangmasuk = '';
		}
		else{
			$barangmasuk = '
				<button class="btn btn-primary" type="submit" id="btnmasukanstock" name="btnmasukanstock"><i class="fa fa-plus"></i> Tambahkan Ke Stock</button><br><br> 

				<table class="table table-bordered table-responsive" id="tblbarangmasuk">
				<thead>
					<tr>
						<th><input type="checkbox" name="" id="checkboxAll"> ALL</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Qty Terima</th>
						<th>NamaSupplier</th>
					</tr>
				</thead>
				<tbody>';

				foreach ($arraykey as $key1) {
					# code...
					$barangmasuk .= '<tr>
						<td><input type="checkbox" name="checkbox[]" id="checks" value="(-00-,-Masuk'.'-,-'.$key1['KodeBarang'].'-,-'.$key1['QtyTerima'].'-,-'.date('Y/m/d').'-,-'.$this->session->userdata('Nama').'-,-'.$key1['NoFaktur'].'-)" id="checkresult"></td>
						<td>'.$key1['KodeBarang'].'</td>
						<td>'.$key1['NamaBarang'].'</td>
						<td>'.$key1['QtyTerima'].'</td>
						<td>'.$key1['KodeSupplier'].'</td>
						</tr>';

				}
				$barangmasuk .='</tbody></table>';
		}
	}

	echo $barangmasuk;

?>



<script type="text/javascript">
	jQuery(document).ready(function($) {
		    $('#checkboxAll').click(function(event) {
      $('input:checkbox').prop('checked',this.checked);
    });

    $('#btnmasukanstock').click(function(event) {
           var favorite = [];
           var favorite2 = '';

            $.each($("#checks:checked"), function(){

                favorite.push($(this).val());

            });

            favorite2 = favorite.join(", ");


            $.ajax({
              url: '<?php echo base_url('C_Main/InsertBarangMasuk') ?>',
              type: 'post',
              dataType: 'json',
              data: {favorite2: favorite2},
              success : function (argument) {
                  console.log(argument);
                  Swal.fire('Berhasil Ditambahkan Ke Stock','Harap periksa kembali di Stock Barang','success')
                  .then((result) => {
                    if (result.value) {
                    window.location.assign('<?php echo base_url('BarangMasuk') ?>');
                }
              });
              },
              error:function (argument) {
                  swal('Gagal menambahkan Stock','','error');
              }
            })
            
    });

	});

</script>