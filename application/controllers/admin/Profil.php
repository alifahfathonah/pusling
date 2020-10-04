<?php

class Profil extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('Profil_model'); 
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

    $data['profil'] = $this->db->query('Select * from profil')->result();
        // load view admin/profil
        $this->load->view("admin/profil", $data);
	}


   public function edit($id_profil)
    {
        $id_galeri = $this->uri->segment(4);

        $data = array(

            'title'     => 'Edit Data Galeri',
            'profil' => $this->Profil_model->edit($id_profil)

        );

        $this->load->view('admin/profil/edit_profil', $data);
    }

    public function update()
    {
         $id   = $this->input->post('id');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

      $path = './assets/images_profil/';

      $kondisi = array('id_profil' => $id );

      // get foto
      $config['upload_path'] = './assets/images_profil';
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
                              'isi'     => $isi,
                            );
              // hapus foto pada direktori
              @unlink($path.$this->input->post('filelama'));

                            $this->Profil_model->update($data,$kondisi);
              $this->session->set_flashdata('update', 'Profil berhasil diedit!');
              redirect('admin/profil');
            }else {
              $this->session->set_flashdata('gagal_gagal', 'Profil gagal diedit!');
              redirect('admin/profil');
            }
        }else {
          $foto = $this->upload->data();
                $data = array(
                              'judul'       => $judul,
                              'isi'     => $isi,
                            );

                            $this->Profil_model->update($data,$kondisi);
              $this->session->set_flashdata('update', 'Profil berhasil diedit!');
              redirect('admin/profil');
        }

    }


}