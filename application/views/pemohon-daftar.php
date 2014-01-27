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
<h3>Daftar Pemohon</h3>
    <div class="box-content">
    	    <form method="POST" action="<?=$base_url?>index.php/c_pemohon/<?=$path?>">
    	    	<table class="table table-bordered">
                    <tr><td width="250px">Nama Lengkap</td><td> <input type="text" name="PMH_NM__" value="<?=$pemohon['PMH_NM__']?>" class="span12"/></td></tr>
		    	    <tr><td>Tempat Lahir </td><td> <input type="text" name="PMH_TMLH" value="<?=$pemohon['PMH_TMLH']?>" class="span12"/></td></tr>
		    	    <tr><td>Tanggal Lahir </td><td> <?=$kalender?><br/></td></tr>
		    	    <tr><td>Jenis Kelamin </td><td> 
		    	    		<select name="PMH_JNS_">
		    	    			<option value="L" <?=$pemohon['PMH_JNSL']?>>Laki-Laki</option>
		    	    			<option value="P" <?=$pemohon['PMH_JNSP']?>>Perempuan</option>
		    	    		</select><br/>
		    	    	</td></tr>
                            <tr><td>Alamat </td><td><textarea name="PMH_AAA_" class="span12 form-control" rows="5"><?=$pemohon['PMH_AAA_']?></textarea></td></tr>
		    	    <tr><td>Telephone </td><td><input type="text" name="PMH_TLP_" value="<?=$pemohon['PMH_TLP_']?>" class="span12"/></td></tr>
		    	    <tr><td>Pekerjaan </td><td><input type="text" name="PMH_PKRA" value="<?=$pemohon['PMH_PKRA']?>" class="span12"/></td></tr>
		    	    <tr><td>NO. KTP/SIM/PASSPORT </td><td><input type="text" name="PMH_NO__" value="<?=$pemohon['PMH_NO__']?>" class="span12"/></td></tr>
		    	    <tr><td>NPWP </td><td><input type="text" name="PMH_NPWP" value="<?=$pemohon['PMH_NPWP']?>" class="span12"/></td></tr>
		    	    <tr><td>Nama Perusahaan </td><td><input type="text" name="PMH_PRSH" value="<?=$pemohon['PMH_PRSH']?>" class="span12"/></td></tr>
	    	    </table>
	    	    <input type="Submit" value="Simpan" />
    	    </form>
    </div> <!-- end of box-content -->
</div>

</body>
</html>
