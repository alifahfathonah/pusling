<?php
use Dompdf\Dompdf;
use Dompdf\Options;
class Laporan_buku extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('admin');
        $this->load->model('Laporan_buku_model'); 
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper("file");
        //cek session dan level user
        if($this->admin->is_role() != "pustakawan"){
            redirect("auth/login/");
        }
	}

	public function index()
	{
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Laporan Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'pustakawan/laporan_buku/cetak_buku?filter=1&tanggal='.$tgl;
                $transaksi = $this->Laporan_buku_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Laporan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'pustakawan/laporan_buku/cetak_buku?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Laporan_buku_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Laporan Tahun '.$tahun;
                $url_cetak = 'pustakawan/laporan_buku/cetak_buku?filter=3&tahun='.$tahun;
                $transaksi = $this->Laporan_buku_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Laporan';
            $url_cetak = 'pustakawan/laporan_buku/cetak_buku';
            $transaksi = $this->Laporan_buku_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['buku'] = $transaksi;
        $data['option_tahun'] = $this->Laporan_buku_model->option_tahun();
        // $terbanyak = DB::table('laporan_buku')
        // ->count('judul')
        // load view admin/overview.php
        $this->load->view("pustakawan/laporan_buku", $data);
        
	}

    public function cetak_buku(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Laporan Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->Laporan_buku_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Laporan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Laporan_buku_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Laporan Tahun '.$tahun;
                $transaksi = $this->Laporan_buku_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Laporan';
            $transaksi = $this->Laporan_buku_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }


        $data['ket'] = $ket;
        $data['buku'] = $transaksi;

        $html = $this->load->view('pustakawan/laporan/print_buku', $data, true);

        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $contxt = stream_context_create([ 
            'ssl' => [ 
                'verify_peer' => FALSE, 
                'verify_peer_name' => FALSE,
                'allow_self_signed'=> TRUE
            ] 
        ]);
        $dompdf->setHttpContext($contxt);
        $dompdf->setPaper('F4', 'potrait');
        $dompdf->render();
        $dompdf->stream('laporan1.pdf', array("Attachment"=>0));
  }

    public function baca(){
        $id_users = $this->session->userdata("user_id");
        $data['buku']=$this->db->query("Select * from buku group by judul")->result();
        $data['laporan_baca'] = $this->db->query("select * from laporan_buku  where status='baca' and id_users='$id_users' order by kode_buku ASC")->result();
        // $terbanyak = DB::table('laporan_buku')
        // ->count('judul')
        // load view admin/overview.php
        $this->load->view("pustakawan/buku_baca", $data);
    }

    public function edit()
    {
        $id_laporan_buku = $this->uri->segment(4);

        $data = array(
            'baca' => $this->Laporan_buku_model->edit($id_laporan_buku)
        );

        $this->load->view('pustakawan/laporan/edit_status', $data);
    }

    public function update()
    {
        $id['id_laporan_buku'] = $this->input->post("id_laporan_buku");

        $data = array(
            'status'    => $this->input->post("status")
            
        );
        $this->Laporan_buku_model->update($data, $id);
        $this->session->set_flashdata('sukses', 'Buku berhasil di kembalikan');
        //redirect
        redirect('pustakawan/laporan_buku/baca');
    }

    public function hapus($id_laporan_buku)
    {
        $id['id_laporan_buku'] = $this->uri->segment(4);

        $this->Laporan_buku_model->hapus($id);


        $this->session->set_flashdata('hapus', 'Laporan buku berhasil dihapus!');

        //redirect
        redirect('pustakawan/laporan_buku/');

    }

	
}
