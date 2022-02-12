<?php

class Stok_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_stok');
        $this->load->Model('Model_jenis');
        $this->load->Model('Model_satuan');
        $this->load->helper('url','array');
        $this->load->library('form_validation', 'upload', 'session');
    }

    function index()
    {
        $data['data_stok'] = $this->Model_stok->tampil_data('stok_barang')->result();
        $data['title'] = "Stok Barang | Balitklimat";
        $this->load->view('template/template', $data);
        $this->load->view('stok/v_stok_barang', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data['title'] = 'Tambah Stok Barang | Balitklimat';
        $id_jenis = $this->input->post('id_jenis', TRUE);
        $data['jenis_barang'] = $this->Model_stok->get_jenis($id_jenis);
        $id_satuan = $this->input->post('id_satuan', TRUE);
        $data['satuan_barang'] = $this->Model_stok->get_satuan($id_satuan);
        $this->load->view('template/template', $data);
        $this->load->view('stok/v_tambah_stok', $data);
        $this->load->view('template/footer', $data);
        // $this->data['golongan'] = $this->Model_stok->get_golongan();
    }

    function tambah_aksi()
    {
        if ($this->input->post('submit')); {
            $this->form_validation->set_rules('kode', 'kode', 'required');
            $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
            $this->form_validation->set_rules('jenis_barang', 'jenis_barang', 'required');
            $this->form_validation->set_rules('satuan_barang', 'satuan_barang');
            $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required');
            $this->form_validation->set_rules('kondisi_barang', 'kondisi_barang', 'required');
            $this->form_validation->set_rules('keterangan', 'keterangan');

            if ($this->form_validation->run() == true) {
                $config['upload_path'] = './assets/images/upload';
                $config['allowed_types'] = 'jpg|png|jpeg|webp';
                $config['max_size']  = '10000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    if ($this->Model_stok->input_data($this->upload->data()) == true) {
                        // $this->session->set_flashdata('announce', 'Berhasil menyimpan data');
                        redirect('stok_barang');
                    } else {
                        // $this->session->set_flashdata('announce', 'Gagal menyimpan data');
                        redirect('stok_barang/tambah');
                    }
                } else {
                    // $this->session->set_flashdata('announce', $this->upload->display_errors());
                    redirect('stok_barang/tambah');
                }
            } else {
                //  $this->session->set_flashdata('announce', validation_errors());
                redirect('stok_barang/tambah');
            }
        }
    }

    function edit()
    {
        // $where = array('id_barang' => $id);
        // $data['edit'] = $this->db->query("SELECT * FROM stok_barang WHERE id_barang='$id'")->result();
        $id = $this->input->get('id_barang');
        $data['primary_view'] = 'stok/v_update_stok';
        // CHECK : Data Availability
		// if ($this->Model_stok->checkAvailability($id) == true) {
		// 	$data['primary_view'] = 'stok_barang/edit';
		// } else {
		// 	// $data['primary_view'] = '404_view';
		// }
        $data['jenis'] = $this->Model_jenis->getList();
        $data['jenis1'] = $this->Model_jenis->getList();

        $data['satuan'] = $this->Model_satuan->getList();
        $data['satuan1'] = $this->Model_satuan->getList();

        $data['edit'] = $this->Model_stok->getDetail($id);
        $data['title'] = 'Edit Stok Barang | Balitklimat';
        $id_jenis = $this->input->post('id_jenis', TRUE);
        $data['jenis_barang'] = $this->Model_stok->get_jenis($id_jenis);
        $id_satuan = $this->input->post('id_satuan', TRUE);
        $data['satuan_barang'] = $this->Model_stok->get_satuan($id_satuan);
        $this->load->Model('Model_stok');
        $this->load->view('template/template', $data);
        $this->load->view('stok/v_update_stok', $data);
        $this->load->view('template/footer', $data);
    }

    function update()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('kode', 'kode', 'required');
            $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
            $this->form_validation->set_rules('jenis_barang', 'jenis_barang', 'required');
            $this->form_validation->set_rules('satuan_barang', 'satuan_barang');
            $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required');
            $this->form_validation->set_rules('kondisi_barang', 'kondisi_barang', 'required');
            $this->form_validation->set_rules('keterangan', 'keterangan');

            if ($this->form_validation->run() == true) {
                $config['upload_path'] = './assets/images/upload';
                $config['allowed_types'] = 'jpg|png|jpeg|webp';
                $config['max_size']  = '10000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar') == true) {
                    if ($this->Model_stok->update_data($this->input->post('id_barang'), $this->upload->data()) == true) {
                        // $this->session->set_flashdata('announce', 'Berhasil menyimpan data');
                        redirect('stok_barang');
                    } else {
                        // $this->session->set_flashdata('announce', 'Gagal menyimpan data');
                        redirect('stok_barang/edit?id_barang=' . $this->input->post('id_barang'));
                    }
                } else {
                    // $this->session->set_flashdata('announce', $this->upload->display_errors());
                    redirect('stok_barang/edit?id_barang=' . $this->input->post('id_barang'));
                }
            } else {
                // $this->session->set_flashdata('announce', validation_errors());
                redirect('stok_barang/edit?id_barang=' . $this->input->post('id_barang'));
            }
        } else {
            // $this->session->set_flashdata('announce', validation_errors());
            redirect('stok_barang/edit?id_barang=' . $this->input->post('id_barang'));
        }
    }

    // $this->_rules();
    // if ($this->form_validation->run() == FALSE) {
    //     $id = $this->input->post('id_barang');
    //     $this->edit($id);
    // } else {
    //     $id = $this->input->post('id_barang');
    //     $kode               = $this->input->post('kode');
    //     $gambar                  = $this->input->post('gambar');
    //     $nama_barang               = $this->input->post('nama_barang');
    //     $id_jenis = $this->input->post('jenis_barang');
    //     $id_satuan = $this->input->post('satuan_barang');
    //     $jumlah_barang                             = $this->input->post('jumlah_barang');
    //     $kondisi_barang                             = $this->input->post('kondisi_barang');
    //     $keterangan    = $this->input->post('keterangan');

    //     $data = array(
    //         'kode'              => $kode,
    //         'gambar'                      => $gambar,
    //         'nama_barang'                      => $nama_barang,
    //         'jenis_barang'                        => $id_jenis,
    //         'satuan_barang' => $id_satuan,
    //         'jumlah_barang'                                   => $jumlah_barang,
    //         'kondisi_barang'                                   => $kondisi_barang,
    //         'keterangan'      => $keterangan
    //     );
    //     $where = array(
    //         'id'   => $id,
    //     );
    //     $this->load->Model('Model_stok');
    //     $this->Model_stok->update_data($where, $data, 'stok_barang');
    //     redirect('stok_barang');
    // }
    function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->Model_stok->hapus_data($where, 'stok_barang');
        redirect('stok_barang');
    }
    // public function _rules()
    // {
    //     $this->form_validation->set_rules('kode', 'kode', 'required');
    //     $this->form_validation->set_rules('gambar', 'gambar');
    //     $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
    //     $this->form_validation->set_rules('jenis_barang', 'jenis_barang', 'required');
    //     $this->form_validation->set_rules('satuan_barang', 'satuan_barang');
    //     $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required');
    //     $this->form_validation->set_rules('kondisi_barang', 'kondisi_barang', 'required');
    //     $this->form_validation->set_rules('keterangan', 'keterangan');
    // }
}
