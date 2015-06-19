 <?php  
class Teacher_Model extends CI_Model {  
    function Teacher_Model()
    {  
        // Call the Model constructor  
        parent::__construct(); 
        $this->load->helper('date');
    }
    
    public function getAllDrills(){
        return $this->db->get('drill')->result();
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
    function delete_assessment($assess_name,$school_id,$teacher_id)    //Note: remember to put cascading option in db
    {
            $this->db->where('assessment_name', $assess_name);
            $this->db->where('school_id', $school_id);
            $this->db->where('teacher_id', $teacher_id);
            $this->db->delete('assessment');
            return $this->db->affected_rows();
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
    
    function search_assessment($assess_name,$school_id,$teacher_id)
    {
        $this->db->where('assessment_name', $assess_name);
        $this->db->where('school_id', $school_id);
        $this->db->where('teacher_id', $teacher_id);
        $this->db->from('assessment');
        $query = $this->db->get();
        if($query){
            if($query->num_rows == 1)
            {
                $row = $query->row();
                return $row->assessment_id;
            }else{
                return -1;
            }
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
   
    function sendPassRequest($username, $date)
    {
        $requestData = array(
            'username' => $username,
            'request_date' => $date
            
        );

       $result=$this->db->insert('password_requests',$requestData);
       if($result)
           return true;
       else 
            return false;
       
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
    
    function get_assessments_by_teacher_count($teacher_id)
    {
        return count($this->get_assessments_by_teacher($teacher_id)->result());
    }
    
    function get_assessments_by_teacher($teacher_id)
    {
        $this->db->select('assessment_id, assessment_name, drill_name, total_marks');
        $this->db->from('assessment');
        $this->db->join('drill','assessment.drill_id = drill.drill_id');
        $this->db->where('assessment.teacher_id',$teacher_id );
        $query = $this->db->get();
      
        return $query;
    }
    
    function generate_result_card($teacher_id,$school_id)
    {
        
        $srno = 0;
        $data = array(array());
        $assessments_id = array();
        $assessments = $this->get_assessments_by_teacher($teacher_id);
        $assess_count = count($assessments->result());
        $student = array();      
        $student_ids = array();
        
        foreach ($assessments->result() as $assess_id)
        {   
                array_push($assessments_id,$assess_id->assessment_id);
        }
        
        foreach ($assessments_id as $a)
        {
            $position = array(array());
            $this->db->select('login.person_id,first_name,last_name,assessment_id,marks_obtained');
            $this->db->where('assessment_id',$a);
            $this->db->where('login.school_id', $school_id);        
            $this->db->where('login.type', "student");
            $this->db->from('login');
            $this->db->join('person', 'person.person_id = login.person_id');
            $this->db->join('gradesheet','student_id = login.person_id');
            $results = $this->db->get();
        
            if ($results)
            {
                $result_array = $results->result_array();
                        // Getting student ids
                //  login.person_id,first_name,last_name,assessment_id,marks_obtained
                foreach ($result_array as $row)
                {   
                    if (array_search($row['person_id'],$student_ids) === FALSE)                   
                        array_push($student_ids,$row['person_id']);
              
                }
                $data[$srno] = $result_array;
                $srno++;
            }
            else
            {

            }
            
            $stu= 0;
            $i=0;
            
            foreach ($student_ids as $id)
            {
                $other_data = FALSE;
                $total_marks = 0;
                foreach( $data as $rows)
                {
                    foreach ($rows as $row)
                    {
                        if ($row['person_id'] == $id)
                        {
                            if($other_data === FALSE)
                            {
                                for ($as = 0 ; $as<$assess_count; $as++)
                                {
                                    $student[$stu][$as] = 'NA';
                                }
                                $student[$stu]['name'] = $row['first_name']. " " . $row['last_name'];
                                
                                $other_data=TRUE;
                            }
                            $student[$stu][$i] = $row['marks_obtained'];
                            $total_marks+=$row['marks_obtained'];  
                        }
                        
                    }
                    $i++;
                }
                $student[$stu]['total_marks'] = $total_marks;
                $i=0;
                $stu++;
            }                
            
        }
        usort($student, function($item1,$item2){
             if ($item1['total_marks'] == $item2['total_marks']) return 0;
            return ($item1['total_marks'] < $item2['total_marks']) ? 1 : -1;
        });
        $pos = 0;
        $prev_student_marks = -1;
        for ($iter =0; $iter <count($student); $iter++)        
        {
            if ($iter == 0 )
                $prev_student_marks = $student[0]['total_marks'];
            else
                if ($student[$iter]['total_marks'] == $prev_student_marks)
                {
                    $pos--;
                }
            $pos++;
            $prev_student_marks = $student[$iter]['total_marks'];
            $student[$iter]['position'] = $pos;
            

        }
            return $student;
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

