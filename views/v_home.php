<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet"  href="<?php echo base_url() ?>/assetsPoints/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <link rel="stylesheet"  href="<?php echo base_url() ?>/assetsPoints/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

  <link rel="stylesheet"  href="<?php echo base_url() ?>/assetsPoints/plugins/lightbox2-2.11.1/dist/css/lightbox.min.css">

  <link rel="stylesheet"  href="<?php echo base_url() ?>/assetAddOn/css/style.css">
  
  <link rel="stylesheet"  href="<?php echo base_url() ?>/assetsPoints/dist/css/style.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assetsPoints/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">



<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>



</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Status : <?php echo $_SESSION['CatName']; ?></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
<!--     <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
 -->
    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>/assetsPoints/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>/assetsPoints/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <?php $this->load->view('v_menu'); ?>
       </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark"><?php echo $judul; ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php $this->load->view($content); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/sparklines/sparkline.js"></script>

<script src="<?php echo base_url() ?>/assetsPoints/plugins/select2/js/select2.full.min.js"></script>

<!-- JQVMap -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>/assetsPoints/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>/assetsPoints/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>/assetsPoints/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assetsPoints/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>/assetsPoints/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/assetsPoints/dist/js/demo.js"></script>

<!-- <script src="<?php echo base_url() ?>/assetsPoints/plugins/datatables-bs4/js/dataTables.bootstrap4.js" ></script> 

<script src="<?php echo base_url() ?>/assetsPoints/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" ></script> 
 -->

<script src="<?php echo base_url() ?>/assetsPoints/plugins/datatables/jquery.dataTables.js" ></script> 

<script src="<?php echo base_url() ?>/assetsPoints/plugins/datatables/jquery.dataTables.min.js" ></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<script src="<?php echo base_url() ?>/assetsPoints/plugins/lightbox2-2.11.1/dist/js/lightbox.min.js"></script>    

<script src="<?php echo base_url() ?>/assetsPoints/plugins/lightbox2-2.11.1/dist/js/lightbox.min.js"></script>    

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>



