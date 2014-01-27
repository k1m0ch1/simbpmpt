<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=$base_url?>css/style.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?=$base_url?>css/bootstrap.css" type="text/css" media="screen" title="default" />
<title>SIMBPMPT</title>
</head>

<body>
<div class="header">
	<div class="logo">
    <img src="<?=$base_url?>img/logo.png" alt="logo SIMBPMPT Karawang" />
    </div>
</div>
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container-fluid">
            <div class="nav-collapse collapse">
                <?=$menu?>
            </div>        
            
            <ul class="nav pull-right">					
		<li><a href="<?php echo $base_url ?>/index.php/dashboard/logout"><b>Logout</b></a></li>
            </ul>
            
        </div>                        
    </div>                
</div>

<div class="clearfix"></div>
<div class="content">
<h3>Daftar User</h3>
    <div class="box-content">
    	    <form method="POST" action="<?=$base_url?>index.php/c_user/<?=$path?>">
                        <table class="table table-bordered">
                            <tr><td width="200px">Nama Lengkap</td><td> <input type="text" name="USR_NMLN" value="<?=$user['USR_NMLN']?>" class="span12"/></td></tr>
		    	    <tr><td>Jabatan </td><td> <input type="text" name="USR_JBTN" value="<?=$user['USR_JBTN']?>" class="span12"/></td></tr>
		    	    <tr><td>Username </td><td> <input type="text" name="USR_UENM" value="<?=$user['USR_UENM']?>" class="span12"/></td></tr>
		    	    <tr><td>Password </td><td> <?=$user['USR_PSWR']?></td></tr>
		    	    <tr><td>User Control </td>
                            <td>
                                <?php
                                    if($user['USR_CNRL_ADMN']==99){
                                        echo "Administrator";
                                    }else{
                                        echo '<select name="USR_CNRL">
                                        <option value="3" '.$user["USR_CNRL_PL"] .'>Petugas Loket</option>
                                        <option value="4" '.$user["USR_CNRL_KPP"].'>Kasubid Pelayanan dan Pendaftaran</option>
                                        <option value="5" '.$user["USR_CNRL_KPel"].'>Kabid Pelayanan</option>
                                        <option value="6" '.$user["USR_CNRL_KPeng"].'>Kabid Pengolahan</option>
                                        <option value="7" '.$user["USR_CNRL_KVP"].'>Kasubid Verifikasi dan Pemrosesan</option>
                                        <option value="14" '.$user["USR_CNRL_BO"].'>Back Office</option>
                                        <option value="8" '.$user["USR_CNRL_KPDI"].'>Kasubid Penetapan dan Dokumentasi Izin</option>
                                        </select>';
                                    }
                                ?>
                            </td></tr>
		    	</table>
	    	    <input type="Submit" value="Simpan" />
    	    </form>
    </div> <!-- end of box-content -->
</div>

</body>
</html>
