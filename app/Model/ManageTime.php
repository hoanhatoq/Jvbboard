<?php

/**
 * @author Duy Linh, Mạnh Linh
 *
 */

class ManageTime extends AppModel{
	
	/**
	 * Tên bảng trong cơ sở dữ liệu
	 */
	public $useTable = 'manage_time_tbl';

	/**
	 * Tên khóa chính của bảng
	 */
	public $primaryKey = 'manage_time_id';

	/**
	 * Điều kiện kiểm tra dữ liệu
	 */
	public $validate = array(
		"start_time" => array(
			"rule"          => "notEmpty",
            "message"       => "Không được để trống trường này",
			),
		"end_time" => array(
			"rule"          => "notEmpty",
            "message"       => "Không được để trống trường này",
			)
		);
	
}
?>