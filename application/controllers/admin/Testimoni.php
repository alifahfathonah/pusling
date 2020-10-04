<?php

class Testimoni extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('admin');
		$this->load->model('Testimoni_model'); 
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

            'title'     => 'Data Testimoni',
            'testimoni' => $this->Testimoni_model->get_all()

        );
        // load view admin/overview.php
        $this->load->view("admin/testimoni", $data);
	}

	 public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data Testimoni'

        );

        $this->load->view('admin/testimoni/tambah_testimoni', $data);
    }

    public function simpan()
    {
        
      $nama   = $this->input->post('nama');
      $komentar = $this->input->post('komentar');
      $jabatan = $this->input->post('jabatan');

      // get foto
      $config['upload_path'] = './assets/images_testimoni';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['encrypt_name'] = TRUE;
      $config['file_name'] = $_FILES['gambar']['name'];

      $this->upload->initialize($config);
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('komentar', 'Komentar', 'required');
      $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
      $this->form_validation->set_rules('gambar', 'Gambar', 'required');

      $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');



        if (!empty($_FILES['gambar']['name']) || $this->form_validation->run() == FALSE) {
            if ( $this->upload->do_upload('gambar') ) {
                $foto = $this->upload->data();
                $data = array(
                              'nama'           => $nama,
                            'gambar'            => $foto['file_name'],
                              'komentar'     => $komentar,
                              'jabatan'           => $jabatan,
                            'waktu'           => date('d-m-Y'),
                            );



              $this->db->insert('testimoni',$data);
              $this->session->set_flashdata('tambah', 'Testimoni berhasil ditambahkan!');
              redirect('admin/testimoni');
            }else {
              $this->session->set_flashdata('gagal', 'Testimoni gagalf ditambahkan!');

              $this->load->view("admin/testimoni/tambah_testimoni");
            }
        }else {
          echo "tidak masuk";
        }
        

    }

   public function edit()
    {
        $id_testimoni = $this->uri->segment(4);

        $data = array(
            'title'     => 'Edit Data Testimoni',
            'testimoni' => $this->Testimoni_model->edit($id_testimoni)
        );

        $this->load->view('admin/testimoni/edit_testimoni', $data);
    }

    public function update()
    {

      $id   = $this->input->post('id');
      $nama   = $this->input->post('nama');
      $komentar = $this->input->post('komentar');
      $jabatan = $this->input->post('jabatan');

      $path = './assets/images_testimoni/';

      $kondisi = array('id_testimoni' => $id );

      // get foto
      $config['upload_path'] = './assets/images_testimoni';
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
                              'nama'           => $nama,
                            'gambar'       => $foto['file_name'],
                            'komentar'     => $komentar,
                              'jabatan'           => $jabatan,
                            );
              // hapus foto pada direktori
              @unlink($path.$this->input->post('filelama'));


              $this->session->set_flashdata('edit', 'Testimoni berhasil edit!');
              $this->Testimoni_model->update($data,$kondisi);
              redirect('admin/testimoni');
            }else {
              $this->session->set_flashdata('edit_gagal', 'Testimoni gagal edit!');
              redirect('admin/testimoni');
            }
        }else {
          $foto = $this->upload->data();
                $data = array(
                              'nama'           => $nama,
                            'komentar'     => $komentar,
                              'jabatan'           => $jabatan,
                            );

              $this->session->set_flashdata('edit', 'Testimoni berhasil edit!');
              $this->Testimoni_model->update($data,$kondisi);
              redirect('admin/testimoni');
        }
    }


    public function hapus($id)
    {
        $this->Testimoni_model->hapus($id);


        $this->session->set_flashdata('hapus', 'Testimoni berhasil dihapus!');
        //redirect
        redirect('admin/testimoni');

    }

}