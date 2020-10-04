<?php

class Galeri extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('Galeri_model'); 
        $this->load->model('admin');
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper("file");
        //cek session dan level user
        if($this->admin->is_role() != "superadmin"){
            redirect("auth/login/");
        }
		

	}

	public function index()
	{

		$data = array(

            'title'     => 'Data Galeri',
            'galeri' => $this->Galeri_model->get_all()

        );
        // load view admin/galeri.php
        $this->load->view("admin/galeri", $data);
	}



	public function tambah()
    {


        $data = array(

            'title'     => 'Tambah Data Galeri'

        );

        $this->load->view('admin/galeri/tambah_galeri', $data);
    }


    public function simpan()
    {

      $judul   = $this->input->post('judul');
      $keterangan = $this->input->post('keterangan');
      $gambar = $this->input->post('gambar');

      // get foto
      $config['upload_path'] = './assets/images_galeri';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['encrypt_name'] = TRUE;
      $config['file_name'] = $_FILES['gambar']['name'];

      $this->upload->initialize($config);
       $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');

        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');


        if (!empty($_FILES['gambar']['name']) || $this->form_validation->run() == FALSE) {
            if ( $this->upload->do_upload('gambar') ) {
                $foto = $this->upload->data();
                $data = array(
                              'judul'           => $judul,
                            'gambar'            => $foto['file_name'],
                              'keterangan'     => $keterangan,
                            'waktu'           => date('d-m-Y'),
                            );



              $this->db->insert('galeri',$data);
              $this->session->set_flashdata('tambah', 'Gambar berhasil ditambahkan!');
              redirect('admin/galeri');
            }else {
              $this->load->view("admin/galeri/tambah_galeri");
            }
        }else {
          echo "tidak masuk";
        }

  }





   public function edit($id_galeri)
    {
        $id_galeri = $this->uri->segment(4);

        $data = array(

            'title'     => 'Edit Data Galeri',
            'galeri' => $this->Galeri_model->edit($id_galeri)

        );

        $this->load->view('admin/galeri/edit_galeri', $data);
    }

    public function update()
    {
         $id   = $this->input->post('id');
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('keterangan');

      $path = './assets/images_galeri/';

      $kondisi = array('id_galeri' => $id );

      // get foto
      $config['upload_path'] = './assets/images_galeri';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['encrypt_name'] = TRUE;
      $config['file_name'] = $_FILES['gambar']['name'];

      $this->upload->initialize($config);

        if (!empty($_FILES['gambar']['name'])) {
            if ( $this->upload->do_upload('gambar') ) {
                $foto = $this->upload->data();
                $data = array(
                              'judul'       => $judul,
                            'gambar'       => $foto['file_name'],
                              'keterangan'     => $keterangan,
                            );
              // hapus foto pada direktori
              @unlink($path.$this->input->post('filelama'));

                            $this->Galeri_model->update($data,$kondisi);
              $this->session->set_flashdata('update', 'Gambar berhasil diedit!');
              redirect('admin/galeri');
            }else {
              $this->session->set_flashdata('gagal_gagal', 'Gambar gagal diedit!');
              redirect('admin/galeri');
            }
        }else {
          $foto = $this->upload->data();
                $data = array(
                              'judul'       => $judul,
                              'keterangan'     => $keterangan,
                            );

                            $this->Galeri_model->update($data,$kondisi);
              $this->session->set_flashdata('update', 'Gambar berhasil diedit!');
              redirect('admin/galeri');
        }

    }

    public function hapus($id)
    {
        $this->Galeri_model->hapus($id);


		$this->session->set_flashdata('hapus', 'Gambar berhasil dihapus!');
        //redirect
        redirect('admin/galeri');

    }



}