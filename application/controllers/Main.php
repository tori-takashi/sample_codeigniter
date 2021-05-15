<?php
  class Main extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('comment');
      $this->load->helper("url_helper");
    }

    public function index() {
      $this->load->helper('form');

      $data['comments'] = $this->comment->get_all_comments();
		  $this->load->view('main', $data);
    }

    public function post_comment() {
      $this->load->library('form_validation');

      $this->form_validation->set_rules('view_name', '表示名', 'required');
      $this->form_validation->set_rules('message', 'ひと言メッセージ', 'required');

      if ($this->form_validation->run() === FALSE) {
        redirect('/');
      } else {
        $this->comment->set_comment();
        redirect('/');
      }

    }

  }
?>