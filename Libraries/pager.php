<?php
namespace Libraries;

defined('_Sdef') or exit();

class Pager {

    public function __construct($page, $fields, $tablename, $request_number, $number_link, $driver) {
        $this->page = $page;
        $this->fields = $fields;
        $this->tablename = $tablename;
        $this->request_number = $request_number;
        $this->number_link = $number_link;
        $this->driver = $driver;
    }

    public function get_total() {
        $sql = 'SELECT COUNT(*) as count FROM ' . $this->tablename;

        $result = $this->driver->query($sql);
        $this->total_count = $result[0]['count'];

        return $this->total_count;
    }

    public function get_requests() {
        $total_requests = $this->get_total();
        $number_pages = (int)($total_requests / $this->request_number);

        if(($total_requests % $this->request_number) != 0) {
            $number_pages++;
        }

        $start = ($this->page-1) * $this->request_number;
        $sql = 'SELECT ' . $this->fields . ' FROM ' . $this->tablename;

        $sql .= ' LIMIT ' . $start . ',' . $this->request_number;

        if($this->driver instanceof \Model\AModel) {
            $result = $this->driver->query($sql);
        }

        return $result;
    }

    public function get_navigation() {
		$total_post = $this->get_total();
		
		$number_pages = (int)($total_post / $this->request_number);
		
		if(($total_post % $this->request_number) != 0) {
			$number_pages++;
		}
		
		if($total_post < $this->request_number || $this->page > $number_pages) {
			return FALSE;
		}
		
		$result = array();
		
		if($this->page != 1) {
			$result['first'] = 1;
			$result['last_page'] = $this->page - 1;
		}
		
		if($this->page > $this->number_link + 1) {
			for($i = $this->page-$this->number_link; $i < $this->page; $i++) {
				$result['previous'][] = $i;
			}
		}
		else {
			for($i = 1; $i < $this->page; $i++) {
				$result['previous'][] = $i;
			}
		}
		
		$result['current'] = $this->page;
				
		if($this->page + $this->number_link < $number_pages) {
			for($i = $this->page + 1; $i <= $this->page + $this->number_link; $i++) {
				$result['next'][] = $i;
			}
		}
		else {
			for($i = $this->page + 1; $i <= $number_pages; $i++) {
				$result['next'][] = $i;
			}
		}
		
		if($this->page != $number_pages) {
			$result['next_pages'] = $this->page + 1;
			$result['end'] = $number_pages;
		}

		return $result;
	}
}