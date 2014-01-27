<?php
	class M_var extends CI_Model{
	
		public $data = array(
			'base_url' => '', 'kalender' => '', 'peringatan' => '', 'isi' => '', 'path' => '',
			'menu' => '', 'currentPath' =>'', 'pagination' => '', 'status' => '', 'daftar1' =>'',
			'daftar2' => '', 'daftar3' => '', 'namaizin' => '', 'konfirmasi' => '', 'daftar4' => '',
			'SSI_ID__' => '',
			'pemohon' => array('PMH_NM__'=>'', 'PMH_TMLH' => '', 'PMH_TNLH' => '','PMH_JNSL' => '',
							   'PMH_AAA_'=>'', 'PMH_TLP_' => '', 'PMH_PKRA' => '', 'PMH_NO__'=> '',
							   'PMH_NPWP'=>'', 'PMH_PRSH' => '','PMH_JNSP' => ''),
			'user' => array('USR_ID__'=>'', 'USR_NMLN'=>'', 'USR_JBTN' => '', 'USR_UENM'=>'',
							'USR_PSWR' => '', 'USR_CNRL'=>'','USR_CNRL_PL' => '',
								 'USR_CNRL_KPP' => '', 'USR_CNRL_KPel'=>'','USR_CNRL_KVP'=>'',
								 'USR_CNRL_BO'=>'', 'USR_CNRL_KPDI'=>'', 'USR_CNRL_KPeng'=>'',
								 'USR_CNRL_ADMN' => ''),
			'jenis_perizinan' => array('JNS_NMJN'=> '', 'JNS_KDJN'=> '', 'JNS_KTGR_R'=>'',
									   'JNS_KTRG'=>'', 'JNS_KTGR_NR'=> ''),
			'perizinan' => array('JNS_ID__'=>'', 'PMH_ID__'=> '','PRZ_NMPR'=>'','PRZ_AAPR'=>'',
								 'PRZ_JNPR_PT'=>'','PRZ_JNPR_CV'=>'','PRZ_NMPJ'=>'','PRZ_JBT_'=>'',
								 'PRZ_NMRS' => '', 'JNS_NMJN' => '', 'PRZ_PRA_' => '')
			);

		public $base_url ='';

		public function __construct() {
			parent::__construct();

			$this->data['base_url']= $this->config->base_url();
			$this->data['kalender']= $this->kalender();
			$this->data['SSI_ID__']= $this->session->userdata('SSI_ID__');
			$this->base_url = $this->config->base_url();
		}

		public function public_var(){ return $this->data; }

		public function setMenu($arg1=''){ $this->data['menu'] = $this->getMenu($arg1); }

		public function privilegeName($arg1=0){
			switch($arg1){
				case 3: return "Petugas Loket"; break; 
				case 4: return "Kasubid Pelayanan dan Pendaftaran"; break;
				case 5: return "Kabid Pelayanan"; break;
				case 6: return "Kabid Pengolahan"; break;
				case 7: return "Kasubid Verifikasi dan Pendaftaran"; break;
				case 14: return "Back Office"; break;
				case 8: return "Kabid Penetapan dan Dokumentasi"; break;
				case 99: return "Admin"; break;
				case 98: return "Guest"; break;
			}
		}

		public function getMenu($arg1=''){
			$siid = $this->session->userdata('SSI_ID__');
			$dashboard = $arg1=='dashboard'?'class="select"':'';
			$perizinan = $arg1=='perizinan'?'class="select"':'';
			$jenisPerizinan = $arg1=='jenisPerizinan'?'class="select"':'';
			$pemohon = $arg1=='pemohon'?'class="select"':'';
			$pengguna = $arg1=='pengguna'?'class="select"':'';
			$arsip = $arg1=='arsip'?'class="select"':'';
			$terbit = $arg1=='terbit'?'class="select"':'';
			$user = 'Selamat Datang - ' . $this->session->userdata('SSI_UENM');
			$ngowahaha1 = $siid==99?'<li><a href="'.$this->base_url.'index.php/c_jenisPerizinan/" '.$jenisPerizinan.'><b>Jenis Perizinan</b></a></li>':'';
			$ngowahaha2 = $siid==99?'<li><a href="'.$this->base_url.'index.php/c_pemohon/" '.$pemohon.'><b>Pemohon</b></a></li>':
						  $siid==3?'<li><a href="'.$this->base_url.'index.php/c_pemohon/" '.$pemohon.'><b>Pemohon</b></a></li>':'';
			$ngowahaha5 = $siid==99?'<li><a href="'.$this->base_url.'index.php/c_user/" '.$pengguna.'><b>Pengguna</b></a></li>':'';
			$ngowahaha3 = $siid==99?'<li><a href="'.$this->base_url.'index.php/dashboard/terbit" '.$terbit.'><b>Terbit</b></a></li>':
						  $siid==3?'<li><a href="'.$this->base_url.'index.php/dashboard/terbit" '.$terbit.'><b>Terbit</b></a></li>':'';
			$ngowahaha4 = $siid==99?'<li><a href="'.$this->base_url.'index.php/dashboard/arsip" '.$arsip.'><b>Arsip</b></a></li>':
						  $siid==3?'<li><a href="'.$this->base_url.'index.php/dashboard/arsip" '.$arsip.'><b>Arsip</b></a></li>':'';
			$result = $ngowahaha1 . $ngowahaha2. $ngowahaha3. $ngowahaha4. $ngowahaha5;
			return '<ul class="nav">
                                    <li><a href="'.$this->base_url.'" '.$dashboard.'><b>Dashboard</b></a></li>
                                    <li><a href="'.$this->base_url.'index.php/c_perizinan/" '.$perizinan.'><b>Perizinan</b></a></li>
                                              '.$result.'                         			
					<li><b>('.$user.')</b> <a href="'.$this->base_url.'index.php/dashboard/logout"><b>Logout</b></a></li>
			            </ul>';
		}

		public function redirect($arg1='', $arg2='1500'){
			return "<script type='text/javascript'>setInterval(function(){window.location='" . $this->base_url . "".$arg1."';},".$arg2.");</script>"; //redirect
		}

		public function peringatan($arg1='', $arg2=''){
			return '<div class="alert alert-success">
				        <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>'.$arg1.'</strong>'.$arg2.'
				    </div>';
		}

		public function getListJenisPerizinan($arg1=''){
			$hasil ='<select name="JNS_ID__">';
			$query = $this->db->query("select JNS_ID__, JNS_NMJN from TBL_JNS");
			if($query->num_rows() > 0){
				foreach ($query->result() as $row){
					$kepilih= $arg1==$row->JNS_ID__?"selected":"";
					$hasil .= "<option value='". $row->JNS_ID__ ."' ". $kepilih ." >". $row->JNS_NMJN ."</option>";
				}
			}

			return $hasil."</select>";
		}

		public function getJenisPerizinan($arg1=''){
			$query = $this->db->query("select JNS_NMJN from TBL_JNS WHERE JNS_ID__='".$arg1."'");
			$row = $query->row();

			return $row->JNS_NMJN;
		}

		public function getListPemohon($arg1=''){
			$hasil ='<select name="PMH_ID__">';
			$query = $this->db->query("select PMH_ID__, PMH_NM__ from TBL_PMH");
			if($query->num_rows() > 0){
				foreach ($query->result() as $row){
					$kepilih= $arg1==$row->PMH_ID__?"selected":"";
					$hasil .= "<option value='". $row->PMH_ID__ ."' ". $kepilih ." >". $row->PMH_NM__ ."</option>";
				}
			}

			return $hasil."</select>";
		}

		public function kalender($arg1='',$arg2='',$arg3=''){
			$kalenderTGL = "<select style='width:80px' name='tgl'>";
			for($a=1;$a<=31;$a++){
				$tgl=$a<10?"0".$a:$a;
				$tgl_selected = $arg1==$tgl ? "selected" : "";
				$kalenderTGL .="<option value='".$tgl."' ". $tgl_selected." >".$tgl."</option>";
			}
			$kalenderTGL .="</select>&nbsp;";
			$bln = array(0=>array('01','Januari'), 1 =>array('02','Februari'), 
						 2=>array('03','Maret'), 3 =>array('04','April'), 
						 4=>array('05','Mei'), 5 =>array('06','Juni'), 
						 6=>array('07','Juli'), 7 =>array('08','Agustus'), 
						 8=>array('09','September'), 9 =>array('10','Oktober'), 
						 10=>array('11','November'), 11 =>array('12','Desember'));
			$kalenderBLN = "<select style='width:110px' name='bln'>";
			for($a=0;$a<12;$a++){
				$bln_selected = $arg2==$bln[$a][0]? "selected" : "";
				$kalenderBLN .= "<option value='".$bln[$a][0]."' ". $bln_selected ." >".$bln[$a][1]."</option>";
			}			
			$kalenderBLN .="</select>&nbsp;";
			$kalenderTHN = "<select style='width:100px' name='thn'>";
			for($a=1950;$a<=2100;$a++){
				$thn_selected = $arg3==$a ? "selected" : "";
				$kalenderTHN .="<option value='".$a."' ". $thn_selected ." >".$a."</option>";
			}
			$kalenderTHN .="</select>";
			
			return $kalenderTGL . " " . $kalenderBLN . " " . $kalenderTHN;
		}

		public function getIP() { 
			$ip; 
			if (getenv("HTTP_CLIENT_IP")) 
			$ip = getenv("HTTP_CLIENT_IP"); 
			else if(getenv("HTTP_X_FORWARDED_FOR")) 
			$ip = getenv("HTTP_X_FORWARDED_FOR"); 
			else if(getenv("REMOTE_ADDR")) 
			$ip = getenv("REMOTE_ADDR"); 
			else 
			$ip = "UNKNOWN";
			return $ip;

		}

		public function getNomorResi($arg1='3'){
			$query = $this->db->query("SELECT count(PRZ_ID__) as banyaknya FROM TBL_PRZ");
			$row = $query->row();
			return "1.".$this->romawi(intval(date('m'))).".".($row->banyaknya+1);
		}

		public function romawi($arg1=0){
			switch($arg1){
				case 1: return "I"; break; case 2: return "II"; break; case 3: return "III"; break; 
				case 4: return "IV"; break; case 5: return "V"; break; case 6: return "VI"; break; 
				case 7: return "VII"; break; case 8: return "VIII"; break; case 9: return "IX"; break; 
				case 10: return "X"; break; case 11: return "XI"; break; case 12: return "XII"; break; 
			}
		}

		public function printPDF($arg1, $arg2){
			$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
			$obj_pdf = new Pdf('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
			$resolution= array(216, 356);
			$obj_pdf->SetCreator(PDF_CREATOR);
			$title = "PEMERINTAH KABUPATEN KARAWANG\n\n";
			$badan = "\nBADAN PENANAMAN MODAL DAN PELAYANAN TERPADU (BPMPT)\n\n";
			$badan .= "Jl. Jend. Ahmad Yani No. 1 Karawang Telp (0267) 429800 - 429802 - 429803\n\n";
			$obj_pdf->SetTitle($title);
			$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, 20, $title, $badan);
			$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			$obj_pdf->SetDefaultMonospacedFont('helvetica');
			$obj_pdf->SetHeaderMargin(10);
			$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			$obj_pdf->SetFont('helvetica', '', 9);
			$obj_pdf->setFontSubsetting(false);
			$obj_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
			$obj_pdf->AddPage('P', $resolution);
			ob_start();
			    // we can have any view part here like HTML, PHP etc
			    $content = "<table align=\"center\" cellpadding=\"1\" border=\"1\"> 
			    				<tr><td rowspan=\"2\" valign=\"bottom\"><center><b>TANDA TERIMA PERMOHONAN</b></center></td>
								<td>No. Resi</td><td>No. Loket</td></tr>
								<tr><td>".$arg1['RESI']."</td><td>".$arg1['LOKET']."</td></tr>
							</table><br/><br/><br/>
							<table cellpadding=\"1\" border=\"1\"> 
			    				<tr><td>&nbsp;&nbsp;Nama Pemohon</td><td>&nbsp;&nbsp;".$arg1['NM']."<br/></td></tr>
								<tr><td>&nbsp;&nbsp;Alamat Pemohon</td><td>&nbsp;&nbsp;".$arg1['AA']."<br/></td></tr>
								<tr><td>&nbsp;&nbsp;Nama Perusahaan</td><td>&nbsp;&nbsp;".$arg1['PR']."<br/></td></tr>
								<tr><td>&nbsp;&nbsp;Lokasi</td><td>&nbsp;&nbsp;".$arg1['LOKASI']."<br/></td></tr>
								<tr><td>&nbsp;&nbsp;Jenis Izin/ Non Izin</td><td>&nbsp;&nbsp;".$arg1['IZIN']."<br/></td></tr>
							</table><br/><br/>

							<table cellpadding=\"1\" border=\"1\" align=\"center\"> 
			    				<tr><td>
			    						Karawang, ".date('d')." ".$this->bulan(date('m'))." ".date('Y')."
			    						<br/>Petugas Loket<br/><br/><br/><br/>
			    						<u>".$arg2[0][0]."</u><br/>NIP. ".$arg2[0][1]."</td>
			    					<td></td>
			    				</tr>
							</table><br/><br/>

							<table cellpadding=\"1\" border=\"1\" align=\"center\"> 
			    				<tr><td>Tanggal&nbsp;: __-__-____	
			    						<br/>Kasubid Pelayanan dan Pendaftaran<br/><br/><br/><br/>
			    						<u>".$arg2[1][0]."</u><br/>NIP. ".$arg2[1][1]."</td>
			    					<td></td>
			    				</tr>
							</table><br/><br/>

							<table cellpadding=\"1\" border=\"1\" align=\"center\"> 
			    				<tr><td>
			    						Tanggal&nbsp;: ___-___-____<br/><center>Kabid Pelayanan</center><br/><br/><br/><br/>
			    						<center><u>".$arg2[2][0]."</u></center><center><br/>NIP. ".$arg2[2][1]."</center></td>
			    					<td></td>
			    				</tr>
							</table><br/><br/>

							<table cellpadding=\"1\" border=\"1\" align=\"center\"> 
			    				<tr><td>
			    						Tanggal&nbsp;: ___-___-____<br/><center>Kabid Pengolahan</center><br/><br/><br/><br/>
			    						<center><u>".$arg2[3][0]."</u></center><center><br/>NIP. ".$arg2[3][1]."</center></td>
			    					<td></td>
			    				</tr>
							</table><br/><br/>

							<table cellpadding=\"1\" border=\"1\" align=\"center\"> 
			    				<tr><td>
			    						Tanggal&nbsp;: ___-___-____<br/><center>Kasubid Verifikasi dan Pendaftaran</center><br/><br/><br/><br/>
			    						<center><u>".$arg2[4][0]."</u></center><center><br/>NIP. ".$arg2[4][1]."</center></td>
			    					<td></td>
			    				</tr>
							</table><br/><br/>

							<table cellpadding=\"1\" border=\"1\" align=\"center\"> 
			    				<tr><td>
			    						Tanggal&nbsp;: ___-___-____<br/><center>Kabid Penetapan dan Dokumentasi Izin</center><br/><br/><br/><br/>
			    						<center><u>".$arg2[5][0]."</u></center><center><br/>NIP. ".$arg2[5][1]."</center></td>
			    					<td></td>
			    				</tr>
							</table>"; 
			$obj_pdf->writeHTML($content, true, false, true, false, '');
			$obj_pdf->AddPage('P', $resolution);
			ob_start();
			    // we can have any view part here like HTML, PHP etc
			    $content = "<table align=\"center\" cellpadding=\"1\" border=\"1\"> 
			    				<tr><td rowspan=\"2\" valign=\"bottom\"><center><b>TANDA TERIMA PERMOHONAN</b></center></td>
								<td>No. Resi</td><td>No. Loket</td></tr>
								<tr><td>".$arg1['RESI']."</td><td>".$arg1['LOKET']."</td></tr>
							</table><br/><br/><br/>
							<table cellpadding=\"1\" border=\"1\"> 
			    				<tr><td>&nbsp;&nbsp;Nama Pemohon</td><td>&nbsp;&nbsp;".$arg1['NM']."<br/></td></tr>
								<tr><td>&nbsp;&nbsp;Alamat Pemohon</td><td>&nbsp;&nbsp;".$arg1['AA']."<br/></td></tr>
								<tr><td>&nbsp;&nbsp;Nama Perusahaan</td><td>&nbsp;&nbsp;".$arg1['PR']."<br/></td></tr>
								<tr><td>&nbsp;&nbsp;Lokasi</td><td>&nbsp;&nbsp;".$arg1['LOKASI']."<br/></td></tr>
								<tr><td>&nbsp;&nbsp;Jenis Izin/ Non Izin</td><td>&nbsp;&nbsp;".$arg1['IZIN']."<br/></td></tr>
							</table><br/><br/>
							<right><table cellpadding=\"1\" border=\"0\" align=\"center\"> 
			    				<tr><td></td><td></td><td>
			    						Karawang, ".date('d')." ".$this->bulan(date('m'))." ".date('Y')."
			    						<br/>Petugas Loket<br/><br/><br/><br/>
			    						<u>".$arg2[0][0]."</u><br/>NIP. ".$arg2[0][1]."</td>
			    				</tr>
							</table></right><br/><br/>"; 
			$obj_pdf->writeHTML($content, true, false, true, false, '');
			ob_flush();
			$obj_pdf->Output('output.pdf', 'I');
		}

		public function confirmation_button($arg1="", $arg2=""){
			$SSI_ID__ = $this->session->userdata('SSI_ID__')==99?3:$this->session->userdata('SSI_ID__');
			$query = $this->db->query("SELECT SAU_NAMA FROM TBL_SAU WHERE SAU_ID__='".($SSI_ID__=="14"?"8":($SSI_ID__+1))."'");
			$row = $query->row();
			$lul = "window.location=confirm('Data Akan dilanjutkan dan diverifikasi oleh ".$row->SAU_NAMA." ')?'".$this->base_url."index.php/c_perizinan/confirmation/".$arg2."':'';";
			$tolak = "window.location=confirm('Apakah yakin untuk menolak data ini ?')?'".$this->base_url."index.php/c_perizinan/tolak/".$arg2."':'';";
			$data = "";

			if($this->session->userdata('SSI_ID__')==$arg1){
			 	$data= '<a href="#" class="btn btn-primary" title="Konfirmasi"
				    onclick="'.$lul.'">Konfirmasi &nbsp;<i class="icon-plus icon-white"></i></a>';
			}

			if($this->session->userdata('SSI_ID__')=='3'){
				$data= '<a href="#" class="btn btn-primary" title="Konfirmasi"
				    onclick="'.$lul.'">Konfirmasi &nbsp;<i class="icon-plus icon-white"></i></a>';
				if($arg1==3){
					$data .= '&nbsp;&nbsp;<a href="'.$this->base_url.'index.php/c_perizinan/resi/'.$arg2.'" class="btn btn-primary" title="Konfirmasi"
					     >Print Resi &nbsp;<i class="icon-plus icon-white"></i></a>';
				}
			}

			if(($this->session->userdata('SSI_ID__')=='7')){
				$data= '<a href="#" class="btn btn-primary" title="Konfirmasi"
				    onclick="'.$lul.'">Konfirmasi &nbsp;<i class="icon-plus icon-white"></i></a>';
				$data .= '&nbsp;<a href="#" class="btn btn-primary" title="Penolakan"
				    				onclick="'.$tolak.'">Ditolak &nbsp;<i class="icon-plus icon-white"></i></a>';
			}

			if($this->session->userdata('SSI_ID__')=='99'){
				$data= '<a href="#" class="btn btn-primary" title="Konfirmasi"
				    onclick="'.$lul.'">Konfirmasi &nbsp;<i class="icon-plus icon-white"></i></a>';
				$data .= '&nbsp;&nbsp;<a href="'.$this->base_url.'index.php/c_perizinan/resi/'.$arg2.'" class="btn btn-primary" title="Konfirmasi"
				     >Print Resi &nbsp;<i class="icon-plus icon-white"></i></a>';
				$data .= '&nbsp;<a href="#" class="btn btn-primary" title="Penolakan"
				    				onclick="'.$tolak.'">Ditolak &nbsp;<i class="icon-plus icon-white"></i></a>';
			}

			if($arg1==9||$arg1==10||$arg1==11||$arg1==12||$arg1==13){
				$data= '';
			}

			return $data;
		}

		public function bulan($arg1=""){
			$bln = array(0=>array('01','Januari'), 1 =>array('02','Februari'), 
						 2=>array('03','Maret'), 3 =>array('04','April'), 
						 4=>array('05','Mei'), 5 =>array('06','Juni'), 
						 6=>array('07','Juli'), 7 =>array('08','Agustus'), 
						 8=>array('09','September'), 9 =>array('10','Oktober'), 
						 10=>array('11','November'), 11 =>array('12','Desember'));
			$hasil = '';
			$a=0;
			for($a=0;$a<12;$a++){
				if($bln[$a][0]==$arg1){
					return $bln[$a][1];
				}
			}
		}
	}
?>