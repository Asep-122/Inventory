<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$isi['judul'] = '<b>Home</b>';
		$this->load->view('v_login',$isi);
		
	}


		public function AksiLogin()
	{
		$Username = $this->input->post('Username');
		$Password = $this->input->post('Password');

		$where = array(
			'Username' => $Username,
			'Password' =>  ($Password)
		);
			
			$login = "";	
			$data = $this->M_Inventory->cek_login($login,$where);
			if ($data->num_rows() > 0) {
				# code...
				
				foreach ($data->result_array() as $key) {
					# code...

					// print_r($key);	
					$data_session = array(
							'Username' => $key['Username'],
							'CatName' => $key['Cat_LoginName'],
							'Nama' => $key['Nama']
						);
					
					$this->session->set_userdata($data_session);
					if ($key['Cat_LoginId']=="1") {
						# code...
						$this->session->set_userdata('masuk','1');
						 redirect("Beranda");
					}
					elseif ($key['Cat_LoginId']=='2') {
						# code...
						$this->session->set_userdata('masuk','2');
						redirect("Beranda");
					}elseif ($key['Cat_LoginId']=='3') {
						# code...
						$this->session->set_userdata('masuk','3');
						redirect("Beranda");
					}
				}
			}
			else{
				$this->session->set_flashdata('info',"<div class='alert alert-block alert-danger'>
														<button type='button' class='close' data-dismiss='alert'>
															<i class='fa fa-remove'></i> 
														</button>
														Maaf Username atau Password salah
													 </div>
											");
				redirect('Login');
				// echo "Password Salah";
			}	

	}

}

/* End of file C_Login.php */
/* Location: ./application/controllers/C_Login.php */