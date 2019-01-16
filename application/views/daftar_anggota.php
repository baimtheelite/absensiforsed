<?php $this->load->view('partial/header'); ?>
	<div class="jumbotron">
		<h1 class="text-center">Daftar Anggota</h1>
		<p class="text-center">Pengajian Rutin Remaja Sektor 2 BPA</p>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form method="GET" class="card card-sm" action="<?= base_url('Absensi/daftar_anggota'); ?>">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input name="carinama" class="form-control form-control-lg form-control-borderless" type="text" placeholder="Cari nama anggota">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-primary" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                            <?php if($this->input->get('carinama')){ ?>
                            <h3>Hasil pencarian: <?= $nama; ?></h3>
                        <?php } ?>
			    <div class="table-responsive card">
					<table class="table text-center">
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
							<?php foreach ($data as $anggota) { ?>
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
			</div>

  <?php $this->load->view('partial/modal_pendaftaran'); ?>