<?php
namespace Controller;

defined('_Sdef') or exit();

class RequestController extends ADisplayController {

    protected $post;

    protected function display() {
        $this->title .= 'Создать заявку';
        $this->keywords = 'Создать заявку';
        $this->description = 'Страница создания новой заявки';
        $this->header = 'Создать заявку';
        $this->menuList = [
            0 => [
                'name' => 'Список пользователей',
                'link' => $this->app->urlFor('home')
            ],
            1 => [
                'name' => 'Создать заявку',
            ],
            2 => [
                'name' => 'Список заявок',
                'link' => $this->app->urlFor('request-list')
            ]
        ];
        $users = $this->model->getUsersList();
        $post = [];
        if (!empty($_SESSION['post'])) {
            $post = $_SESSION['post'];
            unset($_SESSION['post']);
        }
        else {
            $post = [];
        }

        $this->block = $this->app->view()->fetch('request.tpl.php', [
            'users' => $users,
            'url' => $this->app->urlFor('request'),
            'app' => $this->app,
            'post' => $post
        ]);


        parent::display();
    }
    
    public function clear ($data) {
        $chars = ['#', '<', '<', '\\', '/'];
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace($chars, ' ', $data);
        return $data;
    }

    public function execute($param = []) {
        $post = $this->app->request->post();

        if($this->app->request->isPost() && !empty($post)) {
            $errorText = " не может быть пустым";
            $errors = [];
            $login = $post['login'];
            $email = $post['email'];
            $phone = $post['phone'];
            $address = trim($post['address']);
            $message = trim($post['message']);
            $post['address'] = $this->clear($address);
            $post['message'] = $this->clear($message);
                    
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
                $_SESSION['post'] = $post;
                $this->app->flash('error', '<div class="alert warning"><p class="alert__text">' . array_shift($errors) . '</p></div>');
                $this->app->redirect($this->app->urlFor('request'));
            }

            $result = $this->model->save($post); 
            if ($result !== true) {
                $_SESSION['post'] = $post;
                $this->app->flash('error', '<div class="alert warning"><p class="alert__text">При сохранении данных произошла ошибка</p></div>');
                $this->app->redirect($this->app->urlFor('request'));
            }
            $this->app->flash('msg', '<div class="alert primary"><p class="alert__text">Заявка успешно создана</p></div>');
            $this->app->redirect($this->app->urlFor('request'));
        }
        
        return $this->display();
	}
}