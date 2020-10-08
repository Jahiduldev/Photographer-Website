<?php

class Add_recent_news extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Corporate Profile';
            $data['active_sub_menu'] = 'Add Recent News';
            $table_name='menu';
            $data['get_menu_data'] = $this->common_model->getData($table_name);

            $this->load->view('add_recent_news/add_recent_news',$data);
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
            $total_counter_value= $this->input->post('total_counter_value');


            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads';
            $config['allowed_types'] ='*';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';

            if (!$this->upload->do_upload('userfileimg')) :
                $error1 = $this->upload->display_errors();
                $data['upload_data']=$error1;
                $fileNameImg= $this->input->post('image_file_name');

                $resultExtMenu= $this->db->query("select * from recent_news where menu_id='$select_menu'");
                if($resultExtMenu->num_rows()):
                    $result= $this->db->query("update recent_news set content='$txtEditor' where menu_id='$select_menu' ");
                else:
                    $result= $this->db->query("insert into recent_news values('NULL','$select_menu','$fileNameImg','$txtEditor')");
                endif;

            else:
                $upload_data = $this->upload->data();
                $data['upload_data']=$upload_data;
                $fileNameImg= $upload_data['file_name'];

                $resultExtMenu= $this->db->query("select * from recent_news where menu_id='$select_menu'");
                if($resultExtMenu->num_rows()):
                    $result= $this->db->query("update recent_news set image_name='$fileNameImg',content='$txtEditor' where menu_id='$select_menu' ");
                else:
                    $result= $this->db->query("insert into recent_news values('NULL','$select_menu','$fileNameImg','$txtEditor')");
                endif;

            endif;

            for( $i=0;$i<=$total_counter_value;$i++) {
                if (!$this->upload->do_upload('userfile'.$i)) :
                    $error = $this->upload->display_errors();
                    $data['upload_data']=$error;
                

                else:
                    $upload_data = $this->upload->data();
                    $data['upload_data']=$upload_data;
                    $file_title_name=  $this->input->post('file_title_name'.$i);
                    $fileName= $upload_data['file_name'];
                    $result= $this->db->query("insert into recent_news_file values('NULL','$select_menu','$file_title_name','$fileName')");
                endif;
            }

            redirect('add_recent_news');
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

    public  function getNewsContent() {
        $news_id=$this->input->post('news_id');
        $queryNewsContent= $this->db->query("select * from recent_news where menu_id='$news_id'");
        foreach($queryNewsContent ->result() as $row):
            $image_name= $row->image_name;
            $content= $row->content;

        endforeach;

        $arr=array(
                'image_name'=> $image_name,
                'content'=> $content
        );
        echo json_encode($arr);
    }

}
?>
