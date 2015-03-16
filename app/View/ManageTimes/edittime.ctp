<h1>Cập nhật thời gian</h1>
<?php
	if(!empty($editime)){
		$start_time = $editime['ManageTime']['start_time'];
		$end_time = $editime['ManageTime']['end_time'];
	}else{
		$start_time = '';
		$end_time = '';
	}
	echo $this->Form->create('ManageTime',array(
		'novalidate' => true
		));
	echo $this->Form->input('start_time',array(
		'value' => $start_time,
		'label' => 'Thời gian bắt đầu làm việc'
		));
	echo $this->Form->input('end_time',array(
		'value' => $end_time,
		'label' => 'Thời gian kết thúc làm việc'
		));
	echo $this->Form->end('Cập nhật');
?>
