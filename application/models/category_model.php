<?php

class Category_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Запрос на получение всех категорий в таблице 
    public function get_categories() {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    // Создание новой категории
    public function set_category() {

        $data = array(
            'name' => $this->input->post('name')
        );

        return $this->db->insert('category', $data);
    }
}