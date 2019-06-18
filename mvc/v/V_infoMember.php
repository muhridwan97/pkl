<?php
if($this->session->userdata('username')==null){
	?>
	<script>
	 alert("login gagal");
	</script
	<?php
	redirect($home."adminika/");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Kartu IKA UB</title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/images/iconUb.jpeg">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url(); ?>adminika/" class="logo">
      <span class="logo-mini"><b>I</b>KA</span>
      <span class="logo-lg"><b>Admin</b> KartuIKA</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url(); ?>login/logoutAdmin" >KELUAR <i class="fa fa-power-off"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("username"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<li ><a href="<?php echo base_url(); ?>adminika/"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a></li>
		<li><a href="<?php echo base_url(); ?>adminika/notifikasi/"><i class="fa fa-envelope"></i> <span>NOTIFIKASI</span>
			<span class="pull-right-container">
              
            </span></a></li>
		<li class="active" class="treeview">
          <a href="#">
            <i  class="fa fa-users"></i> <span>MEMBER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active" ><a href="<?php echo base_url(); ?>adminika/lihat/">Lihat Member</a></li>
            <li><a href="<?php echo base_url(); ?>adminika/memberMembayar/">Telah Membayar</a></li>
			<li ><a href="<?php echo base_url(); ?>adminika/memberTerkirim/">Telah Terkirim</a></li>
          </ul>
        </li>
		
       </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Detail Alumni
        <small>Kartu IKA Universitas Brawijaya</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>adminika/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Member</a></li>
		<li><a href="<?php echo base_url(); ?>adminika/lihat/">Lihat Member</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
	<section class="content">
	  <div class="row">
	  <div class="col-md-3">
		</div>
        <div class="col-md-6">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Alumni</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama </label>
                  <input type="text" class="form-control" id="nama" value="<?php echo $namaAlumni ?>" name="nama" placeholder="Masukkan nama" disabled>
                </div>
				<div class="form-group">
                  <label >Email</label>
                  <input type="number_format" class="form-control" id="email" value="<?php echo $email ?>" name="nim" placeholder="Masukkan NIM" disabled>
                </div>
				<div class="form-group">
                  <label >NIM</label>
                  <input type="number_format" class="form-control" id="nim" value="<?php echo $nim ?>" name="nim" placeholder="Masukkan NIM" disabled>
                </div>
				<div class="form-group">
                  <label >Tempat lahir</label>
                  <input type="text" class="form-control" id="tempatLahir" value="<?php echo $tempatLahir ?>" name="tptLahir" placeholder="Masukkan tempat lahir" disabled>
                </div>
				<div class="form-group">
				<label>Tanggal lahir:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right"  value="<?php echo $tanggalLahir ?>" id="datepicker" name="tglLahir" disabled>
                </div>
				</div>
				<div class="form-group">
				<label>
                  Jenis kelamin
                </label>
				<br></br>
                  <input type="radio" name="jenisKelamin" class="minimal" value="Pria" <?php if($jenisKelamin=="Pria") {echo "checked";}?> disabled>
				<label>
                  Pria
                </label>
                  <input type="radio" name="jenisKelamin" class="minimal" value="Wanita" <?php if($jenisKelamin=="Wanita") {echo "checked";}?> disabled>
                <label>
                  Wanita
                </label>
              </div>
				<div class="form-group">
                <label>Golongan darah</label>
                <select  name ="golonganDarah" value ="A" class="form-control select" style="width: 100%;" disabled >
                  <option <?php if($golonganDarah=="A") {echo "selected";}?>>A</option>
                  <option <?php if($golonganDarah=="B") {echo "selected";}?>>B</option>
                  <option <?php if($golonganDarah=="O") {echo "selected";}?>>O</option>
                  <option <?php if($golonganDarah=="AB") {echo "selected";}?>>AB</option>
                </select>
              </div>
			  <div class="form-group">
                <label>Strata pendidikan</label>
                <select id="strataPendidikan" name ="strataPendidikan" value ="S1" class="form-control select" style="width: 100%;" disabled>
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
                <select  id="fakultas" name ="fakultas" class="form-control select" style="width: 100%;" disabled>
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
                <select id="jurusan" name ="jurusan" class="form-control select" style="width: 100%;" disabled>
				<option <?php if($jurusan!=null) {echo "selected";}?> value="<?php echo $jurusan_id; ?>"><?php echo $jurusan ?></option>
                </select>
              </div>
			  <div class="form-group">
                <label>Program Study</label>
                <select id="programStudi" name ="programStudi" class="form-control select" style="width: 100%;" disabled>
                  <option <?php if($programStudi!=null) {echo "selected";}?> value="<?php echo $programStudi_id; ?>"><?php echo $programStudi ?></option>
                </select>
              </div>
			  <div class="form-group">
                  <label>Alamat asal</label>
                  <textarea disabled name="alamat" class="form-control" rows="3"  placeholder="Masukkan ..."><?php echo $alamat ?></textarea>
                </div>
			  <div class="form-group">
                <label>Nomer Telpon:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name = "noTelpon" value="<?php echo $noTelepon ?>" disabled
                         data-inputmask="'mask': ['(999) 999-9999', '(9999) 999-9999','(999) 999-99999']" data-mask>
                </div>
                <!-- /.input group -->
              </div>
				<div class="form-group">
                <label>Nomer HP:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name = "noHp" value="<?php echo $noHp ?>" disabled
                         data-inputmask="'mask': ['999-999-999-999', '+099 99 99 9999[9]']" data-mask>
                </div>
                <!-- /.input group -->
              </div>
			  
                <div class="form-group">
                  <label for="exampleInputFile">Foto Formal</label>
				  <p class="help-block"><?php if($error!=""){echo $error;}?></p>
				  <img src="<?php echo base_url(); ?>assets/images/foto/<?php echo $fotoProfil ?>" width="200px" height: "300px">
                </div>
				<div class="form-group">
                  <label for="exampleInputFile">Scan Ijazah </label>
				  <p class="help-block"><?php if($error2!=""){echo $error2;}?></p>
				  <img src="<?php echo base_url(); ?>assets/images/foto/<?php echo $fotoIjazah ?>" width="200px" height: "300px">
                </div>
                
              </div>
              <!-- /.box-body -->

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.1
    </div>
    <strong>&copy; 2018 DEVELOPED BY <a href="<?php echo base_url(); ?>">IKA UB</a>.</strong> ALL RIGHTS RESERVED.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/assets/dist/js/demo.js"></script>
<!-- page script -->
<script>



  $(function () {
	  
	  $.ajaxSetup({
	type:"post",
	cache:false,
	dataType: "json"
	})
	
	$(document).on("click",".hapus-member",function(){
	var id=$(this).attr("data-id");
	var nama=$(this).attr("data-nama");
	swal({
		title: "Hapus "+ nama +" sebagai Member",
		text:"Yakin akan menghapus member ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo base_url('adminika/hapus'); ?>",
			data:{id:id},
			success: function(){
				$("tr[data-id='"+id+"']").fadeOut("fast",function(){
					$(this).remove();
				});
			}
		 });
	});
});
	  
	  
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
