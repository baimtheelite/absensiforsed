<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url("resources/js/jquery-3.3.1.js"); ?>"></script>
    <link rel="icon" href="<?php echo base_url('resources/favicon/forsed.jpg') ;?>">
    <style type="text/css">
    #ubah{
        color: blue;
    }
    #ubah:hover{
        text-decoration: underline;
        cursor: pointer;
    }
    </style>
    <script>
    $(document).ready(function(){
      $("#kirim").hide();
        $("#ubah").click(function(){
            $('.enable').removeAttr('disabled');
            $("#kirim").fadeIn('fast');
            $(this).fadeOut('fast');
        });
    });
    </script>
</head>
<body class="bg-secondary">
	<div class="container bg-light" style="padding: 16px">
		<div class="jumbotron">
			<h1 id="">Profil Anggota</h1>
		</div>
        <div class="row">
            <div class="col-lg-6">
                <div class="text-center">
                    <img class="rounded-circle" src="<?= base_url('uploads/'. $foto); ?>" alt="">
                </div>
                <?= form_open_multipart('Absensi/update') ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input name="nama" type="text" class="form-control col-sm-7 enable" id="nama" value="<?=$nama; ?>"disabled>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label><br>
                    <label class="radio-inline"><input class="enable" type="radio" name="alamat" value="RT 01" disabled<?php echo set_radio('alamat', 'RT 01', ($alamat == "RT 01")? true : false); ?>>RT 01</label>
                    <label class="radio-inline"><input class="enable" type="radio" name="alamat" value="RT 02" disabled<?php echo set_radio('alamat', 'RT 02', ($alamat == "RT 02")? true : false); ?>>RT 02</label>
                    <label class="radio-inline"><input class="enable" type="radio" name="alamat" value="RT 03" disabled<?php echo set_radio('alamat', 'RT 03', ($alamat == "RT 03")? true : false); ?>>RT 03</label>
                </div>
                <div class="form-group">
                    <label for="notelp">No Telp</label>
                    <input name="notelp" type="text" class="form-control col-sm-5 enable" id="notelp" value="<?=$notelp; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="foto">Upload Foto</label>
                    <?= form_upload('foto', NULL,'class="form-control enable" id="foto" disabled') ?>
                </div>      
                    <button id="kirim" type="submit" class="btn btn-primary enable" disabled>Submit</button> &nbsp;
                    <span id="ubah">Ubah Data?</span>  
                </form>
                <a class="btn btn-info" href="<?= site_url('Absensi/daftar_anggota'); ?>" style="margin-top: 32px">Kembali</a>         
             </div>
        <div class="col-lg-6">
            <h2 class="text-center">Absensi</h2>            
               <table class="table">
                   <thead>
                        <th>Pertemuan</th>
                       <th>Tanggal</th>
                       <th>Kehadiran</th>
                   </thead>
                   <tbody>
                    <?php $no = 1; $hadir = 0; $alpha = 0 ?>
                    <?php foreach ($absensi as $rekord) { ?>
                       <?php if($rekord['hadir'] == "Alpha"){ ?>
                       <tr class="bg-danger text-light">
                            <td><?=$no.".";?></td>
                           <td><?=$rekord['tanggal'];?></td>
                           <td><?=$rekord['hadir'];?></td>
                       </tr>
                       <?php $alpha++; $no++; ?>
                       <?php }else{ ?>
                            <tr>
                            <td><?=$no.".";?></td>
                           <td><?=$rekord['tanggal'];?></td>
                           <td><?=$rekord['hadir'];?></td>
                       </tr>
                       <?php $hadir++; $no++; ?>
                        <?php } ?>
                    <?php } ?>
                   </tbody>
               </table>
               <span class="text-info">Hadir: <?=$hadir;?></span> &nbsp;  <span class="text-danger">Tidak Hadir: <?=$alpha;?></span> 
        </div>
    </div>
</div>
</body>
</html>
