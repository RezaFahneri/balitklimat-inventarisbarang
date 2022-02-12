<?php

class Pinjam_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_pinjam');
        $this->load->helper('url', 'array');
        $this->load->library('form_validation', 'upload', 'session');
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
        $data['barang'] = $this->Model_pinjam->tampil_data('stok_barang', 'jumlah_barang' > 0)->result();
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
                $this->Model_pinjam->input_data('pinjam_barang');
                redirect('pinjam_barang');
            } else {
                //  $this->session->set_flashdata('announce', validation_errors());
                redirect('pinjam_barang/pinjam');
            }
        }
    }
}
