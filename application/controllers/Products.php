<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->model('Categories_model');
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = site_url('products/index');
        $config['total_rows'] = $this->db->count_all('products');
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

        $data['i'] = $start + 1;
        $data['products'] = $this->Products_model->read($limit, $start);
        $this->load->view('products/product_list', $data);
    }


    public function add()
    {
        if ($this->input->post('submit')) {
            $photo = null;
            if (!empty($_FILES['photo']['name'])) {
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $upload_data = $this->upload->data();
                    $photo = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('msg', $this->upload->display_errors());
                    redirect(current_url());
                    return;
                }
            }

            $this->Products_model->create($photo);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<p style="color:green">Product successfully added!</p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="color:red">Product add failed!</p>');
            }
            redirect('products');
        }
        $data['categories'] = $this->Categories_model->read();
        $this->load->view('products/product_form', $data);
    }

    public function edit($id){
        if ($this->input->post('submit')) {
            $photo = null;
            if (!empty($_FILES['photo']['name'])) {
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $upload_data = $this->upload->data();
                    $photo = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('msg', $this->upload->display_errors());
                    redirect(current_url());
                    return;
                }
            }

            $this->Products_model->update($id, $photo);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<p style="color:green">Product successfully updated!</p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="color:red">Product update failed!</p>');
            }
            redirect('products');
        }
        $data['product'] = $this->Products_model->read_by($id);
        $data['categories'] = $this->Categories_model->read();
        $this->load->view('products/product_form', $data);
    }


    public function delete($id)
    {
        $this->Products_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<p style="color:green">Product successfully deleted!</p>');
        } else {
            $this->session->set_flashdata('msg', '<p style="color:red">Product delete failed!</p>');
        }
        redirect('products');
    }

    public function sale($id)
    {
        if ($this->input->post('submit')) {
            $this->Products_model->sold($id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<p style="color:green">Product successfully sold!</p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="color:red">Product sale failed!</p>');
            }
            redirect('products');
        }
        $data['product'] = $this->Products_model->read_by($id);
        $this->load->view('products/product_sale', $data);
    }

    public function sales()
    {
        if ($this->session->userdata('usertype') != 'Manager') redirect('welcome');
        $data['sales'] = $this->Products_model->sales();
        $this->load->view('products/sale_list', $data);
    }
    
    public function read($id)
    {
        $data['product'] = $this->Products_model->read_by($id);
        $this->load->view('products/product_read', $data);
}
}