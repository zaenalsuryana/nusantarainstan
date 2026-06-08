<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

   public function create($photo = null)
    {
        $data = array(
            'name'        => $this->input->post('name'),
            'type'        => $this->input->post('type'),
            'stock'       => $this->input->post('stock'),
            'price'       => $this->input->post('price'),
            'description' => $this->input->post('description')
        );
        if ($photo) {
            $data['photo'] = $photo;
        }
        $this->db->insert('products', $data);
    }
    
        public function read($limit, $start)
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get('products');
            return $query->result();
        }

    public function read_by($id)
    {
        $this->db->where('id_product', $id);
        $query = $this->db->get('products');
        return $query->row();
    }

    public function update($id, $photo = null)
    {
        $data = array(
            'name'        => $this->input->post('name'),
            'type'        => $this->input->post('type'),
            'stock'       => $this->input->post('stock'),
            'price'       => $this->input->post('price'),
            'description' => $this->input->post('description')
        );
        if ($photo) {
            $data['photo'] = $photo;
        }
        $this->db->where('id_product', $id);
        $this->db->update('products', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_product', $id);
        $this->db->delete('products');
    }

    public function validation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Product name', 'required');
        $this->form_validation->set_rules('type', 'Product type', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        return $this->form_validation->run();
    }
    
    public function sold($id)
    {
        $data = array (
            'customer_name' => $this->input->post('customer_name'),
            'customer_address' => $this->input->post('customer_address'),
            'customer_phone' => $this->input->post('customer_phone'),
            'product_id' => $id
        ); 
        $this->db->insert('productsales', $data);

        $this->db->set('sold', '1');
        $this->db->where('id_product', $id);
        $this->db->update('products');
    }

    public function sales()
    {
        $query = $this->db->get('productsales');
        return $query->result();
    }
}