<?php  

class ModelMaster extends CI_Model {

	public function get_admin($id = null)
	{
		if ($id == null) {
			return $this->db->get('admin')->result_array();
		} else {
			return $this->db->get_where('admin',['id_admin'=>$id])->result_array();
		}
	} 

	public function post_admin($data)
	{
		 $this->db->insert('admin',$data);
		 return $this->db->affected_rows();
	}
	public function delete_admin($id)
	{
		$this->db->delete('admin',['id_admin' => $id]);
		return $this->db->affected_rows();
	}

	public function put_admin($id,$data)
	{
		$this->db->update('admin',$data,['id_admin'=>$id]);
		return $this->db->affected_rows();
	}

	public function put_pemesanan($id,$data)
	{
		$this->db->update('pesan',$data,['id_pemesanan'=>$id]);
		return $this->db->affected_rows();
	}

	public function get_user($id = null)
	{
		if ($id == null) {
			return $this->db->get('user')->result_array();
		} else {
			return $this->db->get_where('user',['id_user'=>$id])->result_array();
		}
	}

	public function post_user($data)
	{
		$this->db->insert('user',$data);
		return $this->db->affected_rows();
	}

	public function delete_user($id = null)
	{
		$this->db->delete('user',['id_user' => $id]);
		return $this->db->affected_rows();
	}

	public function put_user($id,$data)
	{
		$this->db->update('user',$data,['id_user'=>$id]);
		return $this->db->affected_rows();
	}

	public function get_produk($id = null)
	{
		if ($id == null) {
			return $this->db->get('produk')->result_array();
		} else {
			return $this->db->get_where('produk',['id_produk'=>$id])->result_array();
		}
	}

	public function post_produk($data)
	{
		$this->db->insert('produk',$data);
		return $this->db->affected_rows();
	}

	public function delete_produk($id = null)
	{
		$this->db->delete('produk',['id_produk' => $id]);
		return $this->db->affected_rows();
	}

	public function put_produk($id,$data)
	{
		$this->db->update('produk',$data,['id_produk'=>$id]);
		return $this->db->affected_rows();
	}


	public function get_pesan($id = null)
	{
		if ($id == null) {
			return $this->db->get('pesan')->result_array();
		} else { 
			return $this->db->get_where('pesan',['id_user'=>$id])->result_array();
		}
	}

	public function get_pesans($id)
	{
		return $this->db->get_where('pesan',['id_pemesanan'=>$id])->result_array();
	}

	public function post_pemesanan($data)
	{
		$this->db->insert('pesan',$data);
		return $this->db->affected_rows();
	}

	public function delete_pesan($id = null)
	{
		$this->db->delete('pesan',['id_pemesanan' => $id]);
		return $this->db->affected_rows();
	}

	public function cek_login_user($user,$password)
	{
		return $this->db->get_where('user',['email_user' => $user , 'password_user'=>$password ])->result_array();
		//return $this->db->result_array();
	}

	public function cek_login_admin($user,$password)
	{
		return $this->db->get_where('admin',['username_admin' => $user , 'password_admin'=>$password ])->result_array();
		//return $this->db->result_array();
	}




}