<?php
use Dompdf\Dompdf;
use Dompdf\Options;
class Laporan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('admin');
        $this->load->model('Laporan_model'); 
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->library('Ciqrcode');
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

                $ket = 'Data Laporan Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'admin/laporan/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->Laporan_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Laporan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'admin/laporan/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Laporan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Laporan Tahun '.$tahun;
                $url_cetak = 'admin/laporan/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Laporan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Laporan';
            $url_cetak = 'admin/laporan/cetak';
            $transaksi = $this->Laporan_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        // $this->db->set('');
        // $this->db->where();
        // $this->db->update();

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['laporan'] = $transaksi;
        $data['option_tahun'] = $this->Laporan_model->option_tahun();
        // load view admin/overview.php
        $this->load->view("admin/laporan", $data);
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

    // public function hapus($id_laporan)
    // {
    //     $id['id_laporan'] = $this->uri->segment(4);

    //     $this->Laporan_model->hapus($id);


    //     $this->session->set_flashdata('hapus', 'Laporan berhasil dihapus!');

    //     //redirect
    //     redirect('admin/laporan/');

    // }

  public function edit($id_laporan)
    {
        $id_laporan = $this->uri->segment(4);

        $data['laporan'] = $this->Laporan_model->edit($id_laporan);


        $data['laporans']=$this->db->query("Select * from laporan where id_laporan=$id_laporan")->row_array();

        $this->load->view('admin/laporan/edit_laporan', $data);
    }

    public function update()
    {
         $id   = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nama_ast = $this->input->post('nama_ast');
        $nama_sup = $this->input->post('nama_sup');
        $jenis_pusling = $this->input->post('jenis_pusling');
        $kode_kendaraan = $this->input->post('kode_kendaraan');
        $alamat_lokasi = $this->input->post('alamat_lokasi');
        $no_pengelola = $this->input->post('no_pengelola');
        $tot_pengunjung = $this->input->post('tot_pengunjung');
        $tot_lk = $this->input->post('tot_lk');
        $tot_pr = $this->input->post('tot_pr');
        $gambar = $this->input->post('gambar');

      $path = './assets/images_laporan/';

      $kondisi = array('id_laporan' => $id );

      // get foto
      $config['upload_path'] = './assets/images_laporan';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['encrypt_name'] = TRUE;
      $config['file_name'] = $_FILES['gambar']['name'];

      $this->upload->initialize($config);

        if (!empty($_FILES['gambar']['name'])) {
            if ( $this->upload->do_upload('gambar') ) {
                $foto = $this->upload->data();
                $data = array(
                              'nama'       => $nama,
                              'nama_ast'       => $nama_ast,
                              'nama_sup'       => $nama_sup,
                              'jenis_pusling'       => $jenis_pusling,
                              'kode_kendaraan'       => $kode_kendaraan,
                              'alamat_lokasi'       => $alamat_lokasi,
                              'no_pengelola'       => $no_pengelola,
                              'tot_pengunjung'       => $tot_pengunjung,
                              'tot_lk'       => $tot_lk,
                              'tot_pr'       => $tot_pr,
                            'gambar'       => $foto['file_name'],
                            );
              // hapus foto pada direktori
@unlink($path.$this->input->post('filelama'));

            $this->Laporan_model->update($data,$kondisi);
              $this->session->set_flashdata('update', 'Laporan berhasil diedit!');
              redirect('admin/laporan');
            }else {
              $this->session->set_flashdata('gagal_gagal', 'Laporan gagal diedit!');
              redirect('admin/laporan');
            }
        }else {
          $foto = $this->upload->data();
                $data = array(
                              'nama'       => $nama,
                              'nama_ast'       => $nama_ast,
                              'nama_sup'       => $nama_sup,
                              'jenis_pusling'       => $jenis_pusling,
                              'kode_kendaraan'       => $kode_kendaraan,
                              'alamat_lokasi'       => $alamat_lokasi,
                              'no_pengelola'       => $no_pengelola,
                              'tot_pengunjung'       => $tot_pengunjung,
                              'tot_lk'       => $tot_lk,
                              'tot_pr'       => $tot_pr,
                            );

                            $this->Laporan_model->update($data,$kondisi);
                            
              $this->session->set_flashdata('update', 'Laporan berhasil diedit!');
              redirect('admin/laporan');
        }

    }

    public function set_notif($id_laporan){
      $status_notif = "read";
      $data = array(
            'status_notif' => $status_notif
      );
      $this->db->update('laporan',$data, array('id_laporan' => $id_laporan));
      redirect('admin/laporan');
    }

   public function hapus($id)
    {
        $this->Laporan_model->hapus($id);


        $this->session->set_flashdata('hapus', 'Gambar berhasil dihapus!');
        //redirect
        redirect('admin/galeri');

    }

}
