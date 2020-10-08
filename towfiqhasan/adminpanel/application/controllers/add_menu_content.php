<?php

class add_menu_content extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Corporate Profile';
            $data['active_sub_menu'] = 'Add Menu Content';
            $table_name='menu';
            $data['get_menu_data'] = $this->common_model->getData($table_name);
            $this->load->view('add_menu_content/add_menu_content',$data);

            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            $data['base_url'] = $this->config->item('base_url');
            $this->load->view('login/login', $data);
        endif;
    }

    public function uploadData() {

        if (in_array($this->session->userdata('role_id'), array(1,2))):

            $txtEditorText=  $this->input->post('txtEditor');
            $txtEditor=str_replace("'", "", $txtEditorText);

            $menu_id = mysql_real_escape_string($this->input->post('menu_id'));
            $date_time = date('Y-m-d H:i:s');
            $resultExtMenu= $this->db->query("select * from menu_content where menu_id='$menu_id'");
            if($resultExtMenu->num_rows()):
                $result= $this->db->query("update menu_content set content='$txtEditor' where menu_id='$menu_id'");
            else:
                $result= $this->db->query("insert into menu_content values('NULL','$menu_id','$txtEditor','$date_time')");
            endif;
            if($result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );
            else:
                $this->session->set_userdata('msg_title', 'Warning');
                $this->session->set_userdata('msg_body','Warning' );
            endif;


            redirect('add_menu_content');
        else:
            $data['base_url'] = $this->config->item('base_url');
            $this->load->view('login/login', $data);
        endif;

    }


    public  function getMenuContent() {
        $menu_id=$this->input->post('menu_id');
        $queryMenuData= $this->db->query("select * from menu_content where menu_id='$menu_id'");
        foreach($queryMenuData ->result() as $row):
            echo $row->content;
        endforeach;
    }

}
?>
