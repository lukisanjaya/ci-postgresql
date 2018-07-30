<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_tag_m extends CI_Model {

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
    function getArticleTag($slug, $limit = 10, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        $this->db->where("tag_slug", $slug);
        $this->db->select($this->select);
        $query = $this->db->get('view_article_tag');
        $data['results'] = $query->result();

        $this->db->select('count(id) as total_results');
        $this->db->where("tag_slug", $slug);
        $q = $this->db->get('view_article_tag');
        $row = $q->row();
        $data['total_results'] = $row->total_results;
        return $data;
    }
}
