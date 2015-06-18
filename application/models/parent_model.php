 <?php  
class Parent_Model extends CI_Model {  
    function Parent_Model()
    {  
        parent::__construct(); 
    }
    
    public function getGradeSheet($student_id){
        $this->db->select('a.assessment_name, g.marks_obtained, a.total_marks');
        $this->db->from('assessment a');
        $this->db->join('gradesheet g', 'a.assessment_id = g.assessment_id');
        $this->db->where('g.student_id', $student_id);
        return $this->db->get()->result();
    }
    
    public function getMaxMarksByAssessment($assessmentName){
        $this->db->select('g.student_id, MAX(g.marks_obtained) AS MaxMarks');
        $this->db->from('assessment a');
        $this->db->join('gradesheet g', 'a.assessment_id = g.assessment_id');
        $this->db->where('a.assessment_name', $assessmentName);
        $query = $this->db->get();
        if($query){
            $row = $query->row();
            return $row->MaxMarks;
        }
        else
            return 0;
    }
}
