<?php 
    class Pages extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('category_model');
            $this->load->model('product_model');
        }

        public function view($page = 'home') {
        
           //$data['products'] = $this->product_model->get_products();

           $data['categories'] = $this->category_model->get_categories();

            $data['title'] = ucfirst($page); //Делает первую букву заглавной

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page);
            $this->load->view('pages/categories', $data);
            //$this->load->view('pages/products_list', $data);
            $this->load->view('templates/footer', $data);
        }

        
        public function success() {

            $data['title'] = "Success!";

            $this->load->view('templates/header', $data);
            $this->load->view('pages/success');
            $this->load->view('templates/footer', $data);
        }


        public function getChosenCategory() {
            if ($this->input->is_ajax_request()) { // just additional, to make sure request is from ajax
                    $category = $this->input->post('category');

                    if ($category == 0) {
                        $data['products'] = $this->product_model->get_products();
                    } else {
                        $data['products'] = $this->product_model->get_products($category);
                    }

                    $this->load->view('pages/products_list', $data);

            } 
        }

        public function create_category() {

            $this->load->helper('form'); //Загрузка хелпера форм
            $this->load->library('form_validation'); //Библиотека валидации форм

            $data['title'] = "Add new category";

            $this->form_validation->set_rules('name', 'Name field required!', 'required');

                //Условие на проверку валидации
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('pages/create_category');
                $this->load->view('templates/footer');

            }
            else {
                $this->category_model->set_category();
                $this->load->view('success');
            }

        }
        
        public function create_product() {

            $this->load->helper('form'); //Загрузка хелпера форм
            $this->load->library('form_validation'); //Библиотека валидации форм

            $data['title'] = "Add new product";
            $data['categories'] = $this->category_model->get_categories();

            $this->form_validation->set_rules('name', 'Name field required!', 'required');
            $this->form_validation->set_rules('count', 'Count field required!', 'required');
            //$this->form_validation->set_rules('category_selected', 'Category field required!', 'required');

                //Условие на проверку валидации
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('pages/create_product', $data);
                $this->load->view('templates/footer');

            }
            else {
                $this->product_model->set_product();
                $this->load->view('success');
            }
        }

        public function delete_product() {
            
            if ($this->input->is_ajax_request()) { // just additional, to make sure request is from ajax
                    
                    $id = $this->input->post('id');
                    $this->product_model->delete_product($id);
            } 
        }



    }