<?php
class teacher extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        if(strcmp($this->session->userdata('type'),'student')==0)
//        {
           redirect('home/student_dashboard');
        
        if(strcmp($this->session->userdata('type'),'parent')==0)
        {
           redirect('parents');
        }
        if(strcmp($this->session->userdata('type'),'admin')==0)
        {
            redirect('admin');
        }
        if(strcmp($this->session->userdata('type'),'teacher')==0)
        {
          
        }
        else
        {
            redirect('login');
        }
    }

   
    public function index()
    {
        $this->load->model('Teacher_Model');
        $teacher_id = $this->session->userdata['person_id'];
        $data['scroll_to_div'] = 'start';
        $data['results'] = 0;
        $data['page_title'] = 'G-Learning | Teacher';
        $data['assessments'] = $this->Teacher_Model->get_assessments_by_teacher($teacher_id)->result_array();
        $data['scroll_to_div'] = 'add_assess';
        $drills = $this->Teacher_Model->getAllDrills();
        $myDrillNames = array();
        $i = 0;
        foreach($drills as $drill){
            $myDrillNames[$i] = $drill->topic_name;
            $i++;
        }
        $data['drillsNames'] = $myDrillNames;
        $data['drillsCount'] = count($myDrillNames);
        $this->load->view('header_only_image',$data);
        $this->load->view('teacher_home');
        $this->load->view('footer_new_design');
    }

      
    public function result_card()
    {   $this->load->model('Teacher_Model');
        $data['scroll_to_div'] = 'result_card';
        $data['page_title'] = 'G-Learning | Teacher';
        $teacher_id = $this->session->userdata['person_id'];
        $school_id= $this->session->userdata['school_id'];
        $data['assess_count'] = $this->Teacher_Model->get_assessments_by_teacher_count($teacher_id);        
        $data['results'] = $this->Teacher_Model->generate_result_card($teacher_id,$school_id);        
        $data['assessments'] = $this->Teacher_Model->get_assessments_by_teacher($teacher_id)->result_array();
        $drills = $this->Teacher_Model->getAllDrills();
        $myDrillNames = array();
        $i = 0;
        foreach($drills as $drill){
            $myDrillNames[$i] = $drill->topic_name;
            $i++;
        }
        $data['drillsNames'] = $myDrillNames;
        $data['drillsCount'] = count($myDrillNames);
        $this->load->view('header_only_image',$data);
        $this->load->view('teacher_home');
        $this->load->view('footer_new_design');
    }
}
    
?>

