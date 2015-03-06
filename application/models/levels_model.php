<?php
/**
 * Description of user
 *
 * @author Haider
 */
class levels_model extends CI_Model {
    
    function levels_model()  
    {  
        // Call the Model constructor  
        parent::__construct(); 
    }
    
    public function checkLevel($person_id)
    {
        $this->db->where('person_id', $person_id);
        $query = $this->db->get('person');
        
        if ($query->num_rows == 1)
        {
            $row = $query->row();
            return $row->level_in_game;
        }
        else
            return -1;
    }
    
    public function updateLevel($person_id, $newLevel)
    {
        $studentData = array(
            'level_in_game' => $newLevel
        );

        $this->db->where('person_id', $person_id);
        $query = $this->db->update('person',$studentData);
        if($query)
            return true;
        else
            return false;
    }
    
    public function getAssessmentQuestions()
    {
        $query = $this->db->get('assessment');
        
        if ($query->num_rows > 0)
        {
            $row = $query->row();
            $id = $row->assessment_id;
            
            $this->db->where('assessment_id', $id);
            $questions = $this->db->get('question');
            $questionArray = array(array());
            $i = 0;
            foreach ($questions->result() as $row)
            {
                $questionArray[$i][0] = $row->statement;
                $questionArray[$i][1] = $row->option1;
                $questionArray[$i][2] = $row->option2;
                $questionArray[$i][3] = $row->option3;
                $questionArray[$i][4] = $row->answer;
                $questionArray[$i][5] = $row->answer;
                $i++;
            }
            return $questionArray;
        }
        else
            return -1;
    }
}