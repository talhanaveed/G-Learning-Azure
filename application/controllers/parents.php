<?php
class Parents extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('parent_model');
        $this->load->helper('url');
        $this->load->helper('asset');

        if(strcmp($this->session->userdata('type'),'student')==0)
        {
           redirect('home/student_dashboard');
        }
        if(strcmp($this->session->userdata('type'),'teacher')==0)
        {
           redirect('teacher');
        }
        if(strcmp($this->session->userdata('type'),'admin')==0)
        {
            redirect('admin');
        }
        if(strcmp($this->session->userdata('type'),'parent')==0)
        {
           
        }
        else
        {

            redirect('login');
        }
    }
    
    public function index()
    {
        $student_id = $this->session->userdata['person_id'];
        $assessments = $this->parent_model->getGradeSheet($student_id);
        $gradeSheet = array(array());
        $min = "";
        
        if($assessments){
            $i = 0;
            foreach ($assessments as $assessment)
            {
                $gradeSheet[$i][0] = $assessment->assessment_name;
                $gradeSheet[$i][1] = $assessment->marks_obtained;
                $gradeSheet[$i][2] = $assessment->total_marks;
                $i++;
            }
            $minIndex = $this->findMinimum($gradeSheet);
            $min = $gradeSheet[$minIndex][0];
        }
        
        $data['page_title'] = 'G-Learning | Parents';
        $data['name'] = $this->session->userdata['Namesss'];
        $data['gradeSheet'] = $gradeSheet;
        $data['AssessmentCount'] = count($assessments);
        $data['minAssessment'] = $min;
        $this->load->view('main_header_new',$data);
        $this->load->view('parents_view');
        $this->load->view('footer_new_design');
    }
    
    function findMinimum($assesssments)
    {
        $min = $assesssments[0][1];
        $index = 0;
        for($i = 1; $i < count($assesssments); $i++){
            if($assesssments[$i][1] < $min){
                $min = $assesssments[$i][1];
                $index = $i;
            }
        }
        return $index;
    }
    
    public function getAssessmentsGraph(){
        $student_id = $this->session->userdata['person_id'];
        $assessments = $this->parent_model->getGradeSheet($student_id);
        $gradeSheet = array(array());
        
        if($assessments){
            $i = 0;
            foreach ($assessments as $assessment){
                $gradeSheet[$i][0] = $assessment->assessment_name;
                $gradeSheet[$i][1] = $assessment->marks_obtained;
                $gradeSheet[$i][2] = $assessment->total_marks;
                $maxMarksAssessment = $this->parent_model->getMaxMarksByAssessment($assessment->assessment_name);
                $gradeSheet[$i][3] = $maxMarksAssessment;
                $i++;
            }
        }
        echo json_encode($gradeSheet);
    }
    
}
?>