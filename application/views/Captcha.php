
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Switch Login Form Flat Responsive Widget Template :: w3layouts</title>
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
	<style type="text/css">
		#captImg{float:left;}
		.refreshCaptcha {position:relative;top:27px;}
		form{float:left;width:100%;}
	</style>
	
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.refreshCaptcha').on('click', function(){
				$.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
					$('#captImg').html(data);
				});
			});
		});
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
</head>

<body>
    <h1 class="title-agile text-center">Login Kartu IKA</h1>
    <div class="content-w3ls">
        <div class="content-top-agile">
            <h2>sign up</h2>
        </div>
        <div class="content-bottom">
            <p>Submit the word you see below:</p>
			<p id="captImg"><?php echo $captchaImg; ?></p>
			<a href="<?php echo base_url().'captcha/'; ?>" class="refreshCaptcha" ><img src="<?php echo base_url().'assets/images/refresh.png'; ?>"/></a>
			<form method="post">
				<input type="text" name="captcha" value=""/>
				<input type="submit" name="submit" value="SUBMIT"/>
			</form>
			<ul class="list-login">
                    <li class="clearfix"></li>
                </ul>
        </div>
    </div>
    <div class="copyright text-center">
        <p>© 2018 Switch Login Form. All rights reserved | Design by
            <a href="http://w3layouts.com">W3layouts</a>
        </p>
    </div>
</body>
<!-- //Body -->

</html>