<html>
<head>
	<title>malasngoding.com</title>
</head>
<body>
<form action="<?php echo base_url(); ?>upload/aksi_upload/" method="post" enctype="multipart/form-data">
	<center><h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1></center>
	<?php echo $error;?>

	
 
	<input type="file" name="foto" />
 
	<br /><br />
 
	<input type="submit" value="upload" />
 
</form>
 
</body>
</html>