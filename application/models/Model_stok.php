<?php
class Model_stok extends CI_model
{
	function tampil_data($table)
	{
		return $this->db->get($table);
	}

	function input_data($dokumen)
	{
		$data = array(
			'kode'               => $this->input->post('kode'),
			'gambar'                  => $dokumen['file_name'],
			'nama_barang'               => $this->input->post('nama_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'satuan_barang' => $this->input->post('satuan_barang'),
			'jumlah_barang'                             => $this->input->post('jumlah_barang'),
			'kondisi_barang'                             => $this->input->post('kondisi_barang'),
			'keterangan'    => $this->input->post('keterangan'),
		);

		$this->db->insert('stok_barang', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function get_jenis()
	{
		// $query = $this->db->get('data_golongan')->result();
		$query = $this->db->query('SELECT * FROM jenis_barang')->result();
		return $query;
	}

	function get_satuan()
	{
		$query = $this->db->get('satuan_barang')->result();
		return $query;
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_data($id, $dokumen)
	{
		// $this->db->where($where);

		$data = array(
			'id_barang'               => $this->input->post('id_barang'),
			'kode'               => $this->input->post('kode'),
			'gambar'                  => $dokumen['file_name'],
			'nama_barang'               => $this->input->post('nama_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'satuan_barang' => $this->input->post('satuan_barang'),
			'jumlah_barang'                             => $this->input->post('jumlah_barang'),
			'kondisi_barang'                             => $this->input->post('kondisi_barang'),
			'keterangan'    => $this->input->post('keterangan'),
		);

		$this->db->where('id_barang', $id)->update('stok_barang', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getDetail($id){
		return $this->db->where('id_barang', $id)->get('stok_barang')->row();
	}

	public function getList()
	{
		$this->db->select('*');
		$this->db->from('stok_barang');
		// $this->db->join('proyek', 'proyek.ID_PROGRAM = program.ID_PROGRAM');
		// $this->db->join('monitoring', 'proyek.ID_PROYEK = monitoring.ID_PROYEK');
		return $this->db->get()->result();
		// return $this->db->order_by('NO_MONITORING', 'ASC')->get('monitoring')->result();
	}

	function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('id_barang', $id)->get('stok_barang');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
