<?php  
class home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        $this->load->helper(array('form'));
    }
    
    public function index()
    {
        $data['page_title'] = 'G-Learning ';
      //  $this->load->view('main_header',$data);
        $this->load->view('new_home',$data);
//$this->load->view('footer');
    }
    
    public function student_dashboard()
    {
        $data['page_title'] = 'G-Learning | Student';
        $this->load->view('student_header',$data);
        $this->load->view('student_dashboard');  
    }
    public function intitial_test() 
    {
        $data['page_title'] = 'G-Learning | Drills';
        $this->load->view('main_header_new',$data);
        $this->load->view('Initial_Test');
        $this->load->view('footer');
    }
    
    public function drills()
    {
        $data['page_title'] = 'G-Learning | Drills';
    //    $this->load->view('main_header_new',$data);
        $this->load->view('header_only_image',$data);
        $this->load->view('drills_view');
     //   $this->load->view('footer');
        $this->load->view('footer_new_design');
    }
    
}
?>