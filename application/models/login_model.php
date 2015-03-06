<?php
/**
 * Description of user
 *
 * @author Haider
 */
class login_model extends CI_Model {
    
    function login_model()  
    {  
        // Call the Model constructor  
        $this->load->library('encrypt');
        parent::__construct(); 
    }
    
    public function checkLogin($username,$password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('login');
        if ($query->num_rows == 1)
        {
            $row = $query->row();
            $NewPassword = $this->encrypt->decode($row->password);
            if($password == $NewPassword)
            {
                $type = $row->type;
                $this->session->set_userdata('person_id',$row->person_id);
                if($type == "student")
                    return "student";
                else if($type == "teacher")
                    return "teacher";
                else if($type == "admin")
                    return "admin";
            }
            else
                return "N";
        }
        else
            return "N";
    }
}