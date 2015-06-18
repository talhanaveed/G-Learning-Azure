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
        if(strcmp($this->session->userdata('type'),'student')!=0)
        {
           $this->index();
        }
        else
        {

            $this->load->model('levels_model');
            $students = $this->levels_model->getAllStudentDrillLevel();
            $myStudents = array(array());
            $i = 0;
            foreach ($students as $student)
            {
                $myStudents[$i][0] = $student->pic_path;
                $myStudents[$i][1] = $student->drill_level;
                $i++;
            }
            $data['students'] = $myStudents;
            $data['page_title'] = 'G-Learning | Student';
            $this->load->view('student_header',$data);
            $this->load->view('student_dashboard');  
        }
    
    }


    public function intitial_test() 
    {
        if(strcmp($this->session->userdata('type'),'student')!=0)
        {
           $this->index();
        }
        else
        {
            $data['page_title'] = 'G-Learning | Drills';
            $this->load->view('main_header_new',$data);
            $this->load->view('Initial_Test');
            $this->load->view('footer');
        }
       
    }
    
    
}
?>