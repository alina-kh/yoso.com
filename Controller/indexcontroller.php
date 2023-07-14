<?php
namespace Controller;

defined('_Sdef') or exit();

class IndexController extends ADisplayController {
    public function execute($param = []) {
		return $this->display();
	}

    protected function getUsers() {
        $users = $this->model->getUsersList();
        return $this->app->view->fetch('user.tpl.php', [
            'users'=>$users,
            'app'=>$this->app,
            'url'=>$this->app->urlFor('home')
        ]);
    }

    protected function display() {
        $users = $this->getUsers();
        $this->block = $users;
        $this->title .= 'Список пользователей';
        $this->keywords = 'Главная';
        $this->description = 'Главная страница';
        $this->header = 'Список пользователей';
        $this->menuList = [
            0 => [
                'name' => 'Список пользователей',
            ],
            1 => [
                'name' => 'Создать заявку',
                'link' => $this->app->urlFor('request')
            ],
            2 => [
                'name' => 'Список заявок',
                'link' => $this->app->urlFor('request-list')
            ]
        ];
        parent::display();
    }
}