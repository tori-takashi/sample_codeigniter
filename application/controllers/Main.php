<?php
  class Main extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('comment');
      $this->load->helper("url_helper");
    }

    public function index() {
      $this->load->library('session');
      $this->load->helper('form');

      $data["view_name"] = $this->session->view_name;
      $data["success_message"] = $this->session->flashdata('message');
      $data['comments'] = $this->comment->get_all_comments();

		  $this->load->view('main', $data);
    }

    public function post_comment() {
      $this->load->library('form_validation');
      $this->load->library('session');

      $this->form_validation->set_rules('view_name', '表示名', 'required', array('required' => "表示名を入力してください。"));
      $this->form_validation->set_rules('message', 'ひと言メッセージ', 'required', array('required' => "ひと言メッセージを入力してください。"));

      if ($this->form_validation->run() == FALSE) {
      } else {
        $this->session->set_userdata('view_name',$this->input->post('view_name'));
        $this->session->set_flashdata('message', "メッセージを書き込みました。");
        $this->comment->set_comment();
      }

    }

  }
?>