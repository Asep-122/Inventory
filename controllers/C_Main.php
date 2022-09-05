<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Main extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('Username'))){
				redirect('Login','refresh');
		}
		$this->load->library('pdf');

	}

	public function index()
	{

		$isi['content'] = 'pages/v_contenthome';
		$isi['judul'] = '<b>Home</b>';
		$isi['BarangProses'] = $this->M_Inventory->BarangProses()->result_array();
		$isi['countmenu'] = $this->M_Inventory->BarangMasuk()->result_array();
		$isi['StockInfo'] = $this->M_Inventory->StockInfo()->result_array();
		$this->load->view('v_home',$isi);

	}

	public function UserKasir()
	{
		$isi['content'] = 'pages/v_user';
		$isi['judul'] = '<b>Master Karyawan</b>';
		$isi['countmenu'] = $this->M_Inventory->BarangMasuk()->result_array();
		$isi['query'] = $this->M_Inventory->MasterKaryawan()->result_array();
		$this->load->view('v_home',$isi);	
	}

	public function PesanBarang12()
	{
		$NoFaktur = $this->input->post('inpNoFaktur');
		$TglOrder = $this->input->post('inpTglPesan');
		$KodeSupplier = $this->input->post('inpKodeSupplier');
		$NamaBarang = $this->input->post('inpNamaBarang');
		$QtyOrder = $this->input->post('inpQtyOrder');
		$Harga = $this->input->post('inpHarga');


		$alert = '';


		$array = array();
		for ($i=0; $i < count($NamaBarang); $i++) { 
			$array[] = "('".$NoFaktur."','".$NamaBarang[$i]."','".$QtyOrder[$i]."','0','0','".$Harga[$i]."')";
		}

		$header = array(
			'Invoice' => $NoFaktur,
			'KodeSupplier' =>$KodeSupplier,
			'TglOrder' => $TglOrder,
			'TglKirim' => '1900-01-01',
			'StatusPemesanan' => '0',
			'UserEntryOrder' => $this->session->userdata('Nama'),
			'UserEntryTerima' => ''
		);
		// print_r("('".implode("','",$header)."')");

		$detail =	implode(',',$array);
		$result2 = $this->M_Inventory->InsertPesanBarang($header,$detail);
		// echo $data;

		echo json_encode($result2);


	}

	public function InsertUserLoginKasir()
	{
		$IDKaryawan = $this->input->post('IDKaryawan');
		$Username = $this->input->post('Username');
		$Password = $this->input->post('Password');

		$arrayName = array(
			'Cat_LoginId' => '3',
			'Log_Nip' => $IDKaryawan,
			'Username' => $Username,
			'Password' => $Password,
			'Status' => '1'
		 );
		
		$query = $this->M_Inventory->InsertUserLoginKasir($arrayName);

		echo json_encode($query);
	}

	public function DeleteMasterKaryawan()
	{
		$IDKaryawan = $this->input->post('IDKaryawan');		
	
		$result = $this->M_Inventory->DeleteMasterKaryawan($IDKaryawan);
		echo json_encode($result);
	}

	public function DataBarang(){
		if($this->session->userdata('masuk') != 2 ){
			show_404();
		}
		$isi['content'] = 'pages/v_databarang';
		$isi['countmenu'] = $this->M_Inventory->BarangMasuk()->result_array();
		$isi['querysatuan'] = $this->M_Inventory->Satuan()->result_array();
		$isi['queryautokode'] = $this->M_Inventory->AutoKodeBarang();
		$isi['query'] = $this->M_Inventory->MasterBarang()->result_array();
		$isi['judul'] = '<b>Master Barang</b>';
		$this->load->view('v_home',$isi);	
	}

	public function GetUserKasir()
	{
		$IDKaryawan = $this->input->post('IDKaryawan');
		$where  = array('ID' => $IDKaryawan);
		$data = $this->M_Inventory->UserKasir($where)->result_array();
		echo json_encode($data);
	}



	public function GetMasterBarang()
	{
		$KodeBarang = $this->input->post('KodeBarang');
		$where  = array('KodeBarang' => $KodeBarang);
		$data = $this->M_Inventory->GetMasterBarang($where);
		echo json_encode($data);
	}

	public function GetHistoryTransaksi()
	{
		$result = $this->M_Inventory->GetHistoryTransaksi()->result_array();
		echo json_encode($result);
	}

	public function GetHistoryTransaksi2()
	{
		$isi = $this->input->post('select');
		$isi1 = $this->input->post('date1');
		$isi2 = $this->input->post('date2');
		$hasil = $this->M_Inventory->GetHistoryTransaksi2($isi,$isi1,$isi2)->result_array();
		echo json_encode($hasil);
	}


	public function StockInfo()
	{
		$isi['content'] = 'pages/v_stockinfo';
		$isi['countmenu'] = $this->M_Inventory->BarangMasuk()->result_array();
		$isi['queryStock'] = $this->M_Inventory->StockBarang()->result_array();
		$isi['query'] = $this->M_Inventory->MasterBarang()->result_array();
		$isi['judul'] = '<b>Stock Info</b>';
		$this->load->view('v_home',$isi);	

	}
	public function HistoryTransaksi()
	{
		$isi['content'] = 'pages/v_historytransaksi';
		$isi['countmenu'] = $this->M_Inventory->BarangMasuk()->result_array();
		$isi['judul'] = '<b>History Transaksi</b>';
		$this->load->view('v_home',$isi);	

	}

	public function error_404()
	{
		$this->load->view('errors/html/error_404');
	}

	public function DeleteMasterBarang()
	{
		$databarang = $this->input->post('databarang');
		$result = $this->M_Inventory->DeleteMasterBarang($databarang);

		echo json_encode($result);
	}

	public function UbahSupplier()
	{
		$KodeSupplier = $this->input->post('KodeSupplier');
		$NamaSupplier = $this->input->post('NamaSupplier');
		$Email = $this->input->post('Email');
		$NoTelp = $this->input->post('NoTelp');
		$Alamat = $this->input->post('Alamat');

		$arrayName = array(
			'NamaSupplier' => $NamaSupplier,
			'Email' => $Email,
			'Telp' => $NoTelp,
			'Alamat' => $Alamat
		 );

		$result = $this->M_Inventory->UbahSupplier($KodeSupplier,$arrayName);

		echo json_encode($result);
	}

	public function GetMasterSupplier()
	{
		$KodeSupplier = $this->input->post('KodeSupplier');
		$where  = array('KodeSupplier' => $KodeSupplier);
		$data = $this->M_Inventory->GetMasterSupplier($where);
		echo json_encode($data);

	}

	public function DeleteMasterSupplier()
	{
		$deleteSupplier = $this->input->post('deleteSupplier');
		$result = $this->M_Inventory->DeleteMasterSupplier($deleteSupplier);

		echo json_encode($result);
	}

	public function PesanBarang()
	{
		if($this->session->userdata('masuk') != 2 ){
			show_404();
		}
		$isi['content'] = 'pages/v_pesanbarang12';
		$isi['judul'] = '<b>Pesan Barang</b>';
		$isi['countmenu'] = $this->M_Inventory->BarangMasuk()->result_array();
		$isi['pesanbarang'] = $this->M_Inventory->PesanBarang()->result_array();
		$isi['queryautokode'] = $this->M_Inventory->AutoKodeFaktur();
		$isi['querysupplier'] = $this->M_Inventory->MasterSupplier()->result_array();
		$this->load->view('v_home',$isi);	
		# code...
	}

	public function Supplier()
	{
		$isi['content'] = 'pages/v_supplier';
		$isi['judul'] = '<b>Master Supplier</b>';
		$isi['countmenu'] = $this->M_Inventory->BarangMasuk()->result_array();
		$isi['query'] = $this->M_Inventory->MasterSupplier()->result_array();
		$this->load->view('v_home',$isi);	
		# code...
	}

	public function BarangMasuk()
	{
		if($this->session->userdata('masuk') != 2){
			show_404();
		}

		$isi['query'] = $this->M_Inventory->BarangMasuk()->result_array();
		$isi['queryStock'] = $this->M_Inventory->StockBarang()->result_array();
		$isi['countmenu'] = $this->M_Inventory->BarangMasuk()->result_array();

		$label = '';
		if(count($isi['query'])==0){
			$label = '<span style="text-decoration:line-through;"><b>Barang Masuk</b></span>';
		}
		else{
			$label = '<b>Barang Masuk</b>';
		}

		$isi['content'] = 'pages/v_barangmasuk';
		$isi['judul'] = $label;
		$this->load->view('v_home',$isi);	
	}


	public function BarangKeluar()
	{
		if($this->session->userdata('masuk') != 3){
			show_404();
		}
		$isi['AutoKodeBK'] = $this->M_Inventory->AutoKodeBK();
		$isi['queryBK'] = $this->M_Inventory->BarangKeluar()->result_array();
		$isi['content'] = 'pages/v_barangkeluar';
		$isi['judul'] = '<b>Barang Keluar</b>';
		$this->load->view('v_home',$isi);	

	}

	public function Penjualan()
	{
		$NoPJ =	$this->input->post('NoPJ');
		$KodeBarang = $this->input->post('KodeBarang');
		$QtyOrder = $this->input->post('QtyOrder');
		$Harga = $this->input->post('Harga');
		$TglJual = $this->input->post('inpTglJual');

		$KodeBarang = substr($KodeBarang,strpos($KodeBarang,'-')+1);
		$QtyOrder *= -1;

		$tbl_jualbarang = array(
			'NoPenjualan' => $NoPJ, 
			'KodeBarang' => $KodeBarang, 
			'Qty' => ($QtyOrder), 
			'Harga' => $Harga, 
			'TglEntry' => $TglJual, 
			'UserEntry' => $this->session->userdata('Username') 
		);

		$tbl_transaksibarang = array(
			'KodeTransaksi' => '01',
			'JenisTransaksi' => 'Keluar',
			'KodeBarang' => $KodeBarang,
			'Qty' => $QtyOrder,
			'TglTransaksi' => $TglJual,
			'UserEntry' => $this->session->userdata('Username'),
			'Document' => $NoPJ
		 );

		$result = $this->M_Inventory->Penjualan('tbl_jualbarang',$tbl_jualbarang);
		$result = $this->M_Inventory->Penjualan('tbl_transaksibarang',$tbl_transaksibarang);

		echo json_encode($result);
	}


	public function TerimaBarang()
	{
		$Invoice = $this->input->post('NoFaktur');
		$KodeSupplier = $this->input->post('NamaSupplier');
		$KodeBarang = $this->input->post('NamaBarang');
		$QtyOrder = $this->input->post('QtyOrder');
		$QtyTerima = $this->input->post('QtyTerima');



		for ($i=0; $i < count($QtyTerima); $i++) { 
			$array[] = 'Update tbl_detailpesanbarang set QtyTerima = "'.$QtyTerima[$i].'" WHERE Invoice = "'.$Invoice.'" and KodeBarang = "'.(substr($KodeBarang[$i],strpos($KodeBarang[$i],'-')+1)).'"';
			// "('".$Invoice."','".$KodeSupplier."','".$NamaBarang[$i]."','".$QtyOrder[$i]."','".$QtyTerima[$i]."')";
		}
		print_r("'".implode("';'",$array)."'");
		// $TglTerima = $this->input->post('TglTerima');
		// $Keterangan = $this->input->post('Keterangan');

		// $arrayName = array(
		// 	'QtyTerima' => $QtyTerima,
		// 	'TglTerima' => $TglTerima,
		// 	'QtyRetur' => $QtyRetur,
		// 	'Keterangan' => $Keterangan,
		// 	'StatusPemesanan' => 1,
		// 	'UserEntryTerima' => $this->session->userdata('Nama')
		// );

		// $result = $this->M_Inventory->TerimaBarang($arrayName,$NoFaktur);
		echo json_encode($array);

	}

	public function GetPemesanan()
	{
		$Invoice = $this->input->post('NoFaktur');
		$where  = array('d.Invoice' => $Invoice);
		$data = $this->M_Inventory->GetNoFaktur($where);
		echo json_encode($data);
	}

	public function Logout()
	{
			# code...
		$this->session->sess_destroy();
		redirect('Login');
	}

	public function InsertSupplier()
	{
		$KodeSupplier = $this->input->post('KodeSupplier');
		$NamaSupplier = $this->input->post('NamaSupplier');
		$Email = $this->input->post('Email');
		$NoTelpon = $this->input->post('NoTelp');
		$Alamat = $this->input->post('Alamat');

		$arrayName = array(
					'KodeSupplier'=>$KodeSupplier,
					'NamaSupplier'=>$NamaSupplier,
					'Email'=>$Email,
					'Telp'=>$NoTelpon,
					'Alamat'=>$Alamat
				);
		$query = $this->M_Inventory->InsertSupplier($arrayName);

	}

	public function PengajuanBarang()
	{
		$NoFaktur = $this->input->post('NoFaktur');
		$KodeSupplier = $this->input->post('KodeSupplier');
		$NamaBarang = $this->input->post('NamaBarang');
		$TglOrder = $this->input->post('TglOrder');
		$QtyOrder = $this->input->post('QtyOrder');
		$Harga = $this->input->post('Harga');

		$KodeBarang = substr($NamaBarang,strpos($NamaBarang,'-')+1);

		$arrayName = array(
			'NoFaktur' => $NoFaktur, 
			'KodeSupplier' => $KodeSupplier,
			'KodeBarang' => $KodeBarang,
			'QtyOrder' => $QtyOrder,
			'QtyTerima' => 0,
			'QtyRetur' => 0,
			'Harga' => $Harga,
			'TglPemesanan' => $TglOrder,
			'TglTerima' => '1900-01-01',
			'StatusPemesanan' => 0,
			'Keterangan' => '',
			'UserEntryOrder' => $this->session->userdata('Nama'),
			'UserEntryTerima' => ''
		);

		$result = $this->M_Inventory->PengajuanBarang($arrayName);
	}

	public function InsertBarangMasuk()
	{
		$data = $this->input->post('favorite2');

		// $result =	str_replace('-', '\'', implode(",", $data));
		
		$proses = (str_replace('-','\'',$data));	
		
		 $result =  $this->M_Inventory->InsertBarangMasuk($proses);

		 echo json_encode($result);
	}

	public function InsertMasterBarang()
	{
        $config['upload_path']="./assetsPoints/dist/img/Barang"; //path folder file upload
        $config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
        $config['encrypt_name'] = false; //enkripsi file name upload
         
        $this->load->library('upload',$config); //call library upload 

         // $data = ($this->upload->data());
         // echo json_encode($data);
        if($this->upload->do_upload("file")){ //upload file
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
 
            $masterkodebarang= $this->input->post('masterkodebarang'); //get judul image
            $masternamabarang= $this->input->post('masternamabarang'); //get judul image
            $mastersatuan= $this->input->post('mastersatuan'); //get judul image
            $image= $data['upload_data']['file_name']; //set file name ke variable image
             
            $arrayName = array(
                'KodeBarang' => $masterkodebarang,
                'NamaBarang' => $masternamabarang,
                'Satuan' => $mastersatuan,
                'Picture' => $image,
                'UserCreate' => $this->session->userdata('Nama'),
                'TglCreate' => date('Y-m-d')
            );

            // print_r($arrayName);

            $result= $this->M_Inventory->InsertMasterBarang($arrayName); //kirim value ke model m_upload
            echo json_encode($result);
        }
	}

	public function fetch()
	{
		echo $this->M_Inventory->fetch_data($this->uri->segment(3));
	}
	public function fetchBK()
	{
		echo $this->M_Inventory->fetch_dataBK($this->uri->segment(3));
	}

	public function prosesBK()
	{
		$KodeBarang = $this->input->post('KodeBarang');
		$KodeBarang = substr($KodeBarang,strpos($KodeBarang,'-')+1);

		// $arrayName = array('KodeBarang' => $KodeBarang);

		$result = $this->M_Inventory->prosesBK($KodeBarang)->result_array();

		echo json_encode($result);

	}

	public function StockPrint()
	{

		
		 $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        $pdf->Cell(190,7,'Laporan Stock Barang',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,date('Y-m-d'),0,1,'C');
        $pdf->Line(0, 28, 2000, 28);    
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'CC');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'Kode Barang',1,0);
        $pdf->Cell(85,6,'Nama Barang',1,0);
        $pdf->Cell(27,6,'Qty Stock',1,0);
        $pdf->Cell(25,6,'Satuan',1,1);
        $pdf->SetFont('Arial','',10);
        $Stock = $this->M_Inventory->StockPrint()->result();
        foreach ($Stock as $row){
            $pdf->Cell(30,6,$row->KodeBarang,1,0);
            $pdf->Cell(85,6,$row->NamaBarang,1,0);
            $pdf->Cell(27,6,$row->Qty,1,0);
            $pdf->Cell(25,6,$row->Satuan,1,1); 
        }
        $pdf->Output();

	}
}

/* End of file C_Main.php */
/* Location: ./application/controllers/C_Main.php */