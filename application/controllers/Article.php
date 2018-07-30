<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH . "libraries/REST_Controller.php";

class Article extends REST_Controller {

    var $limit = 10;

    function __construct()
    {
        parent::__construct();
          // load any required models
        $this->load->model('article_m');
        $this->load->model('article_tag_m');
        $this->load->model('article_category_m');
        $this->load->model('category_m');
        $this->load->model('source_m');
        $this->load->model('tag_m');
    }
     
     function index_get()
     {
        $this->benchmark->mark('code_start');

        if (!empty($_GET['page']) && $_GET['page'] < 1) {
            $this->response(array('error' => 'data could not be found'), 404);
        }
        $this->limit = !empty($_GET['limit']) ? $_GET['limit'] : $this->limit;
        $offset   = !empty($_GET['page']) ? ($_GET['page'] - 1) * $this->limit : 0;
        $page     = !empty($_GET['page']) ? $_GET['page'] : 1;
        $articles = $this->article_m->get($this->limit, $offset);

        foreach ($articles['results'] as $key => $value) {
            $data['results'][$key] = $value;
            $data['results'][$key]->status = $value->status ? true : false;
            $data['results'][$key]->tags = $this->article_m->getByTag($value->id);
            $data['results'][$key]->categories = $this->article_m->getByCategory($value->id);
        }

        $data['meta']          = [
            "total"        => $articles['total_results'],
            "per_page"     => count($articles['results']),
            "current_page" => $page,
            "last_page"    => ceil($articles['total_results']/$this->limit),
            "from"         => $offset + 1,
            "to"           => $page * count($articles['results']),
        ];

        $this->benchmark->mark('code_end');
        $data['diagnostic']['elapsetime'] = $this->benchmark->elapsed_time('code_start', 'code_end');

        if(!empty($data['results'])) {
            $this->response($data, 200);
        } else {
            $this->response(array('error' => 'data could not be found'), 404);
        }
     }

     function read_get()
     {
        $this->benchmark->mark('code_start');
        $url = $this->uri->segment(2);
        if (empty($url)) {
            $this->response(array('error' => 'data could not be found'), 404);
        }
 
        $articles = $this->article_m->where($url);
        $data['results'] = $articles['results'];
        $data['results']->status = $data['results']->status ? true : false;
        $data['results']->tags = $this->article_m->getByTag($data['results']->id);
        $data['results']->categories = $this->article_m->getByCategory($data['results']->id);

        $this->benchmark->mark('code_end');
        $data['diagnostic']['elapsetime'] = $this->benchmark->elapsed_time('code_start', 'code_end');

        if(!empty($data['results'])) {
            $this->response($data, 200);
        } else {
            $this->response(array('error' => 'data could not be found'), 404);
        }
     }

     function tag_get()
     {
        $this->benchmark->mark('code_start');

        if ((!empty($_GET['page']) && $_GET['page'] < 1) || empty($this->uri->segment(2))) {
            $this->response(array('error' => 'data could not be found'), 404);
        }
        $this->limit = !empty($_GET['limit']) ? $_GET['limit'] : $this->limit;
        $offset   = !empty($_GET['page']) ? ($_GET['page'] - 1) * $this->limit : 0;
        $page     = !empty($_GET['page']) ? $_GET['page'] : 1;
        $articles = $this->article_tag_m->getArticleTag($this->uri->segment(2), $this->limit, $offset);
        foreach ($articles['results'] as $key => $value) {
            $data['results'][$key] = $value;
            $data['results'][$key]->status = $value->status ? true : false;
            $data['results'][$key]->tags = $this->article_m->getByTag($value->id);
            $data['results'][$key]->categories = $this->article_m->getByCategory($value->id);
        }

        $data['meta']          = [
            "total"        => $articles['total_results'],
            "per_page"     => count($articles['results']),
            "current_page" => $page,
            "last_page"    => ceil($articles['total_results']/$this->limit),
            "from"         => $offset + 1,
            "to"           => $page * count($articles['results']),
        ];

        $this->benchmark->mark('code_end');
        $data['diagnostic']['elapsetime'] = $this->benchmark->elapsed_time('code_start', 'code_end');

        if(!empty($data['results'])) {
            $this->response($data, 200);
        } else {
            $this->response(array('error' => 'data could not be found'), 404);
        }
     }

     function category_get()
     {
        $this->benchmark->mark('code_start');

        if ((!empty($_GET['page']) && $_GET['page'] < 1) || empty($this->uri->segment(2))) {
            $this->response(array('error' => 'data could not be found'), 404);
        }
        $this->limit = !empty($_GET['limit']) ? $_GET['limit'] : $this->limit;
        $offset   = !empty($_GET['page']) ? ($_GET['page'] - 1) * $this->limit : 0;
        $page     = !empty($_GET['page']) ? $_GET['page'] : 1;
        $articles = $this->article_category_m->getArticleCategory($this->uri->segment(2), $this->limit, $offset);
        foreach ($articles['results'] as $key => $value) {
            $data['results'][$key] = $value;
            $data['results'][$key]->status = $value->status ? true : false;
            $data['results'][$key]->tags = $this->article_m->getByTag($value->id);
            $data['results'][$key]->categories = $this->article_m->getByCategory($value->id);
        }

        $data['meta']          = [
            "total"        => $articles['total_results'],
            "per_page"     => count($articles['results']),
            "current_page" => $page,
            "last_page"    => ceil($articles['total_results']/$this->limit),
            "from"         => $offset + 1,
            "to"           => $page * count($articles['results']),
        ];

        $this->benchmark->mark('code_end');
        $data['diagnostic']['elapsetime'] = $this->benchmark->elapsed_time('code_start', 'code_end');

        if(!empty($data['results'])) {
            $this->response($data, 200);
        } else {
            $this->response(array('error' => 'data could not be found'), 404);
        }
     }

     function source_get()
     {
        $this->benchmark->mark('code_start');

        if ((!empty($_GET['page']) && $_GET['page'] < 1) || empty($this->uri->segment(2))) {
            $this->response(array('error' => 'data could not be found'), 404);
        }
        $this->limit = !empty($_GET['limit']) ? $_GET['limit'] : $this->limit;
        $offset   = !empty($_GET['page']) ? ($_GET['page'] - 1) * $this->limit : 0;
        $page     = !empty($_GET['page']) ? $_GET['page'] : 1;
        $articles = $this->source_m->getArticleSource($this->uri->segment(2), $this->limit, $offset);
        foreach ($articles['results'] as $key => $value) {
            $data['results'][$key] = $value;
            $data['results'][$key]->status = $value->status ? true : false;
            $data['results'][$key]->tags = $this->article_m->getByTag($value->id);
            $data['results'][$key]->categories = $this->article_m->getByCategory($value->id);
        }

        $data['meta']          = [
            "total"        => $articles['total_results'],
            "per_page"     => count($articles['results']),
            "current_page" => $page,
            "last_page"    => ceil($articles['total_results']/$this->limit),
            "from"         => $offset + 1,
            "to"           => $page * count($articles['results']),
        ];

        $this->benchmark->mark('code_end');
        $data['diagnostic']['elapsetime'] = $this->benchmark->elapsed_time('code_start', 'code_end');

        if(!empty($data['results'])) {
            $this->response($data, 200);
        } else {
            $this->response(array('error' => 'data could not be found'), 404);
        }
     }
}
