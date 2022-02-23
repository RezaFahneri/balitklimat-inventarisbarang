<?php
class Model_penggunaan extends CI_model
{
	function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function getList()
	{
		//return $query = $this->db->order_by('id_proyek', 'ASC')->get('proyek')->result();
		$this->db->select('*');
		$this->db->from('penggunaan_mobil');
		$this->db->join('data_kendaraan', 'data_kendaraan.id_kendaraan = penggunaan_mobil.id_kendaraan');
		$this->db->join('data_pegawai', 'data_pegawai.nip = penggunaan_mobil.nip');
		return $this->db->get()->result();
	}

	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function count_sopir1_dalam()
	{
		$this->db->where('nip =', 'SPR1990062022018');
		$this->db->where('perjalanan =', 'Dalam Kota');
		$query = $this->db->get('penggunaan_mobil');
		return $query->num_rows();
	}

	public function count_sopir1_luar()
	{
		$this->db->where('nip =', 'SPR1990062022018');
		$this->db->where('perjalanan =', 'Luar Kota');
		$query = $this->db->get('penggunaan_mobil');
		return $query->num_rows();
	}

	public function count_sopir2_dalam()
	{
		$this->db->where('nip =', 'SPR198402022013');
		$this->db->where('perjalanan =', 'Dalam Kota');
		$query = $this->db->get('penggunaan_mobil');
		return $query->num_rows();
	}

	public function count_sopir2_luar()
	{
		$this->db->where('nip =', 'SPR198402022013');
		$this->db->where('perjalanan =', 'Luar Kota');
		$query = $this->db->get('penggunaan_mobil');
		return $query->num_rows();
	}


	// }
}
