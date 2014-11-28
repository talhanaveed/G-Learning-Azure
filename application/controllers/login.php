<?php  
class login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
		$this->load->helper(array('form'));
    }
    
    public function index()
    {
          $this->load->view('login_view');
    }
    public function login()
    {
          $this->load->view('login_view');
    }
    
	
}
?>