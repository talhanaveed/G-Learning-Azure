
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
    
   

}