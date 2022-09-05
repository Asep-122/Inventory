<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Inventory extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_login($table,$where)
	{
		# code...
		$table = "login a  join tbl_karyawan b on(ID = Log_Nip) join cat_login c on(a.cat_loginid = c.cat_loginid)";
		return $this->db->get_where($table,$where);
	}

	public function MasterSupplier()
	{
		return $this->db->query("select *from tbl_supplier");
	}

	public function InsertSupplier($value)
	{
		$this->db->insert('tbl_supplier', $value);
	}

	public function InsertPesanBarang($header,$detail)
	{
	 $this->db->insert('tbl_headerpesanbarang',$header);
	 $this->db->query('INSERT INTO tbl_detailpesanbarang  VALUES'.$detail);
	}

	public function DeleteMasterKaryawan($value)
	{
		$query = 'DELETE A,B FROM tbl_karyawan A LEFT JOIN login B ON(B.Log_Nip = A.ID) WHERE A.ID =?';
		$this->db->query($query,array($value));
	}

	public function PesanBarang()
	{
		return $this->db->query('Select distinct a.* ,(select namasupplier from tbl_supplier b where a.kodesupplier = b.kodesupplier)NamaSupplier from tbl_headerpesanbarang a join tbl_detailpesanbarang f on(a.Invoice = f.Invoice)');
	}

	public function InsertUserLoginKasir($value)
	{
		$this->db->insert('login',$value);
	}

	public function MasterBarang()
	{
		return $this->db->query('select *,(select b.AliasSatuan from tbl_satuan b where b.Id = a.Satuan)Satuan from tbl_masterbarang a');
	}

	public function UserKasir($value)
	{
		$this->db->select('*');
		$this->db->from('tbl_karyawan a');
		$this->db->join('login b','a.ID = b.Log_Nip','Left');	
		$this->db->where($value);
		return $this->db->get();
	}

	public function MasterKaryawan()
	{
		$this->db->select('*');
		$this->db->from('tbl_karyawan a');
		$this->db->join('login b','a.ID = b.Log_Nip','Left');	
		return $this->db->get();
	}

	public function GetNoFaktur($where)
	{
		$this->db->select('*');
		$this->db->from('tbl_detailpesanbarang a');
		$this->db->join('tbl_headerpesanbarang d','a.Invoice = d.Invoice');
		$this->db->join('tbl_supplier b','d.KodeSupplier = b.KodeSupplier');
		$this->db->join('tbl_masterbarang c','a.KodeBarang = c.KodeBarang');
		$this->db->where($where);
		return $this->db->get()->result_array();
	}

	public function GetHistoryTransaksi()
	{
		return $this->db->get('tbl_transaksibarang');
	}

	public function GetHistoryTransaksi2($value,$date1,$date2)
	{
		$query = "";
		if($value=='All'){

		 $query = $this->db->query('select *from tbl_transaksibarang');

		}
		else{


		 $query = $this->db->query('select *from tbl_transaksibarang where JenisTransaksi = "'.$value.'" and TglTransaksi between "'.$date1.'" and "'.$date2.'"');
		}
		return $query;

	}


	public function GetMasterBarang($where)
	{
		$this->db->select('a.*,b.AliasSatuan,b.ID');
		$this->db->from('tbl_masterbarang a');
		$this->db->join('tbl_satuan b','a.Satuan = b.ID');
		$this->db->where($where);
		return $this->db->get()->result_array();
	}

	public function GetMasterSupplier($where)
	{
		$this->db->select('*');
		$this->db->from('tbl_supplier a');
		$this->db->where($where);
		return $this->db->get()->result_array();
	}

	public function UbahSupplier($where,$value)
	{
		$this->db->where('KodeSupplier',$where);
		$this->db->update('tbl_supplier',$value);
	}

	public function DeleteMasterBarang($value)
	{
		$this->db->delete('tbl_masterbarang', array('KodeBarang' => $value));
	}

	public function DeleteMasterSupplier($value)
	{
		$this->db->delete('tbl_supplier', array('KodeSupplier' => $value));
	}

	public function TerimaBarang($value,$kondisi)
	{
		$this->db->where('NoFaktur',$kondisi);
		$this->db->update('tbl_pesanbarang',$value);
		return true;
	}

	public function PengajuanBarang($value)
	{
		$this->db->insert('tbl_pesanbarang',$value);
	}

	public function BarangMasuk()
	{
		return $this->db->query("Select *,(select b.NamaBarang from tbl_masterbarang b where b.KodeBarang = a.KodeBarang)NamaBarang,(select namasupplier from tbl_supplier b where a.kodesupplier = b.kodesupplier)NamaSupplier From tbl_pesanbarang a where StatusPemesanan = '1'");
	}

	public function BarangKeluar()
	{
		return $this->db->get('tbl_jualbarang');
	}

	public function BarangProses()
	{
		return $this->db->query('SELECT *FROM tbl_pesanbarang WHERE StatusPemesanan = 0');
	}

	public function Satuan()
	{
		return $this->db->get('tbl_satuan');
	}

    public function AutoKodeBarang(){
        $q = $this->db->query("SELECT MAX(RIGHT(KodeBarang,4)) AS kd_max FROM tbl_masterbarang ");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return 'BRG'.$kd;
    }
    public function AutoKodeFaktur(){
        $q = $this->db->query("SELECT MAX(RIGHT(Invoice,3)) AS kd_max FROM tbl_headerpesanbarang ");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return 'INV'.$kd;
    }
    public function AutoKodeBK(){
        $q = $this->db->query("SELECT MAX(RIGHT(NoPenjualan,3)) AS kd_max FROM tbl_jualbarang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return 'PJ'.$kd;
    }

    public function InsertBarangMasuk($value)
    {
    	return $this->db->query('Insert into tbl_transaksibarang (KodeTransaksi,JenisTransaksi,KodeBarang,Qty,TglTransaksi,UserEntry,Document) values '.$value);
    }

    public function InsertMasterBarang($value)
    {
        $result= $this->db->insert('tbl_masterbarang',$value);
        return $result;
    }

    public function fetch_data($query)
    {
    	$this->db->like('NamaBarang',$query);
 		$query = $this->db->get('tbl_masterbarang');

 		$output = array();
 		if($query->num_rows()>0){
 			foreach ($query->result_array() as $key) {
 				$output[] = array(
 					'NamaBarang' => $key['NamaBarang'].'-'.$key['KodeBarang'],
 					'Picture' => $key['Picture'] 
 				);
 			}
 			echo json_encode($output);
 		}
 		else{
 			$tipe = 'Tidak Ada Data';
 			echo json_encode($tipe);
 		}
    }

    public function prosesBK($KodeBarang)
    {
    	return $this->db->query('
				SELECT SUM(Qty)Jumlah,KodeBarang,NamaBarang,Satuan,Picture,ROUND(((harga*5)/100)+Harga,2) AS Harga FROM( 
					SELECT *,(SELECT b.NamaBarang FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang)NamaBarang,
						(SELECT AliasSatuan FROM tbl_satuan WHERE Id = (SELECT b.Satuan FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang))Satuan,
						(SELECT b.Picture FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang)Picture,
						(SELECT harga FROM tbl_pesanbarang b WHERE b.kodebarang = a.kodebarang ORDER BY TglPemesanan ASC LIMIT 1 )Harga
						FROM tbl_transaksibarang a
				)a GROUP BY KodeBarang,NamaBarang,Satuan,Picture,harga
				Having KodeBarang = "'.$KodeBarang.'"
    		');
    }

    public function fetch_dataBk($data)
    {
    	// $this->db->like('NamaBarang',$query);
 		$query = $this->db->query('
				SELECT SUM(Qty)Jumlah,KodeBarang,NamaBarang,Satuan,Picture FROM( 
					SELECT *,(SELECT b.NamaBarang FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang)NamaBarang,
						(SELECT AliasSatuan FROM tbl_satuan WHERE Id = (SELECT b.Satuan FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang))Satuan,
						(SELECT b.Picture FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang)Picture
						FROM tbl_transaksibarang a
				)a GROUP BY KodeBarang,NamaBarang,Satuan,Picture
				Having NamaBarang like "%'.$data.'%"
 			');

 		$output = array();
 		if($query->num_rows()>0){
 			foreach ($query->result_array() as $key) {
 				$output[] = array(
 					'NamaBarang' => $key['NamaBarang'].'-'.$key['KodeBarang'],
 					'Picture' => $key['Picture'] 
 				);
 			}
 			echo json_encode($output);
 		}
 		else{
 			$tipe = 'Tidak Ada Data';
 			echo json_encode($tipe);
 		}
    }

    public function StockBarang()
    {
    	return $data = $this->db->query('
			SELECT SUM(Qty)Jumlah,KodeBarang,NamaBarang,Satuan,Picture FROM( 
			SELECT *,(SELECT b.NamaBarang FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang)NamaBarang,
			(SELECT AliasSatuan FROM tbl_satuan WHERE Id = (SELECT b.Satuan FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang))Satuan,
			(SELECT b.Picture FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang)Picture
			FROM tbl_transaksibarang a
			)a GROUP BY KodeBarang,NamaBarang,Satuan,Picture
   		');
    }
    public function StockInfo()
    {
    	return $data = $this->db->query('
			SELECT COUNT(*)Jumlah FROM(
				SELECT SUM(Qty)Jumlah,KodeBarang,NamaBarang,Satuan,Picture FROM( 
					SELECT *,(SELECT b.NamaBarang FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang)NamaBarang,
						(SELECT AliasSatuan FROM tbl_satuan WHERE Id = (SELECT b.Satuan FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang))Satuan,
						(SELECT b.Picture FROM tbl_masterbarang b WHERE b.KodeBarang = a.KodeBarang)Picture
						FROM tbl_transaksibarang a
				)a GROUP BY KodeBarang,NamaBarang,Satuan,Picture
			)b 
			
   		');
    }


    public function StockPrint()
    {
    	return $data = $this->db->query('

			SELECT KodeBarang,(SELECT NamaBarang FROM tbl_masterbarang b WHERE b.kodebarang = a.KodeBarang)NamaBarang,SUM(Qty)Qty,
			(SELECT Satuan FROM tbl_satuan WHERE Id IN (SELECT b.Satuan FROM tbl_masterbarang b WHERE a.KodeBarang = b.KodeBarang))Satuan FROM tbl_transaksibarang a
			GROUP BY kodebarang,namabarang	
    		');
    }

    public function Penjualan($value1,$value2)
    {
    	return $this->db->insert($value1,$value2);
    }


}

/* End of file M_Inventory.php */
/* Location: ./application/models/M_Inventory.php */


