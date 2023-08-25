<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel', "Products");
    }

    public function index(){
        $data['list'] = $this->Products->getAll();

        $this->load->view('header');
		$this->load->view('product/list', $data);
		$this->load->view('footer');
    }

    public function Add()
    {
        $this->load->view('header');
		$this->load->view('product/add');
		$this->load->view('footer');
    }

    public function Save()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'quantity' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
        );

        $result = $this->Products->addNew($data);

        if ($result["status"] == "success") {
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-5" role="alert">Data Added Successfuly</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-5" role="alert">'. $result['message'] .'</div>');
        }

        redirect('ProductController/Add');
    }

    public function Remove()
    {
        $id = $this->uri->segment(3);
        
        $result = $this->Products->delete($id);

        if ($result["status"] == "success") {
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-5" role="alert">Data Deleted Successfuly</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-5" role="alert">'. $result['message'] .'</div>');
        }

        redirect('ProductController');
    }

    public function Edit_page()
    {
        $id = $this->uri->segment(3);

        $data["product"] = $this->Products->loadById($id); 
        
        $this->load->view('header');
		$this->load->view('product/edit', $data);
		$this->load->view('footer');
    }

    public function Edit()
    {
        $data = array(
            'id' => $this->uri->segment(3),
            'name' => $this->input->post('name'),
            'quantity' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
        );

        $result = $this->Products->update($data);

        if ($result["status"] == "success") {
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-5" role="alert">Data Updated Successfuly</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-5" role="alert">'. $result['message'] .'</div>');
        }

        redirect('ProductController');
    }
}
?>