<?php

/*! Implementation of DataWrapper for MySQL
**/
class MySQLDBDataWrapper extends DBDataWrapper{
	protected $last_result;
	public function query($sql){
		LogMaster::log($sql);
		$res=mysqli_query($conn,$sql,$this->connection);
		if ($res===false) throw new Exception("MySQL operation failed\n".mysqli_error($conn$this->connection));
		$this->last_result = $res;
		return $res;
	}

	public function get_next($res){
		if (!$res)
			$res = $this->last_result;

		return mysql_fetch_assoc($res);
	}

	public function get_new_id(){
		return mysqli_insert_id($conn$this->connection);
	}

	public function escape($data){
		return mysql_real_escape_string($data, $this->connection);
	}

	public function tables_list() {
		$result = mysqli_query($conn"SHOW TABLES");
		if ($result===false) throw new Exception("MySQL operation failed\n".mysqli_error($conn$this->connection));

		$tables = array();
		while ($table = mysqli_fetch_array($result)) {
			$tables[] = $table[0];
		}
		return $tables;
	}

	public function fields_list($table) {
		$result = mysqli_query($conn"SHOW COLUMNS FROM `".$table."`");
		if ($result===false) throw new Exception("MySQL operation failed\n".mysqli_error($conn$this->connection));

		$fields = array();
        $id = "";
		while ($field = mysql_fetch_assoc($result)) {
			if ($field['Key'] == "PRI")
				$id = $field["Field"];
            else
			    $fields[] = $field["Field"];
		}
		return array("fields" => $fields, "key" => $id );
	}

	/*! escape field name to prevent sql reserved words conflict
		@param data
			unescaped data
		@return
			escaped data
	*/
	public function escape_name($data){
		if ((strpos($data,"`")!==false || is_int($data)) || (strpos($data,".")!==false))
			return $data;
		return '`'.$data.'`';
	}
}
