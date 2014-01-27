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
<h3>Jenis Perizinan</h3>
    <div class="box-content">
    	    <form method="POST" action="<?=$base_url?>index.php/c_jenisPerizinan/<?=$path?>">
    	    	<table class="table table-bordered">
    	    		<tr><td width="200px">Nama Jenis Perizinan </td><td><input type="text" name="JNS_NMJN" value="<?=$jenis_perizinan['JNS_NMJN']?>" class="span12"/></td></tr>
		    	    <tr><td>Kode Jenis Izin </td><td><input type="text" name="JNS_KDJN" value="<?=$jenis_perizinan['JNS_KDJN']?>" class="span12"/></td></tr>
		    	    <tr><td>Kategori Jenis</td>
                                <td>
		    	    		<select name="JNS_KTGR">
		    	    			<option value="Retribusi" <?=$jenis_perizinan['JNS_KTGR_R']?>>Retribusi</option>
		    	    			<option value="Non Retribusi" <?=$jenis_perizinan['JNS_KTGR_NR']?>>Non Retribusi</option>
		    	    		</select>
		    	    	</td>
                            </tr>
		    	    <tr><td>Keterangan Jenis Izin </td><td><input type="text" name="JNS_KTRG" value="<?=$jenis_perizinan['JNS_KTRG']?>" class="span12"/></td></tr>
	    	    </table>
	    	    <input type="Submit" value="Simpan" />
    	    </form>
    </div> <!-- end of box-content -->
</div>
</body>
</html>















