<?php

class User extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		$this->load->model('User_model'); 
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
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data User Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'admin/user/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->User_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data User Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'admin/user/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->User_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data User Tahun '.$tahun;
                $url_cetak = 'admin/user/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->User_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data User';
            $url_cetak = 'admin/user/cetak';
            $transaksi = $this->User_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['user'] = $transaksi;
        $data['option_tahun'] = $this->User_model->option_tahun();
        // $data['user'] = $this->User_model->get_all();
        // $data['user'] = $this->User_model->view_row();
        // load view admin/overview.php
        $this->load->view("admin/user", $data);
	}

    public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->User_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->User_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->User_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->User_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }


        $data['ket'] = $ket;
        $data['user'] = $transaksi;


    ob_start();
    // $data['users'] = $this->User_model->view_row();
    $this->load->view('admin/user/print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data User.pdf', 'D');
  }

	 public function tambah()
    {


        $this->load->view('admin/user/tambah_user');
    }

    public function simpan()
    {
        $data = array(

            'tanggal_dibuat'           => date('Y-m-d'),
            'username'    => $this->input->post("username"),
            'password'    => md5($this->input->post('password')),
            'nama_user'    => $this->input->post("nama_user"),
            'role'    => $this->input->post("role"),

        );

        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[users.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|required');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        $this->form_validation->set_message('min_length', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> minimal 5 karakter</div></div>');
        $this->form_validation->set_message('alpha_numeric', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> hanya menggunakan huruf dan angka</div></div>');
        $this->form_validation->set_message('matches', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> salah, coba lagi!</div></div>');
        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');
        $this->form_validation->set_message('is_unique', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> ini sudah dipakai, ganti yang lain</div></div>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/user/tambah_user');
        }
        else
        {
            $this->session->set_flashdata('tambah', 'User berhasil ditambahkan!');
            $this->User_model->simpan($data);
            redirect('admin/user/');
        }
        

    }

   public function edit()
    {
        $id_users = $this->uri->segment(4);

        $data = array(
            'title'     => 'Edit Data Testimoni',
            'users' => $this->User_model->edit($id_users)
        );

        $this->load->view('admin/user/edit_user', $data);
    }

    public function update()
    {
        $id['id_users'] = $this->input->post("id_users");
        $data = array(
			'username'         => $this->input->post("username"),
            'password'    => md5($this->input->post('password')),
            'nama_user'    => $this->input->post("nama_user"),
            'role'    => $this->input->post("role"),
            
        );
        $this->User_model->update($data, $id);
        $this->session->set_flashdata('edit', 'User Berhasil Diedit');
        //redirect
        redirect('admin/user/');
    }


    public function hapus($id_users)
    {
        $id['id_users'] = $this->uri->segment(4);

        $this->User_model->hapus($id);


		$this->session->set_flashdata('hapus', 'User berhasil dihapus!');

        //redirect
        redirect('admin/user/');

    }

    public function export_excel(){
        $data = array(
            'title' => 'LaporanExcel',
            'user' => $this->User_model->listing(),
        );
        $this->load->view('admin/user/laporan_excel',$data);
    }

}
