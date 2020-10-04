<?php
/**
 * @programmer           : Faris
 * @programmer           : Sugeng
 * @contributor          : Fathul Ilmi N
 *
 * Copyright (C) 2020  By Itgenic (itgenic@gmail.com)
 */

use Dompdf\Dompdf;
use Dompdf\Options;
class Home extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('Kontak_model'); 
        $this->load->model('admin');
        $this->load->model('Laporan_model'); 
        $this->load->library('Ciqrcode');
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper("file");


	}

	public function index()
	{
        $data['testimoni'] = $this->db->query("select * from testimoni")->result();

		$data['Mobil']=$this->db->query("select count(*) from laporan where jenis_pusling='Mobil'")->row_array();
        // var_dump($data['Mobil']);die;

        $data['Motor']=$this->db->query("select count(*) from laporan where jenis_pusling='Motor'")->row_array();

        $data['kontak']=$this->Kontak_model->get_all(); 
        
        $bulan = Date('m');
        $tahun = Date('Y');
        $data['jadwal']=$this->db->query("select * from jadwal where month(waktu)= '$bulan' and year(waktu)='$tahun'")->result();
        $data['alljadwal']=$this->db->query("select * from jadwal")->result();

        // var_dump($data);
        // die;

        // load view admin/overview.php
        $this->load->view("home", $data);
    }
    
    public function cetak_laporan($id)
    {
        $data['data'] = $this->Laporan_model->view_by_id($id);
        $html = $this->load->view('admin/laporan/print_laporan', $data, true);
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
        $dompdf->stream('laporan.pdf', array("Attachment"=>0));
    }

}
