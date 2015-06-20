<?php  
class games extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        $this->load->helper(array('form'));
        if(strcmp($this->session->userdata('type'),'parent')==0)
        {
           redirect('parents');
        }
        if(strcmp($this->session->userdata('type'),'teacher')==0)
        {
           redirect('teacher');
        }
        if(strcmp($this->session->userdata('type'),'admin')==0)
        {
            redirect('admin');
        }
        if(strcmp($this->session->userdata('type'),'student')==0)
        {
          
        }
        else
        {
            redirect('login');
        }
    }
    
    public function play_cachy_even_odd()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        
        $data['page_title'] = 'G-Learning | Catchy';
        $data['level'] =  $this->levels_model->checkLevel($person_id);
        $data['drill_id'] = $this->levels_model->getDrillId("Even/Odd");

        $this->load->view('main_header_new',$data);
        $this->load->view('cachy_even_odd_game',$data);
        $this->load->view('footer');
    }
    
    public function play_cachy_multiples_of_5()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        
        $data['page_title'] = 'G-Learning | Catchy';
        $data['level'] =  $this->levels_model->checkLevel($person_id);
        $data['drill_id'] = $this->levels_model->getDrillId("Multiples");
        
        $this->load->view('main_header_new',$data);
        $this->load->view('multiple_of_5_game',$data);
        $this->load->view('footer');
    }
    
    public function balloon_party()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
     
        $data['page_title'] = 'G-Learning | Balloon Party';
        $data['level'] =  $this->levels_model->checkLevel($person_id);
        $data['drill_id'] = $this->levels_model->getDrillId("Highest/Lowest");
        $this->load->view('main_header_new',$data);
        $this->load->view('balloon_party_game',$data);
        $this->load->view('footer');
    
    }
    
  
    

    
    public function shootEmUp()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        $data['page_title'] = 'G-Learning | Shoot Em Up';
        $data['level'] =  $this->levels_model->checkLevel($person_id);
        $data['drill_id'] = $this->levels_model->getDrillId("Subtraction");
        $this->load->view('main_header_new',$data);
        $this->load->view('shootemup_asses_game');
        $this->load->view('footer');
    }

    public function LifeofBee()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];

        $data['page_title'] = 'G-Learning | Life of a Bee';
        $data['level'] =  $this->levels_model->checkLevel($person_id);
        $data['drill_id'] = $this->levels_model->getDrillId("Subtraction");

        $this->load->view('main_header_new',$data);
        $this->load->view('Lifeofbee');
        $this->load->view('footer');
    }
    
      public function topicAssessment()
    {
        $this->load->model('levels_model');
        $questionArray = array(array());
        $questionArray = $this->levels_model->getAssessmentQuestions();
        $myQuestionsArray = array();
        $myQuestionsArray[0] = count($questionArray);
        $myQuestionsArray[1] = $questionArray;
        echo json_encode($myQuestionsArray);
        
        /*$data['page_title'] = 'G-Learning | Assessment';
        $data['questionArray'] = $questionArray;
        $data['questionCount'] = count($questionArray);
        
        $this->load->view('main_header_new',$data);
        $this->load->view('topicAssessment_view', $data);
        $this->load->view('footer');*/
    }
   
    

      
    public function runner()
    {
        $this->load->model('levels_model');
        $person_id = $this->session->userdata['person_id'];
        
        
        $data['page_title'] = 'G-Learning | Runner';
        $data['level'] =  $this->levels_model->checkLevel($person_id);
        $data['drill_id'] = $this->levels_model->getDrillId("Addition");
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
        
        $data['level'] =  $this->levels_model->checkLevel($person_id);
        $data['drill_id'] = $this->levels_model->getDrillId("Ascending");
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
       
        $data['level'] =  $this->levels_model->checkLevel($person_id);
        $data['drill_id'] = $this->levels_model->getDrillId("Descending");
        $data['mode'] = "descending";
        $data['page_title'] = 'G-Learning | Racer';
        $this->load->view('main_header_new',$data);
        $this->load->view('racer_game', $data);
        $this->load->view('footer');
    }
  
  
    public function LogScore()
    {
        $this->load->model('game_log_model');
        
        $drill_id  = $this->security->xss_clean($this->input->post('drill_id'));
        $level  = $this->security->xss_clean($this->input->post('level'));
        $percentageScore = $this->input->post('percentageScore');
        $person_id = $this->session->userdata['person_id'];
        echo $this->game_log_model->logScore($person_id, $drill_id, $level,$percentageScore);



    }
    public function testView()
    {
        $this->load->view('test_view');
    }



    public function testConnection()
    {
         $drill_id  = $this->security->xss_clean($this->input->post('drill_id'));
         echo $drill_id;
    }

    
}
?>