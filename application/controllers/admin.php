<?php
class admin extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
    }
    
    function student()
    {
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('admin_home_view');
        $this->load->view('footer');
    }
    
    function teacher()
    {
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('admin_Addteacher_view');
        $this->load->view('footer');
    }
    
    function passwordRequests()
    {
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('password_requests_view');
        $this->load->view('footer');
    }
    
    
}
?>