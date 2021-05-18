<?php
  class Comment extends CI_Model {
      public function __construct() {
          $this->load->database();
          date_default_timezone_set('Asia/Tokyo');
      }

      public function get_all_comments() {
          return $this->db->get("comments")->result_array();
      }

      public function set_comment() {
          $this->load->helper('url');

          $post_date = date("Y-m-d H:i:s");

          $data = array(
              'user_name' => html_escape($this->input->post('view_name')),
              'comment' => html_escape($this->input->post('message')),
              'post_date' => $post_date
          );

          return $this->db->insert('comments', $data);
      }
  }
?>