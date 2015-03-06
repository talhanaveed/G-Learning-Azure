 <?php  
class Teacher_Model extends CI_Model {  
  
    function Teacher_Model()
    {  
        // Call the Model constructor  
        parent::__construct(); 
        $this->load->helper('date');
    }
    public function insert_new_assessment($assess_name,$total_marks,$drill_id,$teacher_id,$school_id)
    {
        $assess_status=0;
        // Preparing the Array to be inserted into Assessment Table
            $new_assessment = array(
                'assessment_name' => $assess_name,
                'total_marks' => $total_marks,
                'assessment_status' => $assess_status,
                'drill_id' => $drill_id,
                'teacher_id' => $teacher_id,
                'school_id' => $school_id
            );
            $query = $this->db->insert('assessment',$new_assessment);
            $assess_id = $this->db->insert_id();
            if($query)
            {
                return $assess_id;  //return assessmentid generated
            }else{
                return 0;
            }
    }
    public function insert_new_question($assess_id,$question_staement,$question_answer,$question_option1,$question_option2,$question_option3,$complexity_level)
    {
        $question_status=false;
        // Preparing the Array to be inserted into Question Table
            $new_question = array(
                'statement' => $question_staement,
                'answer' => $question_answer,
                'option1' => $question_option1,
                'option2' => $question_option2,
                'option3' => $question_option3,
                'complexity_level' => $complexity_level,
                'question_status' => $question_status,
                'assessment_id' => $assess_id
            );
            $query = $this->db->insert('question',$new_question);
            $question_id = $this->db->insert_id();
            if($query)
            {
                    return 1;
            }else{
                return 0;
            }
    }
    function delete_assessment($assess_name)    //Note: remember to put cascading option in db
    {
            $this->db->where('assessment_name', $assess_name);
            $query = $this->db->delete('assessment');

            if($query)
                return 1;
            else
                return 0;
    }
    function get_all_students($school_id , &$j)
    {
       $this->db->select('person.person_id,first_name,last_name,email');
       $this->db->where('school_id', $school_id);
        $this->db->where('type', "student");
        $this->db->from('login');
        $this->db->join('person', 'person.person_id = login.person_id');
      //  $this->db->join('gradesheet', 'gradesheet.student_id = login.person_id');
        $this->db->group_by('person.person_id');
       // $this->db->order_by('score', 'desc');
        $results = $this->db->get();
        
    //    print_r($results->result_array());  //very helpfull
        
        $array = array();
        
        if($results)
        {
            foreach ($results->result() as $row)
            {
            //    $array['rank'.$j] = $j+1;
                $array['student_name'.$j] = $row->first_name . $row->last_name;// $row['first_name'].$row['last_name'];
                $array['student_contact'.$j] = $row->email;
         //       $array['score'.$j] = $row->score;
                $j++;
            }
            $array['feedback']=1;
            return $array;
        }else{
            $array['feedback']=0;
            return $array;
        }
        
    }
    
    function search_assessment($assess_name,$school_id)
    {
        $this->db->where('assessment_name', $assess_name);
        $this->db->where('school_id', $school_id);
        $this->db->from('assessment');
        $query = $this->db->get();
        
        if($query->num_rows == 1)
        {
            $row = $query->row();
            return $row->assessment_id;
        }else{
            return -1;
        }
    }
    
    function give_assessment_questions($assess_id,&$i)
    {
       $this->db->where('assessment_id', $assess_id);
        $this->db->from('question');
        $results = $this->db->get();
    //    print_r($results->result_array());  //very helpfull
        $array = array();
        
        if($results)
        {
            foreach ($results->result() as $row)
            {
                $array['question_id'.$i] = $row->question_id;
                $array['statement'.$i] = $row->statement;// $row['first_name'].$row['last_name'];
                $array['answer'.$i] = $row->answer;
                $array['option1'.$i] = $row->option1;
                $array['option2'.$i] = $row->option2;
                $array['option3'.$i] = $row->option3;
            //    $array['option1'.$i] = $row->score;
                $i++;
            }
            $array['feedback']=1;
            return $array;
        }else{
            $array['feedback']=0;
            return $array;
        }
        
    }
    function update_assessment_question($q_id,$statement,$answer,$option1,$option2,$option3)
    {
        
        $questionData = array(
            'statement' => $statement,
            'answer' => $answer,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3
        );

        $this->db->where('question_id', $q_id);
        $query = $this->db->update('question',$questionData);
        if($query)
        {
            return 1;
        }else{
            return 0;
        }
    }
}
