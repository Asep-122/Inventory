<?php  
	if($this->session->userdata('masuk')==1){
?>		
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

   		  <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-user nav-icon text-info"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
            </ul>
            </li>
          <li class="nav-item">
            <a href="<?php echo base_url('StockInfo') ?>" class="nav-link">
              <i class="nav-icon fa fa-cubes text-info"></i>
              <p>Stock Info</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('C_Main/HistoryTransaksi') ?>" class="nav-link">
              <i class="nav-icon fa fa-history text-info"></i>
              <p>History Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Logout') ?>" class="nav-link">
              <i class="nav-icon fa fa-lock text-info"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          </ul>
<?php        
	}
	else if($this->session->userdata('masuk')==2){

    $count = array();
    foreach ($countmenu as $key) {
      $count[] = $key['NoFaktur'];
    }

    if(count($count)==0){
      $count = '';
    }
    else{
      $count = count($count);
    }

?>



		  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   		  <li class="">
            <a href="<?php echo base_url('Beranda') ?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
            </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy text-info"></i>
              <p>
                Master
                <i class="fas fa-angle-left right text-info"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('DataBarang') ?>" class="nav-link">
                  <i class="fa fa-cubes nav-icon text-success"></i>
                  <p>Data Barang</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('C_Main/UserKasir') ?>" class="nav-link">
                  <i class="fa fa-users nav-icon text-success"></i>
                  <p>User Kasir</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Supplier') ?>" class="nav-link">
                  <i class="fa fa-users nav-icon text-success"></i>
                  <p>Supplier</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('PesanBarang') ?>" class="nav-link">
              <i class="nav-icon fa fa-cart-plus text-info"></i>
              <p>Pesan Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('BarangMasuk') ?>" class="nav-link">
              <i class="nav-icon fa fa-paper-plane text-info"></i>
              <p>Barang Masuk</p>
              <span class="badge badge-danger right"><?php echo $count; ?></span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('StockInfo') ?>" class="nav-link">
              <i class="nav-icon fa fa-cubes text-info"></i>
              <p>Stock Info</p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="<?php echo base_url('Logout') ?>" class="nav-link">
              <i class="nav-icon fa fa-lock text-info"></i>
              <p>Logout</p>
            </a>
          </li>
          </ul>
<?php		
	}
	else if ($this->session->userdata('masuk')==3) {
		# code...
?>

		  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="">
            <a href="<?php echo base_url('Beranda') ?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
            </li>

          <li class="nav-item">
            <a href="<?php echo base_url('BarangKeluar') ?>" class="nav-link">
              <i class="nav-icon fa fa-paper-plane text-info"></i>
              <p>Barang Keluar</p>
              <!-- <span class="badge badge-danger right"><?php echo $count; ?></span> -->
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('StockInfo') ?>" class="nav-link">
              <i class="nav-icon fa fa-cubes text-info"></i>
              <p>Stock Info</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Logout') ?>" class="nav-link">
              <i class="nav-icon far fa-circle fa fa-lock text-info"></i>
              <p>Logout</p>
            </a>
          </li>
          </ul>
      <?php } ?>
