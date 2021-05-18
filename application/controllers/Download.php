<?php
class Download extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('comment');
      $this->load->helper('url');
      $this->load->helper("url_helper");
    }

    public function download_csv(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $download_num = intval($this->input->post('limit'));
        $csv_data = $this->dbutil->csv_from_result($this->comment->get_comments($download_num));
        force_download('comments.csv', $csv_data);
    }

}
?>