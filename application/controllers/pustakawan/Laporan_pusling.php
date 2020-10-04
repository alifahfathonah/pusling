<?php
use Dompdf\Dompdf;
use Dompdf\Options;
class Laporan_pusling extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('admin');
        $this->load->model('Laporan_model'); 
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
                $url_cetak = 'pustakawan/laporan_pusling/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->Laporan_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Laporan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'pustakawan/laporan_pusling/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Laporan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Laporan Tahun '.$tahun;
                $url_cetak = 'pustakawan/laporan_pusling/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Laporan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Laporan';
            $url_cetak = 'pustakawan/laporan_pusling/cetak';
            $transaksi = $this->Laporan_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['laporan'] = $transaksi;
        $data['option_tahun'] = $this->Laporan_model->option_tahun();

        // load view admin/overview.php
        $this->load->view("pustakawan/laporan_pusling", $data);
	}

     public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Laporan Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->Laporan_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Laporan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Laporan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Laporan Tahun '.$tahun;
                $transaksi = $this->Laporan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Laporan';
            $transaksi = $this->Laporan_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }


        $data['ket'] = $ket;
        $data['laporan'] = $transaksi;


        $html = $this->load->view('admin/laporan/print', $data, true);

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
        $dompdf->stream('laporan1.pdf', array("Attachment"=>1));
  }
}
