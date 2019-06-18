<?php
if($this->session->userdata('email')==null){
  ?>
  <script>
   alert("login gagal3");
  </script
  <?php
  redirect($home."welcome/");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IKA UB</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3">
    </div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
          <b>Order ID:</b> <?php echo $id_pembayaran ?><br>
              <hr>
      </div>
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-6">
          Dari
          <address>
            <strong>Ikatan Alumni UB</strong><br>
            Jl. Veteran No. 16A<br>
            Malang, 65113<br>
            Phone: (0341) 561-945<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          Kepada
          <address>
            <strong><?php echo $namaAlumni ?></strong><br>
            <span><?php echo $alamatPengirim ?></span><br>
			Kode POS: <span><?php echo $kodePos ?></span><br>
            Phone: <span><?php echo $noHp ?></span><br>
          </address>
        </div>
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Jumlah</th>
              <th>Produk</th>
              <th>Deskripsi</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Kartu Alumni</td>
              <td>Kartu Alumni Universitas Brawijaya <span><?php echo $strataPendidikan ?></span></td>
              <td>Rp. <span><?php echo $hargaKartu ?></span>,-</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>

      <div class="row">
        <div class="box-body">
        <div class="col-xs-6">
        Pembayaran Berhasil Dikonfirmasi!
        <b>LUNAS</b>
		<img src="<?php echo base_url(); ?>/assets/images/lunas.png" class="btn" alt="btn" width="50%">
        </div>
        <!-- /.col -->
        <div class="row">
        <div class="box-body">
        <div class="col-xs-6">
          <br><br>
          <div class="table-responsive">
            <table class="table" width="50%">
              <tr>
                <th style="width:60%" >Subtotal:</th>
                <td>Rp.<span><?php echo $hargaKartu ?></span>,-</td>
              </tr>
               <tr>
                <th>Biaya Pengiriman:</th>
                <td>Rp.<span><?php echo $hargaOngkir ?></span>,-</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp.<span><?php echo $hargaOngkir+$hargaKartu ?></span>,-</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
      </div>
        <!-- /.col -->
      </div>
    </section>
  <!-- /.content -->

<!-- ./wrapper -->
</body>
</html>
