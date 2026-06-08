<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(! $this->session->userdata('username')) redirect('auth/login');
        $this->load->model('Categories_model');
    }

	public function index()
	{
        $data['categories']=$this->Categories_model->read();
		$this->load->view('categories/categories_list',$data);
        
	}
    
        public function add()
        {
            if($this->input->post('submit')) {
                $this->Categories_model->create();
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg','<p style="color:green"> Categories successfully added !</p>');
                } else {
                    $this->session->set_flashdata('msg','<p style="color:red">Categories added failed !</p>');
                }
                redirect('categories');
            }
            $this->load->view('categories/categories_form');
        }

    public function edit($id)
    {
        if($this->input->post('submit')) {
            $this->Categories_model->update($id);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg','<p style="color:green"> Categories successfully updated !</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red">Categories updated failed !</p>');
            }
            redirect('categories');
        }
        $data['categories']=$this->Categories_model->read_by($id); 
        $this->load->view('categories/categories_form',$data);     
    }
    
    public function delete($id)
    {
        $this->Categories_model->delete($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg','<p style="color:green"> Categories successfully deleted !</p>');
        } else {
            $this->session->set_flashdata('msg','<p style="color:red">Categories deleted failed !</p>');
        }
        redirect('categories');
    }
}