
<?php
/**
 * Description of user
 *
 * @author Talha
 */
class drills_model extends CI_Model {
    
    function drills_model()  
    {  
        // Call the Model constructor  
        parent::__construct(); 
    }
    
    public function getDrills()
    {
        $query = $this->db->get('drill');
        
        if ($query->num_rows > 0)
        {
            return $query->result_array();
        }
        else
            return -1;
    }
    public function getDrillsCount()
    {
        return $this->db->count_all_results('drill');
    }
    
    public function get_assessments($drill_level,$id)
    {   
        $this->db->select('*');
        
        $this->db->where('drill_id',$drill_level);
        //$this->db->where('gradesheet.student_id !=',$id);
        $this->db->from('assessment');
        $this->db->join('gradesheet','gradesheet.assessment_id = assessment.assessment_id');
        //$this->db->where('gradesheet.student_id',$id);
                
        $assessments =$this->db->get();
        print_r($assessments->result_array());
//        if ($assessments->num_rows > 0 )
//            return $assessments->result_array();
//        else
//            return 0;
    }
    public function incrementDrillLevel()
    {
        
        $level++;
        if($level<$this->getDrillsCount())
        {
            $this->db->where('person_id', $this->session->userdata('person_id'));
            $this->db->set('drill_level', 'drill_level+1', FALSE);
            $this->db->update('person');
            $this->session->set_userdata('drill_level',$level);

        }

    }


}