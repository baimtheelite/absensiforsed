<?php $this->load->view('partial/header'); ?>

	<div class="jumbotron">
		<h1 class="text-center">Rekor Absensi Anggota</h1>
		<p class="text-center">Pengajian Rutin Remaja Sektor 2 BPA</p>
	</div>
	<div class="container-fluid">
		<div class="row">
        <div class="col-lg-6">
            <div class="card rekoranggota" style="padding: 8px;">
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
           				<td><?=$rekor['tgl']; ?></td>
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
			    <div id="rekoranggota" class="table-responsive card">
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
									<td><a href="<?= site_url('Absensi/rekor_presensi/'.$anggota['id']) ?>" class="lihat_data btn btn-primary" id="<?=$anggota['id']; ?>">Lihat</a></td>
								</tr>
								<?php $no++; ?>
							<?php } ?>
						</tbody>
					</table>
    				</div>
    			</div>
    		</div>
    		 
    		 <!-- MODAL VIEW REKOR ANGGOTA -->
    		 <!-- The Modal -->
			<div class="modal" id="dataModal">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title">Rekor Anggota</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>

			      <!-- Modal body -->
			      <div class="modal-body">
			        
			        <div id="absensi_result"></div>

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
					$('html, body').animate({
					scrollTop: $(".rekoranggota").offset().top
				}, 500, function(){
					$(".rekoranggota").fadeOut(300, function(){
						$(this).fadeIn(300);
					})
				});
					
				});
			</script>
 <?php $this->load->view('partial/modal_pendaftaran'); ?>