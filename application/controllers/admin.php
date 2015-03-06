<?php
class admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
    }
    
    public function student()
    {
        $this->session->unset_userdata('errorFlag');
        $this->session->unset_userdata('errorMessage');
        
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('admin_home_view');
        $this->load->view('footer');
    }
    
    public function teacher()
    {
        $this->session->unset_userdata('errorFlag');
        $this->session->unset_userdata('errorMessage');
        
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('admin_addteacher_view');
        $this->load->view('footer');
    }
    
    public function passwordRequests()
    {
        $this->session->unset_userdata('errorFlag');
        $this->session->unset_userdata('errorMessage');
        
        $result = $this->admin_model->getPasswordRequests();
        $data['result'] = $result;
        $data['result_count'] = count($result)/3;
        
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('password_requests_view');
        $this->load->view('footer');
    }
    
    public function deleteRequest()
    {
        if(isset($_GET['requestID']))
        {
            $requestID = $_GET['requestID'];
            $result = $this->admin_model->deletePasswordRequest($requestID);
            if($result == "N")
            {
                $this->session->set_userdata('errorFlag',false);
                $this->session->set_userdata('errorMessage',"Request not Deleted");
            }
            else
            {
                $this->session->set_userdata('errorFlag',true);
                $this->session->set_userdata('errorMessage',"Request Deleted Successfully");
                
                $data['result'] = $result;
                $data['result_count'] = count($result)/3;
            }
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('password_requests_view');
            $this->load->view('footer');
        }
    }
    
    public function updatePassword()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $result = $this->admin_model->updatePassword($username, $password);
        
        $result2 = $this->admin_model->getPasswordRequests();
        $data['result'] = $result2;
        $data['result_count'] = count($result2)/3;
        
        if($result == "Y")
        {
            $email = $this->admin_model->getEmail($username);
            // Email to username about new password
            $sender = "xain.malik53@gmail.com";
            $receiver = $email;
            $subject = "Support@G-Learning - Password Changed";
            $message = "Hey ".$username."!\r\nYour New Password is ".$password." \r\n\r\nRegards,\r\nSupport - G-Learning";
            $configs = array(
                'protocol'=>'smtp',
                'smtp_host'=>'ssl://smtp.gmail.com',
                'smtp_user'=>$sender,
                'smtp_pass'=>"pmeswdvsbugqyayu",
                'smtp_port'=>'465'
            );
            
            $this->load->library("email", $configs);
            $this->email->set_newline("\r\n");
            $this->email->to($email);
            $this->email->from($sender, "Xain Malik");
            $this->email->subject($subject);
            $this->email->message($message);
            
            $this->session->set_userdata('errorFlag',true);
            $this->session->set_userdata('errorMessage',$username."'s Password Updated");
        }
        else if($result == "N")
        {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$username."'s Password not updated");
        }
        
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('password_requests_view');
        $this->load->view('footer');
    }

    public function addStudent()
    {
        // Input Form Fields
        $school = $this->security->xss_clean($this->input->post('school'));
        $firstName = $this->security->xss_clean($this->input->post('firstName'));
        $lastName = $this->security->xss_clean($this->input->post('lastName'));
        $HomeAddress = $this->security->xss_clean($this->input->post('HomeAddress'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $Parentpassword = $this->security->xss_clean($this->input->post('Parentpassword'));
        
        // Model Function Call
        $result = $this->admin_model->addStudent($school, $firstName, $lastName, $HomeAddress, $email, $username, $password, $Parentpassword);
        
        if($result == "true"){
            $this->session->set_userdata('errorFlag',true);
            $this->session->set_userdata('errorMessage',"Student Added Successfully");
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('admin_home_view');
            $this->load->view('footer');
        }
        else {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$result);
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('admin_home_view');
            $this->load->view('footer');
        }
    }
    
    public function editStudent()
    {
        // Input Form Fields
        $school = $this->security->xss_clean($this->input->post('school'));
        $firstName = $this->security->xss_clean($this->input->post('firstName'));
        $lastName = $this->security->xss_clean($this->input->post('lastName'));
        $HomeAddress = $this->security->xss_clean($this->input->post('HomeAddress'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $Parentpassword = $this->security->xss_clean($this->input->post('Parentpassword'));
        $PersonID = $this->security->xss_clean($this->input->post('person_id'));
        
        
        // Model Function Call
        $result = $this->admin_model->editStudent($school, $firstName, $lastName, $HomeAddress, $email, $username, $password, $Parentpassword, $PersonID);
        
        if($result == "true"){
            $this->session->set_userdata('errorFlag',true);
            $this->session->set_userdata('errorMessage',"Student Updated Successfully");
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('admin_home_view');
            $this->load->view('footer');
        }
        else {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$result);
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('admin_home_view');
            $this->load->view('footer');
        }
    }
    
    public function deleteStudent()
    {
        if(isset($_POST['personID']))
        {
            $personID = $_POST['personID'];
            $result = $this->admin_model->deleteStudent($personID);
            if($result == "Deleted")
                echo "success";
            else
                echo "failure";
            
        }
    }
    
    public function searchStudent()
    {
        if(isset($_POST['query']))
        {
            $username = $_POST['query'];
            // Model Function Call
            $result = $this->admin_model->searchStudent($username);
            
            if($result['response'] == "N"){
                $res = array(
                    'response' => "failure"
                );
                echo json_encode($res);
            }
            else {
                $res = array(
                    'response' => 'success',
                    'person_id' => $result['person_id'],
                    'username' =>$result['username'],
                    'password' =>$result['password'],
                    'parent_password' =>$result['parent_password'],
                    'school_name' =>$result['school_name'],
                    'first_name' =>$result['first_name'],
                    'last_name' =>$result['last_name'],
                    'address' =>$result['address'],
                    'email' =>$result['email']
                );
                echo json_encode($res);
            }
        }
    }
    
    public function addTeacher()
    {
        // Input Form Fields
        $school = $this->security->xss_clean($this->input->post('school'));
        $firstName = $this->security->xss_clean($this->input->post('firstName'));
        $lastName = $this->security->xss_clean($this->input->post('lastName'));
        $HomeAddress = $this->security->xss_clean($this->input->post('HomeAddress'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Model Function Call
        $result = $this->admin_model->addTeacher($school, $firstName, $lastName, $HomeAddress, $email, $username, $password);
        
        if($result == "true"){
            $this->session->set_userdata('errorFlag',true);
            $this->session->set_userdata('errorMessage',"Teacher Added Successfully");
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('admin_addteacher_view');
            $this->load->view('footer');
        }
        else {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$result);
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('admin_addteacher_view');
            $this->load->view('footer');
        }
    }
    
    public function editTeacher()
    {
        // Input Form Fields
        $school = $this->security->xss_clean($this->input->post('school'));
        $firstName = $this->security->xss_clean($this->input->post('firstName'));
        $lastName = $this->security->xss_clean($this->input->post('lastName'));
        $HomeAddress = $this->security->xss_clean($this->input->post('HomeAddress'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $PersonID = $this->security->xss_clean($this->input->post('person_id'));
        
        
        // Model Function Call
        $result = $this->admin_model->editTeacher($school, $firstName, $lastName, $HomeAddress, $email, $username, $password, $PersonID);
        
        if($result == "true"){
            $this->session->set_userdata('errorFlag',true);
            $this->session->set_userdata('errorMessage',"Teacher Updated Successfully");
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('admin_addTeacher_view');
            $this->load->view('footer');
        }
        else {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$result);
            
            $data['page_title'] = 'G-Learning | Admin';
            $this->load->view('main_header_new',$data);
            $this->load->view('admin_addTeacher_view');
            $this->load->view('footer');
        }
    }
    
    public function deleteTeacher()
    {
        if(isset($_POST['personID']))
        {
            $personID = $_POST['personID'];
            $result = $this->admin_model->deleteTeacher($personID);
            if($result == "Deleted")
                echo "success";
            else
                echo "failure";
            
        }
    }
    
    public function searchTeacher()
    {
        if(isset($_POST['query']))
        {
            $username = $_POST['query'];
            // Model Function Call
            $result = $this->admin_model->searchTeacher($username);
            
            if($result['response'] == "N"){
                $res = array(
                    'response' => "failure"
                );
                echo json_encode($res);
            }
            else {
                $res = array(
                    'response' => 'success',
                    'person_id' => $result['person_id'],
                    'username' =>$result['username'],
                    'password' =>$result['password'],
                    'parent_password' =>$result['parent_password'],
                    'school_name' =>$result['school_name'],
                    'first_name' =>$result['first_name'],
                    'last_name' =>$result['last_name'],
                    'address' =>$result['address'],
                    'email' =>$result['email']
                );
                echo json_encode($res);
            }
        }
    }
}
?>