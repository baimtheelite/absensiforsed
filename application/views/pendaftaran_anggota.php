<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/js" src="<?php echo base_url("resources/js/jquery-3.3.1.js"); ?>"></script>
    <style type="text/css">
    </style>
</head>
<body class="bg-secondary">
	<div class="container bg-light" style="padding: 8px">
	    <div class="col-xs-12 col-sm-12">
		<div class="jumbotron">
			<h1 class="text-center">Pendaftaran Anggota</h1>
			<a class="btn btn-info" href="<?= site_url(); ?>">Kembali</a>
		</div>
		<form method="post" action="<?php echo site_url('Absensi/insert'); ?>">
		<div class="form-group">
		    <label for="Nama">Nama</label>
		    <input name="nama" type="text" class="form-control col-sm-4" id="nama" autofocus>
	  	</div>
	  	<div class="form-group">
		    <label for="alamat">Alamat</label><br>
		    <label class="radio-inline"><input type="radio" name="alamat" value="RT 01">RT 01</label>
		    <label class="radio-inline"><input type="radio" name="alamat" value="RT 02">RT 02</label>
		    <label class="radio-inline"><input type="radio" name="alamat" value="RT 03">RT 03</label>
	  	</div>
		<div class="form-group">
		    <label for="notelp">No Telp</label>
		    <input name="notelp" type="text" class="form-control col-sm-3" id="notelp">
	  	</div>  	
	  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	</div>
</body>
</html>