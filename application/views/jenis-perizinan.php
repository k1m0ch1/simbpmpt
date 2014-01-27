<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=$base_url?>css/style.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?=$base_url?>css/bootstrap.css" type="text/css" media="screen" title="default" />

<script type="text/javascript" src="<?=$base_url?>js/bootstrap.js"></script>
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
        <a href='<?=$base_url?>index.php/c_jenisPerizinan/create' title="Buat Baru" class="btn btn-primary"><i class="icon-plus icon-white"></i></a>
        <br/>
        <form action='<?=$base_url?>index.php/c_jenisPerizinan/index/0/100' method='POST'>
          <select name='field'>
            <option value='JNS_NMJN'>Nama Jenis Perizinan</option>
            <option value='JNS_KDJN'>Kode Jenis Izin</option>
            <option value='JNS_KTGR'>Kategori Jenis</option>
            <option value='JNS_KTRG'>Keterangan Jenis Izin</option>
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
      <td>Nama Jenis Perizinan</td>
      <td>Kode Jenis Izin</td>
      <td>Kategori Jenis</td>
      <td>Keterangan Jenis Izin</td>
      <td>Aksi</td>
    </tr>
    </thead>
    <?=$isi?>
      </thead>
    </table>
    <?=$pagination?><br/>
    
    </div>
    </div> <!-- end of box-content -->
</div>

</body>
</html>
