<?php  
class DataEntry extends CI_Controller{
    function __construct(){
        -parent::__construct();
        $this->load->helper('url');
        
    }
    
    public function add_assessment()
    {
        $assess_name  = $this->security->xss_clean($this->input->post('AddAssessment_name')); //name
        $i  = $this->security->xss_clean($this->input->post('Add_hiddenfield'));
        
        //---------
        $teacher_id = $this->session->userdata['person_id'];
        $school_id=$this->session->userdata['school_id'];
        //---------
        
        $total_marks=10*$i;
        $drill_name  = $this->security->xss_clean($this->input->post('hidden_drill_id')); //drill 
        
       if($drill_name== "Addition")
        {   $drill_id=1;    }
        else if($drill_name== "Even/Odd")
        {   $drill_id=4;    }
        else if($drill_name== "Highest/Lowest")
        {   $drill_id=3;    }
        else if($drill_name== "Multiples")
        {   $drill_id=5;    }
         else if($drill_name== "Subtraction")
        {   $drill_id=2;    }
         else if($drill_name== "Ascending")
        {   $drill_id=6;    }
         else if($drill_name== "Descending")
        {   $drill_id=7;    }
        
        
        $this->load->model('Teacher_Model');
        
        
        $result = $this->Teacher_Model->insert_new_assessment($assess_name,$total_marks,$drill_id,$teacher_id,$school_id);
        if ( $result==0) //insertion failed
        {
            echo assessment_failed_to_insert;
            return false;
        }else
        {
            $assess_id = $result;
            $check=1;
            for( ; $i>0 && $check==1 ; $i--)
            {
                $check = $this->add_question($assess_id,$i);
            }
            
            //loading add_view
            $data['page_title'] = 'G-Learning | Teacher';
            $data['scroll_to_div'] = 'add_assess';
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
    //helping funtion for AddAssessment
    public function add_question($assess_id,$i)
    {
        $question_staement  = $this->security->xss_clean($this->input->post('question_'.$i.''));
        $question_answer  = $this->security->xss_clean($this->input->post('CorrectOption1_'.$i.''));
        $question_option1  = $this->security->xss_clean($this->input->post('QuestionOption2_'.$i.''));
        $question_option2  = $this->security->xss_clean($this->input->post('QuestionOption3_'.$i.''));
        $question_option3  = $this->security->xss_clean($this->input->post('QuestionOption4_'.$i.''));
        
        $complexity_level=1;
        
        $result = $this->Teacher_Model->insert_new_question($assess_id,$question_staement,$question_answer,$question_option1,$question_option2,$question_option3,$complexity_level);
        if ( $result) 
        {
            return true;
        }else   //insertion failed
        {
            echo question_failed_to_insert;
            return false;
        } 
    }
    
    public function edit_assessment()
    {
        $assess_name  = $this->security->xss_clean($this->input->post('EditAssessment_name')); //name
        
        $teacher_id = $this->session->userdata['person_id'];
        $school_id=$this->session->userdata['school_id'];
        
        $this->load->model('Teacher_Model');
        
        $searched_id = $this->Teacher_Model->search_assessment($assess_name,$school_id,$teacher_id);
        if($searched_id==-1)    //error
        {
                //  loading view
                   $data['scroll_to_div'] = 'edit_assess_search_no_match';
                   $data['searched_assessment']= $assess_name;
                   $data['page_title'] = 'G-Learning | Teacher';
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
        }else{
            
            $i = 0;
            
            $data['questions'] = $this->Teacher_Model->give_assessment_questions($searched_id,$i);

            if ( $data['questions']['feedback']==0) //insertion failed
            {
                echo student_view_failed_to_load;
                return false;
            }else
            {    
                    $data['scroll_to_div'] = 'edit_assess_search_match';
                    $data['searched_assessment']= $assess_name;
                    $data['no_of_questions'] = $i;
                    $data['page_title'] = 'G-Learning | Teacher';
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
    }
    
    public function update_assessment()
    {
        $no_of_questions   = $this->security->xss_clean($this->input->post('update_hiddenfield_noofqs'));
        $teacher_id = $this->session->userdata['person_id'];
        $this->load->model('Teacher_Model');
        
        for( $z=0; $z<$no_of_questions; $z++)
        {
            $q_id   = $this->security->xss_clean($this->input->post('update_hiddenfield_qid_' . $z));
            $statement  = $this->security->xss_clean($this->input->post('update_question_' . $z));
            $answer   = $this->security->xss_clean($this->input->post('update_CorrectOption1_' . $z));
            $option1   = $this->security->xss_clean($this->input->post('update_QuestionOption2_' . $z));
            $option2   = $this->security->xss_clean($this->input->post('update_QuestionOption3_' . $z));
            $option3   = $this->security->xss_clean($this->input->post('update_QuestionOption4_' . $z));
            
            $result = $this->Teacher_Model->update_assessment_question($q_id,$statement,$answer,$option1,$option2,$option3);
           if($result==0)
           {
                $data['scroll_to_div'] = 'update_assess_updation_error';
                $data['searched_assessment']= $assess_name;
                $data['page_title'] = 'G-Learning | Teacher';
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
                return 0;
           }
        }
                //loading add_view
                    $data['page_title'] = 'G-Learning | Teacher';
                    $data['scroll_to_div'] = 'update_assess';
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
    
    public function delete_assessment()
    {
        $teacher_id = $this->session->userdata['person_id'];
        $school_id=$this->session->userdata['school_id'];
        
        $assess_name  = $this->security->xss_clean($this->input->post('DeleteAssessment_name'));
        $this->load->model('Teacher_Model');
        $result = $this->Teacher_Model->delete_assessment($assess_name,$school_id,$teacher_id);
        if ( $result==0) //insertion failed
        {
            //loading delete_assess
                $data['page_title'] = 'G-Learning | Teacher';
                $data['scroll_to_div'] = 'delete_failed';
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
                
            return false;
        }else
        {
                //loading delete_assess
                $data['page_title'] = 'G-Learning | Teacher';
                $data['scroll_to_div'] = 'delete_assess';
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
                
                echo $teacher_id;
            return true;
        }
    }
    
    public function ViewStudents()
    {
            $this->load->model('Teacher_Model');
            //loading students
            $school_id=$this->session->userdata['school_id'];
            $j = 0;
             $teacher_id = $this->session->userdata['person_id'];
            $data['result'] = $this->Teacher_Model->get_all_students($school_id,$j);

            if ( $data['result']['feedback']==0) //insertion failed
            {
                echo student_view_failed_to_load;
                return false;
            }else
            {
                $data['no_of_students'] = $j;
                //loading delete_assess
                $data['page_title'] = 'G-Learning | Teacher';
                $data['assessments'] = $this->Teacher_Model->get_assessments_by_teacher($teacher_id)->result_array();

                $data['scroll_to_div'] = 'view_student';
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
    
    //view student is in teacher controller
    
    function checkLevel()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $result = $this->levels_model->checkLevel($person_id);
        echo $result;
    }
    
    function updateLevel()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $newLevel = $this->input->post('Level');
        $result = $this->levels_model->updateLevel($person_id, $newLevel);
        if($result == true)
            echo "success";
        else
            echo "failed";
    }
    function sendPasswordRequest()
    {
         $this->load->model('Teacher_Model');
         $username=$this->session->userdata['username'];
         $date = date('Y-m-d');
        $result=$this->Teacher_Model->sendPassRequest($username, $date);
        if($result==true)
            echo "success";
        else
            echo "failure";
    }
    
}
