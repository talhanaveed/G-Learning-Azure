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
    
    
}
?>