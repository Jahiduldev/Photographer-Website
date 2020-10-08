<?php

class Add_Success_Officer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Corporate Profile';
            $data['active_sub_menu'] = 'Success Officer';

            $table_name='successfull_officers';
            $data['get_success_officer_data'] = $this->common_model->getData($table_name);

            $this->load->view('add_success_officer/header',$data);
            $this->load->view('add_success_officer/add_success_officer',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('add_success_officer/js_add_success_officer',$data);
        else:
            redirect('home');
        endif;
    }

    public function addOfficerData() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');

            $add_army_id = mysql_real_escape_string($this->input->post('add_army_id'));
            $add_army_no = mysql_real_escape_string($this->input->post('add_army_no'));
            $add_rank = mysql_real_escape_string($this->input->post('add_rank'));
            $add_name = mysql_real_escape_string($this->input->post('add_name'));
            $add_course = mysql_real_escape_string($this->input->post('add_course'));
            $add_cm_date = mysql_real_escape_string($this->input->post('add_cm_date'));
            $add_contact_no = mysql_real_escape_string($this->input->post('add_contact_no'));
            $add_doc_rec = mysql_real_escape_string($this->input->post('add_doc_rec'));
            $add_req_am = mysql_real_escape_string($this->input->post('add_req_am'));
            $add_am_rec = mysql_real_escape_string($this->input->post('add_am_rec'));
            $add_am_due = mysql_real_escape_string($this->input->post('add_am_due'));
            $add_interest = mysql_real_escape_string($this->input->post('add_interest'));
            $add_group_no = mysql_real_escape_string($this->input->post('add_group_no'));
            $add_email = mysql_real_escape_string($this->input->post('add_email'));
            $add_nock = mysql_real_escape_string($this->input->post('add_nock'));
            $add_unmsn = mysql_real_escape_string($this->input->post('add_unmsn'));
            $add_plot_info = mysql_real_escape_string($this->input->post('add_plot_info'));
            $add_remark = mysql_real_escape_string($this->input->post('add_remark'));


            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads';
            $config['allowed_types'] ='gif|jpg|png';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';

            if (!$this->upload->do_upload('userfile')) :
                $error = $this->upload->display_errors();
                $data['upload_data']=$error;
                $fileName='';
            else:
                $upload_data = $this->upload->data();
                $data['upload_data']=$upload_data;
                //  print_r($upload_data);
                $fileName= $upload_data['file_name'];
            endif;


            date_default_timezone_set("Asia/Dhaka");
            $data = array(
                    'army_id' => $add_army_id,
                    'army_no' => $add_army_no,
                    'rank' => $add_rank,
                    'name_of_army_pers' => $add_name,
                    'course' => $add_course,
                    'commision_dt' => $add_cm_date,
                    'contact_no' => $add_contact_no,
                    'docus_recvd' => $add_doc_rec,
                    'Required_Amount' => $add_req_am,
                    'amnt_recvd' => $add_am_rec,
                    'amount_due' => $add_am_due,
                    'interest' => $add_interest,
                    'group_no' => $add_group_no,
                    'email' => $add_email,
                    'name_of_NOK' => $add_nock,
                    'unmsn' => $add_unmsn,
                    'plotinfo' => $add_plot_info,
                    'remarks' => $add_remark,
                    'file_name'=>$fileName

            );

            $table_name='successfull_officers';
            $insert_result = $this->common_model->insertData($table_name, $data);
            if($insert_result):
                $this->session->set_userdata('login_msg', 'Added Successfull');
            else:
                $this->session->set_userdata('login_msg', 'Added Fail');
            endif;
            redirect('add_success_officer');
        else:
            redirect('home');
        endif;
    }


    public function editOfficer() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Corporate Profile';
            $data['active_sub_menu'] = 'Success Officer';
            $id = $this->uri->segment(3);

            $res= $this->db->query("select * from successfull_officers where id=$id");
            $data['get_success_officer_data'] = $res->result();

            $this->load->view('common/header',$data);
            $this->load->view('edit_success_officer/edit_success_officer',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('edit_success_officer/js_edit_success_officer',$data);

        else:
            redirect('home');
        endif;
    }


    public function editOfficerData() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');

            $id = mysql_real_escape_string($this->input->post('id'));

            $add_army_id = mysql_real_escape_string($this->input->post('add_army_id'));
            $add_army_no = mysql_real_escape_string($this->input->post('add_army_no'));
            $add_rank = mysql_real_escape_string($this->input->post('add_rank'));
            $add_name = mysql_real_escape_string($this->input->post('add_name'));
            $add_course = mysql_real_escape_string($this->input->post('add_course'));
            $add_cm_date = mysql_real_escape_string($this->input->post('add_cm_date'));
            $add_contact_no = mysql_real_escape_string($this->input->post('add_contact_no'));
            $add_doc_rec = mysql_real_escape_string($this->input->post('add_doc_rec'));
            $add_req_am = mysql_real_escape_string($this->input->post('add_req_am'));
            $add_am_rec = mysql_real_escape_string($this->input->post('add_am_rec'));
            $add_am_due = mysql_real_escape_string($this->input->post('add_am_due'));
            $add_interest = mysql_real_escape_string($this->input->post('add_interest'));
            $add_group_no = mysql_real_escape_string($this->input->post('add_group_no'));
            $add_email = mysql_real_escape_string($this->input->post('add_email'));
            $add_nock = mysql_real_escape_string($this->input->post('add_nock'));
            $add_unmsn = mysql_real_escape_string($this->input->post('add_unmsn'));
            $add_plot_info = mysql_real_escape_string($this->input->post('add_plot_info'));
            $add_remark = mysql_real_escape_string($this->input->post('add_remark'));
            date_default_timezone_set("Asia/Dhaka");

            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads';
            $config['allowed_types'] ='gif|jpg|png';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';

            if (!$this->upload->do_upload('userfile')) :
                $error = $this->upload->display_errors();
                $data['upload_data']=$error;
                $fileName='';
                $data = array(
                        'army_id' => $add_army_id,
                        'army_no' => $add_army_no,
                        'rank' => $add_rank,
                        'name_of_army_pers' => $add_name,
                        'course' => $add_course,
                        'commision_dt' => $add_cm_date,
                        'contact_no' => $add_contact_no,
                        'docus_recvd' => $add_doc_rec,
                        'Required_Amount' => $add_req_am,
                        'amnt_recvd' => $add_am_rec,
                        'amount_due' => $add_am_due,
                        'interest' => $add_interest,
                        'group_no' => $add_group_no,
                        'email' => $add_email,
                        'name_of_NOK' => $add_nock,
                        'unmsn' => $add_unmsn,
                        'plotinfo' => $add_plot_info,
                        'remarks' => $add_remark

                );
            else:
                $upload_data = $this->upload->data();
                $data['upload_data']=$upload_data;
                //  print_r($upload_data);
                $fileName= $upload_data['file_name'];
                $data = array(
                        'army_id' => $add_army_id,
                        'army_no' => $add_army_no,
                        'rank' => $add_rank,
                        'name_of_army_pers' => $add_name,
                        'course' => $add_course,
                        'commision_dt' => $add_cm_date,
                        'contact_no' => $add_contact_no,
                        'docus_recvd' => $add_doc_rec,
                        'Required_Amount' => $add_req_am,
                        'amnt_recvd' => $add_am_rec,
                        'amount_due' => $add_am_due,
                        'interest' => $add_interest,
                        'group_no' => $add_group_no,
                        'email' => $add_email,
                        'name_of_NOK' => $add_nock,
                        'unmsn' => $add_unmsn,
                        'plotinfo' => $add_plot_info,
                        'remarks' => $add_remark,
                        'file_name' => $fileName

                );
            endif;


            $table_name='successfull_officers';
            $insert_result = $this->common_model->updateData($table_name,$data,'id',$id);
            if($insert_result):
                $this->session->set_userdata('login_msg', 'Updated Successfull');
            else:
                $this->session->set_userdata('login_msg', 'Updated Fail');
            endif;
            redirect('add_success_officer');
        else:
            redirect('home');
        endif;
    }

    public function getTableData() {


        $table = 'successfull_officers';
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'army_id', 'dt' => 0),
                array('db' => 'army_no', 'dt' => 1),
                array('db' => 'rank', 'dt' => 2),
                array('db' => 'name_of_army_pers', 'dt' => 3),
