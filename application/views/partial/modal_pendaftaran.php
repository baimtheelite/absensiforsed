<!-- The Modal -->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-anggota-tab" data-toggle="pill" href="#pills-anggota" role="tab" aria-controls="pills-anggota" aria-selected="true">Pendaftaran Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-muhadir-tab" data-toggle="pill" href="#pills-muhadir" role="tab" aria-controls="pills-muhadir" aria-selected="false">Pendaftaran Muhadir</a>
          </li>
        </ul>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-anggota" role="tabpanel" aria-labelledby="pills-anggota-tab">
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
          <button name="insertanggota" type="submit" class="btn btn-primary">Submit</button>
          </div>

          <div class="tab-pane fade" id="pills-muhadir" role="tabpanel" aria-labelledby="pills-muhadir-tab">
            <form method="post" action="<?php echo site_url('Absensi/insert'); ?>">
              <div class="form-group">
                <label for="namamuhadir">Nama Muhadir</label>
                  <input type="text" name="namamuhadir" class="form-control" id="namamuhadir autofocus">
              </div>
              <button name="insertmuhadir" type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>



      <!-- Modal footer -->

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
  </div>


</body>
</html>