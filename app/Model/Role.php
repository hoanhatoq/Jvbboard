<?php
App::uses('AppModel', 'Model');

/**
 * @author Duy Linh
 */
class Role extends AppModel{
	
	/**
	 * Tên bảng trong cơ sở dữ liệu
	 */
	public $useTable = 'role_mst';

	/**
	 * Tên khóa chính của bảng
	 */
	public $primaryKey = 'role_id';

}