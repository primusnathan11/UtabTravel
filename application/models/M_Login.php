<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function cek_user(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $query = $this->db->where('email_user',$email)
						   ->where('password',$password)
                           ->get('user');

        if($this->db->affected_rows() > 0){

            $data_login = $query->row();

            $data_session = array(
                                'email_user'=> $data_login->email_user,
                                'password'=> $data_login->password,
                                'logged_in'=> TRUE,
								'nama_user'=> $data_login->nama_user,
								'id_user'=> $data_login->id_user,
								'no_telp'=> $data_login->no_telp,
								'level'=> $data_login->level
            );
            $this->session->set_userdata($data_session);

            return TRUE;
        }else{
            return FALSE;
        }
    }

	public function tambah_user(){
		
        $data_user=array(
            'nama_user'=>$this->input->post('nama_user'),
            'email_user'=>$this->input->post('email_user'),
            'password'=>$this->input->post('password'),
			'no_telp'=>$this->input->post('no_telp'),
			'level'=>'User'
        );
        $masuk=$this->db->insert('user', $data_user);

        return $masuk;

	
    }
}
