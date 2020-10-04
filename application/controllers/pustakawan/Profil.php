<?php

class Profil extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		 $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "pustakawan"){
            redirect("auth/login/");
        }
	}

	public function index()
	{
        // load view admin/overview.php

        $id_users = $this->session->userdata('user_id');

        $data['pustakawan']=$this->db->query("select * from pustakawan inner join users on pustakawan.id_users = users.id_users where pustakawan.id_users='$id_users'") ->result() ;

        $this->load->view("pustakawan/profil", $data);
	}

    public function update(){
        // var_dump($_POST);die;
        $id_users = $this->session->userdata("user_id");
        $nama_pustakawan = $this->input->post("nama_pustakawan");
        $telp_pustakawan = $this->input->post("telp_pustakawan");
        $alamat_pustakawan = $this->input->post("alamat_pustakawan");
        $id_pustakawan = $this->input->post("id_pustakawan");

        $data = array(
            'nama_pustakawan'      => $nama_pustakawan,
            'telp_pustakawan'      => $telp_pustakawan,
            'alamat_pustakawan'    => $alamat_pustakawan

        );
            $this->db->update('pustakawan',$data,array('id_pustakawan'=>$id_pustakawan));
            $this->session->set_flashdata('update', 'Profil Berhasil Diedit');
            redirect('pustakawan/profil');


    }


    public function update_password()
    {
        $password_lama = md5($this->input->post("password_lama"));
        $password_baru = md5($this->input->post("password_baru"));
        $konfir_password_baru = md5($this->input->post("konfir_password_baru"));
        $id_users = $this->session->userdata("user_id");
        $tabel_user=$this->db->query("SELECT * FROM users where id_users='$id_users'")->row_array();
        

        if($tabel_user['password'] == $password_lama){
            if($password_baru == $konfir_password_baru){
                $data = array(
                'password'         => $password_baru
                );

                $this->db->update('users',$data,array('id_users'=>$id_users));
                $this->session->set_flashdata('update', 'Password Berhasil Diubah');
                //redirect
            }
        }else{

        $this->session->set_flashdata('gagal', 'Password lama tidak sesuai');
        }
        redirect('pustakawan/profil');
        

    }

}