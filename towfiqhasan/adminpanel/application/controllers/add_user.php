<?php

class Add_User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
           $data['active_menu'] = 'Administrator';
            $data['active_sub_menu'] = 'Add User';
            $table_name='user_role';
            $data['get_role_data'] = $this->common_model->getData($table_name);
            $table_name='user';
            $data['get_user_data'] = $this->common_model->getData($table_name);
            $table_name='status';
            $data['get_status_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header',$data);
            $this->load->view('add_user/add_user',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('add_user/js_add_user',$data);
        else:
        redirect('home');
        endif;
    }

    public function addUser() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $add_role = mysql_real_escape_string($this->input->post('add_role'));
            $add_full_name = mysql_real_escape_string($this->input->post('add_full_name'));
            $add_user_name = mysql_real_escape_string($this->input->post('add_user_name'));
            $add_password = mysql_real_escape_string($this->input->post('add_password'));
            $add_phone = mysql_real_escape_string($this->input->post('add_phone'));
            $add_email = mysql_real_escape_string($this->input->post('add_email'));
            $add_status = mysql_real_escape_string($this->input->post('add_status'));
            date_default_timezone_set("Asia/Dhaka");
            $data = array(
                    'role_id' => $add_role,
                    'name' => $add_full_name,
                    'user_name' => $add_user_name,
                    'password' => $add_password,
                    'phone' => $add_phone,
                    'email' => $add_email,
                    'status' => $add_status,
                    'date_time' => date('Y-m-d H:i:s')
            );
            $table_name='user';
            $insert_result = $this->common_model->insertData($table_name, $data);
            if($insert_result):
                $this->session->set_userdata('login_msg', 'Added Successfull');
            else:
                $this->session->set_userdata('login_msg', 'Added Fail');
            endif;
            redirect('add_user');
        else:
      redirect('home');
        endif;
    }



}
?>
