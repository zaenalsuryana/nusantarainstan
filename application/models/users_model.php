<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function create ()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'usertype' => $this->input->post('usertype'),
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'phone'    => $this->input->post('phone'),      
            'address'  => $this->input->post('address'), 
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );
        $this->db->insert('users', $data);
    }

    public function read()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function read_by($userid)
    {
        $this->db->where('userid', $userid);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update($userid)
    {
        $data = array(
            'username' => $this->input->post('username'),
            'usertype' => $this->input->post('usertype'),
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'phone'    => $this->input->post('phone'),    
            'address'  => $this->input->post('address')
        );
        $this->db->where('userid', $userid);
        return $this->db->update('users', $data);
    }
    
    public function delete($userid)
    {
        $this->db->where('userid', $userid);
        return $this->db->delete('users');
    }
}