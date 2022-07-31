<?php

class Category_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_categories() {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function set_category() {

        $data = array(
            'name' => $this->input->post('name')
        );

        return $this->db->insert('category', $data);

    }
}