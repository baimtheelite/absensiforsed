<?php $this->load->view('partial/header'); ?>
	<div class="jumbotron">
		<h1 class="text-center">Daftar Anggota</h1>
		<p class="text-center">Pengajian Rutin Remaja Sektor 2 BPA</p>
	</div>
	<div class="container">
		<div class="row">
			<?= $this->session->flashdata('update_success'); ?>
			<div class="col-lg-12">
				<!-- Nav tabs -->					
					<ul class="nav nav-pills">
					  <li class="nav-item">
					    <a class="nav-link active" data-toggle="tab" href="#daftaranggota">List Anggota</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="tab" href="#daftarmuhadir">List Muhadir</a>
					  </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
					 <div class="tab-pane container active" id="daftaranggota">
						<div class="table-responsive card">
							<table class="table text-center daftaranggota">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th colspan="2">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($dataanggota as $anggota) { ?>
										<tr>
											<td><?=$no.".";?></td>
											<td><?=$anggota['nama']; ?></td>
											<td><?=$anggota['alamat']; ?></td>
											<td><a class="btn btn-primary" href="<?php echo base_url().'index.php/Absensi/profil/'.$anggota['id']; ?>">Buka</a></td>
											<td><a class="btn btn-danger" href="<?php echo base_url().'index.php/Absensi/delete/'.$anggota['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $anggota['nama']; ?>?')" >Hapus</a></td>
										</tr>
										<?php $no++; ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
					  </div>
					  <div class="tab-pane container fade" id="daftarmuhadir">
					  	<div class="table-responsive card">
							<table class="table text-center">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($datamuhadir as $muhadir) { ?>
										<tr>
											<td><?=$no.".";?></td>
											<td><?=$muhadir['muhadir']; ?></td>
											<td><a class="btn btn-danger" href="<?php echo base_url().'index.php/Absensi/deletemuhadir/'.$muhadir['id_muhadir']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $muhadir['muhadir']; ?>?')" >Hapus</a></td>
										</tr>
										<?php $no++; ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
					  </div>
					</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$('.daftaranggota').dataTable();
			})
		</script>
  <?php $this->load->view('partial/modal_pendaftaran'); ?>