<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $data = array();
	public $base_url ='';

	public function __construct() {
		parent::__construct();

		$this->m_var->setMenu("dashboard");
		$this->data = $this->m_var->data;
		$this->base_url = $this->config->base_url();
	}

	public function index(){
		if(!$this->session->userdata('SSI_LGN_')){
			$dataSession = array(
			           'SSI_UENM'  => 'guest',
			           'SSI_ID__'  => '98',
	                   'SSI_LGN_' => FALSE,
	                   'USR_ID__' => '999'
	                );

			$this->session->set_userdata($dataSession);
			$this->load->view("dashboard", $this->data);
		}else{
			echo $this->m_var->redirect('index.php/c_perizinan/','500');
		}
	}

	public function login(){
		$usr = $this->input->post('USR_UENM');
		$psw = $this->input->post('USR_PSWR');
		$query = $this->db->get_where('TBL_USR', array('USR_UENM' => $usr));
		$row = $query->row();
		if(md5(sha1($psw))==$row->USR_PSWR){
			$dataSession = array(
			           'SSI_UENM'  => $usr,
			           'SSI_ID__'  => $row->SAU_ID__,
	                   'SSI_LGN_' => TRUE,
	                   'USR_ID__' => $row->USR_ID__
	                );

			$this->session->set_userdata($dataSession);
		}

		echo $this->m_var->redirect('index.php','500');
	}

	public function logout(){
		$dataSession = array(
			           'SSI_UENM'  => 'guest',
	                   'SSI_LGN_' => FALSE
	                );

		$this->session->set_userdata($dataSession);
		echo $this->m_var->redirect('index.php','500');
	}

	public function terbit($arg2=10, $arg3=0){
		$a=0;
		$this->m_var->setMenu("terbit");

		$queryPage = $this->db->query('SELECT PRZ_ID__ FROM TBL_PRZ WHERE SAU_ID__=9');
		$config['base_url'] = $this->base_url.'index.php/dashboard/terbit/'.$arg2;
		$config['uri_segment'] = 4;
		$config['per_page'] = $arg2;
		$config['total_rows'] = $queryPage->num_rows();
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		$this->data['pagination']= $this->pagination->create_links();

		$query = $this->db->query('SELECT * FROM TBL_PRZ WHERE SAU_ID__=9 ORDER BY PRZ_ID__ desc LIMIT '.$arg3.','.$arg2.'');
		foreach ($query->result() as $row){
			$a++;
			$queryS = $this->db->query("SELECT SAU_NAMA FROM TBL_SAU WHERE SAU_ID__='".$row->SAU_ID__."'");
			$queryP = $this->db->query("SELECT PMH_NM__ FROM TBL_PMH WHERE PMH_ID__='".$row->PMH_ID__."'");
			$queryJ = $this->db->query("SELECT JNS_NMJN, JNS_KDJN FROM TBL_JNS WHERE JNS_ID__='".$row->JNS_ID__."'");

			$rowP = $queryP->row();
			$rowS = $queryS->row();
			$rowJ = $queryJ->row();

			$lul = "window.location=confirm('Apakah Yakin untuk menghapus data?')?'".$this->base_url."index.php/c_perizinan/hapus/".$row->PRZ_ID__."':'';";
		    $arsipkan = "window.location=confirm('Apakah Yakin untuk mengarsipkan data?')?'".$this->base_url."index.php/c_perizinan/arsip/".$row->PRZ_ID__."':'';";
		    $this->data['isi'] .= '<tr>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMRS . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . substr($rowJ->JNS_NMJN,0,25).'... ('. $rowJ->JNS_KDJN . ') </center></td>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMSK . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMPR . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . $rowS->SAU_NAMA . '</center></td>';
		    $this->data['isi'] .= '<td><center><div class="btn-group">';
		    if(($this->session->userdata('SSI_ID__')=='3')||($this->session->userdata('SSI_ID__')=='99')){
				$this->data['isi'] .= '<a href="' . $this->base_url . 'index.php/c_perizinan/ubah/'.$row->PRZ_ID__.'" class="btn btn-warning" title="Ubah"><i class="icon-edit"></i></a>
		    				<a href="#" onclick="'.$lul.'" class="btn btn-danger" title="Hapus"><i class="icon-trash"></i></a>
		    				<a href="#" onclick="'.$arsipkan.'" class="btn btn-danger" title="Arsip">Arsipkan</a>';
			}
                            
		    $this->data['isi'] .= '<a href="'.$this->base_url.'index.php/c_perizinan/view/'.$row->PRZ_ID__.'" class="btn btn-success" title="Lihat"><i class="icon-list"></i></a></center>
                                                </div>
                                            </td>';
		    $this->data['isi'] .= '</tr>';
		}
		$this->load->view('perizinan', $this->data);
	}

	public function arsip(){
		$a=0;
		$this->m_var->setMenu("arsip");

		$queryPage = $this->db->query('SELECT PRZ_ID__ FROM TBL_PRZ WHERE SAU_ID__=10');
		$config['base_url'] = $this->base_url.'index.php/dashboard/arsip/'.$arg2;
		$config['uri_segment'] = 4;
		$config['per_page'] = $arg2;
		$config['total_rows'] = $queryPage->num_rows();
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		$this->data['pagination']= $this->pagination->create_links();

		$query = $this->db->query('SELECT * FROM TBL_PRZ WHERE SAU_ID__=10 ORDER BY PRZ_ID__ desc LIMIT '.$arg3.','.$arg2.'');
		foreach ($query->result() as $row){
			$a++;
			$queryS = $this->db->query("SELECT SAU_NAMA FROM TBL_SAU WHERE SAU_ID__='".$row->SAU_ID__."'");
			$queryP = $this->db->query("SELECT PMH_NM__ FROM TBL_PMH WHERE PMH_ID__='".$row->PMH_ID__."'");
			$queryJ = $this->db->query("SELECT JNS_NMJN, JNS_KDJN FROM TBL_JNS WHERE JNS_ID__='".$row->JNS_ID__."'");

			$rowP = $queryP->row();
			$rowS = $queryS->row();
			$rowJ = $queryJ->row();

			$lul = "window.location=confirm('Apakah Yakin untuk menghapus data?')?'".$this->base_url."index.php/c_perizinan/hapus/".$row->PRZ_ID__."':'';";
		    $unarsip = "window.location=confirm('Apakah Yakin untuk mengembalikan data?')?'".$this->base_url."index.php/c_perizinan/unarsip/".$row->PRZ_ID__."':'';";
		    $this->data['isi'] .= '<tr>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMRS . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . substr($rowJ->JNS_NMJN,0,25).'... ('. $rowJ->JNS_KDJN . ') </center></td>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMSK . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMPR . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . $rowS->SAU_NAMA . '</center></td>';
		    $this->data['isi'] .= '<td><center><div class="btn-group">';
		    if(($this->session->userdata('SSI_ID__')=='3')||($this->session->userdata('SSI_ID__')=='99')){
				$this->data['isi'] .= '<a href="' . $this->base_url . 'index.php/c_perizinan/ubah/'.$row->PRZ_ID__.'" class="btn btn-warning" title="Ubah"><i class="icon-edit"></i></a>
		    				<a href="#" onclick="'.$lul.'" class="btn btn-danger" title="Hapus"><i class="icon-trash"></i></a>
		    				<a href="#" onclick="'.$unarsip.'" class="btn btn-danger" title="Arsip">Kembalikan Data</a>';
			}
                            
		    $this->data['isi'] .= '<a href="'.$this->base_url.'index.php/c_perizinan/view/'.$row->PRZ_ID__.'" class="btn btn-success" title="Lihat"><i class="icon-list"></i></a></center>
                                                </div>
                                            </td>';
		    $this->data['isi'] .= '</tr>';
		}
		$this->load->view('perizinan', $this->data);
	}
}