//                array('db' => 'course', 'dt' => 4),
//                array('db' => 'commision_dt', 'dt' => 5),
//                array('db' => 'contact_no', 'dt' => 6),
//                array('db' => 'docus_recvd', 'dt' => 7),
//                array('db' => 'Required_Amount', 'dt' => 8),
//                array('db' => 'amnt_recvd', 'dt' => 9),
//                array('db' => 'amount_due', 'dt' => 10),
//                array('db' => 'interest', 'dt' => 11),
//                array('db' => 'group_no', 'dt' => 12),
//                array('db' => 'email', 'dt' => 13),
//                array('db' => 'name_of_NOK', 'dt' => 14),
//                array('db' => 'unmsn', 'dt' => 15),
//                array('db' => 'plotinfo', 'dt' => 16),
//                array('db' => 'remarks', 'dt' => 17),
//             array('db' => 'file_name', 'dt' => 18),
                array('db' => 'id', 'dt' => 4,'formatter' => function ($rowvalue, $row) {
                            return '<a  href="'. site_url("add_success_officer/editOfficer/".$rowvalue).'">
      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil">Details</i></button></a><a href="#">
         <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>';
                        })

        );

        $this->load->database();
        $sql_details = array(
                'user' => $this->db->username,
                'pass' => $this->db->password,
                'db' => $this->db->database,
                'host' => $this->db->hostname
        );
        $this->load->library('SSP');
        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );


    }

}
?>
