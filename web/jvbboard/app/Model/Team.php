<?php
App::uses('AppModel', 'Model');

/**
 * @author Nguyễn Duy Linh
 */

class Team extends AppModel{
	/**
	 * Tên bảng trong cơ sở dữ liệu
	 */
	public $useTable = 'team_tbl';

	/**
	 * Tên khóa chính của bảng
	 */
	public $primaryKey = 'team_id';

	/**
	 * Định nghĩa quan hệ hasMany giữa bảng team_tbl và bảng team_member_tbl
	 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'team_id',
		)
	);
}