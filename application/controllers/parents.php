<?php
class Parents extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
    }
    
    public function index()
    {
        $data['page_title'] = 'G-Learning | Parents';
        $this->load->view('main_header_new',$data);
        $this->load->view('parents_view');
        $this->load->view('footer');
    }
}
?>