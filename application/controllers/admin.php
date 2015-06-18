
<?php
class admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $sessionFlag = true;
        
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->library('encrypt');
        
        if(strcmp($this->session->userdata('type'),'student')==0){
           redirect('home/student_dashboard');
        }
        if(strcmp($this->session->userdata('type'),'parent')==0){
           redirect('parents');
        }
        if(strcmp($this->session->userdata('type'),'teacher')==0){
           redirect('teacher');
        }
        if(strcmp($this->session->userdata('type'),'admin')==0){
        }
        else{
            redirect('login');
        }
    }

    public function index(){
        $this->student(true);
    }
    
    public function student($flag=true)
    {
        if($flag){
            $this->session->unset_userdata('errorFlag');
            $this->session->unset_userdata('errorMessage');
        }
        
        $schools = array();
        $results = $this->admin_model->getAllSchools();
        $i = 0;
        foreach($results as $school){
            $schools[$i] = $school->school_name;
            $i++;
        }
        $data['schools'] = $schools;
        $data['schoolCount'] = count($schools);
        
        $students = array(array());
        $results = $this->admin_model->getAllStudents();
        if(count($results) == 0)
            $data['students'] = null;
        else
        {
            $i = 0;
            foreach($results as $student){
                $students[$i][0] = $student->person_id;
                $students[$i][1] = $student->first_name;
                $students[$i][2] = $student->last_name;
                $students[$i][3] = $student->username;
                $students[$i][4] = $student->email;
                $students[$i][5] = $student->address;
                $students[$i][6] = $this->encrypt->decode($student->password);
                $students[$i][7] = $this->encrypt->decode($student->parent_password);
                $students[$i][8] = $student->school_name;
                $i++;
            }
            $data['students'] = $students;
        }
        
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('admin_home_view');
        $this->load->view('footer_new_design');
    }
    
    public function teacher($flag=true)
    {
        if($flag){
            $this->session->unset_userdata('errorFlag');
            $this->session->unset_userdata('errorMessage');
        }
        $schools = array();
        $results = $this->admin_model->getAllSchools();
        $i = 0;
        foreach($results as $school){
            $schools[$i] = $school->school_name;
            $i++;
        }
        $data['schools'] = $schools;
        $data['schoolCount'] = count($schools);
        
        
        $teachers = array(array());
        $results = $this->admin_model->getAllTeachers();
        if(count($results) == 0)
            $data['students'] = null;
        else
        {
            $i = 0;
            foreach($results as $teacher){
                $teachers[$i][0] = $teacher->person_id;
                $teachers[$i][1] = $teacher->first_name;
                $teachers[$i][2] = $teacher->last_name;
                $teachers[$i][3] = $teacher->username;
                $teachers[$i][4] = $teacher->email;
                $teachers[$i][5] = $teacher->address;
                $teachers[$i][6] = $this->encrypt->decode($teacher->password);
                $teachers[$i][7] = $this->encrypt->decode($teacher->parent_password);
                $teachers[$i][8] = $teacher->school_name;
                $i++;
            }
            $data['teachers'] = $teachers;
        }
        
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('admin_addteacher_view');
        $this->load->view('footer_new_design');
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
        $this->load->view('footer_new_design');
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
            $this->load->view('footer_new_design');
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
            require_once('./application/helpers/class.smtp.php');
            require_once('./application/helpers/class.phpmailer.php');

            /*
            *  Configurations
            */
            $mail = new PHPMailer(); 
            $mail->IsSMTP(); // send via SMTP
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = "465";

            /*
            *  Get this by adding App to your Gmail Account
            */
            $mail->Username = "xain.malik53@gmail.com"; // SMTP username
            $mail->Password = "behalvjwtsygmduo"; // SMTP password

            /*
            *  Configurations
            */
            $webmaster_email = "xain.malik53@gmail.com"; //Reply to this email ID

            /*
            *  From
            */
            $mail->From = $webmaster_email;
            $mail->FromName = "support@G-Learning";
            /*
            *  To
            */
            $mail->AddAddress($email,$username);
            $mail->WordWrap = 50; // set word wrap
            $mail->IsHTML(true); // send as HTML

            /*
            *  Email's Subject & Body
            */
            $mail->Subject = "G-Learning - Password Changed";
            $mail->Body = "Hello ".$username.",<br/><br/>
            Your New Password is ".$password." <br/><br/>
            Regards,<br/>
            Support - G-Learning";

            $mail->AltBody = "Your G-Learning Password has been changed"; //Text Body
            if(!$mail->Send()){
                $this->session->set_userdata('errorFlag',false);
                $this->session->set_userdata('errorMessage',$username."'s Password not updated");
            }
            else{
                $this->session->set_userdata('errorFlag',true);
                $this->session->set_userdata('errorMessage',$username."'s Password Updated");
            }
        }
        else if($result == "N")
        {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$username."'s Password not updated");
        }
        
        $data['page_title'] = 'G-Learning | Admin';
        $this->load->view('main_header_new',$data);
        $this->load->view('password_requests_view');
        $this->load->view('footer_new_design');
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
            
            $this->student(false);
        }
        else {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$result);
            
            $this->student(false);
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
            
            $this->student(false);
        }
        else {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$result);
            
            $this->student(false);
        }
    }
    
    public function deleteStudent()
    {
        if(isset($_GET['person_id']))
        {
            $personID = $_GET['person_id'];
            $result = $this->admin_model->deleteStudent($personID);
            if($result == "Deleted"){
                $this->session->set_userdata('errorFlag',true);
                $this->session->set_userdata('errorMessage',"Student Deleted Successfully");

                $this->student(false);
            }
            else{
                $this->session->set_userdata('errorFlag',false);
                $this->session->set_userdata('errorMessage',$result);

                $this->student(false);
            }
            
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
            
            $this->teacher(false);
        }
        else {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$result);
            
            $this->teacher(false);
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
            
            $this->teacher(false);
        }
        else {
            $this->session->set_userdata('errorFlag',false);
            $this->session->set_userdata('errorMessage',$result);
            
            $this->teacher(false);
        }
    }
    
    public function deleteTeacher()
    {
        if(isset($_GET['person_id']))
        {
            $personID = $_GET['person_id'];
            $result = $this->admin_model->deleteTeacher($personID);
            if($result == "Deleted"){
                $this->session->set_userdata('errorFlag',true);
                $this->session->set_userdata('errorMessage',"Teacher Deleted Successfully");

                $this->teacher(false);
            }
            else{
                $this->session->set_userdata('errorFlag',false);
                $this->session->set_userdata('errorMessage',$result);

                $this->teacher(false);
            }
            
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
