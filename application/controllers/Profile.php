<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();

  }

  public function index()
	{
		$this->load->view('v_profile');
	}

}


/* End of file Order.php */
/* Location: ./application/controllers/Order.php */
?>
