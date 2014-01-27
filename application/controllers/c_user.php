<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_user extends CI_Controller {

	public $data = array();
	public $base_url ='';

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('SSI_LGN_')) echo $this->m_var->redirect('index.php','500');
		if($this->session->userdata('SSI_ID__')<99) echo $this->m_var->redirect('index.php','100');
		$this->m_var->setMenu("pengguna");
		$this->data = $this->m_var->data;
		$this->base_url = $this->config->base_url();
	}

	public function index($arg1='',$arg2=10,$arg3=0){
		$a=0;
		$this->data['peringatan'] = $arg1=='1'?$this->m_var->peringatan('Data Berhasil Disimpan!', ' Cek kembali Jika Data Berhasil Disimpan'):'';
		$this->db->order_by("USR_ID__", "desc"); 
		$query = $this->db->get('TBL_USR',$arg2, $arg3);

		$queryPage = $this->db->get('TBL_USR');
		$config['base_url'] = $this->base_url.'index.php/c_user/index/0/'.$arg2;
		$config['uri_segment'] = 5;
		$config['per_page'] = $arg2;
		$config['total_rows'] = $queryPage->num_rows();
		$config['num_links'] = 10;
		$this->pagination->initialize($config);

		$this->data['pagination']= $this->pagination->create_links();
		foreach ($query->result() as $row){
			$a++;
			$lul = "window.location=confirm('Apakah Yakin untuk menghapus data?')?'".$this->base_url."index.php/c_user/hapus/".$row->USR_ID__."':'';";
		    $this->data['isi'] .= '<tr>';
		    $this->data['isi'] .= '<td>' . $a . '</td>';
		    $this->data['isi'] .= '<td>' . $row->USR_NMLN . '</td>';
		    $this->data['isi'] .= '<td>' . $row->USR_JBTN . '</td>';
		    $this->data['isi'] .= '<td>' . $row->USR_UENM . '</td>';
		    $this->data['isi'] .= '<td>' . ($this->m_var->privilegeName($row->SAU_ID__)) . '</td>';
		    $this->data['isi'] .= '<td><center>
                                              <div class="btn-group">  
		    				<a href="' . $this->base_url . 'index.php/c_user/ubah/'.$row->USR_ID__.'" class="btn btn-warning" title="Ubah"><i class="icon-edit"></i></a>
		    				<a href="#" onclick="'.$lul.'" class="btn btn-danger" title="Hapus"><i class="icon-trash"></i></a>
                                              </div></center>
                                            </td>';
		    $this->data['isi'] .= '</tr>';
		}
		$this->load->view('user', $this->data);
	}

	public function create(){ 
		$this->data['user']['USR_PSWR'] = '<input type="password" name="USR_PSWR" />';
		$this->data['path'] = "save";
		$this->load->view('user-daftar', $this->data);	
	}

	public function save(){
		$data=array(
			'USR_ID__' => NULL,
			'USR_NMLN' => $this->input->post('USR_NMLN'), 'USR_JBTN' => $this->input->post('USR_JBTN'),
			'USR_UENM' => $this->input->post('USR_UENM'), 'USR_PSWR' => md5(sha1($this->input->post('USR_PSWR'))),
			'SAU_ID__' => $this->input->post('USR_CNRL')
		);

		$this->db->insert('TBL_USR', $data);
		echo $this->m_var->redirect('index.php/c_user/index/1','500');
	}

	public function ubah($arg1=''){
		$query=$this->db->get_where('TBL_USR', array('USR_ID__' => $arg1));
		$row = $query->row();
		$this->data['path'] = "ubahSave/".$arg1;
		$this->data['user']['USR_NMLN'] = $row->USR_NMLN;
		$this->data['user']['USR_JBTN'] = $row->USR_JBTN;
		$this->data['user']['USR_UENM'] = $row->USR_UENM;
		$this->data['user']['USR_PSWR'] = '*****';
		$this->data['user']['USR_CNRL_ADMN'] =$row->SAU_ID__;
		$this->data['user']['USR_CNRL_PL'] = $row->SAU_ID__==3?"selected":"";
		$this->data['user']['USR_CNRL_KPP'] = $row->SAU_ID__==4?"selected":"";
		$this->data['user']['USR_CNRL_KPel'] = $row->SAU_ID__==5?"selected":"";
		$this->data['user']['USR_CNRL_KVP'] = $row->SAU_ID__==6?"selected":"";
		$this->data['user']['USR_CNRL_BO'] = $row->SAU_ID__==14?"selected":"";
		$this->data['user']['USR_CNRL_KPDI'] = $row->SAU_ID__==7?"selected":"";
		$this->data['user']['USR_CNRL_KPeng'] = $row->SAU_ID__==8?"selected":"";
		$this->load->view('user-daftar', $this->data);
	}

	public function ubahSave($arg1=''){
		$data=array(
			'USR_NMLN' => $this->input->post('USR_NMLN'), 'USR_JBTN' => $this->input->post('USR_JBTN'),
			'USR_UENM' => $this->input->post('USR_UENM'),
			'SAU_ID__' => $this->input->post('SAU_ID__')
		);

		$this->db->where('USR_ID__', $arg1);
		$this->db->update('TBL_USR', $data); 
		echo $this->m_var->redirect('index.php/c_user/index/1','500');
	}

	public function hapus($arg1=''){
		$this->db->where('USR_ID__', $arg1);
		$this->db->delete('TBL_USR');
		echo $this->m_var->redirect('index.php/c_user/index/2','500');
	}
}