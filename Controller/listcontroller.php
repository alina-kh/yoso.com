<?php
namespace Controller;

defined('_Sdef') or exit();

class ListController extends ADisplayController {
    protected $page;
    public function execute($param = []) {
        $page = $param['page'];
        $this->page = $page ? $page : 1;
		return $this->display();
	}

    protected function display() {
        $items = $this->model->getItems($this->page);
        $this->title .= 'Список заявок';
        $this->keywords = 'Список заявок';
        $this->description = 'Страница списка заявок';
        $this->header = 'Список заявок';
        $this->menuList  = [ 
            0 => [
                'name' => 'Список пользователей',
                'link' => $this->app->urlFor('home')
            ],
            1 => [
                'name' => 'Создать заявку',
                'link' => $this->app->urlFor('request')
            ],
            2 => [
                'name' => 'Список заявок'
            ]
        ];

        $this->block = $this->app->view->fetch('request-list.tpl.php', [
            'items' => $items['items'],
            'navigation' => $items['navigation'],
            'app' => $this->app,
            'uri' => $this->uri
        ]);
        
        parent::display();
    }
}