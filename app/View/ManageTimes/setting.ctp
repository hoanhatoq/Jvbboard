<div class="userInfo" style="width: 1200px;
margin: auto; text-align: center;margin-top: 30px;">

	<?php
		if(empty($timeId)){
			echo $this->Html->link('Thời gian bắt đầu','/ManageTimes/start/'.$created,array('class'=>'starttime'));
		}else{
			echo $this->Html->link('Thời gian kết thúc','/ManageTimes/end/'.$timeId,array('class'=>'endtime'));
		}
	 ?>


</div>