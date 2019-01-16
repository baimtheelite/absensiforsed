<?php
class Absensi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('absensi_model');

        $active_link = $this->uri->segment(2);
    }

    public function index(){
        if($this->session->userdata('user')){
                $data       = $this->absensi_model->query('SELECT * FROM tbl_anggota ORDER BY nama');
                $datamuhadir = $this->absensi_model->GetAnggota('tbl_muhadir');
                $max         = $this->absensi_model->max('tbl_kehadiran', 'id_tgl');

                $active_link = '';

                $arr = array(
                    'data' => $data,
                    'max' => ($max[0]['id_tgl'] + 1),
                    'datamuhadir' => $datamuhadir,
                    'active' => $active_link
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
            $this->session->set_userdata('user', $data->user);
            $nama = $data->user;
        }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show role="alert"">Berhasil login! Selamat Datang '.ucfirst($nama).'! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('/', 'refresh');
            }else{
                echo "<script>alert('Username atau password salah!<br>'); history.back();</script>";
            }
 }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect(base_url('Absensi/index'));
    }

    public function daftar_anggota(){
        $active_link = $this->uri->segment(2);

        if(isset($_GET['carinama'])) {
            $nama = $this->input->get('carinama');
            $data = $this->absensi_model->query('SELECT * FROM tbl_anggota WHERE nama LIKE "%'.$nama.'%"');
            $array = array(
                    'data' => $data,
                    'nama' => $nama,
                    'active' => $active_link
                 );
        $this->load->view('daftar_anggota', $array);

        }else{
        $data = $this->absensi_model->query('SELECT * FROM tbl_anggota ORDER BY nama');
        $array = array(
                    'data' => $data,
                    'active' => $active_link
                 );
        $this->load->view('daftar_anggota', $array);
        }       
    }



    public function pendaftaran(){
        $this->load->view('pendaftaran_anggota');
    }

    public function insert(){
        if(isset($_POST['insertanggota'])){
         $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'notelp' => $this->input->post('notelp')
             );
         
         $nama = $_POST['nama'];
         $alamat = $_POST['alamat'];
         $notelp = $_POST['notelp'];

         $summary = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'notelp' => $notelp
         );

        $this->load->view('pendaftaran_berhasil', $summary);
         $this->absensi_model->Insert('tbl_anggota', $data);
     }

     if (isset($_POST['insertmuhadir'])) {
         $namamuhadir = $this->input->post('namamuhadir');
         $data = array(
            'nama_muhadir' => $namamuhadir
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
        $id = array('id' => $id);
        $this->absensi_model->Delete('tbl_anggota', $id);
        redirect(site_url('Absensi/daftar_anggota'));
    }

    public function profil($id){
        $anggota = $this->absensi_model->GetWhere('tbl_anggota', array('id' => $id));
        $absensi = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d-%M-%Y') as tanggal FROM tbl_anggota a, tbl_kehadiran b WHERE a.id=$id AND b.id=$id");
        $data = array(
            'id' => $anggota[0]['id'],
            'nama' => $anggota[0]['nama'],
            'alamat' => $anggota[0]['alamat'],
            'notelp' => $anggota[0]['notelp'],
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

        $jumlah_data = $this->absensi_model->jumlah_data();
        $config['base_url'] = base_url().'absensi/rekor_presensi/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 25;
        $from = $this->uri->segment(2);
        $this->pagination->initialize($config);

        $data = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') as tanggal, COUNT(tbl_kehadiran.id) as Jumlah_Hadir FROM tbl_anggota, tbl_kehadiran WHERE tbl_anggota.id = tbl_kehadiran.id AND tbl_kehadiran.hadir = 'Hadir' GROUP BY tbl_anggota.id ORDER BY Jumlah_Hadir DESC");

        $absensi = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') as tanggal FROM tbl_anggota a, tbl_kehadiran b WHERE a.id=$id AND b.id=$id");

        $rekortgl = $this->absensi_model->query("SELECT DISTINCT(id_tgl), DATE_FORMAT(tanggal,'%d %M %Y') as tanggal, muhadir FROM tbl_kehadiran");

       $anggota = $this->absensi_model->GetWhere('tbl_anggota', array('id' => $id));

        $data = array(
            'data' => $data,
            'absensi' => $absensi,
            'nama' => $anggota[0]['nama'],
            'rekortgl' => $rekortgl,
            'active' => $active_link
        );
        $this->load->view('rekor_anggota', $data); 
    }
    
        public function rekor_tanggal($id){
        $data = $this->absensi_model->query("SELECT *, DATE_FORMAT(tanggal,'%d %M %Y') as tanggal FROM tbl_anggota , tbl_kehadiran where tbl_anggota.id = tbl_kehadiran.id AND id_tgl = $id order by nama");
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
}