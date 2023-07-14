<?php
namespace Model;

defined('_Sdef') or exit();

class Model {
    public $driver;

    public function __construct() {
        $this->driver = new \Model\Amodel;
    }

    public function getUsersList() {
        $sql = 'SELECT * FROM users';

        if($this->driver instanceof AModel) {
            $result = $this->driver->query($sql);
        }

        if(!$result) {
            return false;
        }

        return $result;
    }

    public function getRequestsList() {
        $sql = 'SELECT * FROM requests';

        if($this->driver instanceof AModel) {
            $result = $this->driver->query($sql);
        }

        if(!$result) {
            return false;
        }

        return $result;
    }

    public function getItems($page) {
        $pager = new \Libraries\Pager($page, '*', 'requests', QUANTITY, QUANTITY_LINKS, $this->driver);
        $result = [];

        $result['items'] = $pager->get_requests();
        $result['navigation'] = $pager->get_navigation();

        return $result;
    }

    public function save($post) {
        foreach($post as $k=>$item) {
            $post[$k] = $this->driver->clear_db($item);
        }

        $sql = "INSERT INTO `requests`(`login`,`email`,`phone`,`address`,`message`) VALUES ('".$post['login']."','".$post['email']."','".$post['phone']."','".$post['address']."','".$post['message']."')";
        if($this->driver instanceof AModel) {
            $result = $this->driver->query($sql,'insert');	
        }

        if(!$result) {
            return false;
        }

        return $result;
    }
}