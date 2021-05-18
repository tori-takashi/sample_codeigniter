<?php
  class Edit extends CI_Controller {
      public function __construct() {
        parent::__construct();
        $this->load->model('comment');
        $this->load->helper('url');
        $this->load->helper("url_helper");
        $this->load->library('session');
      }

      public function edit($id) {
        $this->load->helper('form');

        $data["admin_login"] = $this->session->admin_login;

        $data["is_succeed"] = $this->session->is_succeed;
        $data["validation_messages"] = $this->session->validation_messages;

        $data["view_name"] = $this->session->view_name;
        $data["message"] = $this->session->comment;

        $result_array = $this->comment->get_comment_by_id($id)->result_array();
        $data["comment"] = $result_array[0];

        $this->load->view('edit', $data);
      }

      public function update() {
        if($this->session->admin_login) {
            $this->load->library('session');
            $this->load->library('form_validation');

            $this->session->set_userdata('view_name',$this->input->post('view_name'));
            $this->session->set_userdata('comment',$this->input->post('message'));

            $this->form_validation->set_rules('view_name', '表示名', 'required', array('required' => "・表示名を入力してください。"));
            $this->form_validation->set_rules('message', 'ひと言メッセージ', 'required', array('required' => "・ひと言メッセージを入力してください。"));

            $id = $this->input->post("id");

            if ($this->form_validation->run() == FALSE) {
              $this->session->set_flashdata('is_succeed', 0);
              $this->session->set_flashdata('validation_messages', validation_errors());
              redirect('edit/'.$id);
            } else {
              $this->comment->update_comment($id, $this->input->post("view_name"), $this->input->post("message"));
              $this->session->set_flashdata('is_succeed', 1);
              $this->session->set_flashdata('validation_messages', "");
              $this->session->set_userdata('comment',"");
              redirect('/admin');
            }
        }
    }
  }
?>