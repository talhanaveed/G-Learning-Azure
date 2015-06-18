<?php
/**
 *
 * @author XAIN MALIK
 */
class admin_model extends CI_Model {
    
    function admin_model()  
    {  
        // Call the Model constructor  
        $this->load->library('encrypt');
        parent::__construct(); 
    }
    
    function getEmail($username)
    {
        $this->db->select('p.email');
        $this->db->from('person p');
        $this->db->join('login l', 'p.person_id = l.person_id');
        $this->db->where('l.username', $username);
        $query = $this->db->get();
        $row = $query->row();
        return $row->email;
    }
    

    function validateEmail($email, $person_id)
    {
        if($person_id != -1){
            $this->db->where('person_id', $person_id);
            $this->db->where('email', $email);
            $queryOut = $this->db->get('person');

            if ($queryOut->num_rows == 1){
                return true;
            }
        }
        
        $this->db->where('email', $email);
        $query = $this->db->get('person');

        if ($query->num_rows == 1){
            return false;
        }
        return true;
    }
    
    function validateUsername($username, $person_id)
    {
        if($person_id != -1)
        {
            $this->db->where('person_id', $person_id);
            $this->db->where('username', $username);
            $queryOut = $this->db->get('login');

            if ($queryOut->num_rows == 1){
                return true;
            }
        }
        
        $this->db->where('username', $username);
        $query = $this->db->get('login');
        
        if ($query->num_rows == 1){
            return false;
        }
        return true;
    }
    
    public function addStudent($school, $firstName, $lastName, $HomeAddress, $email, $username, $password, $Parentpassword)
    {           
        $studentData = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'address' => $HomeAddress,
            'email' => $email,
            'drill_level' => 1,
            'pic_path' => "student_pic.png"
        );

        // Email Address already exists
        if(!$this->validateEmail($email, -1)){
            return "Email Address Already Exists";
        }

        // Username already exists
        if(!$this->validateUsername($username, -1)){
            return "Username Already Exists";
        }

