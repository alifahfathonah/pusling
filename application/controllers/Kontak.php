<?php

class Kontak extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('Kontak_model'); 
        $this->load->model('admin');
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper("file");


	}

	public function index()
	{

        $data['kontak']=$this->Kontak_model->get_all();
        // var_dump($data);
        // die;

        // load view admin/overview.php
        $this->load->view("kontak", $data);
	}

}