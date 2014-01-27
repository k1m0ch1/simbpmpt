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
    	    <form method="POST" action="<?=$base_url?>index.php/c_perizinan/<?=$path?>">
    	    	<table class="table table-bordered">
    	    		<tr><td width="200px">Nomor Resi</td><td><input type='text' value="<?=$perizinan['PRZ_NMRS']?>" name="PRZ_NMRS" disabled /><input type='hidden' value="<?=$perizinan['PRZ_NMRS']?>" name="PRZ_NMRS" /></td></tr>
    	    		<tr><td>Jenis Perizinan</td><td><?=$perizinan['JNS_NMJN']?> <input type="hidden" name="JNS_ID__" value="<?=$perizinan['JNS_ID__']?>"/> </td></tr>
		    	    <tr><td>Pemohon</td><td><?=$perizinan['PMH_ID__']?><br/></td></tr>
		    	    <tr><td>Nama Perusahaan</td><td><input type='text' value="<?=$perizinan['PRZ_NMPR']?>" name='PRZ_NMPR' class="span12"/></td></tr>
                            <tr><td>Alamat Perusahaan</td><td><textarea name="PRZ_AAPR" class="form-control span12" rows="5"><?=$perizinan['PRZ_AAPR']?></textarea></td></tr>
		    	    <tr><td>Jenis Perusahaan</td><td>
		    	    		<select name="PRZ_JNPR">
		    	    			<option value="Perusahaan (PT.)" <?=$perizinan['PRZ_JNPR_PT']?>>Perusahaan (PT.)</option>
		    	    			<option value="Perorangan (CV.)" <?=$perizinan['PRZ_JNPR_CV']?>>Perorangan (CV.)</option>
		    	    		</select>
		    	    	</td>
                            </tr>
		    	    <tr><td>Nama Penanggung Jawab</td><td><input type="text" name="PRZ_NMPJ" value="<?=$perizinan['PRZ_NMPJ']?>" class="span12"/></td></tr>
                            <tr><td>Jabatan</td><td><input type="text" name="PRZ_JBT_" value="<?=$perizinan['PRZ_JBT_']?>" class="span12"/></td></tr>
                    <tr><td colspan=2><?=$perizinan['PRZ_PRA_']?></td></tr>
	    	    </table>
	    	    <input type="Submit" value="Simpan" />
    	    </form>
    </div> <!-- end of box-content -->
</div>

</body>
</html>















