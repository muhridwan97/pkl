<html>
<head>
	<title>malasngoding.com<</title>
</head>
<body>
 
	<center><h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1></center>
 
	<ul>
		<?php
		//unset($upload_data['file_name']);
		foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
		<li><?php print_r($upload_data);?></li>
		<?php echo $upload_data['full_path'];
				  ?>
		
	</ul>	
 
</body>
</html>