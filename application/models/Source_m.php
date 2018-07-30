<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Source_m extends CI_Model {

    var $select = 'id, slug, title, desciption, content, thumbnail, status, published, url_name, url';
    // var $select = '`id`, `slug`, `title`, `desciption`, `content`, `thumbnail`, `status`, `published`, `url_name`, `url`';

    function insert($options = array()) {
        $this->db->insert('article_tag', $options);
    }
    function truncate()
    {
        $this->db->truncate('article_tag');
    }
    function get()
    {
        $query = $this->db->get('article_tag');
        return $query->result();
    }
    function getArticleSource($source, $limit = 10, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        $this->db->where("url", $source);
        $this->db->select($this->select);
        $query = $this->db->get('view_article_source');
        $data['results'] = $query->result();

        $this->db->select('count(id) as total_results');
        $this->db->where("url", $source);
        $q = $this->db->get('view_article_source');
        $row = $q->row();
        $data['total_results'] = $row->total_results;
        return $data;
    }
}
