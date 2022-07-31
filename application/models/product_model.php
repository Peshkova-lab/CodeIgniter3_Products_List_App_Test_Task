<?php

class Product_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_products() {
        $query = $this->db->get('product_list');
        return $query->result_array();
    }

    public function get_products_by_status($status = '', $category = 0) {
        if ($status === '' && $category === '0') {
            $query = $this->db->get('product_list');
            return $query->result_array();
        } 

        if ($status !== '') {
            $this->db->where('status', $status);
        } 
        if ($category !== '0') {
            $this->db->where('categoryId', $category);
        }
        
        $query = $this->db->get('product_list');
        return $query->result_array();
    }

    public function set_product() {
    
        $this->load->helper('url'); 

        $create_date = date("Y-m-d");

        $product = $this->input->post();
        $data = array(
            //Метод пост из библиотеки вводы, этот метод отчищает данные, защищая от атак. Библиотека ввода загружается автоматически.
            'name' => $product['name'],
            'categoryId' => $product['select_category'],
            'status' => "not bought",
            'date' => $create_date,
            'count' => $product['count']
        );
    
        //Вставка массива с данными в таблицу
        return $this->db->insert('product_list', $data);
    }

    public function delete_product($id) {
        $this->db->where('id', $id);
        $this->db->delete('product_list');
    }
}