<script type="text/javascript">
  jQuery(document).ready(function($) {

      $('#reservation').daterangepicker();
      $('#example1').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        });

       $('#myModalMasterSupplier').on('show.bs.modal',function (argument) {
              var KodeSupplier = $(argument.relatedTarget).attr('data-editSupplier');
              console.log(KodeSupplier);

              $.ajax({
                url: 'C_Main/GetMasterSupplier',
                type: 'POST',
                dataType: 'JSON',
                data: {KodeSupplier:KodeSupplier },
                success:function (argument) {
                  // console.log(argument[0].Picture);
                  $('input[name="editKodeSupplier"]').val(argument[0].KodeSupplier);
                  $('input[name="editNamaSupplier"]').val(argument[0].NamaSupplier);
                  $('input[name="editEmail"]').val(argument[0].Email);
                  $('input[name="editNoTelp"]').val(argument[0].Telp);
                  $('textarea[name="editAlamat"]').val(argument[0].Alamat);
                }
              })

        });




    $('#myModal1').on('show.bs.modal',function (argument) {
          var NoFaktur = $(argument.relatedTarget).attr('data-NoFaktur');
          console.log(NoFaktur);
          $.ajax({
            url: '<?php echo base_url('C_Main/GetPemesanan') ?>',
            type: 'POST',
            dataType: 'JSON',
            data: {NoFaktur:NoFaktur},
            success : function (argument) {

              var datesNow = new Date();
              var getDateNow = (datesNow.getDate());
              var getMonthNow = (datesNow.getMonth()+1);
              var YearNow = (datesNow.getFullYear());

              var DateStringNow = (YearNow+'-'+ "0"+getMonthNow+'-'+"0"+getDateNow);  

              console.log(DateStringNow);

              var datesOrder = new Date(argument[0].TglPemesanan);
              var getDateOrder = (datesOrder.getDate());
              var getMonthOrder = (datesOrder.getMonth()+1);
              var YearOrder = (datesOrder.getFullYear());
              var DateStringOrder = (YearNow+'-'+ "0"+getMonthNow+'-'+getDateNow);  


              var datesTerima = new Date(argument[0].TglTerima);
              var getDateTerima = (datesTerima.getDate());
              var getMonthTerima = (datesTerima.getMonth()+1);
              var YearTerima = (datesTerima.getFullYear());

              var DateStringTerima = (YearTerima+'-'+ "0"+getMonthTerima+'-'+"0"+getDateTerima);  

             $('input[name="NoFaktur"]').val(argument[0].Invoice);
             $('input[name="NamaSupplier"]').val(argument[0].KodeSupplier);
             $('input[name="TglOrder"]').val(DateStringOrder);
              // if(argument[i].StatusPemesanan == '0'){
              //   $('#QtyTerima').prop('disabled',true);
              // } 

              var baris = '';
              for (var i = 0;i<argument.length ; i++) {
              
              if(argument[i].StatusPemesanan == 0){
                  $('#btnTerima').show();
                  baris += '<div class="row">'+
                           '<div class="col-md-4 col-sm-5">'+
                              '<label for="nip">Nama Barang</label>'+
                                '<input type="text" id="nip_add" name="NamaBarang[]" value="'+argument[i].NamaBarang+'-'+argument[i].KodeBarang+'" class="form-control" readonly = "readonly">'+
                            '</div>'+
                            '<div class="col-md-4 col-sm-6">'+
                              '<label for="nip">Qty Order</label>'+
                                '<input type="number" id="nip_add" name="QtyOrder[]" value="'+argument[i].QtyOrder+'" class="form-control" readonly = "readonly">'+
                            '</div>'+
                                '<div class="col-md-4 col-sm-6">'+
                                    '<label for="nama">Qty Terima</label>'+
                                  '<input type="number" name="QtyTerima[]" id="QtyTerima" class="form-control" max="'+argument[i].QtyOrder+'">'+
                                '</div>'+
                            '</div>';  
                  }
                else{ 

                  $('#btnTerima').hide();
                  baris += '<div class="row">'+
                           '<div class="col-md-4 col-sm-5">'+
                              '<label for="nip">Nama Barang</label>'+
                                '<input type="text" id="nip_add" name="NamaBarang[]" value="'+argument[i].NamaBarang+'-'+argument[i].KodeBarang+'" class="form-control" readonly = "readonly">'+
                            '</div>'+
                            '<div class="col-md-4 col-sm-6">'+
                              '<label for="nip">Qty Order</label>'+
                                '<input type="number" id="nip_add" name="QtyOrder[]" value="'+argument[i].QtyOrder+'" class="form-control" readonly = "readonly">'+
                            '</div>'+
                                '<div class="col-md-4 col-sm-6">'+
                                    '<label for="nama">Qty Terima</label>'+
                                  '<input type="number" name="QtyTerima[]" id="QtyTerima" value="'+argument[i].QtyTerima+'" disabled="disabled" class="form-control">'+
                                '</div>'+
                            '</div>';  

                }  
              } 

              $('#row2').html(baris);

              // var datesNow = new Date();
              // var getDateNow = (datesNow.getDate());
              // var getMonthNow = (datesNow.getMonth()+1);
              // var YearNow = (datesNow.getFullYear());

              // var DateStringNow = (YearNow+'-'+ "0"+getMonthNow+'-'+"0"+getDateNow);  

              // console.log(DateStringNow);

              // var datesOrder = new Date(argument[0].TglPemesanan);
              // var getDateOrder = (datesOrder.getDate());
              // var getMonthOrder = (datesOrder.getMonth()+1);
              // var YearOrder = (datesOrder.getFullYear());
              // var DateStringOrder = (YearNow+'-'+ "0"+getMonthNow+'-'+getDateNow);  


              // var datesTerima = new Date(argument[0].TglTerima);
              // var getDateTerima = (datesTerima.getDate());
              // var getMonthTerima = (datesTerima.getMonth()+1);
              // var YearTerima = (datesTerima.getFullYear());

              // var DateStringTerima = (YearTerima+'-'+ "0"+getMonthTerima+'-'+"0"+getDateTerima);  
              // var QtyOrder = (argument[0].QtyOrder);
              // var TglTerima = '';
              // var QtyTerima = '';
              // var Keterangan = '';
              // var QtyRetur = '';
              // if(argument[0].StatusPemesanan == 1 || argument[0].StatusPemesanan == 2 ){
              //    TglTerima =  DateStringTerima;
              //    QtyTerima = argument[0].QtyTerima;
              //    Keterangan = argument[0].Keterangan;
              //    QtyRetur = argument[0].QtyRetur;
              //    $('input[name="QtyTerima"]').prop('disabled', true);
              //    $('input[name="TglTerima"]').prop('disabled', true);
              //    $('textarea[name="Keterangan"]').prop('disabled', true);
              //    $('#btnTerima').hide();
              // }
              // else{
              //    TglTerima = DateStringNow;
              //    QtyTerima = '1';
              //    Keterangan = '';
              //    QtyRetur = QtyOrder-QtyTerima;
              //    $('input[name="QtyTerima"]').prop('disabled', false);
              //    $('input[name="TglTerima"]').prop('disabled', false);
              //    $('textarea[name="Keterangan"]').prop('disabled', false);
              //    $('#btnTerima').show();
              // }

              //   $('input[name="NoFaktur"]').val(argument[0].NoFaktur);
              //   $('input[name="NamaSupplier"]').val(argument[0].NamaSupplier);
              //   $('input[name="QtyOrder"]').val(argument[0].QtyOrder);
              //   $('input[name="TglOrder"]').val(DateStringOrder);
              //   $('input[name="QtyTerima"]').val(QtyTerima);
              //   $('input[name="QtyTerima"]').prop('max',QtyOrder);
              //   $('input[name="TglTerima"]').val(TglTerima);
              //   $('input[name="QtyRetur"]').val(QtyRetur);
              //    $('textarea[name="Keterangan"]').val(Keterangan);


            }
          })
        
      });


 

    $('input[name="QtyTerima"]').change(function(event) {
        var QtyOrder = $('input[name="QtyOrder"]').val();
        var QtyTerima = $('input[name="QtyTerima"]').val();
        var Total = QtyOrder-QtyTerima;
        $('input[name="QtyRetur"]').val(Total);

    });



        $('#UserLogin').on('show.bs.modal',function (argument) {
          var IDKaryawan = $(argument.relatedTarget).attr('data-UserLogin');
          console.log('s');
          $.ajax({
            url: '<?php echo base_url('C_Main/GetUserKasir') ?>',
            type: 'POST',
            dataType: 'JSON',
            data: {IDKaryawan:IDKaryawan},
            success:function (argument) {
              console.log(argument[0].Nama);

              // if(argument[0].Username == ''){                
              $('input[name="setIDKaryawan"]').val(argument[0].ID);
              $('input[name="setNamaKaryawan"]').val(argument[0].Nama);
              $('input[name="setUsername"]').val(argument[0].Username);
              $('input[name="setPassword"]').val(argument[0].Password);

              if($('input[name="setUsername"]').val()==''){
                $('input[name="UbahPassword"]').hide();
                $('input[name="SimpanPassword"]').show();
              }
              else{
                $('input[name="SimpanPassword"]').hide();                
                $('input[name="UbahPassword"]').show();
              }
            }
          })
      
          


    })



  });
</script>




</body>
</html>
