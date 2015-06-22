
<?php
/**
 * Description of user
 *
 * @author Talha
 */
class game_log_model extends CI_Model {
    
    function game_log_model()  
    {  
        // Call the Model constructor  
        parent::__construct(); 
    }
    
    public function logScore($person_id, $drill_id, $complexity_level,$percentageScore)
    {
         $data = array(
            'complexity_level' => $complexity_level,
            'percentage' => $percentageScore,
            'drill_id' => $drill_id,
            'student_id' => $person_id
        );

        $query = $this->db->insert('gamelogic',$data);
        
        if ($query)
        {
            return 1;
        }
        else
            return -1;
    }
    
    public function logAssessmentScore($person_id,$assessment_id, $score )
    {
         $data = array(
            'student_id' => $person_id,
            'assessment_id' => $assessment_id,
            'marks_obtained' => $score,
            
        );
        
         $this->db->where('student_id',$person_id);
         $this->db->where('assessment_id',$assessment_id);
         $exists = $this->db->get('gradesheet');
         $query = null;
         
//         if ($exists )
//         {
//            $this->db->where('person_id', $person_id);
//            $this->db->where('assessment_id',$assessment_id);
//            $query = $this->db->update('gradesheet',$data); 
//         }
//         else
//            $query = $this->db->insert('gradesheet',$data);
         $query = $this->db->insert('gradesheet',$data);
        if ($query)
        {
            return 1;
        }
        else
            return -1;
    }
    
   

}