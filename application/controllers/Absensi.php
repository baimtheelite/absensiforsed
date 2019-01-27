<?php
class Absensi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('absensi_model');
        $this->load->library('pdf');

        $active_link = $this->uri->segment(2);
    }

    public function index(){
        if($this->session->userdata('user')){
                $data       = $this->absensi_model->query('SELECT * FROM tbl_anggota ORDER BY nama');
                $datamuhadir = $this->absensi_model->GetAnggota('tbl_muhadir');
                $max         = $this->absensi_model->max('tbl_kehadiran', 'id_tgl');
                $admin       = $this->session->userdata('nama');

                $active_link = '';

                $arr = array(
                    'data' => $data,
                    'max' => ($max[0]['id_tgl'] + 1),
                    'datamuhadir' => $datamuhadir,
                    'active' => $active_link,
                    'admin' => $admin
                 );

                $this->load->view('v_absensi', $arr);
            }else{
                $this->load->view('login');
            }           
    }

    public function login(){
        $user     = $this->input->post('user');
        $password  = $this->input->post('password');

        $query = $this->absensi_model->LoginAdmin($user, md5($password));
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $session = array(
                    'user'  => $data->user,
                    'nama'  => $data->nama_user
                );
                $this->session->set_userdata($session);
                $nama = $data->nama_user;
                echo $nama;
        }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show role="alert"">Berhasil login! Selamat Datang '.ucfirst($nama).'! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('/', 'refresh');
            }else{
                echo "<script>alert('Username atau password salah!<br>'); history.back();</script>";
            }
 }

    public function logout(){
        $this->session->unset_userdata(array('user', 'nama'));
        redirect(base_url('Absensi/index'));
    }

    public function daftar_anggota(){
        $active_link = $this->uri->segment(2);
        $admin       = $this->session->userdata('nama');

        if(isset($_GET['carinama'])) {
            $nama = $this->input->get('carinama');
            $datamuhadir = $this->absensi_model->GetAnggota('tbl_muhadir');
            $dataanggota = $this->absensi_model->query('SELECT * FROM tbl_anggota WHERE nama LIKE "%'.$nama.'%"');
            $array = array(
                    'dataanggota' => $dataanggota,
                    'datamuhadir' => $datamuhadir,
                    'nama' => $nama,
                    'active' => $active_link
                 );
        $this->load->view('daftar_anggota', $array);

        }else{
        $dataanggota = $this->absensi_model->query('SELECT * FROM tbl_anggota ORDER BY nama');
        $datamuhadir = $this->absensi_model->GetAnggota('tbl_muhadir');
        $array = array(
                    'dataanggota' => $dataanggota,
                    'datamuhadir' => $datamuhadir,
                    'active' => $active_link,
                    'admin'=> $admin
                 );
        $this->load->view('daftar_anggota', $array);
        }       
    }

    public function pendaftaran(){
        $this->load->view('pendaftaran_anggota');
    }

    public function insert(){
        if(isset($_POST['insertanggota'])){
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('notelp'. 'Nomor Telepon', 'required|numeric');

            if($this->form_validation->run() === TRUE){
                $data['nama']   = $this->input->post('nama');
                $data['alamat'] = $this->input->post('alamat');
                $data['notelp'] = $this->input->post('notelp');

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);
                if (!empty($_FILES['foto']['name'])){ 
                if(!$this->upload->do_upload('foto')){
                  echo $this->upload->display_errors();
                }
                else{
                  $data['foto'] = $this->upload->data()['file_name'];
                }
            }else{
                   $data['foto'] = "user_default.jpg";
            }
                // $data = array(
                    //     'nama' => $this->input->post('nama'),
                    //     'alamat' => $this->input->post('alamat'),
                    //     'notelp' => $this->input->post('notelp')
                    //     );
            
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $notelp = $_POST['notelp'];
            
            $summary = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'notelp' => $notelp
            );
            
            $id = $this->absensi_model->Insert('tbl_anggota', $data);
            if($id)
            $this->load->view('pendaftaran_berhasil', $summary);
        }
     }

     if(isset($_POST['insertmuhadir'])) {
         $namamuhadir = $this->input->post('namamuhadir');
         $data = array(
            'muhadir' => $namamuhadir
         );
         $id = $this->absensi_model->Insert('tbl_muhadir', $data);

         if($id){
         $this->session->set_flashdata('muhadir_success', '<div class="alert alert-success alert-dismissible fade show role="alert"">'.$namamuhadir.' berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        redirect('/','refresh');
        }
     }
        // redirect(site_url('Absensi'));
    }

    public function delete($id){
        $id = array(
            'id' => $id
        );
        $this->absensi_model->Delete('tbl_anggota', $id);
        redirect(site_url('Absensi/daftar_anggota'));
    }

    public function deletemuhadir($id){
        $id = array(
            'id_muhadir' => $id
        );
        $this->absensi_model->Delete('tbl_muhadir', $id);
        redirect(site_url('Absensi/daftar_anggota'));
    }

    public function profil($id){
        $anggota = $this->absensi_model->GetWhere('tbl_anggota', array('id' => $id));
        $absensi = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d-%M-%Y') as tanggal 
                                                FROM tbl_anggota a, tbl_kehadiran b 
                                                WHERE a.id=$id AND b.id=$id");
        $data = array(
            'id' => $anggota[0]['id'],
            'nama' => $anggota[0]['nama'],
            'alamat' => $anggota[0]['alamat'],
            'notelp' => $anggota[0]['notelp'],
            'foto' => $anggota[0]['foto'],
            'absensi' => $absensi
            );
        $this->load->view('profil_anggota', $data); 
    }

    public function update(){
        $id = $_POST['id'];
        
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $notelp = $_POST['notelp'];

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'notelp' => $notelp
         );

        $where = array(
            'id' => $id
        );
        $res = $this->absensi_model->Update('tbl_anggota', $data, $where);
        if ($res>0) {
            redirect('Absensi/daftar_anggota');
        }
    }

    public function presensi(){
        $hadir = $_POST['hadir'];
        $tanggal = $this->input->post('tanggal');
        $rekor = $this->input->post('tgl_rekor');
        $muhadir = $this->input->post('muhadir');
        // $tanggal = $_POST['tanggal'];
        foreach ($hadir as $key => $val) {
            $this->absensi_model->qry("INSERT INTO tbl_kehadiran VALUES($rekor, $key,'$tanggal','$val', '$muhadir')");
        }
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show role="alert"">Berhasil Absen! Silahkan lihat halaman <a href="'.base_url('Absensi/rekor_presensi').'">Rekor Absensi Anggota</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect();
    }

    public function rekor_presensi($id=1){
        $active_link = $this->uri->segment(2);
        $admin       = $this->session->userdata('nama');


        //REKOR ABSENSI TERTINGGI KE TERENDAH
        $data = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') as tanggal, COUNT(tbl_kehadiran.id) as Jumlah_Hadir 
                                             FROM tbl_anggota, tbl_kehadiran
                                             WHERE tbl_anggota.id = tbl_kehadiran.id AND tbl_kehadiran.hadir = 'Hadir' 
                                             GROUP BY tbl_anggota.id 
                                             ORDER BY Jumlah_Hadir DESC");
        //REKOR ABSENSI KEHADIRAN ANGGOTA TERTINGGI
        $max = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') as tanggal, COUNT(tbl_kehadiran.id) as Jumlah_Hadir 
                                             FROM tbl_anggota, tbl_kehadiran
                                             WHERE tbl_anggota.id = tbl_kehadiran.id AND tbl_kehadiran.hadir = 'Hadir' 
                                             GROUP BY tbl_anggota.id 
                                             ORDER BY Jumlah_Hadir DESC
                                             LIMIT 1");                                     
        //REKOR KEHADIRAN ANGGOTA
        $absensi = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') as tanggal 
                                                FROM tbl_anggota a, tbl_kehadiran b 
                                                WHERE a.id=$id AND b.id=$id");
        //REKOR BERDASARKAN TANGGAL
        $rekortgl = $this->absensi_model->query("SELECT DISTINCT tbl_kehadiran.id_tgl, DATE_FORMAT(tanggal, '%d %M %Y') AS tgl,
                                                tbl_muhadir.muhadir AS muhadir, tbl_kehadiran.id_muhadir AS id_muhadir 
                                                FROM tbl_kehadiran 
                                                INNER JOIN tbl_muhadir 
                                                ON tbl_kehadiran.id_muhadir = tbl_muhadir.id_muhadir 
                                                ORDER BY tanggal ASC "
                                            );

       $anggota = $this->absensi_model->GetWhere('tbl_anggota', array('id' => $id));

        $data = array(
            'data' => $data,
            'absensi' => $absensi,
            'nama' => $anggota[0]['nama'],
            'rekortgl' => $rekortgl,
            'max' => $max[0],
            'active' => $active_link,
            'admin' => $admin
        );

        //$absensiData = $this->input->post('')
        $this->load->view('rekor_anggota', $data); 
    }

    public function presensi_ajax($id = 0){
        $id = $this->input->get('id');
        if(isset($id)){
            $absensi = $this->absensi_model->qry("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') as tanggal FROM tbl_anggota a, tbl_kehadiran b WHERE a.id=$id AND b.id=$id");
            return $absensi->result_array();
        }
            echo json_encode($absensi);
    }
    
    public function rekor_tanggal($id){
        $data = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') as tanggal 
                                            FROM tbl_anggota , tbl_kehadiran 
                                            INNER JOIN tbl_muhadir
                                            ON tbl_muhadir.id_muhadir = tbl_kehadiran.id_muhadir
                                            where tbl_anggota.id = tbl_kehadiran.id AND id_tgl = $id  
                                            order by nama asc"
                                        );

        $not = $this->absensi_model->query("SELECT id, nama FROM tbl_anggota WHERE id NOT IN(SELECT id FROM tbl_kehadiran WHERE id_tgl = $id) ORDER BY nama"); 
        
        $data = array(
            'data' => $data,
            'pertemuan' => $data[0]['id_tgl'],
            'tanggal' => $data[0]['tanggal'],
            'muhadir' => $data[0]['muhadir'],
            'not' => $not
            );
            
        $this->load->view('rekor_tanggal', $data);
    }

    public function cetak_laporan_absensi(){
        
        $pdf = new FPDF('l', 'mm', 'A4');
        //Membuat Halaman Baru
        $pdf->AddPage();
        //setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', '16');
        // mencetak string
        $pdf->Cell(190,7,'CETAK LAPORAN ABSENSI PENGAJIAN IRMA',0,1,'C');
        $pdf->SetFont('Arial', 'B', '12');
        $pdf->Cell(190,7,'PENGAJIAN RUTIN IRMA SEKTOR DUA',0,1,'C');
        //Memberikan space ke bawah agar tidak terlalu rapat
        $bulan = 0;
        $pdf->Cell(190,7,'REKAPITULASI REKOR KEHADIRAN ANGGOTA',0,1,'C');
        $rekoranggota = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') AS tanggal, COUNT(tbl_kehadiran.id) AS Jumlah_Hadir 
        FROM tbl_anggota, tbl_kehadiran 
        WHERE tbl_anggota.id = tbl_kehadiran.id AND tbl_kehadiran.hadir = 'Hadir' 
        GROUP BY tbl_anggota.id 
        ORDER BY Jumlah_Hadir DESC");

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $no = 1;
        $pdf->Cell(15,6,'NO',1,0);
        $pdf->Cell(85,6,'NAMA',1,0);
        $pdf->Cell(35,6,'JUMLAH HADIR',1,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(10,7,'',0,1);
        foreach ($rekoranggota as $row) {
                        $pdf->Cell(15,6,$no,1,0);
                        $pdf->Cell(85,6,$row['nama'],1,0);
                        $pdf->Cell(35,6,$row['Jumlah_Hadir'],1,1);
                        $no++;
        }

        for ($tahun = 2018; $tahun <= 2019 ; $tahun++) { 
            for($bulan = 1; $bulan <= 12; $bulan++){
                  $anggota = $this->db->query('SELECT nama, DATE_FORMAT(tanggal, "%d %M %Y") as tanggal, hadir
                                            FROM tbl_kehadiran
                                            INNER JOIN tbl_anggota 
                                            ON tbl_kehadiran.id = tbl_anggota.id
                                            WHERE MONTH(tanggal) = '.$bulan.' AND YEAR(tanggal) ='.$tahun.'
                                            ORDER BY id_tgl ASC, nama ASC');

                if($anggota->num_rows() > 0){
                $month = $this->db->query('SELECT DISTINCT MONTHNAME(tanggal) as bulan from tbl_kehadiran WHERE MONTH(tanggal) = '.$bulan)->result_array();
                foreach ($month as $key) {
                    $pdf->SetFont('Arial', 'B', '12');
                    $pdf->Cell(190,7,'Bulan: '. $key['bulan'].', '.$tahun ,0,1,'C');
                }
                
                    $pdf->Cell(10,7,'',0,1);
                    $pdf->SetFont('Arial','B',10);
                    $no = 1;
                    $pdf->Cell(15,6,'NO',1,0);
                    $pdf->Cell(85,6,'NAMA',1,0);
                    $pdf->Cell(35,6,'TANGGAL',1,0);
                    $pdf->Cell(25,6,'KEHADIRAN',1,1);
                    $pdf->SetFont('Arial','',10);
                    // $anggota = $this->db->query('SELECT nama, DATE_FORMAT(tanggal, "%d %M %Y") as tanggal, hadir
                    //                              FROM tbl_kehadiran 
                    //                              INNER JOIN tbl_anggota 
                    //                              ON tbl_kehadiran.id = tbl_anggota.id 
                    //                              ORDER BY id_tgl ASC, nama ASC'
                    //
                                          // )->result();
                    foreach ($anggota->result() as $row) {
                        $pdf->Cell(15,6,$no,1,0);
                        $pdf->Cell(85,6,$row->nama,1,0);
                        $pdf->Cell(35,6,$row->tanggal,1,0);
                        $pdf->Cell(25,6,$row->hadir,1,1);
                        $no++;
                    }
                }
            }
        }
            $pdf->Output('Laporan Absensi Pengantin.pdf', 'I');
    }
}