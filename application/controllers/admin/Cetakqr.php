<?php
use Dompdf\Dompdf;
use Dompdf\Options;
class Cetakqr extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('admin');
		$this->load->model('Buku_model'); 
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->library('Ciqrcode');
        $this->load->library('Zend');
        $this->load->helper("file");
        //cek session dan level user
        if($this->admin->is_role() != "superadmin"){
            redirect("auth/login/");
        }
	}

    public function QRcode($kodenya){

        // render qr code dengan format gambar png
        QRcode::png(
            $kodenya,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 10,
            $margin = 1
        );
    }

    public function Barcode($kodenya)
    {
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array('text' => $kodenya));
    }

    public function cetak()
    {
        $data['data'] = $this->input->post('id');
        

        $this->load->view('admin/cetak_qr', $data);
        // $html = $this->load->view('admin/cetak_qr', $data, true);

        // $options = new Options();
        // $options->set('isRemoteEnabled', TRUE);
        // $dompdf = new Dompdf($options);
        // $dompdf->loadHtml($html);
        // $contxt = stream_context_create([ 
        //     'ssl' => [ 
        //         'verify_peer' => FALSE, 
        //         'verify_peer_name' => FALSE,
        //         'allow_self_signed'=> TRUE
        //     ] 
        // ]);
        // $dompdf->setHttpContext($contxt);
        // $dompdf->setPaper('F4', 'potrait');
        // $dompdf->render();
        // $dompdf->stream('laporan1.pdf', array("Attachment"=>0));

    }

	public function index()
	{

        $data['buku']=$this->db->query("Select * from buku  order by kode_buku ASC")->result();

        // load view admin/overview.php
        $this->load->view("admin/cetakqr", $data);
	}

	 // public function tambah()
  //   {
  //       $data = array(

  //           'title'     => 'Tambah Data Buku'

  //       );

  //       $this->load->view('admin/buku/tambah_buku', $data);
  //   }

  //   public function simpan()
  //   {
  //       $data = array(

  //           'kode_buku'         => $this->input->post("kode_buku"),
  //           'judul'         => $this->input->post("judul"),
  //           'pengarang'         => $this->input->post("pengarang"),
  //           'penerbit'         => $this->input->post("penerbit"),
  //           'tempat_terbit'         => $this->input->post("tempat_terbit"),
  //           'klasifikasi'    => $this->input->post("klasifikasi"),

  //       );

  //       $this->Buku_model->simpan($data);

		// $this->session->set_flashdata('tambah', 'Buku berhasil ditambahkan!');


  //       //redirect
  //       redirect('admin/buku/');

  //   }

  //  public function edit()
  //   {
  //       $id_buku = $this->uri->segment(4);

  //       $data = array(
  //           'title'     => 'Edit Data Buku',
  //           'buku' => $this->Buku_model->edit($id_buku)
  //       );

  //       $this->load->view('admin/buku/edit_buku', $data);
  //   }

  //   public function update()
  //   {
  //       $id['id_buku'] = $this->input->post("id_buku");
  //       $data = array(
		// 	'kode_buku'         => $this->input->post("kode_buku"),
  //           'judul'         => $this->input->post("judul"),
  //           'pengarang'         => $this->input->post("pengarang"),
  //           'penerbit'         => $this->input->post("penerbit"),
  //           'tempat_terbit'         => $this->input->post("tempat_terbit"),
  //           'klasifikasi'    => $this->input->post("klasifikasi"),
            
  //       );
  //       $this->Buku_model->update($data, $id);
  //       $this->session->set_flashdata('edit', 'Buku Berhasil Diedit');
  //       //redirect
  //       redirect('admin/buku/');
  //   }


    public function hapus($id_buku)
    {
        $id['id_buku'] = $this->uri->segment(4);

        $this->Buku_model->hapus($id);


		$this->session->set_flashdata('hapus', 'Buku berhasil dihapus!');

        //redirect
        redirect('admin/buku/');

    }

}
