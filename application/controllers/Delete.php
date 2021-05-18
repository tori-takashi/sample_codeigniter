
<?php
  class Delete extends CI_Controller {
      public function __construct() {
        parent::__construct();
        $this->load->model('comment');
        $this->load->helper('url');
        $this->load->helper("url_helper");
      }

      public function delete($id) {
          $this->comment->delete_comment_by_id($id);
          redirect('/admin');
      }
  }

?>
