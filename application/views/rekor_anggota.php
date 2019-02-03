<?php $this->load->view('partial/header'); ?>

	<div class="jumbotron">
		<h1 class="text-center">Rekor Absensi Anggota</h1>
		<p class="text-center">Pengajian Rutin Remaja Sektor 2 BPA</p>
	</div>
	<div class="container">
	<?= $this->session->flashdata('update_absensi_berhasil'); ?>
	<?= $this->session->flashdata('delete_tgl_success'); ?>
		<div class="row">
			<!-- REKOR ABSENSI ANGGOTA -->
			<div class="col-lg-12">
				<!-- LIST ANGGOTA-->
				<div id="rekoranggota" class="container table-responsive card">
					<table id="rekor" class="table table-hover text-center small">
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
									<td><a href="#" class="lihatdata btn btn-primary" data-toggle="modal" data-target="#dataModal" data="<?=$anggota['id']; ?>">Lihat</a></td>
								</tr>
								<?php $no++; ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
			<!-- REKOR ABSENSI TERTINGGI -->
				<div class="card text-center" style="margin-top: 16px">
					<div class="card-header w3-win8-lime">	
						<h3>Rekor Absensi Terbanyak:</h3> 
					</div>
					<div class="card-body">
						<h4><?= $max['nama']; ?></h4>
						<img class="img-circle" src="<?= base_url('uploads/'.$max['foto']);  ?>" alt="no image"><br>
						<h4>Jumlah Kehadiran Sebanyak:</h4>
						<h4><?= $max['Jumlah_Hadir']; ?></h4>
						<a class="btn btn-primary" href="<?= base_url('Absensi/profil/'.$max['id']);  ?>">Lihat profil anggota</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<!-- CETAK LAPORAN ABSENSI -->
				<div class="card text-center" style="margin-top: 16px">
					<div class="card-header bg-primary text-white">	
						<h3>Cetak Laporan Absensi:</h3> 
					</div>
					<div class="card-body" style="padding-top: 64px; padding-bottom: 64px;">
					<a class="btn btn-primary" href="<?= base_url('Absensi/cetak_laporan_absensi') ?>">Download .pdf</a>
					</div>
				</div>
			</div>
		</div>

			<!-- REKOR Berdasarkan TANGGAL -->
			<div class="row">
				<div class="col-lg-12">			
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
									<th colspan="2"></th>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($rekortgl as $rekor) {?>
									<tr>
										<td><?=$no; ?>.</td>
										<td><?=$rekor['tgl']; ?></td>
										<td><?=$rekor['muhadir']; ?></td>
										<td><a class="btn btn-primary" href="<?=base_url('Absensi/rekor_tanggal/').$rekor['id_tgl']; ?>">Lihat</a></td>
										<td><a onclick="return confirm('Apakah Anda yakin? \n ingin menghapus rekor absensi pada pertemuan ke-<?= $no; ?>')" class="btn btn-danger" href="<?=base_url('Absensi/delete_tgl/').$rekor['id_tgl']; ?>">Delete</a></td>
									</tr>
									<?php $no++; ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>        
    		</div>
    		 
    		 
			 <!-- MODAL VIEW REKOR ANGGOTA -->
    		 <!-- The Modal -->
			<div class="modal fade" id="dataModal">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title">Rekor Anggota</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>

			      <!-- Modal body -->
			      <div class="modal-body">
			        <table class="table table-bordered">
						<thead>
							<th>No.</th>
							<th>Tanggal</th>
							<th>Kehadiran</th>
						</thead>
						<tbody id="tampil-data">
							<h3 class="text-info text-center" id="nama"></h3>
							<div class="fotoprofil text-center">
								<img id="foto" src="" alt="no foto">
							</div>
							<!-- MENAMPILKAN REKOR KEHADIRAN ANGGOTA -->
						</tbody>
					</table>
					<div class="row">
						<div class="col-md-4">
						
						</div>
						<div class="col-md-4 card">
							<div class="card-body text-center">
								<span class="text-primary">	Hadir: </span><span id="hadir" ></span><br>
								<span class="text-danger">	Alpha: </span><span id="alpha"></span>			
							</div>
						</div>
						<div class="col-md-4">
						
						</div>
					</div>

			      </div>

			      <!-- Modal footer -->
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			      </div>

			    </div>
			  </div>
			</div>

			<script>
				$(document).ready(function(){
					$('#rekor').dataTable();
					$('#rekor').on('click','a.lihatdata', function(){
						var nilai = $(this).attr('data');
						$.ajax({
							url 		: '<?php echo base_url("Absensi/presensi_ajax/"); ?>'+nilai ,
							type 		: 'GET',
							async		: false,
							dataType 	: 'json',
							data		: {nilai:nilai},
							success 	: function(data){
										var html = '';
										var nama = '';
										var hadir = 0;
										var alpha = 0;
										var i;
										for(i = 0; i < data.length; i++){
											if(data[i].hadir == "Alpha"){
											html = html + '<tr class="bg-danger text-white">';
											html = html +'<td>'+(i+1)+'</td>';
											html = html +'<td>'+data[i].tanggal+'</td>';
											html = html +'<td>'+data[i].hadir+'</td>';
											html = html +'</tr>';
											alpha++;
											}else{
											html = html + '<tr>';
											html = html +'<td>'+(i+1)+'</td>';
											html = html +'<td>'+data[i].tanggal+'</td>';
											html = html +'<td>'+data[i].hadir+'</td>';
											html = html +'</tr>';
											hadir++;
											}
										}
										$("#nama").html(data[0].nama);
										$("#foto").attr("src", '<?php echo base_url("uploads/"); ?>' +data[0].foto);
										$("#tampil-data").html(html);

										$("#hadir").html(hadir);
										$("#alpha").html(alpha);
										// $("#tampil-data").append("</table>");
							}
						});																											
					})
				});
			</script>
			
 
 
 
 <?php $this->load->view('partial/modal_pendaftaran'); ?>