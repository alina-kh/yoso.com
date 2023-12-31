<?php
namespace Model;

defined('_Sdef') or exit();

class AModel {
    static protected $db = false;

    public function __construct() {
        return self::connect();
    }

    public static function connect() {
        if(self::$db instanceof \mysqli) {
            return self::$db;
        }

        self::$db = new \mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(self::$db->connect_error) {
            throw new \Exception('Error connection: ' . self::$db->connect_errno . '|' . self::$db->connect_error);
        }

        self::$db->query('SET NAMES utf-8');

        return self::$db;
    }

    public function query($sql, $type = 'select') {
        if(!empty($sql)) {
            $result = self::$db->query($sql);
        }

        if(!$result) {
            throw new \Exception('Ошибка :' . self::$db->errno . '|' . self::$db->error);

            return false;
        }

        switch($type) {
            case 'select':
                $row = [];
                while($r = $result->fetch_assoc()) {
                    $row[] = $r;
                }
                return $row;
                break;
            case 'insert':
                $row = self::$db->affected_rows;
                if($row == -1) {
                    throw new \Exception("Ошибка : ".self::$db->errno."|".self::$db->error);
                    return FALSE;
                }
                elseif($row === 1) {
                    return TRUE;
                }
                break;
        }
    }

    public function clear_db($var) {
		return self::$db->real_escape_string($var);//SQL injection
	}
}