
<?php 
session_start();
class login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_model');
    }
    
    public function index()
    {
        $this->session->unset_userdata('errorFlag');
        $this->session->unset_userdata('errorMessage');
        $this->load->view('login_view');
    }
    
    public function checkLogin()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $type = $this->security->xss_clean($this->input->post('type'));
        if($type != "parent"){
            // Model Function Call
            $result = $this->login_model->checkLogin($username,$password,$type);

            if($result == "student"){
                redirect('home/student_dashboard');
            }
            else if($result == "admin"){
                $this->session->unset_userdata('errorFlag');
                $this->session->unset_userdata('errorMessage');
                redirect('admin/student');
            }
            else if($result == "N"){
                $this->session->set_userdata('errorFlag',false);
                $this->session->set_userdata('errorMessage',"Username/Password Incorrect");
                $this->load->view('login_view');
            }
            else if($result == "teacher"){
                $data['scroll_to_div'] = 'start';
                $data['page_title'] = 'G-Learning | Teacher';
                redirect('teacher');
            }
       }
       else
       {
            $result1 = $this->login_model->checkLoginParent($username,$password,$type);
            if($result1 == false){
                $data['page_title'] = 'G-Learning | Parents';
                $data['name'] = $this->session->userdata['Namesss'];
                redirect('parents');
            }
            else{
                $this->session->set_userdata('errorFlag',false);
                $this->session->set_userdata('errorMessage',"Username/Password Incorrect");
                $this->load->view('login_view');
            }
       }
    }
    public function logout()
    {
        $this->session->unset_userdata('errorFlag');
        $this->session->unset_userdata('errorMessage');
        $this->session->unset_userdata('person_id');
        $this->session->sess_destroy();
        $this->load->view('login_view');
    }



    public function login_new()
    {
        $this->session->sess_destroy();
        $this->load->view('login_view_new');
    }
    
   
    
    
}

?>