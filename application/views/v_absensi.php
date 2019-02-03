<?php $this->load->view('partial/header'); ?>

  <div class="container">
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo $this->session->flashdata('success'); ?>
    <?php echo $this->session->flashdata('muhadir_success'); ?>
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

                            <label>Tanggal Pertemuan:</label><input id="date" class="form-control" id="date" type="date" name="tanggal" required="">

                        </div>

                        <div class="col-lg-6">

                            <label>Muhadir:</label>
                            <select class="form-control" name="muhadir" required="">
                              <option value="" selected disabled hidden>-Pilih Muhadir- </option>
                              <?php foreach($datamuhadir as $muhadir) { ?>
                                <option id="muhadir[]" value="<?= $muhadir['id_muhadir']; ?>"><?= $muhadir['muhadir']; ?></option>
                              <?php } ?>
                            </select>
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

                <?="<td><input class='hadir' type='radio' name='hadir[".$anggota['id']."]' value='Hadir' disabled></td>"; ?>

                <?="<td><input class='alpha' type='radio' name='hadir[".$anggota['id']."]' value='Alpha' checked disabled></td>"; ?>

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

        <button id="kirim" type="submit" class="btn btn-primary" onclick="return confirm('Apakah data absensi sudah benar?\n Jika ragu cek kembali!');" disabled>Kirim</button>

      </form>

 <?php $this->load->view('partial/modal_pendaftaran'); ?>