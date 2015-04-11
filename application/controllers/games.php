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
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $Level = $this->levels_model->checkLevel($person_id);
        
        $data['page_title'] = 'G-Learning | Catchy';
        $data['level'] = $Level;
        $this->load->view('main_header_new',$data);
        $this->load->view('cachy_even_odd_game',$data);
        $this->load->view('footer');
    }
    
    public function play_cachy_multiples_of_5()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $Level = $this->levels_model->checkLevel($person_id);
        
        $data['page_title'] = 'G-Learning | Catchy';
        $data['level'] = $Level;
        $this->load->view('main_header_new',$data);
        $this->load->view('multiple_of_5_game',$data);
        $this->load->view('footer');
    }
    
    public function balloon_party()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $Level = $this->levels_model->checkLevel($person_id);
        
        $data['page_title'] = 'G-Learning | Catchy';
        $data['level'] = $Level;
        $this->load->view('main_header_new',$data);
        $this->load->view('balloon_party_game',$data);
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
    public function assessmentBird()
    {
        $data['page_title'] = 'G-Learning | Assessment Bird';
        $this->load->view('main_header_new',$data);
        $this->load->view('assessment_bird_game', $data);
        $this->load->view('footer');
    }
    public function racerAscending()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $Level = $this->levels_model->checkLevel($person_id);
        $data['level'] = $Level;
        $data['mode'] = "ascending";
        $data['page_title'] = 'G-Learning | Racer';
        $this->load->view('main_header_new',$data);
        $this->load->view('racer_game', $data);
        $this->load->view('footer');
    }
    

      public function racerDescending()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $Level = $this->levels_model->checkLevel($person_id);
        $data['level'] = $Level;
        $data['mode'] = "descending";
        $data['page_title'] = 'G-Learning | Racer';
        $this->load->view('main_header_new',$data);
        $this->load->view('racer_game', $data);
        $this->load->view('footer');
    }
    public function shootEmUp()
    {
        $data['page_title'] = 'G-Learning | Shoot Em Up';
        $this->load->view('main_header_new',$data);
        $this->load->view('shoot_view');
        $this->load->view('footer');
    }
    public function LifeofBee()
    {
        $data['page_title'] = 'G-Learning | Life of a Bee';
        $this->load->view('main_header_new',$data);
        $this->load->view('Lifeofbee');
        $this->load->view('footer');
    }
    
    public function topicAssessment()
    {
        $this->load->model('levels_model');
        $questionArray = array(array());
        $questionArray = $this->levels_model->getAssessmentQuestions();
        
        $data['page_title'] = 'G-Learning | Assessment';
        $data['questionArray'] = $questionArray;
        $data['questionCount'] = count($questionArray);
        
        $this->load->view('main_header_new',$data);
        $this->load->view('topicAssessment_view', $data);
        $this->load->view('footer');
    }
    
     
    public function topicAssessmentGameXML()
    {
        $this->load->model('levels_model');
        $questionArray = array(array());
        $questionArray = $this->levels_model->getAssessmentQuestions();
        $array = array(2);
        $array[0] = count($questionArray);
        $array[1] = $questionArray;
        echo json_encode($array);
    }

    
}
?>