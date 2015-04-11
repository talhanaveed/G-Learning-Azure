<?php
class teacher extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
    }
    
    
    public function index()
    {
            $data['scroll_to_div'] = 'view_student';
            $data['page_title'] = 'G-Learning | Teacher';
            $this->load->view('main_header_new',$data);
            $this->load->view('teacher_home');
            $this->load->view('footer');
        
    }
//    function index()
//    {
//        $data['page_title'] = 'G-Learning | Teacher';
//        $data['scroll_to_div'] = 'start';
//        $this->load->view('main_header_new',$data);
//        $this->load->view('teacher_home');
//        $this->load->view('footer');
//    }
}
?>
