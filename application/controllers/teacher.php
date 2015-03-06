<?php
class teacher extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
    }
    
    
    public function index()
    {
        $school_id=1;
        $j = 0;
        $this->load->model('Teacher_Model');
        $data['result'] = $this->Teacher_Model->get_all_students($school_id,$j);
        
        if ( $data['result']['feedback']==0) //insertion failed
        {
            echo student_view_failed_to_load;
            return false;
        }else
        {
            $data['scroll_to_div'] = 'view_student';
            $data['no_of_students'] = $j;
            $data['page_title'] = 'G-Learning | Teacher';
            $this->load->view('main_header_new',$data);
            $this->load->view('teacher_home');
            $this->load->view('footer');
        }
        
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
