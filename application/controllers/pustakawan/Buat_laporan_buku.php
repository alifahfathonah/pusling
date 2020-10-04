<?php


class Buat_laporan_buku extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('Buku_model'); 
        $this->load->model('Laporan_buku_model'); 
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper("file");
        //cek session dan level user
        if($this->admin->is_role() != "pustakawan"){
            redirect("auth/login/");
        }
    }

    public function index()
    {
        $data['buku'] = $this->db->query("select * from buku order by kode_buku ASC")->row();
        // load view admin/overview.php
        $this->load->view("pustakawan/buat_laporan_buku", $data);
    }

    public function search(){
        // Ambil data NIS yang dikirim via ajax post
        $kode_buku = $this->input->post('kode_buku');
        
        $buku = $this->db->query("select * from buku where kode_buku='$kode_buku' order by kode_buku ASC")->row();
        
        if( ! empty($buku)){ // Jika data siswa ada/ditemukan
            // Buat sebuah array
            $callback = array(
                'status' => 'success', // Set array status dengan success
                'klasifikasi' => $buku->klasifikasi,
                'judul' => $buku->judul, // Set array nama dengan isi kolom nama pada tabel siswa
                'pengarang' => $buku->pengarang, // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
                'penerbit' => $buku->penerbit, // Set array jenis_kelamin dengan isi kolom telp pada tabel siswa
                'tempat_terbit' => $buku->tempat_terbit, // Set array jenis_kelamin dengan isi kolom alamat pada tabel siswa
            );
        }else{
            $callback = array('status' => 'failed'); // set array status dengan failed
        }

        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

     public function simpan()
    {

        $data = array(
            'id_users'      => $this->input->post("id_users"),
            'klasifikasi'    => $this->input->post("klasifikasi"),
            'kode_buku'   => $this->input->post("kode_buku"),
            'nama_pembaca'   => $this->input->post("nama_pembaca"),
            'kategori'   => $this->input->post("kategori"),
            'judul'    => $this->input->post("judul"),
            'pengarang'    => $this->input->post("pengarang"),
            'penerbit'    => $this->input->post("penerbit"),
            'tempat_terbit'    => $this->input->post("tempat_terbit"),
            'jenis_kelamin'    => $this->input->post("jenis_kelamin"),
            'tanggal'    => $this->input->post("tanggal"),
            'status'    => $this->input->post("status"),

        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode_buku', 'Kode Buku');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nama_pembaca', 'Nama Pembaca', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tempat_terbit', 'Tempat Terbit', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Tempat Terbit', 'required');

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');

         if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('gagal', 'Gagal menambahkan laporan, silahkan cek formulirnya!');
                    $this->load->view('pustakawan/buat_laporan_buku');
                }
                else
                {
                   
                    $this->session->set_flashdata('tambah', 'Laporan Buku berhasil ditambahkan!');
                    $this->Laporan_buku_model->simpan($data);
                    redirect('pustakawan/buat_laporan_buku');
                }



        

    }

}
