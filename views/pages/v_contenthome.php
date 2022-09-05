<style type="text/css">
	.img{

		text-align: center;
		padding-bottom: 200px;
		opacity: 0.4;
	}

	#slider {
  /*width: 950px;
  height: 500px;
*/  overflow: hidden;
  border: 1px solid #c69;
}


</style>

 <div class="alert alert-block alert-info">
	<button type="button" class="close" data-dismiss='alert'>
		<i class="fa fa-remove"></i>
	</button>
	<i class="fa fa-check"></i>
	Halo <strong><?php echo $_SESSION['Nama']; ?></strong> Selamat Datang di
	<strong class="green">
		Aplikasi Inventory
	</strong>
 </div><hr>



<?php  

if($this->session->userdata('masuk')==2){


$dataBarangProses = array();
$dataStockInfo = '';
$data = array();
	foreach ($countmenu as $key => $value) {
		$data[] = $value['KodeBarang'];
	}
	foreach ($BarangProses as $key ) {
		$dataBarangProses[] = ($key['NoFaktur']);
	}

	foreach ($StockInfo as $key) {
		$dataStockInfo = $key['Jumlah'];
	}
?>


        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo (count($data)) ?></h3>

                <p>Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="fa fa-paper-plane"></i>
              </div>
              <a href="<?php echo base_url('BarangMasuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $dataStockInfo; ?><sup style="font-size: 20px"></sup></h3>

                <p>Stock Info</p>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="<?php echo base_url('StockInfo') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo count($dataBarangProses) ?></h3>

                <p>Order On Process</p>
              </div>
              <div class="icon">
                <i class="fa fa-cart-plus"></i>
              </div>
              <a href="<?php echo base_url('PesanBarang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>

<?php  } ?>