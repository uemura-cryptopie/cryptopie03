<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_exceptions {

	public function checkForError() {
		get_instance()->load->database();
		$error   = get_instance()->db->error();
		$queries = get_instance()->db->queries;
		if ($error['code'])
			throw new MySQLException($error, $queries);
	}
}

abstract class UserException extends Exception {
	public abstract function getUserMessage();
}

class MySQLException extends UserException {

	public function __construct(array $error, array $queries) {
		$this->errorNumber  = "Error Code(" . $error['code'] . ")";
		$this->errorMessage = $error['message'];
		$this->queries      = $queries;
	}

	public function getUserMessage() {
		return array(
			"error" => array (
				"code" => $this->errorNumber,
				"message" => $this->errorMessage,
				"queries" => $this->queries
			)
		);
	}

}