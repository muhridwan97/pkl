<?php
if($this->session->userdata('email')==null){
	?>
	<script>
	 alert("login gagal3");
	</script>
	<?php
	redirect($home."welcome/");
}
	if($error2=="berhasil" && $error=="berhasil")
	{
		?>
	<script>
	 alert("data berhasil disimpan");
	</script>
	<?php
	}
	if($error2=="berhasil" || $error=="berhasil"||$edit=="berhasil")
	{
		?>
	<script>
	 alert("data berhasil dirubah");
	</script>
	<?php
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
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/images/iconUb.jpeg">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>welcome/cliant_dashboard" class="navbar-brand"><b>Kartu</b>IKA</a>
          
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
         
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning count"></span>
              </a>
              <ul class="dropdown-menu notif">
                
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
         <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url(); ?>login/logout" > <i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url(); ?>assets/images/foto/<?php echo $this->session->userdata('fotoProfil')?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->session->userdata('user')?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>assets/images/foto/<?php echo $this->session->userdata('fotoProfil')?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('user')?>
                  </p>
                </li>
                <!-- Menu Body -->
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  
                </li>
              </ul>
            </li>
          </ul>
        </div>
		
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class= "text-center">
        Biodata
      </h1>
      
    </section>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3">
		</div>
		<div class="col-md-6">
          <!-- general form elements -->
    <!-- Main content -->
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Isi Biodata</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(); ?>biodata/set_biodata/" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama (Dengan gelar)</label>
                  <input type="text" class="form-control" id="nama" value="<?php echo $namaAlumni ?>" name="nama" placeholder="Masukkan nama" required>
                </div>
				<div class="form-group">
                  <label >NIM</label>
                  <input type="number_format" class="form-control" id="nim" value="<?php echo $nim ?>" name="nim" placeholder="Masukkan NIM" required>
                </div>
				<div class="form-group">
                  <label >Tempat lahir</label>
                  <input type="text" class="form-control" id="tempatLahir" value="<?php echo $tempatLahir ?>" name="tptLahir" placeholder="Masukkan tempat lahir" required>
                </div>
				<div class="form-group">
				<label>Tanggal lahir <span style="color:grey;">(12/31/1990)</span>:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right"  value="<?php echo $tanggalLahir ?>" id="datepicker" name="tglLahir" required>
                </div>
				</div>
				<div class="form-group">
				<label>
                  Jenis kelamin
                </label>
				<br></br>
                  <input type="radio" name="jenisKelamin" class="minimal" value="Pria" <?php if($jenisKelamin=="Pria") {echo "checked";}?> required>
				<label>
                  Pria
                </label>
                  <input type="radio" name="jenisKelamin" class="minimal" value="Wanita" <?php if($jenisKelamin=="Wanita") {echo "checked";}?> required>
                <label>
                  Wanita
                </label>
              </div>
				<div class="form-group">
                <label>Golongan darah</label>
                <select name ="golonganDarah" value ="A" class="form-control select" style="width: 100%;" required>
                  <option <?php if($golonganDarah=="A") {echo "selected";}?>>A</option>
                  <option <?php if($golonganDarah=="B") {echo "selected";}?>>B</option>
                  <option <?php if($golonganDarah=="O") {echo "selected";}?>>O</option>
                  <option <?php if($golonganDarah=="AB") {echo "selected";}?>>AB</option>
                </select>
              </div>
			  <div class="form-group">
                <label>Strata pendidikan</label>
                <select id="strataPendidikan" name ="strataPendidikan" value ="S1" class="form-control select" style="width: 100%;" required>
                  <option <?php if($strataPendidikan=="S1") {echo "selected";}?>>S1</option>
                  <option <?php if($strataPendidikan=="S2") {echo "selected";}?>>S2</option>
                  <option <?php if($strataPendidikan=="S3") {echo "selected";}?>>S3</option>
                  <option <?php if($strataPendidikan=="D1") {echo "selected";}?>>D1</option>
				  <option <?php if($strataPendidikan=="D2") {echo "selected";}?>>D2</option>
				  <option> <?php if($strataPendidikan=="D3") {echo "selected";}?>D3</option>
                </select>
              </div>
			  <div class="form-group">
                <label>Fakultas</label>
                <select  id="fakultas" name ="fakultas" class="form-control select" style="width: 100%;" required>
				<option <?php if($fakultas!=null) {echo "selected";}?> value="<?php echo $fakultas_id; ?>" ><?php echo $fakultas ?></option>
				<?php
					if($fakultas==null) {
				?>
					<option ><?php echo "----pilih----" ?></option>
					<?php
					}
				?>
					
                  <?php foreach($listFakultas as $f){
					  if($fakultas!=$f->fakultas_nama){
				  ?>
				  <option value="<?php echo $f->fakultas_id; ?>" ><?php echo $f->fakultas_nama; ?></option>
				  
                  <?php
					  }
				  }
				  ?>
                </select>
              </div>
			  <div class="form-group">
                <label>Jurusan</label>
                <select id="jurusan" name ="jurusan" class="form-control select" style="width: 100%;" required>
				<option <?php if($jurusan!=null) {echo "selected";}?> value="<?php echo $jurusan_id; ?>"><?php echo $jurusan ?></option>
                </select>
              </div>
			  <div class="form-group">
                <label>Program Study</label>
                <select id="programStudi" name ="programStudi" class="form-control select" style="width: 100%;" required>
                  <option <?php if($programStudi!=null) {echo "selected";}?> value="<?php echo $programStudi_id; ?>"><?php echo $programStudi ?></option>
                </select>
              </div>
			  <div class="form-group">
				<label>Tanggal lulus <span style="color:grey;">(12/31/1990)</span>:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right"  value="<?php echo $tglLulus ?>" id="datepicker2" name="tglLulus" required>
                </div>
				</div>
				<div class="form-group">
                  <label >Tempat Kerja (Jika sudah bekerja)</label>
                  <input type="text" class="form-control" id="tptKerja" value="<?php echo $tptKerja ?>" name="tptKerja" placeholder="Masukkan tempat kerja">
                </div>
				 <div class="form-group">
				<label>Tanggal mulai kerja (Jika sudah bekerja) <span style="color:grey;">(12/31/1990)</span>:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right"  value="<?php echo $tglKerja ?>" id="datepicker3" name="tglKerja">
                </div>
				</div>
			  <div class="form-group">
                  <label>Alamat asal</label>
                  <textarea name="alamat" class="form-control" rows="3"  placeholder="Masukkan ..." required><?php echo $alamat ?></textarea>
                </div>
			  <div class="form-group">
                <label>Nomer Telpon:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name = "noTelpon" value="<?php echo $noTelepon ?>"
                         data-inputmask="'mask': ['(999) 999-9999', '(9999) 999-9999','(999) 999-99999']" data-mask required>
                </div>
                <!-- /.input group -->
              </div>
				<div class="form-group">
                <label>Nomer HP:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name = "noHp" value="<?php echo $noHp ?>"
                         data-inputmask="'mask': ['999-999-999-999', '+099 99 99 9999[9]']" data-mask required>
                </div>
                <!-- /.input group -->
              </div>
			  <input type="hidden" class="form-control" name = "email" value="<?php echo $email ?>" >
			  <input type="hidden" class="form-control" name = "password" value="<?php echo $password ?>" >
			  
                <div class="form-group">
                  <label for="exampleInputFile">Upload Foto Formal</label>
				  <p class="help-block"><?php if($error!=""){echo $error;}?></p>
				  <img src="<?php echo base_url(); ?>assets/images/foto/<?php echo $fotoProfil ?>" width="200px" height: "300px">
                  <input type="file" name = "foto" id="foto" >
                  <p class="help-block">Foto 3X4 ukuran kurang dari 3 MB.</p>
                </div>
				<div class="form-group">
                  <label for="exampleInputFile">Upload Scan Ijazah </label>
				  <p class="help-block"><?php if($error2!=""){echo $error2;}?></p>
				  <img src="<?php echo base_url(); ?>assets/images/foto/<?php echo $fotoIjazah ?>" width="200px" height: "300px">
                  <input type="file" value="" name = "fotoIjazah" id="fotoIjazah">

                  <p class="help-block">Ukuran foto kurang dari 3 MB.</p>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
		</div>
	</div>
	</section>
    <!-- /.content -->
	<input type="hidden" id="alumni-id" name = "alumni-id" value="<?php echo $this->session->userdata('id')?>" >
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2018 .</strong> IKA Universitas Brawijaya
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>/assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>/assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/assets/dist/js/demo.js"></script>
<script>
$(document).ready(function(){
 var id=$('#alumni-id').val();

 function load_unseen_notification(view = '')
 {
	 
  $.ajax({
   url:"<?php echo base_url('Notifikasi/fetch'); ?>",
   method:"POST",
   data:{view:view,id:id},
   dataType:"json",
   success:function(data)
   {
    $('.notif').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 

 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});



</script>

<script>

  $(function () {
	  
	  //pilihan fakultas
	$.ajaxSetup({
	type:"POST",
	url: "<?php echo base_url()?>biodata/ambil_data",
	cache: false,
	});

	$("#fakultas").change(function(){
	
	var value=$(this).val();
	if(value>0){
	$.ajax({
	data:{modul:'jurusan',id:value},
	success: function(respond){
	$("#jurusan").html(respond);
	}
	})
	}

	});
	
	$("#jurusan").change(function(){
	var strataPendidikan=$("#strataPendidikan").val();
	var value=$(this).val();
	if(value>0){
	$.ajax({
	data:{modul:'programStudi',id:value,strataPendidikan:strataPendidikan},
	success: function(respond){
	$("#programStudi").html(respond);
	}
	})
	}

	});
	
	$("#strataPendidikan").change(function(){
	var strataPendidikan=$(this).val();
	var value=$("#jurusan").val();
	if(value>0){
	$.ajax({
	data:{modul:'programStudi',id:value,strataPendidikan:strataPendidikan},
	success: function(respond){
	$("#programStudi").html(respond);
	}
	})
	}

	});
	  
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
	$('#datepicker2').datepicker({
      autoclose: true
    })
	$('#datepicker3').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
