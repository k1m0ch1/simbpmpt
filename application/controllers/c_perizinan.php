<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_perizinan extends CI_Controller {

	public $data = array();
	public $base_url ='';

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('SSI_LGN_')) echo $this->m_var->redirect('index.php','500');
		$this->m_var->setMenu("perizinan");
		$this->data = $this->m_var->data;
		$this->base_url = $this->config->base_url();
	}

	public function index($arg1='',$arg2=10, $arg3=0){
		$a=0;
		$this->data['peringatan'] = $arg1=='1'?$this->m_var->peringatan('Data Berhasil Disimpan!', ' Cek kembali Jika Data Berhasil Disimpan'):'';
		$this->data['peringatan'] = $arg1=='2'?$this->m_var->peringatan('Data Berhasil Dihapus!', ' Cek kembali Jika Data Berhasil Dihapus'):'';
		$this->data['peringatan'] = $arg1=='3'?$this->m_var->peringatan('Data Berhasil Dikonfirmasi!', ' Tunggu Data dikonfirmasi oleh masing masing divisi'):'';
		$siid = $this->session->userdata("SSI_ID__");
		/*$ssiid = $siid==99?" ":$siid==3?"WHERE SAU_ID__<=".$this->session->userdata("SSI_ID__"):
				 "WHERE SAU_ID__=".$this->session->userdata("SSI_ID__");*/
		if($siid==99){
			$ssiid = " WHERE ";
		}else if($siid==3){
			$ssiid = "WHERE SAU_ID__<=".$this->session->userdata("SSI_ID__") ." AND ";
		}else{
			$ssiid = "WHERE SAU_ID__=".$this->session->userdata("SSI_ID__") ." AND ";
		}

		$queryPage = $this->db->get('TBL_PRZ');
		$config['base_url'] = $this->base_url.'index.php/c_perizinan/index/0/'.$arg2;
		$config['uri_segment'] = 5;
		$config['per_page'] = $arg2;
		$config['total_rows'] = $queryPage->num_rows();
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		$this->data['pagination']= $this->pagination->create_links();

		$query = $this->db->query('SELECT * FROM TBL_PRZ '.$ssiid.' SAU_ID__<>10 AND SAU_ID__<>9 ORDER BY PRZ_ID__ desc LIMIT '.$arg3.','.$arg2.'');
		foreach ($query->result() as $row){
			$a++;
			$queryS = $this->db->query("SELECT SAU_NAMA FROM TBL_SAU WHERE SAU_ID__='".$row->SAU_ID__."'");
			$queryP = $this->db->query("SELECT PMH_NM__ FROM TBL_PMH WHERE PMH_ID__='".$row->PMH_ID__."'");
			$queryJ = $this->db->query("SELECT JNS_NMJN, JNS_KDJN FROM TBL_JNS WHERE JNS_ID__='".$row->JNS_ID__."'");

			$rowP = $queryP->row();
			$rowS = $queryS->row();
			$rowJ = $queryJ->row();

			$lul = "window.location=confirm('Apakah Yakin untuk menghapus data?')?'".$this->base_url."index.php/c_perizinan/hapus/".$row->PRZ_ID__."':'';";
		    $this->data['isi'] .= '<tr>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMRS . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . substr($rowJ->JNS_NMJN,0,25).'... ('. $rowJ->JNS_KDJN . ') </center></td>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMSK . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . $row->PRZ_NMPR . '</center></td>';
		    $this->data['isi'] .= '<td><center>' . $rowS->SAU_NAMA . '</center></td>';
		    $this->data['isi'] .= '<td><center><div class="btn-group">';
		    if(($this->session->userdata('SSI_ID__')=='3')||($this->session->userdata('SSI_ID__')=='99')){
				$this->data['isi'] .= '<a href="' . $this->base_url . 'index.php/c_perizinan/ubah/'.$row->PRZ_ID__.'" class="btn btn-warning" title="Ubah"><i class="icon-edit"></i></a>
		    				<a href="#" onclick="'.$lul.'" class="btn btn-danger" title="Hapus"><i class="icon-trash"></i></a>';
			}
                            
		    $this->data['isi'] .= '<a href="'.$this->base_url.'index.php/c_perizinan/view/'.$row->PRZ_ID__.'" class="btn btn-success" title="Lihat"><i class="icon-list"></i></a></center>
                                                </div>
                                            </td>';
		    $this->data['isi'] .= '</tr>';
		}
		$this->load->view('perizinan', $this->data);
	}

	public function view($arg1=""){
		$query = array("PRZ" => $this->db->query('SELECT * FROM TBL_PRZ WHERE PRZ_ID__="'.$arg1.'"'),
					   "JNS" => "", "SAU" => "", "PMH" => "", "SAU_CMET" => "", "PRA" => "", "RWY" => '',
					   "USR" => "");
		$row = array("PRZ" => $query["PRZ"]->row(), "JNS"=> "", "SAU" => "", "PMH"=>"", 
					 "PRA_CMET" => "", "PRA" => "", "RWY" => "", "USR" => "");
		$query["JNS"] = $this->db->query("SELECT * FROM TBL_JNS WHERE JNS_ID__='".$row['PRZ']->JNS_ID__."'");
		$query["SAU"] = $this->db->query("SELECT * FROM TBL_SAU WHERE SAU_ID__='".$row['PRZ']->SAU_ID__."'");
		$query["PMH"] = $this->db->query("SELECT * FROM TBL_PMH WHERE PMH_ID__='".$row['PRZ']->PMH_ID__."'");
		$query["PRA"] = $this->db->query("SELECT * FROM TBL_PRA WHERE PRA_ID__='".$row['PRZ']->PRA_ID__."'");
		$query["RWY"] = $this->db->query("SELECT * FROM TBL_RWY WHERE PRZ_ID__='".$row['PRZ']->PRZ_ID__."'");
		$query["PRA_CMET"] = $this->db->query("SELECT COLUMN_COMMENT as komen FROM information_schema.COLUMNS WHERE table_schema = 'simbpmpt' AND table_name='TBL_PRA' AND COLUMN_NAME<>'PRA_ID__'");
		$row["JNS"] = $query["JNS"]->row();
		$row["SAU"] = $query["SAU"]->row();
		$row["PMH"] = $query["PMH"]->row();
		$row["PRA"] = $query["PRA"]->row();

		$this->data['namaizin'] = $row["JNS"]->JNS_NMJN;
		$this->data['status'] = $row["SAU"]->SAU_NAMA;

		$this->data['konfirmasi'] = $this->m_var->confirmation_button($row['PRZ']->SAU_ID__, $arg1);
		
		$this->data['daftar1'] = "<tr><td>Nomor Resi</td><td>".$row["PRZ"]->PRZ_NMRS."</td></tr>";
		$this->data['daftar1'] .= "<tr><td>Tanggal Pendaftaran</td><td>".date('d F Y', strtotime($row["PRZ"]->PRZ_TNGL))."</td></tr>";
		$this->data['daftar1'] .= "<tr><td>Status Permohonan</td><td>".$row["PRZ"]->PRZ_NMSK."</td></tr>";
		$this->data['daftar1'] .= "<tr><td>Nama Perusahaan</td><td>".$row["PRZ"]->PRZ_NMPR."</td></tr>";
		$this->data['daftar1'] .= "<tr><td>Alamat Perusahaan</td><td>".$row["PRZ"]->PRZ_AAPR."</td></tr>";
		$this->data['daftar1'] .= "<tr><td>Jenis Perusahaan</td><td>".$row["PRZ"]->PRZ_JNPR."</td></tr>";
		$this->data['daftar1'] .= "<tr><td>Nama Penanggung Jawab</td><td>".$row["PRZ"]->PRZ_NMPJ."</td></tr>";
		
		$this->data['daftar2'] .= "<tr><td>Nama Pemohon</td><td>".$row["PMH"]->PMH_NM__."</td></tr>";
		$this->data['daftar2'] .= "<tr><td>Alamat Pemohon</td><td>".$row["PMH"]->PMH_AAA_."</td></tr>";
		$this->data['daftar2'] .= "<tr><td>Nomor Telepon Pemohon</td><td>".$row["PMH"]->PMH_TLP_."</td></tr>";
		$this->data['daftar2'] .= "<tr><td>Perusahaan Pemohon</td><td>".$row["PMH"]->PMH_PRSH."</td></tr>";

		$a=0;

		foreach($query["PRA_CMET"]->result() as $row["PRA_CMET"]){
			$a++;
			$result_PRA=0;
			switch($a){
				case 1: $result_PRA = $row["PRA"]->PRA_1___==1?"checked":""; break;
				case 2: $result_PRA = $row["PRA"]->PRA_2___==1?"checked":""; break;
				case 3: $result_PRA = $row["PRA"]->PRA_3___==1?"checked":""; break;
				case 4: $result_PRA = $row["PRA"]->PRA_4___==1?"checked":""; break;
				case 5: $result_PRA = $row["PRA"]->PRA_5___==1?"checked":""; break;
				case 6: $result_PRA = $row["PRA"]->PRA_6___==1?"checked":""; break;
				case 7: $result_PRA = $row["PRA"]->PRA_7___==1?"checked":""; break;
				case 8: $result_PRA = $row["PRA"]->PRA_8___==1?"checked":""; break;
				case 9: $result_PRA = $row["PRA"]->PRA_9___==1?"checked":""; break;
			}
			$this->data['daftar3'] .= '<tr><td colspan=2><input type="checkbox" name="PRA_ID_'.$a.'_"" value="1" '.$result_PRA.' />'.$row["PRA_CMET"]->komen.'</td></tr>';
		}

		foreach($query["RWY"]->result() as $row["RWY"]){
			$query["USR"] = $this->db->query("SELECT USR_NMLN FROM TBL_USR WHERE USR_ID__=".$row['RWY']->USR_ID__."");
			$row["USR"] = $query["USR"]->row();
			$this->data['daftar4'] .= "<tr><td colspan=2>Data dikonfirmasi oleh ".
									  $row['USR']->USR_NMLN." pada tanggal ". date('d F Y', strtotime($row['RWY']->RWY_TNGL)) ."</td>";
		}		

		$this->load->view('perizinan-view', $this->data);
	}

	public function confirmation($arg1=""){		
		$query = $this->db->query("SELECT SAU_ID__ FROM TBL_PRZ WHERE PRZ_ID__='".$arg1."'");
		$row = $query->row();

		if($row->SAU_ID__==8){
			$nomerSK = "503/";
			$query = $this->db->query("SELECT count(*) as banyak from TBL_PRZ");
			$row = $query->row();
			$nomerSK .= $row->banyak."/";
			$query = $this->db->query("SELECT count(*) as banyak from TBL_PRZ where PRZ_THN_='".date('Y')."' AND SAU_ID__='9' ");
			$row = $query->row()=="0"?"1":$query->row();
			$nomerSK .= $row->banyak."/";
			$query = $this->db->query("SELECT JNS_ID__ from TBL_PRZ where PRZ_ID__='".$arg1."'");
			$row = $query->row();
			$query = $this->db->query("SELECT JNS_KDJN from TBL_JNS where JNS_ID__='".$row->JNS_ID__."'");
			$row = $query->row();
			$nomerSK .= $row->JNS_KDJN."/".$this->m_var->romawi(intval(date('m')))."/BPMPT/".date("Y");

			$dataSK = array(
				'SK_NMR_' => $nomerSK,
				'SK_TGL_' => date('Y-m-d')
			);
			$this->db->insert('TBL_SK', $dataSK);

			$data=array(
				'SAU_ID__' => 9,
				'PRZ_NMSK' => $nomerSK,
			);

			echo $nomerSK;
		}else if($row->SAU_ID__==7){
			$data=array(
				'SAU_ID__' => 14
			);	
		}else if($row->SAU_ID__==14){
			$data=array(
				'SAU_ID__' => 8
			);	
		}else{
			$data=array(
				'SAU_ID__' => $row->SAU_ID__+1
			);	
		}			

		$this->db->where('PRZ_ID__', $arg1);
		$this->db->update('TBL_PRZ', $data);

		$dataRWY = array(
			'PRZ_ID__' => $arg1,
			'USR_ID__' => $this->session->userdata('USR_ID__'),
			'RWY_TNGL' => date('Y-m-d')
		);
		$this->db->insert('TBL_RWY', $dataRWY);

		echo $this->m_var->redirect('index.php/c_perizinan/index/3','500');
	}

	public function resi($arg1=""){
		$query = array("PRZ" => $this->db->query('SELECT * FROM TBL_PRZ WHERE PRZ_ID__="'.$arg1.'"'),
					   "JNS" => "", "SAU" => "", "PMH" => "", "SAU_CMET" => "", "PRA" => "", "RWY" => '',
					   "USR" => "");
		$row = array("PRZ" => $query["PRZ"]->row(), "JNS"=> "", "SAU" => "", "PMH"=>"", 
					 "PRA_CMET" => "", "PRA" => "", "RWY" => "", "USR" => "");
		$query["JNS"] = $this->db->query("SELECT * FROM TBL_JNS WHERE JNS_ID__='".$row['PRZ']->JNS_ID__."'");
		$query["SAU"] = $this->db->query("SELECT * FROM TBL_SAU WHERE SAU_ID__='".$row['PRZ']->SAU_ID__."'");
		$query["PMH"] = $this->db->query("SELECT * FROM TBL_PMH WHERE PMH_ID__='".$row['PRZ']->PMH_ID__."'");
		$query["PRA"] = $this->db->query("SELECT * FROM TBL_PRA WHERE PRA_ID__='".$row['PRZ']->PRA_ID__."'");
		$query["RWY"] = $this->db->query("SELECT * FROM TBL_RWY WHERE PRZ_ID__='".$row['PRZ']->PRZ_ID__."'");
		$query["USR"] = $this->db->query("SELECT * FROM TBL_USR WHERE SAU_ID__ IN (3,4,5,6,7,8)");
		$query["PRA_CMET"] = $this->db->query("SELECT COLUMN_COMMENT as komen FROM information_schema.COLUMNS WHERE table_schema = 'simbpmpt' AND table_name='TBL_PRA' AND COLUMN_NAME<>'PRA_ID__'");
		$row["JNS"] = $query["JNS"]->row();
		$row["SAU"] = $query["SAU"]->row();
		$row["PMH"] = $query["PMH"]->row();
		$row["PRA"] = $query["PRA"]->row();
		$row["USR"] = $query["USR"]->row();

		$namanip = array(0=>array('',''),1=>array('',''),2=>array('',''),3=>array('',''),4=>array('',''),5=>array('',''),6=>array('',''));
		$a=0;
		foreach($query["USR"]->result() as $row["USR"]){
			$namanip[$a][0] = $row["USR"]->USR_UENM;
			$namanip[$a][1] = $row["USR"]->USR_NIP_;
			$a++;
		}

		$printpdf = array('RESI' => $row["PRZ"]->PRZ_NMRS,
						  'LOKET' => 'LOKET',
						  'NM' => $row["PMH"]->PMH_NM__,
						  'AA' => $row["PMH"]->PMH_AAA_,
						  'PR' => $row["PRZ"]->PRZ_NMPR,
						  'LOKASI' => $row["PRZ"]->PRZ_AAPR,
						  'IZIN' =>$row["JNS"]->JNS_NMJN
						  );

		$this->m_var->printPDF($printpdf, $namanip);
	}

	public function create(){
		$this->data['path'] = "save";
		$query = $this->db->query('SELECT JNS_NMJN FROM TBL_JNS WHERE JNS_ID__="'.$this->input->post("JNS_ID__").'"');
		$row = $query->row();
		$this->data['perizinan']['PRZ_NMRS'] = $this->m_var->getNomorResi($this->input->post('JNS_ID__'));
		$this->data['perizinan']['JNS_ID__'] = $this->input->post("JNS_ID__");
		$this->data['perizinan']['JNS_NMJN'] = $row->JNS_NMJN;
		$this->data['perizinan']['PMH_ID__'] = $this->m_var->getListPemohon();
		$query = $this->db->query("SELECT COLUMN_COMMENT as komen FROM information_schema.COLUMNS WHERE table_schema = 'simbpmpt' AND table_name='TBL_PRA' AND COLUMN_NAME<>'PRA_ID__'");
		$this->data['perizinan']['PRZ_PRA_'] = "Persyaratan yang dibutuhkan : <br/>";
		$a=0;
		foreach($query->result() as $row){
			$a++;
			$this->data['perizinan']['PRZ_PRA_'] .= '<input type="checkbox" name="PRA_ID_'.$a.'_"" value="1" onclick="javascript:">'.$row->komen.'<br/>';
		}		
		$this->load->view('perizinan-daftar', $this->data);	
	}

	public function create_first(){
		$this->data['isi'] .= $this->m_var->peringatan('Infomasi!', ' Gunakan Ctrl+F Untuk Mempermudah Pencarian');
		$query = $this->db->query("SELECT JNS_ID__, JNS_NMJN FROM TBL_JNS");
		foreach($query->result() as $row){
			$this->data['isi'] .= '<table class="table table-bordered">'
                                . '<tr>'
                                . '<td width="10px"><input type="radio" name="JNS_ID__" value="'.$row->JNS_ID__.'" /></td>'
                                . '<td>'.$row->JNS_NMJN.'</td>'
                                . '</tr>'
                                . '</table>';
		}
		$this->load->view('perizinan-tahap1', $this->data);
	}		

	public function save(){
		$dataPRA = array(
			'PRA_1___' => $this->input->post('PRA_ID_1_'),
			'PRA_2___' => $this->input->post('PRA_ID_2_'),
			'PRA_3___' => $this->input->post('PRA_ID_3_'),
			'PRA_4___' => $this->input->post('PRA_ID_4_'),
			'PRA_5___' => $this->input->post('PRA_ID_5_'),
			'PRA_6___' => $this->input->post('PRA_ID_6_'),
			'PRA_7___' => $this->input->post('PRA_ID_7_'),
			'PRA_8___' => $this->input->post('PRA_ID_8_'),
			'PRA_9___' => $this->input->post('PRA_ID_9_')
		);
		$this->db->insert('TBL_PRA', $dataPRA);

		$idnya='';
		$query = $this->db->get('TBL_PRA');
		foreach($query->result() as $row){
			$idnya = $row->PRA_ID__;
		}

		$data=array(
			'PRZ_ID__' => NULL, 'PRZ_NMPR' => $this->input->post('PRZ_NMPR'), 
			'JNS_ID__' => $this->input->post('JNS_ID__'),
			'PMH_ID__' => $this->input->post('PMH_ID__'),
			'PRZ_AAPR' => $this->input->post('PRZ_AAPR'), 
			'PRZ_JNPR' => $this->input->post('PRZ_JNPR'), 
			'PRZ_NMPJ' => $this->input->post('PRZ_NMPJ'),
			'PRZ_JBT_' => $this->input->post('PRZ_JBT_'),
			'PRZ_NMRS' => $this->input->post('PRZ_NMRS'),
			'PRA_ID__' => $idnya,
			'PRZ_THN_' => date('Y'),
			'PRZ_TNGL' => date('Y-m-d')
		);

		$this->db->insert('TBL_PRZ', $data);

		echo $this->m_var->redirect('index.php/c_perizinan/index/1','500');
	}

	public function ubah($arg1=''){
		$query = array("PRZ"=>'', "PRA"=>'', "KOM"=>'');
		$row = array("PRZ"=>'', "PRA"=>'', "KOM"=>'');
		$query["PRZ"]=$this->db->get_where('TBL_PRZ', array('PRZ_ID__' => $arg1));
		$row["PRZ"] = $query["PRZ"]->row();
		$this->data['perizinan']['PRZ_NMRS'] = $row["PRZ"]->PRZ_NMRS;
		$this->data['perizinan']['JNS_NMJN'] = $this->m_var->getJenisPerizinan($row["PRZ"]->JNS_ID__);
		$this->data['perizinan']['JNS_ID__'] = $row["PRZ"]->JNS_ID__;
		$this->data['perizinan']['PMH_ID__'] = $this->m_var->getListPemohon($row["PRZ"]->PMH_ID__);
		$this->data['perizinan']['PRZ_NMPR'] = $row["PRZ"]->PRZ_NMPR;
		$this->data['perizinan']['PRZ_AAPR'] = $row["PRZ"]->PRZ_AAPR;
		$this->data['perizinan']['PRZ_JNPR'] = $row["PRZ"]->PRZ_JNPR;
		$this->data['perizinan']['PRZ_NMPJ'] = $row["PRZ"]->PRZ_NMPJ;
		$this->data['perizinan']['PRZ_JBT_'] = $row["PRZ"]->PRZ_NMPJ;
		$this->data['path'] = "ubahSave/".$arg1;
		$this->data['perizinan']['PRZ_PRA_'] = "Persyaratan yang dibutuhkan : <br/>";
		$query["KOM"] = $this->db->query("SELECT COLUMN_COMMENT as komen FROM information_schema.COLUMNS WHERE table_schema = 'simbpmpt' AND table_name='TBL_PRA' AND COLUMN_NAME<>'PRA_ID__'");
		$query["PRA"] = $this->db->query("SELECT * FROM TBL_PRA WHERE PRA_ID__='".$row["PRZ"]->PRA_ID__."'");
		$row["PRA"] = $query["PRA"]->row();
		$a=0;
		foreach($query["KOM"]->result() as $row["KOM"]){
			$a++;
			$result_PRA=0;
			switch($a){
				case 1: $result_PRA = $row["PRA"]->PRA_1___==1?"checked":""; break;
				case 2: $result_PRA = $row["PRA"]->PRA_2___==1?"checked":""; break;
				case 3: $result_PRA = $row["PRA"]->PRA_3___==1?"checked":""; break;
				case 4: $result_PRA = $row["PRA"]->PRA_4___==1?"checked":""; break;
				case 5: $result_PRA = $row["PRA"]->PRA_5___==1?"checked":""; break;
				case 6: $result_PRA = $row["PRA"]->PRA_6___==1?"checked":""; break;
				case 7: $result_PRA = $row["PRA"]->PRA_7___==1?"checked":""; break;
				case 8: $result_PRA = $row["PRA"]->PRA_8___==1?"checked":""; break;
				case 9: $result_PRA = $row["PRA"]->PRA_9___==1?"checked":""; break;
			}
			$this->data['perizinan']['PRZ_PRA_'] .= '<tr><td colspan=2><input type="checkbox" name="PRA_ID_'.$a.'_"" value="1" '.$result_PRA.' />'.$row["KOM"]->komen.'</td></tr>';
		}		
		$this->load->view('perizinan-daftar', $this->data);
	}

	public function ubahSave($arg1=''){
		$data=array(
			'PRZ_NMPR' => $this->input->post('PRZ_NMPR'), 
			'JNS_ID__' => $this->input->post('JNS_ID__'),
			'PMH_ID__' => $this->input->post('PMH_ID__'),
			'PRZ_AAPR' => $this->input->post('PRZ_AAPR'), 
			'PRZ_JNPR' => $this->input->post('PRZ_JNPR'), 
			'PRZ_NMPJ' => $this->input->post('PRZ_NMPJ'),
			'PRZ_JBT_' => $this->input->post('PRZ_JBT_')
		);

		$this->db->where('PRZ_ID__', $arg1);
		$this->db->update('TBL_PRZ', $data); 

		echo $this->m_var->redirect('index.php/c_perizinan/index/1','500');
	}

	public function hapus($arg1=''){
		$this->db->where('PRZ_ID__', $arg1);
		$this->db->delete('TBL_PRZ');
		echo $this->m_var->redirect('index.php/c_jenisPerizinan/index/2','500');
	}

	public function arsip($arg1=''){
		$query = $this->db->query("SELECT SAU_ID__ FROM TBL_PRZ WHERE PRZ_ID__='".$arg1."'");
		$row = $query->row();
		$data=array(
			'PRZ_ID__' => $arg1,
			'SAU_ID__' => $row->SAU_ID__
		);
		$this->db->insert('TBL_ASP', $data); 

		$data=array(
			'SAU_ID__' => '10'
		);
		$this->db->where('PRZ_ID__', $arg1);
		$this->db->update('TBL_PRZ', $data); 

		echo $this->m_var->redirect('index.php/c_perizinan/index/1','500');
	}

	public function unarsip($arg1=''){
		$query = $this->db->query("SELECT * FROM TBL_ASP WHERE PRZ_ID__='".$arg1."'");
		$row = $query->row();

		$data=array(
			'SAU_ID__' => $row->SAU_ID__
		);
		$this->db->where('PRZ_ID__', $arg1);
		$this->db->update('TBL_PRZ', $data); 

		$this->db->where('PRZ_ID__', $arg1);
		$this->db->delete('TBL_ASP');

		echo $this->m_var->redirect('index.php/c_perizinan/index/1','500');
	}

	public function tolak($arg1=''){
		$data=array(
			'SAU_ID__' => '11'
		);
		$this->db->where('PRZ_ID__', $arg1);
		$this->db->update('TBL_PRZ', $data); 

		echo $this->m_var->redirect('index.php/c_perizinan/index/1','500');
	}
}