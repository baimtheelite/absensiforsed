<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Berhasil!</title>
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
    <script src="<?php echo base_url("resources/js/jquery-3.3.1.js"); ?>"></script>
    <link rel="icon" href="<?php echo base_url('resources/favicon/forsed.jpg') ;?>">
</head>
<body>
	<div class="container">
		<div class="jumbotron bg-success text-light">
			<h2>Anggota berhasil ditambahkan!</h2>
			<p>Berikut anggota yang sudah didaftarkan menjadi anggota pengajian rutin Sektor 2 BPA</p>
		</div>
	<table class="table">
		<tr>
			<td><h5>Nama: </h5></td>
			<td><h5><?= $nama; ?></h5></td>
		</tr>
		<tr>
			<td><h5>Alamat: </h5></td>
			<td><h5><?= $alamat; ?></h5></td>
		</tr>
		<tr>
			<td><h5>Nomor Telepon: </h5></td>
			<td><h5><?= $notelp; ?></h5></td>
		</tr>
	</table>
	<a class="btn" href="<?= site_url('absensi/pendaftaran'); ?>">Halaman Pendaftaran</a>
	<a class="btn" href="<?= site_url('absensi'); ?>">Halaman Utama</a>
	</div>
</body>
</html>