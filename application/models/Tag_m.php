<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_m extends CI_Model {

    function insert($options = array()) {
        $this->db->insert('tags', $options);
    }
    function truncate()
    {
        $this->db->truncate('tags');
    }
    function get()
    {
        $query = $this->db->get('tags');
        return $query->result();
    }
}
