<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_jenisPerizinan extends CI_Controller {

	public $data = array();
	public $base_url ='';

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('SSI_LGN_')) echo $this->m_var->redirect('index.php','500');
		if($this->session->userdata('SSI_ID__')<99) echo $this->m_var->redirect('index.php','100');
		$this->m_var->setMenu("jenisPerizinan");
		$this->data = $this->m_var->data;
		$this->base_url = $this->config->base_url();
	}

	public function index($arg1='',$arg2=10, $arg3=0){
		$a=$arg3;
		$this->data['peringatan'] = $arg1=='1'?$this->m_var->peringatan('Data Berhasil Disimpan!', ' Cek kembali Jika Data Berhasil Disimpan'):'';
		$this->db->order_by("JNS_ID__", "desc");
		if($this->input->post('cari')!=NULL){
			$this->db->where($this->input->post('field')." LIKE '%".$this->input->post('cari')."%'");
		}
		$query = $this->db->get('TBL_JNS', $arg2, $arg3);

		if($this->input->post('cari')==NULL){
			$queryPage = $this->db->get('TBL_JNS');
			$config['base_url'] = $this->base_url.'index.php/c_jenisPerizinan/index/0/'.$arg2;
			$config['uri_segment'] = 5;
			$config['per_page'] = $arg2;
			$config['total_rows'] = $queryPage->num_rows();
			$config['num_links'] = 10;
			$this->pagination->initialize($config);
			$this->data['pagination']= $this->pagination->create_links();
		}

		foreach ($query->result() as $row){	
			$a++;		
			$lul = "window.location=confirm('Apakah Yakin untuk menghapus data?')?'".$this->base_url."index.php/c_jenisPerizinan/hapus/".$row->JNS_ID__."':'';";
		    $this->data['isi'] .= '<tr>';
		    $this->data['isi'] .= '<td>' . $a . '</td>';
		    $this->data['isi'] .= '<td>' . $row->JNS_NMJN . '</td>';
		    $this->data['isi'] .= '<td>' . $row->JNS_KDJN . '</td>';
		    $this->data['isi'] .= '<td>' . $row->JNS_KTGR . '</td>';
		    $this->data['isi'] .= '<td>' . $row->JNS_KTRG . '</td>';
		    $this->data['isi'] .= '<td><center>
                                           <div class="btn-group">
                                            <a href="' . $this->base_url . 'index.php/c_jenisPerizinan/ubah/'.$row->JNS_ID__.'" class="btn btn-warning" title="Ubah"><i class="icon-edit"></i></a>
                                            <a href="#" onclick="'.$lul.'" class="btn btn-danger" title="Hapus"><i class="icon-trash"></i></a>
                                           </div></center>
                                           </td>';
		    $this->data['isi'] .= '</tr>';
		}
		$this->load->view('jenis-perizinan', $this->data);
	}

	public function create(){ 
		$this->data['path'] = 'save';
		$this->load->view('jenis-perizinan-daftar', $this->data);	
	}

	public function save(){
		$data=array(
			'JNS_ID__' => NULL, 'JNS_NMJN' => $this->input->post('JNS_NMJN'), 
			'JNS_KDJN' => $this->input->post('JNS_KDJN'), 
			'JNS_KTGR' => $this->input->post('JNS_KTGR'), 
			'JNS_KTRG' => $this->input->post('JNS_KTRG')
		);

		$this->db->insert('TBL_JNS', $data);
		echo $this->m_var->redirect('index.php/c_jenisPerizinan/index/1','500');
	}

	public function ubah($arg1=''){
		$query=$this->db->get_where('TBL_JNS', array('JNS_ID__' => $arg1));
		$row = $query->row();
		$this->data['path'] = "ubahSave/" . $arg1;
		$this->data['jenis_perizinan']['JNS_NMJN'] = $row->JNS_NMJN;
		$this->data['jenis_perizinan']['JNS_KDJN'] = $row->JNS_KDJN;
		$this->data['jenis_perizinan']['JNS_KTGR'] = $row->JNS_KTGR;
		$this->data['jenis_perizinan']['JNS_KTRG'] = $row->JNS_KTRG;
		$this->load->view('jenis-perizinan-daftar', $this->data);
	}

	public function ubahSave($arg1=''){
		$data=array(
			'JNS_NMJN' => $this->input->post('JNS_NMJN'), 
			'JNS_KDJN' => $this->input->post('JNS_KDJN'), 
			'JNS_KTGR' => $this->input->post('JNS_KTGR'), 
			'JNS_KTRG' => $this->input->post('JNS_KTRG')
		);

		$this->db->where('JNS_ID__', $arg1);
		$this->db->update('TBL_JNS', $data); 
		echo $this->m_var->redirect('index.php/c_jenisPerizinan/index/1','500');
	}

	public function hapus($arg1=''){
		$this->db->where('JNS_ID__', $arg1);
		$this->db->delete('TBL_JNS');
		echo $this->m_var->redirect('index.php/c_jenisPerizinan/index/2','500');
	}
}