<?php

class buat_laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin');
        $this->load->model('Laporan_model'); 
        $this->load->model('Kendaraan_model'); 
        $this->load->model('User_model'); 
        $this->load->model('Pustakawan_model'); 
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
        $data['kendaraan_motor'] = $this->Kendaraan_model->kode_kendaraan_motor();
        $data['kendaraan_mobil'] = $this->Kendaraan_model->kode_kendaraan_mobil();

        $data['laporan'] = $this->Laporan_model->get_all();




        $data['pustakawan']=$this->Pustakawan_model->pustakawan();
        // load view admin/overview.php
        $this->load->view("pustakawan/buat_laporan", $data);
    }

    //  public function tambah()
    // {
    //     $data = array(

    //         'title'     => 'Tambah Data Testimoni'

    //     );

    //     $this->load->view('pustakawan/buat_laporan', $data);
    // }

    public function simpan()
    {

        $tgl_laporan   = $this->input->post('tgl_laporan');
        $nama = $this->input->post('nama');
        $nama_ast = $this->input->post('nama_ast');
        $nama_sup = $this->input->post('nama_sup');
        $jenis_pusling = $this->input->post('jenis_pusling');
        $kode_kendaraan = $this->input->post('kode_kendaraan');
        $alamat_lokasi = $this->input->post('alamat_lokasi');
        $nama_pengelola = $this->input->post('nama_pengelola');
        $no_pengelola = $this->input->post('no_pengelola');
        $tot_pengunjung = $this->input->post('tot_pengunjung');
        $tot_lk = $this->input->post('tot_lk');
        $tot_pr = $this->input->post('tot_pr');
        $gambar = $this->input->post('gambar');

      // get foto
      $config['upload_path'] = './assets/images_laporan';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['encrypt_name'] = TRUE;
      $config['file_name'] = $_FILES['gambar']['name'];

      $this->upload->initialize($config);

       $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_pusling', 'Jenis Pusling', 'trim|required');
        $this->form_validation->set_rules('kode_kendaraan', 'Kode Kendaraan', 'trim|required');
        $this->form_validation->set_rules('nama_ast', 'Nama Asisten', 'trim|required');
        $this->form_validation->set_rules('nama_sup', 'Nama Supir', 'trim|required');
        $this->form_validation->set_rules('alamat_lokasi', 'Alamat Lokasi', 'trim|required');
        $this->form_validation->set_rules('no_pengelola', 'Nomor Pengelola', 'trim|required|numeric');
        $this->form_validation->set_rules('tot_pengunjung', 'Total Pengunjung', 'trim|required|numeric');
        $this->form_validation->set_rules('tot_lk', 'Total Pengunjung Laki-Laki', 'trim|required|numeric');
        $this->form_validation->set_rules('tot_pr', 'Total Pengunjung Perempuan', 'trim|required|numeric');
        $this->form_validation->set_rules('gambar', 'Foto', 'required');

        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');

        if(!empty($_FILES['gambar2'])){
                $this->upload->do_upload('gambar2');
                $data1=$this->upload->data();
                $gambar2=$data1['file_name'];
            }
        if(!empty($_FILES['gambar3'])){
                $this->upload->do_upload('gambar3');
                $data1=$this->upload->data();
                $gambar3=$data1['file_name'];
            }


        if (!empty($_FILES['gambar']['name']) || $this->form_validation->run() == FALSE) {
            if ( $this->upload->do_upload('gambar') ) {
                $foto = $this->upload->data();
                $data = array(

                    'tgl_laporan'           => date('Y-m-d H:i:s'),
                    'gambar'            => $foto['file_name'],
                    'gambar2'            => $gambar2,
                    'gambar3'            => "",
                    'nama'              => $this->input->post("nama"),
                    'nama_ast'              => $this->input->post("nama_ast"),
                    'nama_sup'              => $this->input->post("nama_sup"),
                    'jenis_pusling'     => $this->input->post("jenis_pusling"),
                    'kode_kendaraan'     => $this->input->post("kode_kendaraan"),
                    'alamat_lokasi'     => $this->input->post("alamat_lokasi"),
                    'nama_pengelola'      => $this->input->post("nama_pengelola"),
                    'no_pengelola'      => $this->input->post("no_pengelola"),
                    'tot_pengunjung'    => $this->input->post("tot_pengunjung"),
                    'tot_lk'            => $this->input->post("tot_lk"),
                    'tot_pr'            => $this->input->post("tot_pr"),
                    'created_at' => date('Y-m-d H:i:s'),

                );


              $this->db->insert('laporan',$data);
              $this->session->set_flashdata('tambah', 'Laporan berhasil ditambahkan!');
              redirect('pustakawan/buat_laporan');
            }else {

                $this->session->set_flashdata('gagal', 'Gagal menambahkan laporan, silahkan cek formulirnya!');

                $data['kendaraan_motor'] = $this->Kendaraan_model->kode_kendaraan_motor();
                $data['kendaraan_mobil'] = $this->Kendaraan_model->kode_kendaraan_mobil();
                $data['pustakawan']=$this->Pustakawan_model->pustakawan();
                $this->load->view('pustakawan/buat_laporan', $data);
            }
        }else {
          echo "tidak masuk";
        }

        

        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('tgl_laporan', 'Tanggal', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('jenis_pusling', 'Jenis Pusling', 'required');
        // $this->form_validation->set_rules('alamat_lokasi', 'Alamat Lokasi', 'required');
        // $this->form_validation->set_rules('no_pengelola', 'Nomor Pengelola', 'required');
        // $this->form_validation->set_rules('tot_pengunjung', 'Total Pengunjung', 'required');
        // $this->form_validation->set_rules('tot_lk', 'Total Pengunjung Laki-Laki', 'required');
        // $this->form_validation->set_rules('tot_pr', 'Total Pengunjung Perempuan', 'required');

        // $this->form_validation->set_message('required', '<div class="alert alert-danger">
        //             <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');

        // if ($this->form_validation->run() == FALSE)
        //         {
        //             $this->load->view('pustakawan/buat_laporan');
        //         }
        //         else
        //         {
                    
        //             $this->Laporan_model->simpan($data);
        //             $this->session->set_flashdata('tambah', 'Laporan berhasil dibuat!');
        //             //redirect
        //             redirect('pustakawan/buat_laporan');
        //         }


    }

   // public function edit()
   //  {
   //      $id_testimoni = $this->uri->segment(4);

   //      $data = array(
   //          'title'     => 'Edit Data Testimoni',
   //          'testimoni' => $this->Testimoni_model->edit($id_testimoni)
   //      );

   //      $this->load->view('admin/testimoni/edit_testimoni', $data);
   //  }

    // public function update()
    // {
    //     $id['id_testimoni'] = $this->input->post("id_testimoni");
    //     $data = array(
    //         'nama'         => $this->input->post("nama"),
    //         'komentar'    => $this->input->post("komentar"),
            
    //     );
    //     $this->Testimoni_model->update($data, $id);
    //     $this->session->set_flashdata('edit', 'Data Keuangan Berhasil Diedit');
    //     //redirect
    //     redirect('admin/testimoni/');
    // }


    // public function hapus($id_testimoni)
    // {
    //     $id['id_testimoni'] = $this->uri->segment(4);

    //     $this->Testimoni_model->hapus($id);


    //     $this->session->set_flashdata('hapus', 'Testimoni berhasil dihapus!');

    //     //redirect
    //     redirect('admin/testimoni/');

    // }

}
