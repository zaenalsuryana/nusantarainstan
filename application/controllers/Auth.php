<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function login()
    {
        if($this->input->post('login') && $this->validation('login'))  {
            $login=$this->Auth_model->getuser($this->input->post('username'));
            if($login != NULL) {
                if(password_verify($this->input->post('password'), $login->password)) {
                    $data = array (
                        'username' => $login->username,
                        'usertype' => $login->usertype,
                        'fullname' => $login->fullname,
                        'photo' => $login->photo,

                        
                    );
                    $this->session->set_userdata($data);
                    redirect('welcome');
                }  
            } 
            $this->session->set_flashdata('msg','<p style="color:red"> Invalid Username or Password</p>');
        }
        $this->load->view('auth/form_login');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function changepass()
    {
        if(! $this->session->userdata('username')) redirect('auth/login');
        if($this->input->post('change') && $this->validation('change')) {
            $change=$this->Auth_model->getuser($this->session->userdata('username'));
            if(password_verify($this->input->post('oldpassword'), $change->password)) {
                if($this->Auth_model->changepass())
                    $this->session->set_flashdata ('msg', '<p style="color:green">Password successfuly changed !</p>');
                else
                $this->session->set_flashdata ('msg', '<p style="color:red">Change password failed ! !</p>');
            } else {
                $this->session->set_flashdata ('msg', '<p style="color:red">Wrong old password !</p>');
            }
        }
        $this->load->view('auth/change_password');
    }

    public function validation($type)
    {
        $this->load->library('form_validation');

        if($type=='login') {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        } else {
        $this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
        $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        }

        if($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }


    public function resetpass($username){
        $this->load->model('Auth_model');
        $user = $this->Auth_model->getuser($username);
    
        if($user){
            $newpass = '123456'; // password default baru
            $hashed = password_hash($newpass, PASSWORD_DEFAULT);
        
            if($this->Auth_model->resetpassword($username, $hashed)){
                $this->session->set_flashdata('msg', '<p style="color:green;">Password reset successfully to "' . $newpass . '"</p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="color:red;">Password reset failed</p>');
            }
        } else {
            $this->session->set_flashdata('msg', '<p style="color:red;">User not found</p>');
        }
    
        redirect('Users');
    }


    public function changephoto()
    {
        if (!$this->session->userdata('username')) redirect('auth/login');
    
        $data['error'] = "";
        if ($this->input->post('upload')) {
            if ($this->upload()) {
          
                $filename = $this->upload->data('file_name');
                $this->Auth_model->changephoto($filename);
                $this->session->set_userdata('photo', $filename);
                $this->session->set_flashdata('msg', '<p style="color:green">Photo Successfully Changed!</p>');
            } else {
          
                $data['error'] = $this->upload->display_errors();
            }
        }
    
        $this->load->view('auth/form_photo', $data);
    }

    public function register(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'No. Telepon', 'required|numeric');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
            return;
        }

        if ($this->input->post('register')) {
            $data = [
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                'phone'    => $this->input->post('phone'),
                'address'  => $this->input->post('address'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'usertype' => 'Customer'
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('msg', 'Registrasi berhasil! Silakan login.');
            redirect('auth/login');
        }
        $this->load->view('auth/register');
    }
    
    public function upload() 
    {
        $config['upload_path']   = './uploads/users/';
        $config['allowed_types'] = '*';
        $config['max_size']      = 2000;
        $config['max_width']     = 2000;
        $config['max_height']    = 2000;
    
        $this->load->library('upload', $config);
        return $this->upload->do_upload('photo');
    }

}

