<?php
  class Admin extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('comment');
      $this->load->helper('url');
      $this->load->helper("url_helper");
    }

    public function index() {
      $this->load->library('session');
      $this->load->helper('form');

      $data["is_succeed"] = $this->session->is_succeed;
      $data["validation_messages"] = $this->session->validation_messages;

      $data['comments'] = $this->comment->get_comments()->result_array();
      $data["admin_login"] = $this->session->admin_login;

      $data["download_limit_options"] = array(
        '0' => '全て',
        '10' => '10件',
        '30' => '30件'
      );

      $this->load->view('admin', $data);
    }

    public function login(){
      $this->load->library('session');

      $password = "adminPassword";
      $admin_password = $this->input->post("admin_password");
      if ($admin_password === $password) {
        $this->session->set_flashdata('is_succeed', 1);
        $this->session->set_userdata('admin_login', 1);
        $this->session->set_userdata('validation_messages', "");
      } else {
        $this->session->set_flashdata('is_succeed', 0);
        $this->session->set_userdata('admin_login', 0);
        $this->session->set_userdata('validation_messages', "ログインに失敗しました。");
      }
      redirect('/admin');

    }

  }
?>