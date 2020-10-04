<?php
use Dompdf\Dompdf;
use Dompdf\Options;
class Jadwal extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->model('admin');
        $this->load->library('upload');
        $this->load->model('Jadwal_model');
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
        if(isset($_GET['bulan']) && ! empty($_GET['bulan'])){
            $data['jadwal']=$this->db->query("Select * from jadwal where MONTH(waktu) = '$_GET[bulan]' AND YEAR(waktu) = '$_GET[tahun]' order by id_jadwal desc")->result();
            $data['url_cetak'] = 'admin/jadwal/print?bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'];
        } else {
            $data['jadwal']=$this->db->query("Select * from jadwal order by id_jadwal desc")->result();
            $data['url_cetak'] = 'admin/jadwal/print';
        }
        
        // load view admin/overview.php
        $this->load->view("admin/jadwal", $data);
    }
    
    public function print()
    {
        if(isset($_GET['bulan']) && ! empty($_GET['bulan'])){
            $data['jadwal']=$this->db->query("Select * from jadwal where MONTH(waktu) = '$_GET[bulan]' AND YEAR(waktu) = '$_GET[tahun]' order by id_jadwal desc")->result();
        } else {
            $data['jadwal']=$this->db->query("Select * from jadwal order by id_jadwal desc")->result();
        }
   
        $html = $this->load->view('admin/jadwal/print', $data, true);

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

	 public function tambah()
    {

        $this->load->view('admin/jadwal/tambah_jadwal');
    }

    public function simpan()
    {
        $data = array(

            'waktu'         => $this->input->post("waktu"),
            'lokasi'         => $this->input->post("lokasi"),
            'status'         => $this->input->post("status"),
            'latitude'         => $this->input->post("latitude"),
            'longitude'         => $this->input->post("longitude"),

        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');

        $this->form_validation->set_message('required', '<div class="alert alert-danger">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> %s</b> masih kosong, silahkan isi</div></div>');

        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('admin/jadwal/tambah_jadwal');
                }
                else
                {
                   
                    $this->db->insert('jadwal',$data);
                    $this->session->set_flashdata('tambah', 'Jadwal berhasil ditambahkan!');
                    redirect('admin/jadwal/');
                }


    }

   public function edit()
    {
        $id_jadwal = $this->uri->segment(4);


        $data = array(
            'jadwal' => $this->Jadwal_model->edit($id_jadwal),
        );

        $this->load->view('admin/jadwal/edit_jadwal', $data);
    }

    public function update()
    {
        $id['id_jadwal'] = $this->input->post("id_jadwal");
        $data = array(
			'waktu'         => $this->input->post("waktu"),
            'lokasi'         => $this->input->post("lokasi"),
            'status'         => $this->input->post("status"),
            'latitude'         => $this->input->post("latitude"),
            'longitude'         => $this->input->post("longitude"),
            
        );
        $this->Jadwal_model->update($data, $id);
        $this->session->set_flashdata('edit', 'Jadwal Berhasil Diedit');
        //redirect
        redirect('admin/jadwal/');
    }


    public function hapus($id_jadwal)
    {
        $id['id_jadwal'] = $this->uri->segment(4);

        $this->Jadwal_model->hapus($id);


		$this->session->set_flashdata('hapus', 'Jadwal berhasil dihapus!');

        //redirect
        redirect('admin/jadwal/');

    }

   
}
