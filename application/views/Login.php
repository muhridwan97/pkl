<?php
if(isset($gagal)){
	?>
	<script>
	 alert("login gagal2");
	</script>
	<?php
}

?>
<?php
if(isset($sukses)){
	?>
	<script>
	 alert("Registrasi Berhasil");
	</script>
	<?php
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Switch Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //fonts -->
    <!-- Font-Awesome-File-Links -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.css" type="text/css" media="all">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/images/iconUb.jpeg">
</head>

<body>
    <h1 class="title-agile text-center">Login Kartu IKA</h1>
    <div class="content-w3ls">
        <div class="content-top-agile">
            <h2>Log in</h2>
        </div>
        <div class="content-bottom">
            <form action="<?php echo base_url(); ?>login/alumni" method="post">
                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="email" id="text1" type="text" value="" placeholder="Email" required>
                    </div>
                </div>
                <div class="field-group">
                    <span class="fa fa-lock" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="password" id="password" type="Password" placeholder="password" required>
                    </div>
                </div>
                <ul class="list-login">
                    
                    <li>
                        Belum punya akun? <a href="<?php echo base_url(); ?>registrasi" class="text-right" style = "color:red">daftar di sini</a>
                    </li>
                    <li class="clearfix"></li>
                </ul>
                <div class="wthree-field">
                    <input id="saveForm" name="saveForm" type="submit" value="log in" />
                </div>
            </form>
        </div>
    </div>
    <div class="copyright text-center">
        <p>© 2018 IKA Universitas Brawijaya 
        </p>
    </div>
</body>
<!-- //Body -->

</html>