<?php

class Add_submenu_content2 extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Corporate Profile';
            $data['active_sub_menu'] = 'Add Sub Menu Content 2';
            $table_name='menu';
            $data['get_menu_data'] = $this->common_model->getData($table_name);
            
            $this->load->view('add_submenu_content2/add_submenu_content2',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            $data['base_url'] = $this->config->item('base_url');
            $this->load->view('login/login', $data);
        endif;
    }

    public function uploadData() {

        if (in_array($this->session->userdata('role_id'), array(1,2))):

            // $txtEditor= htmlspecialchars($this->input->post('txtEditor'));//htmlspecialchars_decode will decode character to html
            $txtEditorText=  $this->input->post('txtEditor');
            $txtEditor=str_replace("'", "", $txtEditorText);

            $select_menu= $this->input->post('select_menu');
            $select_sub_menu= $this->input->post('select_sub_menu');
             $select_sub_menu2= $this->input->post('select_sub_menu2');
            $date_time = date('Y-m-d H:i:s');
            $resultExtMenu= $this->db->query("select * from submenu2_content where submenu2_id='$select_sub_menu2'");

            if($resultExtMenu->num_rows()):
                $result= $this->db->query("update submenu2_content set content='$txtEditor' where submenu2_id='$select_sub_menu2' ");
            else:
                $result= $this->db->query("insert into submenu2_content values('NULL','$select_menu','$select_sub_menu','$select_sub_menu2','$txtEditor','$date_time')");
            endif;

            if($result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );
            else:
                $this->session->set_userdata('msg_title', 'Warning');
                $this->session->set_userdata('msg_body','Warning' );
            endif;

            redirect('add_submenu_content2');
        else:
            $data['base_url'] = $this->config->item('base_url');
            $this->load->view('login/login', $data);
        endif;

    }

    public function getSubMenuData() {

        $menu_id=$this->input->post('menu_id');
        $querySubMenuData= $this->db->query("select * from subs_menu where menu_id='$menu_id'");
        echo '<option value="">Select Sub Menu</option>';
        foreach($querySubMenuData ->result() as $row):
            echo '<option value="'.$row->sub_menu_id.'">'.$row->sub_menu_name.'</option>';
        endforeach;

    }

        public function getSubMenuData2() {

        $submenu_id=$this->input->post('submenu_id');
        $querySubMenuData= $this->db->query("select * from subs_menu2 where sub_menu_id='$submenu_id'");
        echo '<option value="">Select Sub Menu 2</option>';
        foreach($querySubMenuData ->result() as $row):
            echo '<option value="'.$row->subs_menu2_id.'">'.$row->sub_menu2_name.'</option>';
        endforeach;

    }


       public  function getSubMenuContent2() {
        $submenu2_id=$this->input->post('submenu2_id');
        $querySubMenuData2= $this->db->query("select * from submenu2_content where submenu2_id='$submenu2_id'");
        foreach($querySubMenuData2 ->result() as $row):
            echo $row->content;
        endforeach;
    }

}
?>
