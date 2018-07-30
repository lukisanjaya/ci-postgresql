<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_m extends CI_Model {

    var $select = 'id, slug, title, desciption, content, thumbnail, status, published, url_name, url';
    // var $select = '`id`, `slug`, `title`, `desciption`, `content`, `thumbnail`, `status`, `published`, `url_name`, `url`';

    function insert($options = array()) {
        $this->db->insert('articles', $options);
    }
    function truncate()
    {
        $this->db->truncate('articles');
    }
    function get($limit = 10, $offset = 0)
    {
        $this->db->select($this->select);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('view_article_source');
        $data['results'] = $query->result();

        $this->db->select('count(id) as total_results');
        $q = $this->db->get('view_article_source');
        $row = $q->row();
        $data['total_results'] = $row->total_results;
        return $data;
    }
    function where($slug)
    {
        $this->db->select($this->select);
        $this->db->where("slug", $slug);
        $query = $this->db->get('view_article_source');
        $data['results'] = $query->row();
        return $data;
    }
    function getByTag($id){
        $this->db->where('article_id', $id);
        $this->db->select('name, slug');
        $res=$this->db->get('view_tag');
        return $res->result();
    }
    function getByCategory($id){
        $this->db->where('article_id', $id);
        $this->db->select('name, slug');
        $res=$this->db->get('view_category');
        return $res->result();
    }
}
