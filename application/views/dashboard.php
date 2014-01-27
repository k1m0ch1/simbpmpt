<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SIMBPMPT</title>

<link rel="stylesheet" href="<?php $base_url; ?>css/style.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?php $base_url; ?>css/bootstrap.css" type="text/css" media="screen" title="default" />

</head>
    
<body id="login-bg"> 
	
<div id="login-holder" style="margin-top:130px;">    
    <form action="<?=$base_url?>index.php/dashboard/login" method="POST" class="form-signin">				        
        <img src="<?php $base_url; ?>img/logo.png" />    
        <hr />
        <input type="text"  name="USR_UENM" class="input-block-level" placeholder="Username"/>                    
        <input type="password" name="USR_PSWR" class="input-block-level" placeholder="Password"/>
        <input class="btn btn-medium btn-success" type="submit" name="login" value="Login"/>
    </form>
</div>   
</div>
</body>                        
</html>