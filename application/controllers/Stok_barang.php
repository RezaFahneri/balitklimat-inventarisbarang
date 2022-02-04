<?php

class Stok_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_stok');
        $this->load->helper('url');
        $this->load->library('form_validation', 'upload');
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
    // function tambah_aksi()
    // {
    //     $data_stok = $this->input->post('data_stok');
    //     $data = array(
    //         'nama_pegawai' =>$nama_pegawai,
    //         'nip'   => $nip,
    //     );
    //     $this->Model_stok->input_data($data, 'data_stok');
    //     redirect('data_stok');
    // }
    function tambah_aksi()
    {

        // $config['upload_path']          = './assets/upload';
        // $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|xlsx|doc';
        // $config['max_size']             = 10000;
        // $config['file_name'] = $_FILES['file']['name'];

        // $this->load->library('upload', $config);

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
        // $kode               = $this->input->post('kode');
        // $gambar                  = $this->input->post('gambar');
        // $nama_barang               = $this->input->post('nama_barang');
        // $id_jenis = $this->input->post('jenis_barang');
        // $id_satuan = $this->input->post('satuan_barang');
        // $jumlah_barang                             = $this->input->post('jumlah_barang');
        // $kondisi_barang                             = $this->input->post('kondisi_barang');
        // $keterangan    = $this->input->post('keterangan');

        //         $data = array(
        //             'kode'              => $kode,
        //             'gambar'                      => $gambar,
        //             'nama_barang'                      => $nama_barang,
        //             'jenis_barang'                        => $id_jenis,
        //             'satuan_barang' => $id_satuan,
        //             'jumlah_barang'                                   => $jumlah_barang,
        //             'kondisi_barang'                                   => $kondisi_barang,
        //             'keterangan'      => $keterangan
        //         );
        //         $this->load->Model('Model_stok');
        //         $this->Model_stok->input_data($data, 'stok_barang');
        //         $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        // <strong>Stok Barang berhasil ditambahkan!</strong>
        // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        // <span aria-hidden="true">&times</span>
        // </button>
        // </div>');
    }
    function edit()
    {
        $id = $this->input->get('id_barang');
		$data['monitoring'] = $this->Model_stok->getList();
        $data['title'] = 'Edit Stok Barang | Balitklimat';
        if ($this->Model_stok->checkAvailability($id) == true) {
			$data['primary_view'] = 'stok/v_update_stok';
		} else {
			// $data['primary_view'] = '404_view';
		}
        // $where = array('id_barang' => $id);
        // $data['update_stok'] = $this->db->query("SELECT * FROM stok_barang WHERE id_barang='$id'")->result();
        $data['edit'] = $this->Model_stok->getDetail($id);
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
