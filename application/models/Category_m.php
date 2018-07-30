<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {

    function insert($options = array()) {
        $this->db->insert('categories', $options);
    }
    function truncate()
    {
        $this->db->truncate('categories');
    }
    function get()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }
}
