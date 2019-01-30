<!DOCTYPE HTML>

<html>

    <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Absensi Pengajian</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('resources/css/w3-colors-win8.css'); ?>">
	<link rel="icon" href="<?php echo base_url('resources/favicon/forsed.jpg') ;?>">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script  src="<?php echo base_url("resources/js/bootstrap.js"); ?>"></script>

    <script  src="<?php echo base_url("resources/js/jquery-3.3.1.js"); ?>"></script>

    <style type="text/css">

    </style>

    </head>

    <body class="bg-secondary">

	<div class="container bg-white">

	    <div class="jumbotron">

	        <h1>Rekor Absensi Berdasarkan Tanggal</h1>

	        <p>

	            Pertemuan: <?= $pertemuan; ?> <br>

	            Tanggal: <?= $tanggal; ?><br><br>

    	        Muhadir: <?= $muhadir; ?>

	        </p>

	    </div>

	    <div class="pull-right" style="margin-bottom: 10px;">

	        <button id="ubah-absensi" class="btn btn-info">Ubah data absensi?</button>

	    </div>
	<?= form_open('Absensi/update/'.$pertemuan); ?>

	<?= form_hidden('idtgl', $pertemuan) ; ?>
	
	<table class="table">

		<thead>

			<th>No.</th>

			<th>Nama</th>

			<th>Kehadiran</th>

		</thead>

		<tbody>

			<?php $no = 1; $hadir = 0; $alpha = 0; ?>

			<?php foreach($data as $rekortgl){ ?>

			<?php if($rekortgl['hadir'] == "Alpha"){ ?>

			<tr class="bg-light">

				<td><?=$no; ?>.</td>

				<td><?=$rekortgl['nama']; ?></td>

				<td>
				<select disabled class="enable" name="kehadiran[<?= $rekortgl['id'] ?>]" >
					<option value="Alpha" <?= set_select('kehadiran', 'Alpha', TRUE); ?> >Alpha</option>
					<option value="Hadir">Hadir</option>
				</select>
				</td>

			</tr>
				<?php $alpha++; ?>
			<?php } else{ ?>

			<tr>

				<td><?=$no; ?>.</td>

				<td><?=$rekortgl['nama']; ?></td>

				<td>
				<select disabled class="enable" name="kehadiran[<?= $rekortgl['id'] ?>]">
					<option value="Alpha" >Alpha</option>
					<option value="Hadir" <?= set_select('kehadiran', 'Alpha', TRUE); ?>>Hadir</option>
				</select></td>

				<?php $hadir++; ?>
			<?php } ?>

			<?php $no++; ?>

			<?php } ?>

		</tbody>


	</table>
	<button name='updateabsen' type='submit' class='btn btn-primary enable' disabled>Update Absen</button>
	<?= form_close(); ?>

	<div class="card bg-light">

	    <div class="card-body text-center">

	        <span>Hadir : <?= $hadir; ?></span><br>

	        <span class="text-danger">Tidak Hadir : <?= $alpha; ?></span>

	    </div>

	</div>

	<h4 class="text-center">Anggota yang belum terdaftar pada saat pertemuan ini</h4>

	<table class="table">

	    <thead>

	        <tr>

	            <th>No</th>

	            <th>Nama</th>

	        </tr>

	    </thead>

	    <tbody>

	        <?php $no = 1; ?>

	        <?php foreach($not as $belum){ ?>

	            <tr>

	                <td><?=$no; ?>.</td>

	                <td><?=$belum['nama']; ?></td>

	                <?php $no++; ?>

	            </tr>

	        <?php } ?>

	    </tbody>
	</table>

</div>

</body>
<script>
	$(document).ready(function(){
		$("#ubah-absensi").click(function(){
			$(".enable").removeAttr("disabled");
		})
	})
</script>
</html>