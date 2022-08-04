<?php 
    class Pages extends CI_Controller {

        //Конструктор загружает модели для дальнейшего взаимодействия с таблицами базы данных
        public function __construct() {
            parent::__construct();
            $this->load->model('category_model'); //Модель категорий. Таблица category
            $this->load->model('product_model'); //Модель списка продуктов. Таблица product_list
        }

        public function view($page = 'home') {
    
           $data['categories'] = $this->category_model->get_categories();

            $data['title'] = ucfirst($page); //Делает первую букву заглавной

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page);
            $this->load->view('pages/categories', $data);
            $this->load->view('templates/footer', $data);
        }

        //Функия отвечает за фильтрацию элементов списка. Получает данные из считывателя событий, с помощью ajax запроса.
        //Полученные данные передаються в модель. 
        public function get_products_by_chosen_filter() {
            if ($this->input->is_ajax_request()) { 
                    $status = $this->input->post('status');
                    $category = $this->input->post('category');

                    $data['products'] = $this->product_model->get_products_by_status($status, $category);

                    $this->load->view('pages/products_list', $data);

            } 
        }

        //Функция создания категории. Выполняет валидацию форм, в случае успешной проверки, вызывается функция модели. 
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
                $this->load->view('templates/header', $data);
                $this->load->view('pages/success');
                $this->load->view('templates/footer', $data);
            }

        }
        
        //Функция создания элемента списка. Выполняет валидацию формы, в случае успеха, вызывает функцию модели.
        public function create_product() {

            $this->load->helper('form'); //Загрузка хелпера форм
            $this->load->library('form_validation'); //Библиотека валидации форм

            $data['title'] = "Add new product";
            $data['categories'] = $this->category_model->get_categories();

            $this->form_validation->set_rules('name', 'Name field required!', 'required');
            $this->form_validation->set_rules('count', 'Count field required!', 'required');

                //Условие на проверку валидации
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('pages/create_product', $data);
                $this->load->view('templates/footer');

            }
            else {
                $this->product_model->set_product();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/success');
                $this->load->view('templates/footer', $data);
            }
        }

        // Функция удаления элемента списка, принимает данные от ajax запроса, и передает их в модель данных.
        public function delete_product() {
            
            if ($this->input->is_ajax_request()) {
                    $id = $this->input->post('id');
                    $this->product_model->delete_product($id);
            } 
        }

        // Функция изменения статуса элемента списка. Принимает данные от ajax запроса. 
        public function change_status() {
            if ($this->input->is_ajax_request()) {  
                $id = $this->input->post('id');
                $status = $this->input->post('status');
                $this->product_model->change_status($id, $status);
            } 
        }
    }