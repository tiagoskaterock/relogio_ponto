<?php 

class Model {

	protected static $tableName = '';
	protected static $columns = [];
	protected $values = [];

	function __construct($arr) {
		$this->loadFromArray($arr);
	}

	function loadFromArray($arr) {
		if($arr) {
			foreach ($arr as $key => $value) {
				$this->$key = $value;
			}
		}
	}

	function __get($key) {
		return $this->values[$key];
	}

	function __set($key, $value) {
		$this->values[$key] = $value;
	}

	static function get($filters = [], $columns = '*') {
		$objects = [];
		$result = static::getResultSetFromSelect($filters, $columns);
		if ($result) {
			$class = get_called_class();
			while($row = $result->fetch_assoc()) {
				array_push($objects, new $class($row));
			}
		}
		return $objects;		
	}

	static function getResultSetFromSelect($filters = [], $columns = '*') {
		$sql = "SELECT ${columns} FROM " . static::$tableName . static::getFilters($filters);
		$result = Database::getResultFromQuery($sql);
		if($result->num_rows == 0) {
			return null;
		}
		else {
			return $result;
		}
	}

	private static function getFilters($filters) {
		$sql = "";
		if(count($filters) > 0) {
			$sql .= " WHERE 1 = 1";
			foreach($filters as $column => $value) {
				$sql .= " AND ${column} = " . static::getFormatedValue($value);
			}
		}
		return $sql;
	}

	private static function getFormatedValue($value) {
		if (is_null($value)) {
			return "null";			
		}
		else if (gettype($value) === 'string') {
			return "'${value}'";
		}
		else {
			return $value;
		}
	}


}
