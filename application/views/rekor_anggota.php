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
</head>
<body>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="<?=site_url(); ?>"><i class="icon-list-ol"></i><span>Absensi</span> </a> </li>
        <li><a href="<?php echo site_url('Absensi/daftar_anggota');?>"><i class="icon-user"></i><span>List Anggota</span> </a> </li>
        <li class="active"><a href="<?php echo site_url('Absensi/rekor_presensi');?>"><i class="icon-book"></i><span>Rekor Absensi Anggota</span> </a> </li>
        <li><a href="#pendaftaran" data-toggle="modal" data-target="#myModal"><i class="fa fa-address-card"></i><span>Pendaftaran</span>
</a></li>
       <!-- <li> <a href="<?php /*echo site_url('Absensi/pendaftaran'); */?>"><i class="fa fa-address-card"></i><span>Pendaftaran</span></a> </li> -->
      </ul>
    </div>
  </div>
</div>
	<div class="jumbotron">
		<h1 class="text-center">Rekor Absensi Anggota</h1>
		<p class="text-center">Pengajian Rutin Remaja Sektor 2 BPA</p>
      <a class="btn btn-info" href="<?= site_url(); ?>">Kembali</a>
	</div>
	<div class="container-fluid">
		<div class="row">
        <div class="col-lg-6">
            <div class="card " style="padding: 8px;">
            	<div class="card-header bg-primary">
		            <h2 class="text-center text-light">Rekor Anggota</h2>
		        </div>
		        <div class="card-body">
	            <h2 class="text-info"><?php echo $nama; ?></h2>            
	               <table class="table small">
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
        <div class="card" style="margin-top: 20px;">
        	<div class="card-header bg-primary text-light text-center">
        		<h2>Rekor Berdasarkan Tanggal</h2>
        	</div>
        	<div id="rekortanggal" class="card-body">
           <table class="table small">
           		<thead>
           			<th>Pertemuan</th>
           			<th>Tanggal</th>
           			<th>Muhadir</th>
           			<th></th>
           		</thead>
           		<tbody>
           			<?php $no = 1; ?>
           			<?php foreach ($rekortgl as $rekor) {?>
           			<tr>
           				<td><?=$no; ?>.</td>
           				<td><?=$rekor['tanggal']; ?></td>
           				<td><?=$rekor['muhadir']; ?></td>
           				<td><a class="btn btn-primary" href="<?=base_url('Absensi/rekor_tanggal/').$rekor['id_tgl']; ?>">Lihat</a></td>
           			</tr>
           			<?php $no++; ?>
           			<?php } ?>
           		</tbody>
           </table>
       </div>
    	</div>        
    	</div>
			<div class="col-lg-6">
			    <div id="rekoranggota" class="table-responsive">
					<table class="table table-hover text-center small">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>	
								<th>Jumlah Hadir</th>
								<th>Tanggal Daftar</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($data as $anggota) { ?>
								<tr>

									<td><?=$no.".";?></td>
									<td><?=$anggota['nama']; ?></td>
									<td><?=$anggota['Jumlah_Hadir']; ?></td>
									<td><?=$anggota['tanggal']?></td>
									<td><a class="btn btn-primary" href="<?php echo base_url().'index.php/Absensi/rekor_presensi/'.$anggota['id']; ?>">Lihat</a></td>
								</tr>
								<?php $no++; ?>
							<?php } ?>
						</tbody>
					</table>
    				</div>
    			</div>
    		</div>
    		
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