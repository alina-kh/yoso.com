<?php
namespace Controller;

defined('_Sdef') or exit();

abstract class ADisplayController extends AController {

    protected function getMenu($menu) {
        return $this->app->view->fetch('menu.tpl.php', [
            'menu' => $menu,
            'app'=>$this->app
        ]);
    }

    protected function display() {
        $this->app->render('index.tpl.php', [
            'uri'=>$this->uri,
            'title'=>$this->title,
            'keywords'=>$this->keywords,
            'description'=>$this->description,
            'header'=>$this->header,
            'menuList'=>$this->menuList,
            'menu'=>$this->getMenu($this->menuList),
            'block'=>$this->block
        ]);
    }
}