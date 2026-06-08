<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data['users'] = $this->Users_model->read();
        $this->load->view('users/user_list', $data);
    }

    public function add()
    {
        if($this->input->post('submit')) {
            $this->Users_model->create();
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg','<p style="color:green"> User successfully added !</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red"> User added failed !</p>');
            }
            redirect('users');
        }
        $this->load->view('users/user_form');
    }

    public function edit($userid)
    {
        if($this->input->post('submit')) {
            $this->Users_model->update($userid);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg','<p style="color:green"> User successfully updated !</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red">User updated failed !</p>');
            }
            redirect('Users');
        }
        $data['user']=$this->Users_model->read_by($userid); 
        $this->load->view('users/user_form',$data);     
    }
    
    public function delete($userid)
    {
        $this->Users_model->delete($userid);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg','<p style="color:green"> Users successfully deleted !</p>');
        } else {
            $this->session->set_flashdata('msg','<p style="color:red">Users deleted failed !</p>');
        }
        redirect('Users');
    }
    public function profile()
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('users', ['username' => $username])->row();
        $this->load->view('users/profile', $data);
    }

}