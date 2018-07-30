<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_category_m extends CI_Model {

    var $select = 'id, slug, title, desciption, content, thumbnail, status, published, url_name, url';
    // var $select = '`id`, `slug`, `title`, `desciption`, `content`, `thumbnail`, `status`, `published`, `url_name`, `url`';

    function insert($options = array()) {
        $this->db->insert('article_category', $options);
    }
    function truncate()
    {
        $this->db->truncate('article_category');
    }
    function get()
    {
        $query = $this->db->get('article_category');
        return $query->result();
    }
    function getArticleCategory($slug, $limit = 10, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        $this->db->where("category_slug", $slug);
        $this->db->select($this->select);
        $query = $this->db->get('view_article_category');
        $data['results'] = $query->result();

        $this->db->select('count(id) as total_results');
        $this->db->where("category_slug", $slug);
        $q = $this->db->get('view_article_category');
        $row = $q->row();
        $data['total_results'] = $row->total_results;
        return $data;
    }
}
