<?php
  class Comment extends CI_Model {
      public function __construct() {
          $this->load->database();
      }

      public function get_all_comments() {
          return $this->db->get("comments")->result_array();
      }

      public function set_comment() {
          $this->load->helper('url');
          $data = array(
              'user_name' => html_escape($this->input->post('view_name')),
              'comment' => html_escape($this->input->post('message'))
          );

          return $this->db->insert('comments', $data);
      }
  }
?>