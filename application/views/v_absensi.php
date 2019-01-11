<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
    <script src="<?php echo base_url("resources/js/jquery-3.3.1.js"); ?>"></script>
    <link href="<?php echo base_url('resources/css/font-awesome.css') ;?>" rel="stylesheet">
    <link href="<?php echo base_url('resources/css/style.css') ;?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/w3-colors-win8.css')?>">   
 
    <script>
      $(document).ready(function(){
        $("#tabel").css('opacity', '0.5');
        $("#pass").hide();
        var date = $("#date").val();

        var countChecked = function(){
         var n =  $('.hadir:radio:checked').length;
         var m = $('.alpha:radio:checked').length;
        
        $("#hadir").text(n);
          $("#alpha").text(m);
          };

          countChecked();
          $("input[type=radio]").on("click", countChecked);

         $("#date").click(function(){
            $("#tabel").css('opacity', '1.0');
            $("#kirim, input[type='radio']").removeAttr('disabled');
            $("#tgl").fadeOut()
         });
         
         $("#admin").click(function(){
             $("#pass").slideToggle();
         })
      });
    </script>
</head>
<body>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="<?=site_url(); ?>"><i class="icon-list-ol"></i><span>Absensi</span> </a> </li>
        <li><a href="<?php echo site_url('Absensi/daftar_anggota');?>"><i class="icon-user"></i><span>List Anggota</span> </a> </li>
        <li><a href="<?php echo site_url('Absensi/rekor_presensi');?>"><i class="icon-book"></i><span>Rekor Absensi Anggota</span> </a> </li>
        <li><a href="#pendaftaran" data-toggle="modal" data-target="#myModal"><i class="fa fa-address-card"></i><span>Pendaftaran</span>
</a></li>
       <!-- <li> <a href="<?php /*echo site_url('Absensi/pendaftaran'); */?>"><i class="fa fa-address-card"></i><span>Pendaftaran</span></a> </li> -->
      </ul>
    </div>
  </div>
</div>
  <div class="container">
    <div class="row" style="margin-top: 16px;">
      <div class="col-lg-12">
        <form method="post" action="<?php echo base_url().'index.php/Absensi/presensi' ?>">
          <input type="hidden" name="tgl_rekor" value="<?=$max; ?>">
          <div id='title' class="text-center">
            <h2>Absensi Anggota</h2>
            <p>Isi daftar hadir anggota pengajian rutin remaja dibawah ini</p>
          </div>
            <h3 id="tgl" class="text-info">Isikan tanggal terlebih dahulu!</h3>
            <div class="form-row form-group">
                <div class="col-lg-6">
                            <label>Tanggal Pertemuan:</label><input class="form-control" id="date" type="date" name="tanggal" required="">
                        </div>
                        <div class="col-lg-6">
                            <label>Muhadir:</label><input class="form-control form-text" type="text" name="muhadir" placeholder="Isikan Nama Muhadir" required="">
                        </div>
                    </div>
        <table id="tabel" class="table text-center">
          <?php $no=1; ?>
          <thead>
            <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">Nama</th>
            <th colspan="2">Kehadiran</th>
          </tr>
          <tr>
            <td>Hadir</td>
            <td>Tidak Hadir</td>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $anggota) { ?>
              <tr>
                <td><?=$no; ?></td>
                <td><?=$anggota['nama'];?></td>
                <?="<td><input class='hadir' type='radio' name='hadir[".$anggota['id']."]' value='Hadir' checked disabled></td>"; ?>
                <?="<td><input class='alpha' type='radio' name='hadir[".$anggota['id']."]' value='Alpha' disabled></td>"; ?>
              </tr>
              <?php $no++; ?> 
            <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
          <div class="row">
      <div class="col-lg-4 col-sm-4">
        
      </div>
      <div class="col-lg-4 col-sm-4 text-center">
      <div class="card" style="padding: 16px;">
        <div class="card-body">
          <span class="text-success">Hadir</span> : <span id="hadir"></span><br>
          <span class="text-danger">Alpha</span> : <span id="alpha"></span>
        </div>
      </div>
    </div>
      <div class="col-lg-4 col-sm-4">
        
      </div>
    </div>
        <button id="kirim" type="submit" class="btn btn-primary" onclick="return confirm('Apakah data Absensi sudah benar?')" disabled>Kirim</button>
      </form>
       
    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Pendaftaran Anggota</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form method="post" action="<?php echo site_url('Absensi/insert'); ?>">
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama" autofocus>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label><br>
            <label class="radio-inline"><input type="radio" name="alamat" value="RT 01">RT 01</label>
            <label class="radio-inline"><input type="radio" name="alamat" value="RT 02">RT 02</label>
            <label class="radio-inline"><input type="radio" name="alamat" value="RT 03">RT 03</label>
          </div>
        <div class="form-group">
            <label for="notelp">No Telp</label>
            <input name="notelp" type="text" class="form-control" id="notelp">
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

  </div>
</body>
</html>

