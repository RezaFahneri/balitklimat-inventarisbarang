<?php

class Pinjam_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_pinjam');
        $this->load->Model('Model_stok');
        $this->load->helper('url', 'array', 'fungsi');
        $this->load->library('form_validation', 'upload');
        $this->load->library('session');
        $this->session->keep_flashdata('pesan');
    }

    function index()
    {
        $data['data_pinjam'] = $this->Model_pinjam->getList();
        $data['title'] = "Peminjaman Barang | Balitklimat";
        $this->load->view('template/template', $data);
        $this->load->view('peminjaman/v_pinjam', $data);
        $this->load->view('template/footer', $data);
    }

    function pinjam()
    {
        $data['title'] = 'Pinjam Barang | Balitklimat';
        $data['barang'] = $this->Model_stok->tampil_datapinjam();
        $this->load->view('template/template', $data);
        $this->load->view('peminjaman/v_tambah_pinjam', $data);
        $this->load->view('template/footer', $data);
    }

    function pinjam_aksi()
    {
        if ($this->input->post('submit')); {
            // $this->db->join('pinjam_barang p', 'bk.barang_id = b.id_barang');
            // $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
            $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
            $this->form_validation->set_rules('peminjam', 'peminjam', 'required');
            $this->form_validation->set_rules('tglpinjam', 'tglpinjam', 'required');
            $this->form_validation->set_rules('tglselesai', 'tglselesai', 'required');
            $this->form_validation->set_rules('qty', 'qty', 'required');
            $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required');
            $this->form_validation->set_rules('lokasi', 'lokasi', 'required');

            if ($this->form_validation->run() == true) {
                $idbarang     = $this->input->post('id_barang');
                $peminjam     = $this->input->post('peminjam');
                $tglpinjam    = $this->input->post('tglpinjam');
                $tglselesai   = $this->input->post('tglselesai');
                $qty          = $this->input->post('qty');
                $kegiatan     = $this->input->post('kegiatan');
                $lokasi       = $this->input->post('lokasi');
                $status         = $this->input->post('status');

                $data = array(
                    'id_barang'    => $idbarang,
                    'peminjam'    => $peminjam,
                    'tglpinjam'   => $tglpinjam,
                    'tglselesai'  => $tglselesai,
                    'qty'         => $qty,
                    'kegiatan'    => $kegiatan,
                    'lokasi'      => $lokasi,
                    'status'      => $status,
                );
                //Mengurangi stok barang
                $stokbarang = $this->db->where('id_barang', $idbarang)->get('stok_barang')->row('jumlah_barang');
                if ($stokbarang >= $qty) {
                    $this->Model_pinjam->input_data($data, 'pinjam_barang');
                    $updatestokbarang = (int) $stokbarang - $qty;
                    $this->db->set('jumlah_barang', $updatestokbarang)->where('id_barang', $idbarang)->update('stok_barang');
                    $this->session->set_flashdata('sukses', 'Berhasil melakukan peminjaman barang');
                    redirect('pinjam_barang');
                } else {
                    $this->session->set_flashdata('pesan', 'Gagal melakukan peminjaman, stok barang tidak cukup');
                    redirect('pinjam_barang/pinjam');
                }
            } else {
                redirect('pinjam_barang/pinjam');
            }
        }
    }

    function dipinjamkan($id)
    {
        $where = array('id_pinjam' => $id);
        $data = array(
            'status' => 2,
        );
        $this->load->Model('Model_pinjam');
        $this->Model_pinjam->update_data($where, $data, 'pinjam_barang');
        $this->session->set_flashdata('sukses', 'Barang berhasil dipinjamkan');
        redirect('pinjam_barang');
    }

    // function selesai()
    // {

    // }
}
