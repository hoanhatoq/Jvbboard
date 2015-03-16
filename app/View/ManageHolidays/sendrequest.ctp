<div class="userInfo" style="width: 1200px;
margin: auto;">

 <?php
 	$time = array(1 => 'Buổi sáng', 2 => 'Buổi chiều',3 => 'Cả ngày'); 
	echo $this->Form->create('ManageHoliday');
	echo $this->Form->input('number_day',array(
		'empty' => 'Chọn thời gian muốn nghỉ',
		'options' => $time,
		'label' => false
		));
	echo $this->Form->input('reason');
	echo $this->Form->end('Gửi Yêu cầu');
 ?>

</div>