<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
	date_default_timezone_set("Asia/Bangkok");
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function pemesanan($url_place){
			$data_order = array(
				'id_user'=> $this->session->userdata('id_user'),
				'id_place'=>$url_place,
				'nama_place'=>$this->input->post('nama_place'),
				'tgl_pemesanan'=>date("Y-m-d H:i:s"),
				'qty'=>$this->input->post('qty'),
				'total_harga'=>$this->input->post('total_harga'),
				'payment'=>$this->input->post('payment'),
				'status'=>"Menunggu Pembayaran"
				);
					$insert = $this->db->insert('pemesanan', $data_order);
					return $insert;
	}
	public function get_order_list(){
		$this->db->select('pemesanan.id_pemesanan, pemesanan.tgl_pemesanan, DATE_FORMAT(pemesanan.tgl_pemesanan, "%e %M %Y") as tgl_pemesanan, 
		pemesanan.qty, pemesanan.total_harga, pemesanan.payment, pemesanan.status, pemesanan.id_place, pemesanan.nama_place');
		$this->db->from('pemesanan');
		$this->db->where('pemesanan.id_user',$this->session->userdata('id_user'));
		$query = $this->db->get()->result();
		return $query;
	}

	public function upload_bukti($nama_file){
		if ($nama_file == "") {
			$tambah = array(
				'id_pemesanan'=>$this->input->post('id_pemesanan'),
				'tgl_upload'=>date("Y-m-d H:i:s")
			);
		} else {
			$tambah = array(
				'id_pemesanan'=>$this->input->post('id_pemesanan'),
				'foto_bukti'=>$nama_file,
				'tgl_upload'=>date("Y-m-d H:i:s")
			);
		}
		return $this->db->insert('bukti_pembayaran', $tambah);
	}
	public function get_order_admin(){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('user','pemesanan.id_user = user.id_user');
		$this->db->join('bukti_pembayaran','pemesanan.id_pemesanan = bukti_pembayaran.id_pemesanan');
		$query = $this->db->get()->result();
		return $query;
	}
	public function change_status($id_pemesanan){
		$data_update=array(
			'status'=>'Pembayaran Terkonfirmasi'
		);
		$this->db->where('id_pemesanan',$id_pemesanan);
		$this->db->update('pemesanan',$data_update);
	}

	
  // ------------------------------------------------------------------------

}

/* End of file M_Order_model.php */
/* Location: ./application/models/M_Order_model.php */