        $query = $this->db->insert('person',$studentData);
        if($query)
        {
            // Getting School ID of Student
            $this->db->where('school_name',$school);
            $schoolQuery = $this->db->get('school');
            if($schoolQuery != null)
            {
                $schoolRow = $schoolQuery->row();
                $schoolID = $schoolRow->school_id;

                // Getting Person ID of Student
                $this->db->where('email',$email);
                $personQuery = $this->db->get('person');
                if($personQuery)
                {
                    $personRow = $personQuery->row();
                    $personID = $personRow->person_id;

                    // Login Related Details
                    $loginData = array(
                        'person_id' => $personID,
                        'username' => $username,
                        'password' => $this->encrypt->encode($password),
                        'type' =>  "student",
                        'parent_password' => $this->encrypt->encode($Parentpassword),
                        'school_id' => $schoolID
                    );

                    // Adding Student details in Login Table
                    $loginAddQuery = $this->db->insert('login',$loginData);
                    if($loginAddQuery)
                        return "true";
                    // Student record not entered
                    else {
                        return "Student Record Not Entered";
                    }
                }
                // Student Not found
                else
                {
                    return "Student Record Not Found";
                }
            }
            // School Not found
            else {
                return $school." School Not Found";
            }
        }
        // Student record not entered
        else {
            return "Student Record Not Entered";
        }
    }
    
    
    public function editStudent($school, $firstName, $lastName, $HomeAddress, $email, $username, $password, $Parentpassword, $PersonID)
    {           
        $studentData = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'address' => $HomeAddress,
        );

        // Email Address already exists
        if(!$this->validateEmail($email, $PersonID)){
            return "Email Address Already Exists";
        }

        // Username already exists
        if(!$this->validateUsername($username, $PersonID)){
            return "Username Already Exists";
        }
        
        $this->db->where('person_id', $PersonID);
        $query = $this->db->update('person',$studentData);
        if($query)
        {
            // Getting School ID of Student
            $this->db->where('school_name',$school);
            $schoolQuery = $this->db->get('school');
            if($schoolQuery != null)
            {
                $schoolRow = $schoolQuery->row();
                $schoolID = $schoolRow->school_id;

                // Login Related Details
                $loginData = array(
                    'password' => $this->encrypt->encode($password),
                    'parent_password' => $this->encrypt->encode($Parentpassword),
                    'school_id' => $schoolID
                );

                // Adding Student details in Login Table
                $this->db->where('person_id', $PersonID);
                $loginAddQuery = $this->db->update('login',$loginData);
                if($loginAddQuery)
                    return "true";
                // Student record not entered
                else {
                    return "Student Record Not Updated";
                }
            }
            // School Not found
            else {
                return $school." School Not Found";
            }
        }
        // Student record not entered
        else {
            return "Student Record Not Updated";
        }
    }
    
    public function deleteStudent($personID)
    {
        $this->db->where('person_id', $personID);
        $query = $this->db->delete('person');
        if($query)
            return "Deleted";
        else
            return "Not Deleted";

    }
    
    public function searchStudent($username)
    {
        $this->db->where('username', $username);
        $this->db->where('type', "student");
        $this->db->from('login');
        $this->db->join('school', 'login.school_id = school.school_id');
        $query = $this->db->get();
        $result = array();
        
        if($query->num_rows == 1){
            $row = $query->row();    
            
            $result['person_id'] = $row->person_id;
            $result['school_id'] = $row->school_id;
            $result['username'] = $row->username;
            $result['school_name'] = $row->school_name;
            $result['password'] = $this->encrypt->decode($row->password);
            $result['parent_password'] = $this->encrypt->decode($row->parent_password);
            $result['response'] = "success";            
            
            $this->db->where('person_id', $result['person_id']);
            $queryPerson = $this->db->get('person');
            if($queryPerson->num_rows == 1){
                $rowPerson = $queryPerson->row();
                $result['first_name'] = $rowPerson->first_name;
                $result['last_name'] = $rowPerson->last_name;
                $result['address'] = $rowPerson->address;
                $result['email'] = $rowPerson->email;
            }
            else{
                $result['response'] = "N";
                return $result;
            }
            
            return $result;
        }
        else{
            $result['response'] = "N";
            return $result;
        }
    }
    
    public function addTeacher($school, $firstName, $lastName, $HomeAddress, $email, $username, $password)
    {
        $TeacherData = array(
                'first_name' => $firstName,
                'last_name' => $lastName,
                'address' => $HomeAddress,
                'email' => $email
            );
            
            
            // Email Address already exists
            if(!$this->validateEmail($email, -1)){
                return "Email Address Already Exists";
            }
            
            // Username already exists
            if(!$this->validateUsername($username, -1)){
                return "Username Already Exists";
            }
            
            
            $query = $this->db->insert('person',$TeacherData);
            if($query)
            {
                // Getting School ID of Teacher
                $this->db->where('school_name',$school);
                $schoolQuery = $this->db->get('school');
                if($schoolQuery != null)
                {
                    $schoolRow = $schoolQuery->row();
                    $schoolID = $schoolRow->school_id;

                    // Getting Person ID of Teacher
                    $this->db->where('email',$email);
                    $personQuery = $this->db->get('person');
                    if($personQuery)
                    {
                        $personRow = $personQuery->row();
                        $personID = $personRow->person_id;
                        
                        // Login Related Details
                        $loginData = array(
                            'person_id' => $personID,
                            'username' => $username,
                            'password' => $this->encrypt->encode($password),
                            'type' =>  "teacher",
                            'school_id' => $schoolID
                        );
                        
                        // Adding Teacher details in Login Table
                        $loginAddQuery = $this->db->insert('login',$loginData);
                        if($loginAddQuery)
                            return "true";
                        // Teacher record not entered
                        else {
                            return "Teacher Record Not Entered";
                        }
                    }
                    // Teacher Not found
                    else
                    {
                        return "Teacher Record Not Found";
                    }
                }
                // School Not found
                else {
                    return $school." School Not Found";
                }
            }
            // Teacher record not entered
            else {
                return "Teacher Record Not Entered";
            }
    }
    
    public function editTeacher($school, $firstName, $lastName, $HomeAddress, $email, $username, $password, $PersonID)
    {
        $teacherData = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'address' => $HomeAddress,
        );

        // Email Address already exists
        if(!$this->validateEmail($email, $PersonID)){
            return "Email Address Already Exists";
        }

        // Username already exists
        if(!$this->validateUsername($username, $PersonID)){
            return "Username Already Exists";
        }
        
        $this->db->where('person_id', $PersonID);
        $query = $this->db->update('person',$teacherData);
        if($query)
        {
            // Getting School ID of Student
            $this->db->where('school_name',$school);
            $schoolQuery = $this->db->get('school');
            if($schoolQuery != null)
            {
                $schoolRow = $schoolQuery->row();
                $schoolID = $schoolRow->school_id;

                // Login Related Details
                $loginData = array(
                    'password' => $this->encrypt->encode($password),
                    'school_id' => $schoolID
                );

                // Adding Student details in Login Table
                $this->db->where('person_id', $PersonID);
                $loginAddQuery = $this->db->update('login',$loginData);
                if($loginAddQuery)
                    return "true";
                // Teacher record not entered
                else {
                    return "Teacher Record Not Updated";
                }
            }
            // School Not found
            else {
                return $school." School Not Found";
            }
        }
        // Teacher record not entered
        else {
            return "Teacher Record Not Updated";
        }
    }
    
    public function deleteTeacher($personID)
    {
        $this->db->where('person_id', $personID);
        $query = $this->db->delete('person');
        if($query)
            return "Deleted";
        else {
            return "Not Deleted";
        }
    }
    
    public function searchTeacher($username)
    {
        $this->db->where('username', $username);
        $this->db->where('type', "teacher");
        $this->db->from('login');
        $this->db->join('school', 'login.school_id = school.school_id');
        $query = $this->db->get();
        $result = array();
        
        if($query->num_rows == 1){
            $row = $query->row();    
            
            $result['person_id'] = $row->person_id;
            $result['school_id'] = $row->school_id;
            $result['username'] = $row->username;
            $result['school_name'] = $row->school_name;
            $result['password'] = $this->encrypt->decode($row->password);
            $result['parent_password'] = $this->encrypt->decode($row->parent_password);
            $result['response'] = "success";            
            
            $this->db->where('person_id', $result['person_id']);
            $queryPerson = $this->db->get('person');
            if($queryPerson->num_rows == 1){
                $rowPerson = $queryPerson->row();
                $result['first_name'] = $rowPerson->first_name;
                $result['last_name'] = $rowPerson->last_name;
                $result['address'] = $rowPerson->address;
                $result['email'] = $rowPerson->email;
            }
            else{
                $result['response'] = "N";
                return $result;
            }
            
            return $result;
        }
        else{
            $result['response'] = "N";
            return $result;
        }
    }
    
    function getPasswordRequests(){
        $results = $this->db->get('password_requests');
        $array = Array();
        $i = 0;
        foreach ($results->result_array() as $row)
        {
            $array['request_id'.$i] = $row['request_id'];
            $array['username'.$i] = $row['username'];
            $array['date'.$i] = $row['request_date'];
            $i++;
        }
        return $array;
    }
    
    function deletePasswordRequest($requestID){
        $this->db->where('request_id', $requestID);
        $query = $this->db->delete('password_requests');
        
        if($query != null)
        {
            return $this->getPasswordRequests();
        }
        else
            return "N";
    }
    
    function updatePassword($username, $password){
        $array = array(
            'password' => $this->encrypt->encode($password)
        );
        $this->db->where('username', $username);
        $query = $this->db->update('login', $array);
        if($query)
            return "Y";
        else
            return "N";
    }
    
    public function getAllSchools(){
        $this->db->select('s.school_name');
        $this->db->from('school s');
        return $this->db->get()->result();
    }
    
    public function getAllStudents(){
        $this->db->from('person p');
        $this->db->join('login l', 'p.person_id = l.person_id');
        $this->db->join('school s', 's.school_id = l.school_id');
        $this->db->where('l.type', "student");
        return $this->db->get()->result();
    }
    
    public function getAllTeachers(){
        $this->db->from('person p');
        $this->db->join('login l', 'p.person_id = l.person_id');
        $this->db->join('school s', 's.school_id = l.school_id');
        $this->db->where('l.type', "teacher");
        return $this->db->get()->result();
    }
}