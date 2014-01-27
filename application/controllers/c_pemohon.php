<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_pemohon extends CI_Controller {

	public $data = array();
	public $base_url ='';

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('SSI_LGN_')) echo $this->m_var->redirect('index.php','500');
		$this->m_var->setMenu("pemohon");
		$this->data = $this->m_var->data;
		$this->base_url = $this->config->base_url();
	}

	public function index($arg1='',$arg2=10,$arg3=0){
		$a=0;
		$this->data['peringatan'] = $arg1=='1'?$this->m_var->peringatan('Data Berhasil Disimpan!', ' Cek kembali Jika Data Berhasil Disimpan'):'';
		$this->db->order_by("PMH_ID__", "desc");
		if($this->input->post('cari')!=NULL){
			$this->db->where($this->input->post('field')." LIKE '%".$this->input->post('cari')."%'");
		}
		$query = $this->db->get('TBL_PMH', $arg2, $arg3);

		$queryPage = $this->db->get('TBL_PMH');
		$config['base_url'] = $this->base_url.'index.php/c_pemohon/index/0/'.$arg2;
		$config['uri_segment'] = 5;
		$config['per_page'] = $arg2;
		$config['total_rows'] = $queryPage->num_rows();
		$config['num_links'] = 10;
		$this->pagination->initialize($config);		
		$this->data['pagination']= $this->pagination->create_links();

		foreach ($query->result() as $row){
			$a++;
			$lul = "window.location=confirm('Apakah Yakin untuk menghapus data?')?'".$this->base_url."index.php/c_pemohon/hapus/".$row->PMH_ID__."':'';";
		    $this->data['isi'] .= '<tr>';
		    $this->data['isi'] .= '<td>' . $a . '</td>';
		    $this->data['isi'] .= '<td>' . $row->PMH_NM__ . '</td>';
		    $this->data['isi'] .= '<td>' . $row->PMH_TLP_ . '</td>';
		    $this->data['isi'] .= '<td>' . $row->PMH_NO__ . '</td>';
		    $this->data['isi'] .= '<td>' . $row->PMH_NPWP . '</td>';
		    $this->data['isi'] .= '<td><center>
                                              <div class="btn-group">
                                                <a href="' . $this->base_url . 'index.php/c_pemohon/ubah/'.$row->PMH_ID__.'" class="btn btn-warning" title="Ubah"><i class="icon-edit"></i></a>
		    				<a href="#" onclick="'.$lul.'" class="btn btn-danger" title="Hapus"><i class="icon-trash"></i></a>
                                              </div></center>                                              
                                           </td>';
		    $this->data['isi'] .= '</tr>';
		}
		$this->load->view('pemohon', $this->data);
	}

	public function create(){ 
		$this->data['path'] = "save";
		$this->load->view('pemohon-daftar', $this->data);	
	}

	public function save(){
		$data=array(
			'PMH_NM__' => $this->input->post('PMH_NM__'), 'PMH_TMLH' => $this->input->post('PMH_TMLH'), 
			'PMH_TNLH' => $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl'), 
			'PMH_JNS_' => $this->input->post('PMH_JNS_'), 
			'PMH_AAA_' => $this->input->post('PMH_AAA_'), 'PMH_TLP_' => $this->input->post('PMH_TLP_'),
			'PMH_PKRA' => $this->input->post('PMH_PKRA'), 'PMH_NO__' => $this->input->post('PMH_NO__'), 
			'PMH_NPWP' => $this->input->post('PMH_NPWP'), 'PMH_ID__' => NULL,
			'PMH_PRSH' => $this->input->post('PMH_PRSH')
		);

		$this->db->insert('TBL_PMH', $data);
		echo $this->m_var->redirect('index.php/c_pemohon/index/1','500');
	}

	public function ubah($arg1=''){
		$this->data['path'] = "ubahSave/".$arg1;
		$query=$this->db->get_where('TBL_PMH', array('PMH_ID__' => $arg1));
		$row = $query->row();
		$this->data['pemohon']['PMH_NM__'] = $row->PMH_NM__;
		$this->data['pemohon']['PMH_TMLH'] = $row->PMH_TMLH;
		$this->data['kalender'] = $this->m_var->kalender(substr($row->PMH_TNLH,8,2),
														 substr($row->PMH_TNLH,5,2),
														 substr($row->PMH_TNLH,0,4));
		$this->data['pemohon']['PMH_JNSL'] = $row->PMH_JNS_=="L"?"selected":"";
		$this->data['pemohon']['PMH_JNSP'] = $row->PMH_JNS_=="P"?"selected":"";
		$this->data['pemohon']['PMH_AAA_'] = $row->PMH_AAA_;
		$this->data['pemohon']['PMH_TLP_'] = $row->PMH_TLP_;
		$this->data['pemohon']['PMH_PKRA'] = $row->PMH_PKRA;
		$this->data['pemohon']['PMH_NO__'] = $row->PMH_NO__;
		$this->data['pemohon']['PMH_NPWP'] = $row->PMH_NPWP;
		$this->data['pemohon']['PMH_PRSH'] = $row->PMH_PRSH;
		$this->load->view('pemohon-daftar', $this->data);
	}

	public function ubahSave($arg1=''){
		$data=array(
			'PMH_NM__' => $this->input->post('PMH_NM__'), 'PMH_TMLH' => $this->input->post('PMH_TMLH'), 
			'PMH_TNLH' => $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl'), 
			'PMH_JNS_' => $this->input->post('PMH_JNS_'), 
			'PMH_AAA_' => $this->input->post('PMH_AAA_'), 'PMH_TLP_' => $this->input->post('PMH_TLP_'),
			'PMH_PKRA' => $this->input->post('PMH_PKRA'), 'PMH_NO__' => $this->input->post('PMH_NO__'), 
			'PMH_NPWP' => $this->input->post('PMH_NPWP'),
			'PMH_PRSH' => $this->input->post('PMH_PRSH')
		);

		$this->db->where('PMH_ID__', $arg1);
		$this->db->update('TBL_PMH', $data); 
		echo $this->m_var->redirect('index.php/c_pemohon/index/1','500');
	}

	public function hapus($arg1=''){
		$this->db->where('PMH_ID__', $arg1);
		$this->db->delete('TBL_PMH');
		echo $this->m_var->redirect('index.php/c_pemohon/index/2','500');
	}
}