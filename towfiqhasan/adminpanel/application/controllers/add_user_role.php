<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of administrator
 *
 * @author asad
 */
class Add_User_Role extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_role_model');

    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Administrator';
            $data['active_sub_menu'] = 'Add User Role';
            $table_name='user_role';
            $data['get_role_data'] = $this->user_role_model->getData($table_name);
            $this->load->view('common/header',$data);
            $this->load->view('add_user_role/add_user_role',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('add_user_role/js_add_user_role',$data);
        else:
            redirect('home');
        endif;
    }

    public function addUserRole() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $role_name = mysql_real_escape_string($this->input->post('role_name'));
            $data = array(
                    'role_name' => $role_name
                    
            );
            $table_name='user_role';
            $insert_check = $this->user_role_model->insertData($table_name, $data);
            if($insert_check):
                $this->session->set_userdata('login_msg', 'Added Successfull');
            else:
                $this->session->set_userdata('login_msg', 'Added Fail');
            endif;

            redirect('add_user_role');
        else:
            redirect('home');
        endif;
    }



}
?>
