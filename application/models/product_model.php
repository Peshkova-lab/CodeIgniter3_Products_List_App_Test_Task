<?php

class Product_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    // Загрузка всех элементов списка из таблицы. Возвращает массив данных.
    public function get_products() {
        $query = $this->db->get('product_list');
        return $query->result_array();
    }

    // Функция фильтрации данных. Получает значение статуса и категории, выполняет проверку м возвращает данные в зависимости от фильтров.
    // При значениях фильтров по умолчанию, выполняется стандартная выборка без условий.
    // Возвращает массив данных.
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

    // Создание нового элемента списка продуктов.
    public function set_product() {
    
        $this->load->helper('url'); 

        $create_date = date("Y-m-d"); // Получение текущей даты в заданом формате.

        $product = $this->input->post();
        $data = array(
            //Метод пост из библиотеки ввода, этот метод отчищает данные, защищая от атак. Библиотека ввода загружается автоматически.
            'name' => $product['name'],
            'categoryId' => $product['select_category'],
            'status' => "not bought",
            'date' => $create_date,
            'count' => $product['count']
        );
    
        //Вставка массива с данными в таблицу
        return $this->db->insert('product_list', $data);
    }

    // Удаление выбранного элемента по полученному айди.
    public function delete_product($id) {
        $this->db->where('id', $id);
        $this->db->delete('product_list');
    }

    // Обновление статуса элемента списка по айди, в зависимости от значения логической переменной статус.
    public function change_status($id, $status) {
        if ($status == 'true') {
            $this->db->set('status', 'bought');
        } else {
            $this->db->set('status', 'not bought');
        }

        $this->db->where('id', $id);
        $this->db->update('product_list');

     }
}