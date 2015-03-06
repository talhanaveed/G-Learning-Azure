<?php  
class games extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        $this->load->helper(array('form'));
    }
    
    public function play_cachy_even_odd()
    {
        $data['page_title'] = 'G-Learning | Catchy';
        $this->load->view('main_header_new',$data);
        $this->load->view('cachy_even_odd_game');
        $this->load->view('footer');
    }
    
    public function play_cachy_multiples_of_5()
    {
        $data['page_title'] = 'G-Learning | Catchy';
        $this->load->view('main_header_new',$data);
        $this->load->view('multiple_of_5_game');
        $this->load->view('footer');
    }
    
    public function balloon_party()
    {
        $data['page_title'] = 'G-Learning | Catchy';
        $this->load->view('main_header_new',$data);
        $this->load->view('balloon_party_game');
        $this->load->view('footer');
    }
    
    public function runner()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $Level = $this->levels_model->checkLevel($person_id);
        
        $data['page_title'] = 'G-Learning | Runner';
        $data['level'] = $Level;
        $this->load->view('main_header_new',$data);
        $this->load->view('runner_game', $data);
        $this->load->view('footer');
    }
    
    public function shootEmUp()
    {
        $data['page_title'] = 'G-Learning | Shoot Em Up';
        $this->load->view('main_header_new',$data);
        $this->load->view('shoot_view');
        $this->load->view('footer');
    }
    
    public function topicAssessment()
    {
        $this->load->model('levels_model');
        $questionArray = array(array());
        $questionArray = $this->levels_model->getAssessmentQuestions();
        
        $data['page_title'] = 'G-Learning | Runner';
        $data['questionArray'] = $questionArray;
        $data['questionCount'] = count($questionArray);
        
        $this->load->view('main_header_new',$data);
        $this->load->view('topicAssessment_view', $data);
        $this->load->view('footer');
    }
    
    
    
}
?>