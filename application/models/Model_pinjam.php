<?php
class Model_pinjam extends CI_model
{
	function tampil_data($table)
	{
		// $this->db->select('*');
		// $this->db->join('stok_barang', 'stok_barang.id_barang = pinjam_barang.id_barang');
		// if ($id_barang != null) {
		// 	$this->db->where('id_barang', $id_barang);
		// }
		return $this->db->get($table);
	}

	public function getList()
	{
		//return $query = $this->db->order_by('id_proyek', 'ASC')->get('proyek')->result();
		$this->db->select('*');
		$this->db->from('pinjam_barang');
		$this->db->join('stok_barang', 'stok_barang.id_barang = pinjam_barang.id_barang');
		return $this->db->get()->result();
	}

	function input_data()
	{
		$data = array(
			'id_barang'               => $this->input->post('id_barang'),
			'peminjam'               => $this->input->post('peminjam'),
			'tglpinjam' => $this->input->post('tglpinjam'),
			'tglselesai'                             => $this->input->post('tglselesai'),
			'qty'                             => $this->input->post('qty'),
			'kegiatan'    => $this->input->post('kegiatan'),
			'lokasi'    => $this->input->post('lokasi'),
			'status'    => $this->input->post('status'),
		);

		$this->db->insert('pinjam_barang', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
