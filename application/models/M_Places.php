<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Places extends CI_Model {

	public function get_destination(){
        $this->db->select('*');
        $this->db->from('places');
		$this->db->where('jenis','Wisata');
        $query = $this->db->get()->result();
        return $query;
    }
	public function get_hotel(){
        $this->db->select('*');
        $this->db->from('places');
		$this->db->where('jenis','Hotel');
        $query = $this->db->get()->result();
        return $query;
    }

	public function get_culinary(){
        $this->db->select('*');
        $this->db->from('places');
		$this->db->where('jenis','Kuliner');
        $query = $this->db->get()->result();
        return $query;
    }

	public function detail_destination($id_place=''){
        return $this->db->where('id_place', $id_place)->get('place')->row();
    }
	public function lihat_detail($id_place){
		$this->db->select('*');
		$this->db->select('TIME_FORMAT(jam_buka, "%H:%i") as jam_buka, TIME_FORMAT(jam_tutup, "%H:%i") as jam_tutup,');
		$this->db->from('places');
		$this->db->where('id_place',$id_place);
		$query = $this->db->get()->result();
		return $query;
	}

	public function show_comments($id_place){
		$this->db->select('comment.isi_comment, DATE_FORMAT(comment.tgl_comment, "%e %M %Y") as tgl_comment, user.nama_user');
		$this->db->from('comment');
		$this->db->join('places','comment.id_place=places.id_place');
		$this->db->join('user','comment.id_user=user.id_user');
		$this->db->where('comment.id_place', $id_place);
		$query = $this->db->get()->result();
		return $query;
	}

	public function add_comment($url_place){
		$data_comment = array(
			'id_user'=> $this->session->userdata('id_user'),
            'id_place'=>$url_place,
            'isi_comment'=>$this->input->post('komentar'),
            'tgl_comment'=>date("Y-m-d H:i:s")
        );
        $insert = $this->db->insert('comment', $data_comment);
        return $insert;

	}
	public function get_search_result($search, $min, $max, $rating, $cat){
		$this->db->select('*')
             ->from('places')
             ->like('nama_place',$search)
             ->where('harga >=', $min)
             ->where('harga <=', $max)
			 ->where('jenis',"Wisata")
			 ->like('rating',$rating)
			 ->like('cat1',$cat);
    $query = $this->db->get();
    if($query->num_rows()>0){
        return $query->result();
      }
	}

	public function get_search_hotel($search, $min, $max, $rating){
		$this->db->select('*')
             ->from('places')
             ->like('nama_place',$search)
             ->where('harga >=', $min)
             ->where('harga <=', $max)
			 ->where('jenis',"Hotel")
			 ->like('rating',$rating);
    $query = $this->db->get();
    if($query->num_rows()>0){
        return $query->result();
      }
	}
	public function get_search_culinary($search, $rating){
		$this->db->select('*')
             ->from('places')
             ->like('nama_place',$search)
			 ->where('jenis',"Kuliner")
			 ->like('rating',$rating);
    $query = $this->db->get();
    if($query->num_rows()>0){
        return $query->result();
      }
	}
}
