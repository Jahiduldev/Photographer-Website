<?php

class Create_folder extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Gallery Admin';
            $data['active_sub_menu'] = 'Create Folder';

            $this->load->view('create_folder/create_folder',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            $data['base_url'] = $this->config->item('base_url');
            $this->load->view('login/login', $data);
        endif;
    }

    public function uploadData() {

        if (in_array($this->session->userdata('role_id'), array(1,2))):


            $select_cat=  $this->input->post('select_cat');
            $sub_folder=  $this->input->post('sub_folder');

            date_default_timezone_set("Asia/Dhaka");
            $date_time = date('Y-m-d H:i:s');

            //  $config['file_name'] = hash('sha1', "TUSHAR");
            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads';
            $config['allowed_types'] ='*';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';
         
            if (!$this->upload->do_upload('userfile')) :
                $error = $this->upload->display_errors();
                $data['upload_data']=$error;
                $fileName= '';
                $result= $this->db->query("insert into sub_folder values('NULL','$select_cat','$sub_folder','$fileName','$date_time')");
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Failed '.$error);
            else:
                $upload_data = $this->upload->data();
                $data['upload_data']=$upload_data;
                //  print_r($upload_data);
                $fileName= $upload_data['file_name'];
                $result= $this->db->query("insert into sub_folder values('NULL','$select_cat','$sub_folder','$fileName','$date_time')");
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Upload Successfully');
				
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = './public/uploads/'.$fileName;
				$config2['create_thumb'] = FALSE;
				$config2['maintain_ratio'] = FALSE;
				$config2['width']         = 180;
				$config2['height']       = 135;
				$this->load->library('image_lib', $config2);
				$this->image_lib->resize();

            endif;

            redirect('create_folder');
        else:
            $data['base_url'] = $this->config->item('base_url');
            $this->load->view('login/login', $data);
        endif;

    }

}
?>
