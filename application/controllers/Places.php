<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Places extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model('M_Places');
		$this->load->helper('date');
		date_default_timezone_set("Asia/Bangkok");
		
  }

  public function hotels()
  {
		$data['data_hotel']=$this->M_Places->get_hotel();
		$this->load->view('v_hotel', $data);
  }
	public function destination()
	{
		$data['data_destination']= $this->M_Places->get_destination();
		$this->load->view('v_destination',$data);
	}

	public function culinary()
	{
		  $data['data_culinary']=$this->M_Places->get_culinary();
		  $this->load->view('v_culinary', $data);
	}
	
	public function get_detail_destination($id_place=''){
		$data_detail=$this->M_Places->detail_destination($id_place);
		echo json_encode($data_detail);
	}

	public function lihat_detail($id_place){
			$data['id_plc']=$id_place;
			$data['detail']=$this->M_Places->lihat_detail($id_place);
			$data['comments'] = $this->M_Places->show_comments($id_place);
			$this->load->view("v_detail_place", $data);
	}

	public function komentar($url_place){
		if($this->session->userdata('logged_in')==TRUE){
			$this->form_validation->set_rules('komentar', 'komentar', 'trim|required',
        	array('required' => 'Kolom Komentar masih kosong'));

			if($this->form_validation->run() == TRUE){
				$insert=$this->M_Places->add_comment($url_place);				
				if($insert==true){
		    		$this->session->set_flashdata('pesan', 'Komentar berhasil');
    				} else{
		    		$this->session->set_flashdata('gagal', 'Komentar gagal');
				}
		    redirect(base_url('Places/lihat_detail/'.$url_place), 'refresh');
		} else{
		    $this->session->set_flashdata('pesan', validation_errors());
		    redirect(base_url('Places/lihat_detail/'.$url_place), 'refresh');
	    }
		
		}
	
	}
	public function search_place(){
		$search = $this->input->post('search');
		$min = $this->input->post('hmin');
		$max = $this->input->post('hmax');
		$rating = $this->input->post('rating');
		$cat = $this->input->post('cat');
		$data['result']=$this->M_Places->get_search_result($search,$min, $max, $rating, $cat);
		$this->load->view('v_result',$data);
	}
	public function search_hotel(){
		$search = $this->input->post('search');
		$min = $this->input->post('hmin');
		$max = $this->input->post('hmax');
		$rating = $this->input->post('rating');
		$data['result']=$this->M_Places->get_search_hotel($search,$min, $max, $rating);
		$this->load->view('v_search_hotel',$data);
	}
	public function search_culinary(){
		$search = $this->input->post('search');
		$rating = $this->input->post('rating');
		$data['result']=$this->M_Places->get_search_culinary($search,$rating);
		$this->load->view('v_search_culinary',$data);
	}


}


/* End of file Places.php */
/* Location: ./application/controllers/Places.php */
