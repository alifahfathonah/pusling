<?php

class Buku extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('admin');
		$this->load->model('Buku_model'); 
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

        $data['buku']=$this->db->query("Select * from buku  order by kode_buku ASC")->result();
        

        // load view admin/overview.php
        $this->load->view("admin/buku", $data);
	}

	 public function tambah()
    {

        $data['klasifikasi']=$this->Klasifikasi_model->klasifikasi();
        $this->load->view('admin/buku/tambah_buku', $data);
    }

    public function simpan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tempat_terbit', 'Tempat Terbit', 'required');
        $this->form_validation->set_rules('klasifikasi', 'klasifikasi', 'required');
        $this->form_validation->set_rules('call_number', 'call_number', 'required');

        $this->form_validation->set_message('min_length', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> minimal 5 karakter</div></div>');
        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');
        $this->form_validation->set_message('is_unique', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> ini sudah dipakai, ganti yang lain</div></div>');



        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/buku/tambah_buku');
        }
        else
        {
            $jumlah = $this->input->post('eksemplar');
            for($i = 0;  $i < $jumlah; $i++)
            {
                $data = array(
                    'kode_buku'     => $this->get_idbuku(),
                    'judul'         => $this->input->post("judul"),
                    'pengarang'     => $this->input->post("pengarang"),
                    'penerbit'      => $this->input->post("penerbit"),
                    'tempat_terbit' => $this->input->post("tempat_terbit"),
                    'klasifikasi'   => $this->input->post("klasifikasi"),
                    'call_number'   => $this->input->post("call_number"),
                );
                
                $this->Buku_model->simpan($data);
            }
            
            $this->session->set_flashdata('tambah', 'Buku berhasil ditambahkan!');
            redirect('admin/buku/');
        }

    }

    public function get_idbuku(){
        return sprintf("%04s", $this->Buku_model->get_idmax() + 1 );    
    }

    public function edit()
    {
        $id_buku = $this->uri->segment(4);


        $data = array(
            'title'     => 'Edit Data Buku',
            'buku' => $this->Buku_model->edit($id_buku),
        );

        $data['buku_klasifikasi']=$this->db->query("Select * from buku where id_buku=$id_buku")->row_array();

        $data['klasifikasi']=$this->db->query("Select * from klasifikasi order by klasifikasi ASC")->result();

        $this->load->view('admin/buku/edit_buku', $data);
    }

    public function update()
    {
        $id['id_buku'] = $this->input->post("id_buku");
        $data = array(
			'kode_buku'         => $this->input->post("kode_buku"),
            'judul'         => $this->input->post("judul"),
            'pengarang'         => $this->input->post("pengarang"),
            'penerbit'         => $this->input->post("penerbit"),
            'tempat_terbit'         => $this->input->post("tempat_terbit"),
            'id_klasifikasi'    => $this->input->post("id_klasifikasi"),
            
        );
        $this->Buku_model->update($data, $id);
        $this->session->set_flashdata('edit', 'Buku Berhasil Diedit');
        //redirect
        redirect('admin/buku/');
    }


    public function hapus($id_buku)
    {
        $id['id_buku'] = $this->uri->segment(4);

        $this->Buku_model->hapus($id);


		$this->session->set_flashdata('hapus', 'Buku berhasil dihapus!');

        //redirect
        redirect('admin/buku/');

    }

   
}
