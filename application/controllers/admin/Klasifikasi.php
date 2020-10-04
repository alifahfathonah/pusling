<?php

class Klasifikasi extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('admin');
        $this->load->model('Klasifikasi_model'); 
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper("file");
        $this->load->helper(array('url'));
        $this->load->database();
        //cek session dan level user
        if($this->admin->is_role() != "superadmin"){
            redirect("auth/login/");
        }
	}

	public function index()
	{

		$data = array(

            'title'     => 'Data Klasifikasi',
            'klasifikasi' => $this->Klasifikasi_model->get_all()

        );
        // load view admin/overview.php
        $this->load->view("admin/klasifikasi", $data);
	}

	 public function tambah()
    {


        $this->load->view('admin/klasifikasi/tambah_klasifikasi');
    }

    public function simpan()
    {
        $data = array(

            'klasifikasi'    => $this->input->post("klasifikasi"),

        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|is_unique[klasifikasi.klasifikasi]');

        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');
        $this->form_validation->set_message('is_unique', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> ini sudah dipakai, ganti yang lain</div></div>');



        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('admin/klasifikasi/tambah_klasifikasi');
                }
                else
                {
                   
                    $this->Klasifikasi_model->simpan($data);
                    $this->session->set_flashdata('tambah', 'Klasifikasi berhasil ditambahkan!');
                    redirect('admin/klasifikasi/');
                }


    }

   public function edit()
    {
        $id_klasifikasi = $this->uri->segment(4);


        $data = array(
            'klasifikasi' => $this->Klasifikasi_model->edit($id_klasifikasi)
        );


        $this->load->view('admin/klasifikasi/edit_klasifikasi', $data);
    }

    public function update()
    {
        $id['id_klasifikasi'] = $this->input->post("id_klasifikasi");
        $data = array(
            'klasifikasi'    => $this->input->post("klasifikasi")
            
        );
        $this->Klasifikasi_model->update($data, $id);
        $this->session->set_flashdata('edit', 'Klasifikasi Berhasil Diedit');
        //redirect
        redirect('admin/klasifikasi/');
    }


    public function hapus($id_klasifikasi)
    {
        $id['id_klasifikasi'] = $this->uri->segment(4);

        $this->Klasifikasi_model->hapus($id);


		$this->session->set_flashdata('hapus', 'Klasifikasi berhasil dihapus!');

        //redirect
        redirect('admin/klasifikasi/');

    }

}