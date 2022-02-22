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

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


		
	// }
}
