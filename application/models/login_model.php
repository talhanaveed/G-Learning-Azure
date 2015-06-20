
<?php

class login_model extends CI_Model {

    function login_model()  
    {  
        // Call the Model constructor  
        $this->load->library('encrypt');
        parent::__construct(); 
    }
    
    public function checkLoginParent($username, $password, $type)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('login');
        if ($query->num_rows == 1)
        {
            $row = $query->row();
            $NewPassword = $this->encrypt->decode($row->parent_password);
            if($password == $NewPassword)
            {
                $type = $row->type;
                $this->session->set_userdata('person_id',$row->person_id);
                $this->session->set_userdata('school_id',$row->school_id);
                $this->session->set_userdata('username',$row->username);
                $this->session->set_userdata('type','parent');
                $this->session->set_userdata('validated',true);
                $person_id = $row->person_id;
                $this->db->where('person_id', $person_id);
                $query1 = $this->db->get('person');
                
                if ($query1->num_rows == 1){
                    $row1 = $query1->row();
                    $this->session->set_userdata('Namesss',$row1->first_name.' '.$row1->last_name);
                    return false;
                }
                
            }
            else
                return "N1";
        }
        else
            return "N2";
        
    }
    
    public function checkLogin($username,$password,$type)
    {
        $this->db->from('login');
        $this->db->join('person', 'login.person_id = person.person_id');
        $this->db->where('username', $username);
        $this->db->where('type', $type);

        $query = $this->db->get();
        if ($query->num_rows == 1)
        {
            $row = $query->row();
            $NewPassword = $this->encrypt->decode($row->password);
            if($password == $NewPassword)
            {
                $type = $row->type;
                $this->session->set_userdata('person_id',$row->person_id);
                $this->session->set_userdata('school_id',$row->school_id);
                $this->session->set_userdata('username',$row->username);
                $this->session->set_userdata('drill_level',$row->drill_level);
                $this->session->set_userdata('type',$row->type);
                $this->session->set_userdata('validated',true);
        
                
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