<?php

class Pustakawan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('admin');
		$this->load->model('Pustakawan_model'); 
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

            'title'     => 'Data pustakawan',
            'pustakawan' => $this->Pustakawan_model->get_all()

        );
        // load view admin/overview.php
        $this->load->view("admin/pustakawan", $data);
	}

	 public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data pustakawan'

        );

        $this->load->view('admin/pustakawan/tambah_pustakawan', $data);
    }

    public function simpan()
    {
        $username = $this->input->post("username");
        $nama_pustakawan = $this->input->post("nama_pustakawan");
        $role = $this->input->post("role");
        $telp_pustakawan = $this->input->post("telp_pustakawan");
        $alamat_pustakawan = $this->input->post("alamat_pustakawan");

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[users.username]|min_length[8]|alpha_numeric');
        $this->form_validation->set_rules('nama_pustakawan', 'Nama', 'required');
        $this->form_validation->set_rules('telp_pustakawan', 'Telepon', 'required|is_unique[pustakawan.telp_pustakawan]|numeric');
        $this->form_validation->set_rules('alamat_pustakawan', 'Alamat', 'required');

        $this->form_validation->set_message('min_length', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> minimal 8 karakter</div></div>');
        $this->form_validation->set_message('numeric', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> hanya menggunakan karakter angka</div></div>');
        $this->form_validation->set_message('alpha_numeric', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> hanya menggunakan format huruf dan angka</div></div>');
        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');
        $this->form_validation->set_message('is_unique', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> ini sudah dipakai, ganti yang lain</div></div>');

        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('admin/pustakawan/tambah_pustakawan');
                }
                else
                {
                   $data_users = array(

                        'tanggal_dibuat'           => date('Y-m-d'),
                        'username'=>$username,
                        'password'=>md5($username),
                        'nama_user'=>$nama_pustakawan,
                        'role'=>$role
                    );
                    $this->db->insert('users',$data_users);
                    $id_users=$this->db->insert_id();
                    $data = array(
                        'id_users'          => $id_users,
                        'nama_pustakawan'         => $nama_pustakawan,
                        'telp_pustakawan'         => $telp_pustakawan,
                        'alamat_pustakawan'    => $alamat_pustakawan,

                    );
                    $this->db->insert('pustakawan',$data);
                    $this->session->set_flashdata('tambah', 'Pustakawan berhasil ditambahkan!');
                    //redirect
                    redirect('admin/pustakawan/');
                }


        

        

    }

   public function edit()
    {
        $id_pustakawan = $this->uri->segment(4);

        $data = array(
            'title'     => 'Edit Data pustakawan',
            'pustakawan' => $this->Pustakawan_model->edit($id_pustakawan)
        );

        $this->load->view('admin/pustakawan/edit_pustakawan', $data);
    }

    public function update()
    {
        $id['id_pustakawan'] = $this->input->post("id_pustakawan");
        $data = array(
            'nama_pustakawan'         => $this->input->post("nama_pustakawan"),
            'telp_pustakawan'         => $this->input->post("telp_pustakawan"),
            'alamat_pustakawan'    => $this->input->post("alamat_pustakawan"),
            
        );
        $this->Pustakawan_model->update($data, $id);
        $this->session->set_flashdata('edit', 'Pustakawan Berhasil Diedit');
        //redirect
        redirect('admin/pustakawan/');
    }


    public function hapus($id_pustakawan)
    {
        $id['id_pustakawan'] = $this->uri->segment(4);
        

        $this->Pustakawan_model->hapus($id);


		$this->session->set_flashdata('hapus', 'Pustakawan berhasil dihapus!');

        //redirect
        redirect('admin/pustakawan/');

    }

}