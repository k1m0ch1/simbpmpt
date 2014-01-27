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
<h3>Pengguna</h3>
    <div class="box-content">
        <a href='<?=$base_url?>index.php/c_user/create' class="btn btn-primary" title="Buat Baru"><i class="icon-plus icon-white"></i></a>
        <form action='<?=$base_url?>index.php/c_user/index/0/100' method='POST'>
            <select name='field'>
              <option value='USR_NMLN'>Nama Lengkap</option>
              <option value='USR_JBTN'>Jabatan</option>
              <option value='USR_NIP_'>NIP</option>
              <option value='PMH_NPWP'>NIP</option>
            </select>
            <input type='text' name='cari'/>
            <input type='submit' value='cari' />
          </form>            
        <hr />
    <div class="alert">
      <?=$peringatan?>

      <table class="table table-bordered table-striped table-condensed" width="100%">
      <thead>
    <tr>
      <td>No.</td>
      <td>Nama Lengkap</td>
      <td>Jabatan</td>
      <td>Username</td>
      <td>User Control</td>
      <td>Aksi</td>
    </tr>
    </thead>
    <?=$isi?>
      </thead>
    </table>   
    <?=$pagination?>
    </div>
    </div> <!-- end of box-content -->
</div>

</body>
</html>
