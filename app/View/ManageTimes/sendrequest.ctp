<div class="userInfo" style="width: 1200px;
margin: auto;">
	<?php
		$time = array(1=>'Buổi sáng',2=>'Buổi chiều',3=>'Cả ngày'); 
		echo $this->Form->create('ManageHoliday','/');
		echo $this->Form->input('day',array(
			'empty' => 'Chọn thời gian muốn nghỉ trong ngày',
			'options' => $time,
			'label' => false
			));
		echo $this->Form->input('reason',array(
			'rows' => 3
			));
		echo $this->Form->end('Gửi yêu cầu');
 ?>
</div>