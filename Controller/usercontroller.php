<?php
namespace Controller;

defined('_Sdef') or exit();

class UserController extends ADisplayController {

    protected $post;
    protected $login;

    protected function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
    
        return false;
    }

    public function show_form() {
        $users = $this->model->getUsersList();
        $user = $this->in_array_r($this->login, $users);

        return $user;
    }

    public function clear ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function display() {
        $this->title .= 'Страница пользователя';
        $this->keywords = 'Страница пользователя';
        $this->description = 'Страница пользователя';
        $this->header = 'Страница пользователя: ' . $this->login;
        $this->menuList = [
            0 => [
                'name' => 'Список пользователей',
                'link' => $this->app->urlFor('home')
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

        $post = [];
        if (!empty($_SESSION['postUser'])) {
            $post = $_SESSION['postUser'];
            unset($_SESSION['postUser']);
        }
        else {
            $post = [];
        }       

        $this->block = $this->app->view()->fetch('request-user.tpl.php', [
            'url' => '/index.php/user/' . $this->login,
            'app' => $this->app,
            'post' => $post,
            'uri' => $this->uri,
            'user' => $this->show_form()
        ]);

        parent::display();
    }

    public function execute($param = []) {
        $login = $param['login'];
        $this->login = $login;

        $post = $this->app->request->post();

        if($this->app->request->isPost() && !empty($post) && $this->show_form()) {
            $errorText = " не может быть пустым";
            $errors = [];
            $email = $post['email'];
            $phone = $post['phone'];
            $address = $this->clear($post['address']);
            $message = $this->clear($post['message']);
            $post['login'] = $this->login;
                    
            if ($email == '') {
                $errors[] = "Email" . $errorText;
            }
        
            if ($phone == '') {
                $errors[] = "Телефон" . $errorText;
            }

            if ($address == '' ) {
                $errors[] = "Адрес" . $errorText;
            }
        
            if ($message == '' ) {
                $errors[] = "Текст заявки"  . $errorText;
            }
        
            if (!empty($errors)) {
                $_SESSION['postUser'] = $post;
                $this->app->flash('error', '<div class="alert warning"><p class="alert__text">' . array_shift($errors) . '</p></div>');
                $this->app->redirect($this->login);
            }

            $result = $this->model->save($post); 
            if ($result !== true) {
                $_SESSION['postUser'] = $post;
                $this->app->flash('error', '<div class="alert warning"><p class="alert__text">При сохранении данных произошла ошибка</p></div>');
                $this->app->redirect($this->login);
            }

            $this->app->flash('msg', '<div class="alert primary"><p class="alert__text">Заявка успешно создана</p></div>');
            $this->app->redirect($this->login);
        }

		return $this->display();
	}
}