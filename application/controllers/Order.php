<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model('M_Places');
		$this->load->model('M_Order');
		date_default_timezone_set("Asia/Bangkok");
  }

  public function checkout_form($url_place)
	{
		$data['cart']= $this->M_Places->lihat_detail($url_place);
		$this->load->view('v_checkout',$data);
	}

	public function pemesanan($url_place)
	{
		if($this->session->userdata('logged_in')==TRUE){
				$insert=$this->M_Order->pemesanan($url_place);				
				if($insert==true){
		    		$this->session->set_flashdata('pesan', 'Pemesanan berhasil');
						redirect(base_url('Order/order_list'), 'refresh');
    				} else{
		    		$this->session->set_flashdata('gagal', 'Pemesanan gagal');
						redirect(base_url('Order/checkout_form/'.$url_place), 'refresh');
				}
		}
	}

	public function order_list(){
    if($this->session->userdata('logged_in')==TRUE){
        $data['orders']=$this->M_Order->get_order_list();
        $this->load->view("v_order_list", $data);
    }
}
public function get_detail_order($id_pemesanan=''){
	$data_detail=$this->M_Order->detail_order($id_pemesanan);
	echo json_encode($data_detail);
}

public function detail_pemesanan($id_pemesanan=''){
    return $this->db->where('id_pemesanan', $id_pemesanan)->get('pemesanan')->row();
}

public function upload_bukti(){
    $config['upload_path'] = './assets/images/upload_bukti';
	$config['allowed_types'] = 'jpg|png';

		if ($_FILES['foto_bukti']['name'] != "") {
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto_bukti')) {
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('Order/order_list');
			} else {
				if($this->M_Order->upload_bukti($this->upload->data('file_name'))){
					$this->session->set_flashdata('pesan', 'Bukti pembayaran telah diunggah. Pembayaran akan segera kami konfirmasi');
				} else {
					$this->session->set_flashdata('pesan', 'Bukti pembayaran gagal diunggah');
				}
				redirect('Order/order_list');
			}
				
		} else {
			if ($this->M_Order->upload_bukti('')) {
				$this->session->set_flashdata('pesan', 'Bukti pembayaran telah diunggah. Pembayaran akan segera kami konfirmasi');
			} else {
				$this->session->set_flashdata('pesan', 'Bukti pembayaran gagal diunggah');
			}
			redirect('Order/order_list');
		}	
}
public function order_admin(){
    if($this->session->userdata('logged_in')==TRUE){
        $data['orders']=$this->M_Order->get_order_admin();
        $this->load->view("v_order_admin", $data);
    }
}

public function change_status($id_pemesanan){
    $ambil=$this->M_Order->change_status($id_pemesanan);
    redirect(base_url('index.php/Order/order_admin'));
}



}




/* End of file Order.php */
/* Location: ./application/controllers/Order.php */
?>
