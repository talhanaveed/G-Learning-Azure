<?php  
class drills extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        $this->load->helper(array('form'));
        $this->load->model('drills_model');
        if(strcmp($this->session->userdata('type'),'parent')==0)
        {
           redirect('parents');
        }
        if(strcmp($this->session->userdata('type'),'teacher')==0)
        {
           redirect('teacher');
        }
        if(strcmp($this->session->userdata('type'),'admin')==0)
        {
            redirect('admin');
        }
        if(strcmp($this->session->userdata('type'),'student')==0)
        {
          
        }
        else
        {
            redirect('login');
        }
    }
    
    public function index()
    {
        $data['page_title'] = 'G-Learning | Drills';
        $data['msg'] = '';
        $this->load->model('drills_model');
        $data['drills'] = $this->drills_model->getDrills();
        $data['drillsCount'] = $this->drills_model->getDrillsCount();
 
        $this->load->view('header_only_image',$data);
        $this->load->view('drills_view');
        $this->load->view('footer_new_design');
    }
    
    public function assessments()
    {
        $data['page_title'] = 'G-Learning | Assessments';
        $data['msg'] = '';
        $id = $this->session->userdata('person_id');
        
        $assessments = $this->drills_model->get_assessments($id);
        $myAssessments = array(array());
        $i = 0;
        foreach($assessments as $assessment){
            $myAssessments[$i][0] = $assessment->assessment_name;
            $myAssessments[$i][1] = $assessment->marks_obtained;
            $myAssessments[$i][2] = $assessment->total_marks;
            $i++;
        }
        $count = count($myAssessments);
        if($count == 1)
            $count -= 1;
        
        $data['scroll_to_div'] = 'heading_teacher';
        $data['assessmentCount'] = $count;
        if ($count == 0)
            $data['msg'] = "Hurrah!! <br/> No Assessments Attempted Yet!!";
        else{
            $data['assessment'] = $myAssessments;
        }
           
        $this->load->view('header_only_image',$data);
        $this->load->view('assessment_view',$data);
        $this->load->view('footer_new_design');
    }
}

?>