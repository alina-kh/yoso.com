<?php
namespace Controller;

defined('_Sdef') or exit();

abstract class AController {

    protected $app;
    protected $model;
    protected $uri;

    protected $title;

    protected static $instance;

    public function __construct() {
        $this->app = \Slim\Slim::getInstance();
        $this->uri = $this->getUri();
        $this->model = $this->getModel();
        $this->title = 'YOSO | ';
    }

    public static function getInstance($prefix) {
        $class = '\Controller\\'.ucfirst($prefix).'Controller';

        if(self::$instance instanceof $class) {
            return self::$instance;
        }

        if(class_exists($class)) {
            self::$instance = new $class;
        }
        else {
            throw new \Exception('Class not found - ' . $class);
        }

        return self::$instance;
    }

	public function execute($param = []) {
		return TRUE;
	}

    protected function getUri() {
        $env = $this->app->environment;

        if(isset($env['slim.url_scheme']) && $env['slim.url_scheme'] == 'https') {
            $https = 's:://';
        }
        else {
            $https = ':://';
        }

        if(!empty($env['HTTP_HOST'])) {
            $theURI = 'http' . $https . $env['HTTP_HOST'];
        }

        if(!empty($env['SCRIPT_NAME'])) {
            $theURI .= $env['SCRIPT_NAME'];
        }

        $theURI .= '/';

        $theURI = str_replace(['"', "'", '<', '>'], ['%27', '%22', '%3C', '%3E'], $theURI);

        return $theURI;
    }

    protected function getModel() {
        return new \Model\Model();
    }

    protected function clear_str($var) {
        return strip_tags(trim($var));
    }

    abstract protected function display();
}