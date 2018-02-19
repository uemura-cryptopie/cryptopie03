<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class MY_Model extends CI_Model
{
	/**
     * コンストラクタ
     */
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('support/lib_exceptions');
	}

	/**
     * テーブル名を取得
	 * 
     */
	function _get_table_name()
	{
		return str_replace('_model', '', strtolower(get_class($this)));
	}

	/**
	 * レコードの値を取得
	 *
	 */
	function get_record($where, $data = FALSE)
	{
		// テーブル名を取得
		$table = $this->_get_table_name();

		// WHERE句
		$this->db->where($where);

		// クエリの実行
		$query = $this->db->get($table);

		// 該当するレコードが存在する場合
		if($query->num_rows() !== 0)
		{
			return $data ? $query->result_array() : TRUE;
		}

		// エラーチェック
		$this->lib_exceptions->checkForError();

		return FALSE;
	}

	/**
	 * レコードの値をIDで取得
	 *
	 */
	function get_record_by_id($id, $data = TRUE)
	{
		// テーブル名を取得
		$table = $this->_get_table_name();


		// クエリの実行
		$query = $this->db->get_where($table, array('id' => $id));

		// 該当するレコードが存在する場合
		if($query->num_rows() !== 0)
		{
			return $data ? $query->row_array() : TRUE;
		}

		// エラーチェック
		$this->lib_exceptions->checkForError();

		return FALSE;
	}

	/**
     * 条件に合致するすべてのデータを取得
     *
     */
	function get_all($params = array(), $obj_flg = FALSE)
	{
		$table = $this->_get_table_name();

		// 配列の要素をキー名の変数に格納
		if (!empty($params) AND is_array($params)) {
			extract($params);
		}
		// カラムの選択
		if(!empty($select)) $this->db->select($select);

		// WHERE句
		if (!empty($where)) $this->db->where($where);
		
		// ORDER BY句
		if (!empty($order_by)) $this->db->order_by($order_by);
		
		// MAX句
		if (!empty($select_max)) $this->db->select_max($select_max);
		
		// LIMIT句
		$limit = (isset($limit)) ? $limit : null;
		
		// OFFSET句
		$offset = (isset($offset)) ? $offset : null;

		$query = $this->db->get($table, $limit, $offset);

		// エラーチェック
		$this->lib_exceptions->checkForError();


		return $obj_flg ? $query->result() : $query->result_array();
	}

	/**
		* マスター情報を取得
		* id => name 形式で格納
		*/
	function get_master_all($params='', $item='name', $key='id')
	{
		$result = array();
		foreach ($this->get_all($params) as $value) {
			$result[$value[$key]] = $value[$item];
		}
		// エラーチェック
		$this->lib_exceptions->checkForError();
		return $result;
	}

	/**
	 * Get all data of table
	 * Default return array id => name
	 * Custom return array field => field
	 * Example in table m_country:
	 * 	array('id' => 'country_name')
	 * 	array('id' => 'country_code')
	 * 	array('country_name' => 'country_code')
	 * 	array('country_code' => 'country_name')
	 */
	function get_all_data($options = array()) {
		$table = $this->_get_table_name();
		$query = $this->db->get($table);

		$result = array();
		
		$itemKey = 'id';
		if (!empty($options['key'])) {
			$itemKey = $options['key'];
		}

		$itemValue = 'id';
		if (!empty($options['value'])) {
			$itemValue = $options['value'];
		}
		
		foreach ($query->result_array() as $value) {
			$result[$value[$itemKey]] = $value[$itemValue];
		}
		
		return $result;
	}

	/**
	 * 条件に合致するレコード数を取得
	 *
	 */
	function count_all($params = array())
	{
		// エラーチェック
		$this->lib_exceptions->checkForError();
		return count($this->get_all($params));
	}
 

	/**
	 * 挿入処理
	 * 
	 */
	function execute_insert($values)
	{
		// テーブル名を取得
		$table = $this->_get_table_name();
<<<<<<< HEAD
		// $table = $values['currency'];
=======

>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
		// 追加情報
		$add = array(
			'inserted_at' => date('Y-m-d H:i:s'),
		);
		$values = self::_add_execute_info($values, $add);

		$query  = $this->db->insert_string($table, $values);
		$result = $this->db->query($query);

		// エラーチェック
		$this->lib_exceptions->checkForError();

		if (!$result) {
			return FALSE;
		}
		return $this->db->insert_id();
	}

	/**
	 * 挿入処理（複数）
	 * 
	 */
	function execute_insert_batch($values)
	{
		// テーブル名を取得
		$table = $this->_get_table_name();

		// 追加情報
		$add = array(
			'inserted_at' => date('Y-m-d H:i:s'),
		);
		$values = self::_add_execute_info($values, $add);

		$result = $this->db->insert_batch($table, $values);

		// エラーチェック
		$this->lib_exceptions->checkForError();

		if (!$result) {
			return FALSE;
		}
		return TRUE;
	}


	/**
	 * 更新処理
	 * 
	 */
	function execute_update($values, $where)
	{
		// テーブル名を取得
		$table = $this->_get_table_name();

		// 追加情報
		$add = array(
			'updated_at' => date('Y-m-d H:i:s'),
		 );
		$values = self::_add_execute_info($values, $add);

		$query  = $this->db->update_string($table, $values, $where);
		$result = $this->db->query($query);

		// エラーチェック
		$this->lib_exceptions->checkForError();

		if (!$result) {
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * 更新処理
	 * 
	 */
	function execute_update_batch($values, $where)
	{
		// テーブル名を取得
		$table = $this->_get_table_name();

		// 追加情報
		$add = array(
			'updated_at' => date('Y-m-d H:i:s'),
		 );
		$values = self::_add_execute_info($values, $add);
		$result = $this->db->update_batch($table, $values, $where);

		// エラーチェック
		$this->lib_exceptions->checkForError();

		if (!$result) {
			return FALSE;
		}
		return TRUE;
	}


	/**
	 * 削除処理(delete_flag)
	 * 
	 */
	function execute_update_flag($values, $where)
	{
		// テーブル名を取得
		$table = $this->_get_table_name();

		// 追加情報
		$add = array(
			'deleted_at' => date('Y-m-d H:i:s'),
		 );
		$values = self::_add_execute_info($values, $add);

		$query  = $this->db->update_string($table, $values, $where);
		$result = $this->db->query($query);

		// エラーチェック
		$this->lib_exceptions->checkForError();

		if (!$result) {
			return FALSE;
		}
		return TRUE;
	}


	/**
	 * 削除処理
	 * 
	 */
	function execute_delete($where)
	{
		if (!is_array($where)) return FALSE;

		// テーブル名を取得
		$table = $this->_get_table_name();
		
		$this->db->delete($table, $where);

		// エラーチェック
		$this->lib_exceptions->checkForError();

		return TRUE;
	}

	/**
	 * 実行時間追加
	 * 
	 */
	function _add_execute_info($values, $add)
	{
		$fields = $this->db->list_fields($this->_get_table_name());
		foreach ($fields as $field) {
			foreach ($add as $column => $item) {
				if ($field == $column) $values[$column] = $item;
			}
		}
		return $values;
	}
}

// END MY_Model Class

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */