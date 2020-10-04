<?php

class Kontak extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('admin');
		$this->load->model('Kontak_model'); 
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
            'kontak' => $this->Kontak_model->get_all()

        );
        // load view admin/overview.php
        $this->load->view("admin/kontak", $data);
	}

     public function edit()
    {
        $id_kontak = $this->uri->segment(4);

        $data = array(
            'title'     => 'Edit Data Testimoni',
            'kontak' => $this->Kontak_model->edit($id_kontak)
        );

        $this->load->view('admin/kontak/edit_kontak', $data);
    }


    public function update()
    {
        $id['id_kontak'] = $this->input->post("id_kontak");
        $data = array(
			'alamat'         => $this->input->post("alamat"),
            'no_hp'    => $this->input->post("no_hp"),
            'email'    => $this->input->post("email"),
            
        );
        $this->Kontak_model->update($data, $id);
        $this->session->set_flashdata('edit', 'Kontak berhasil di Update!');
        //redirect
        redirect('admin/kontak/');
    }

}