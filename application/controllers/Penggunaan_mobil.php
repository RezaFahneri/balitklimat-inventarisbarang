<?php

class Penggunaan_mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_penggunaan');
        $this->load->Model('Model_kendaraan');
        $this->load->Model('Model_pegawai');
        $this->load->helper('url', 'array', 'fungsi');
        $this->load->library('form_validation', 'upload');
        $this->load->library('session');
        if ($this->session->userdata('logged_in') == false) {
			redirect('login');
		}
    }

    function index()
    {
        $data['data_penggunaan'] = $this->Model_penggunaan->getList();
        $data['title'] = "Penggunaan Mobil | Balitklimat";
        $this->load->view('template/template', $data);
        $this->load->view('kendaraan/v_penggunaan_mobil', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data['title'] = 'Tambah Penggunaan Mobil | Balitklimat';
        $data['pegawai'] = $this->Model_pegawai->tampil_datapenggunaan();
        $data['kendaraan'] = $this->Model_kendaraan->tampil_datapenggunaan();
        $data['sopir1_dalam'] = $this->Model_penggunaan->count_sopir1_dalam();
        $data['sopir1_luar'] = $this->Model_penggunaan->count_sopir1_luar();
        $data['sopir2_dalam'] = $this->Model_penggunaan->count_sopir2_dalam();
        $data['sopir2_luar'] = $this->Model_penggunaan->count_sopir2_luar();
        $this->load->view('template/template', $data);
        $this->load->view('kendaraan/v_tambah_penggunaan', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah_aksi()
    {
        if ($this->input->post('submit')); {
            $this->form_validation->set_rules('nip', 'nip', 'required');
            $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'required');
            $this->form_validation->set_rules('tgl_pemakaian', 'tgl_pemakaian', 'required');
            $this->form_validation->set_rules('lama_pemakaian', 'lama_pemakaian', 'required');
            $this->form_validation->set_rules('status_penggunaan', 'status_penggunaan', 'required');

            if ($this->form_validation->run() == true) {
                $nip     = $this->input->post('nip');
                $id_kendaraan     = $this->input->post('id_kendaraan');
                $tgl_pemakaian    = $this->input->post('tgl_pemakaian');
                $lama_pemakaian   = $this->input->post('lama_pemakaian');
                $perjalanan   = $this->input->post('perjalanan');
                $status_penggunaan         = $this->input->post('status_penggunaan');

                $data = array(
                    'nip'    => $nip,
                    'id_kendaraan'    => $id_kendaraan,
                    'tgl_pemakaian'   => $tgl_pemakaian,
                    'lama_pemakaian'  => $lama_pemakaian,
                    'perjalanan'  => $perjalanan,
                    'status_penggunaan'      => $status_penggunaan,
                );
                //Mengubah status data kendaraan
                $statuskendaraan = $this->db->where('id_kendaraan', $id_kendaraan)->get('data_kendaraan')->row('status');
                $updatestatuskendaraan = (int) $statuskendaraan + 1;
                $this->db->set('status', $updatestatuskendaraan)->where('id_kendaraan', $id_kendaraan)->update('data_kendaraan');

                $this->Model_penggunaan->input_data($data, 'penggunaan_mobil');
                $this->session->set_flashdata('sukses', 'Berhasil menambahkan data penggunaan mobil');
                redirect('penggunaan_mobil');
            } else {
                $this->session->set_flashdata('sukses', validation_errors());
                redirect('penggunaan_mobil/tambah');
            }
        }
    }

    function selesai($id,$id_kendaraan)
    {
        $where = array('id_penggunaan' => $id);
        $data = array(
            'status_penggunaan' => 2,
        );

        $where2 = array('id_kendaraan' => $id_kendaraan);
        $data2 = array(
            'status' => 1,
        );

        $this->Model_penggunaan->update_data($where, $data, 'penggunaan_mobil');
        $this->Model_kendaraan->update_data($where2, $data2, 'data_kendaraan');
        $this->session->set_flashdata('sukses', 'Penggunaan mobil sudah selesai');
        redirect('penggunaan_mobil');
    }

    // function selesai()
    // {

    // }
}
