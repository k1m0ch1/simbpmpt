<?php
	class M_func extends CI_Model{

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

	}
?>