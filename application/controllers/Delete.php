
<?php
  class Delete extends CI_Controller {
      public function __construct() {
        parent::__construct();
        $this->load->model('comment');
        $this->load->helper('url');
        $this->load->helper("url_helper");
      $this->load->library('session');
      }

      public function delete($id) {
        $this->load->helper('form');

        $data["admin_login"] = $this->session->admin_login;

        $data["is_succeed"] = $this->session->is_succeed;
        $data["validation_messages"] = $this->session->validation_messages;

        $data["view_name"] = $this->session->view_name;
        $data["message"] = $this->session->comment;

        $result_array = $this->comment->get_comment_by_id($id)->result_array();
        $data["comment"] = $result_array[0];

        $this->load->view('delete', $data);
      }

      public function commit_delete() {
          $id = $this->input->post("id");
          $this->comment->delete_comment_by_id($id);
          redirect('/admin');
      }
  }

?>
