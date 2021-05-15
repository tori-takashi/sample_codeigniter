<?php
  class Comment extends CI_Model {
      public function __construct() {
          $this->load->database();
      }

      public function get_all_comments() {
          return $this->db->get("comments");
      }
  }
?>