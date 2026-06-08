<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public function create()
    {
        $data = array(
            'cate_name' => $this->input->post('cate_name'),
            'description' => $this->input->post('description')
        );
        return $this->db->insert('categories', $data);
    }

    public function read()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function read_by($id)
    {
        $this->db->where('id_cate', $id);
        $query = $this->db->get('categories');
        return $query->row();
    }

    public function update($id)
    {
        $data = array(
            'cate_name' => $this->input->post('cate_name'),
            'description' => $this->input->post('description')
        );
        $this->db->where('id_cate', $id);
        return $this->db->update('categories', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_cate', $id);
        return $this->db->delete('categories');
    }
}
