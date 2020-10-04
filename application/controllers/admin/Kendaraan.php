<?php

class Kendaraan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('admin');
		$this->load->model('Kendaraan_model'); 
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
        $data['kendaraan'] = $this->db->query("Select * from kendaraan")->result();
        // load view admin/overview.php
        $this->load->view("admin/kendaraan", $data);
	}

	 public function tambah()
    {

        $this->load->view('admin/kendaraan/tambah_kendaraan');
    }

    public function simpan()
    {
        $data = array(

            'kode_kendaraan'         => $this->input->post("kode_kendaraan"),
            'jenis_kendaraan'         => $this->input->post("jenis_kendaraan"),

        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode_kendaraan', 'Kode Kendaraan', 'required|is_unique[kendaraan.kode_kendaraan]');
        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');

        $this->form_validation->set_message('min_length', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> minimal 5 karakter</div></div>');
        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');
        $this->form_validation->set_message('is_unique', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> ini sudah dipakai, ganti yang lain</div></div>');



        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('admin/kendaraan/tambah_kendaraan');
                }
                else
                {
                   
                    $this->Kendaraan_model->simpan($data);
                    $this->session->set_flashdata('tambah', 'Kendaraan berhasil ditambahkan!');
                    redirect('admin/kendaraan/');
                }


    }

   public function edit()
    {
        $id_kendaraan = $this->uri->segment(4);


        $data = array(
            'kendaraan' => $this->Kendaraan_model->edit($id_kendaraan),
        );

        $data['select']=$this->db->query("Select * from kendaraan where id_kendaraan=$id_kendaraan")->row_array();


        $this->load->view('admin/kendaraan/edit_kendaraan', $data);
    }

    public function update()
    {
        $id['id_kendaraan'] = $this->input->post("id_kendaraan");
        $data = array(
			'kode_kendaraan'         => $this->input->post("kode_kendaraan"),
            'jenis_kendaraan'         => $this->input->post("jenis_kendaraan"),
            
        );
        $this->Kendaraan_model->update($data, $id);
        $this->session->set_flashdata('edit', 'Kendaraan Berhasil Diedit');
        //redirect
        redirect('admin/kendaraan/');
    }


    public function hapus($id_kendaraan)
    {
        $id['id_kendaraan'] = $this->uri->segment(4);

        $this->Kendaraan_model->hapus($id);


		$this->session->set_flashdata('hapus', 'Kendaraan berhasil dihapus!');

        //redirect
        redirect('admin/kendaraan/');

    }

}