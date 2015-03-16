1. Tạo cơ sở dữ liệu tên là jvb, collation : utf8_unicode_ci
2. Import cơ sở dữ liệu jvb được chứa trong thư mục database/jvb.sql
3. Thiết lập cho project jvbboard:
	3.1. Đưa thư mục jvbboard trong thư mục source lên server
	3.2. Sửa nội dung file jvbboard/app/Config/database.php chứa config cơ sở dữ liệu sao cho phù hợp với database server. Các tham số chính:
		'host' => 'localhost', 	// Địa chỉ server chứa cơ sở dữ liệu
		'login' => 'root',		// User quản trị cơ sở dữ liệu jvb
		'password' => '123456',	// Mật khẩu của user quản trị
		'database' => 'jvbboard',    // Tên cơ sở dữ liệu
4. Thiết lập config cơ sở dữ liệu cho script update_daily_message.php tự động cập nhật message hàng ngày:
		'host' => 'localhost', 	// Địa chỉ server chứa cơ sở dữ liệu
		'login' => 'root',		// User quản trị cơ sở dữ liệu jvb
		'password' => '123456',	// Mật khẩu của user quản trị
		'database' => 'jvbboard',    // Tên cơ sở dữ liệu
5. Các account hiện có:
	- username: admin - password: 123456789
	- Anh Vũ An Hải: username: anhhai - password: 123456789
	- Anh Chu Văn Quý: username: anhquy - password: 123456789
	- Nguyễn Duy Linh: username: linhanh - password: 123456789
	- Hà Mạnh Linh: username: hmlinh - password: 123456789
	- Đỗ Tùng: username: tung - password: 123456789	