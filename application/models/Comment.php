<?php
  class Comment extends CI_Model {
      public function __construct() {
          $this->load->database();
          date_default_timezone_set('Asia/Tokyo');
      }

      public function get_comments($download_num = 0) {
          if ($download_num != 0) {
            return $this->db->select('*')->from('comments')->limit($download_num)->order_by('post_date', 'ASC')->get();
          } else {
            return $this->db->select('*')->from('comments')->order_by('post_date', 'ASC')->get();
          }
      }

      public function get_comment_by_id($id) {
          return $this->db->select('*')->from('comments')->where('id', $id)->get();
      }

      public function update_comment($id, $user_name, $comment) {
          $data = array(
              'user_name' => html_escape($user_name),
              'comment' => html_escape($comment)
          );
          $this->db->where('id', $id)->update('comments', $data);
      }

      public function delete_comment_by_id($id) {
          $this->db->delete('comments', array('id' => $id));
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