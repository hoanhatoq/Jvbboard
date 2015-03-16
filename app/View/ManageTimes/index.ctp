<div class="userInfo" style="width: 1200px;
margin: auto;">
	
	<h1 style="float:left;font-size: 20px;">
		Quản lý thời gian làm việc của tháng 
		<?php 
			if(!empty($monthCurrent)){
			 	echo $monthCurrent;
			}else{
			 	echo date('m'); 
			}
		?> 
	</h1>

	<?php
		if(!empty($userId)){
			if($userId['role_id'] == '3070f8cc-6976-11e4-8db0-40167e347eff'){
				echo $this->Form->create('ManageTime',array('action'=>'displaydetail'));
				echo $this->Form->input('user_id',array(
					'empty' => 'Lựa chọn một user',
					'options' => $listUser,
					'onchange' => 'this.form.submit()',
					'label' => false,
					'class' => 'selectUser'
					));
				echo $this->Form->end();
			}
		}
 	?>

	<div style="float:right;">
		<?php
			$month = array(1=>'tháng 1',2=>'tháng 2',3=>'tháng 3',4=>'tháng 4',5=>'tháng 5',6=>'tháng 6',
				7=>'tháng 7',8=>'tháng 8',9=>'tháng 9',10=>'tháng 10',11=>'tháng 11',12=>'tháng 12'
				); 
			echo $this->Form->create('ManageTime',array('action'=>'index'));
			echo $this->Form->input('month',array(
				'empty' => 'Lựa chọn tháng',
				'options' => $month,
				'label' => false,
				'onchange' => 'this.form.submit()'
				));
			echo $this->Form->end();
		 ?>
	</div>
</div>

<div class="userInfo" style="width: 1200px;
margin: auto;">

	<!-- Bảng quản lý thời gian làm việc của nhân viên trong tháng -->
 	<table>
		<tr>
			<th>Ngày tạo</th>
			<th>Thời gian bắt đầu</th>
			<th>Thời gian kết thúc</th>
			<th>Thời gian làm việc</th>
			<th>Thao tác</th>
			<th>Xin nghỉ phép</th>
		</tr>
	 	<?php
	 		if(!empty($monthCurrent)){
	 			$m = $monthCurrent;
	 		}
	 		//Lấy tháng hiện tại hoặc tháng được chỉ định dựa vào biến monthCurrent
			$number = cal_days_in_month(CAL_GREGORIAN, $m , 2015);
			$date =  date('Y').'-'.$monthCurrent.'-'.'00';

			//Hiển thị tát cả số ngày trong tháng ra màn hình
			for ($i=1 ; $i <= $number ; $i++) {  ?>
				<?php
				 if(($i % 2) == 0){
						echo "<tr class='special'>";
					}else{
						echo "<tr>";
						
					} 
				?>
					<td>
						<?php
							$stop_date = date('Y-m-d', strtotime($date . ' + '.$i.' day'));
							echo $stop_date;
				 		?>
			 		</td>
					<td>
						<?php 
							$check = 0;
							foreach ($userInfo2 as $data) {
								if($data['ManageTime']['created'] == $stop_date){
									echo $data['ManageTime']['start_time'];
									$check = $check + 1;
								}
							}
							if($check == 0) echo "chưa cập nhật";
						?>
					</td>
					<td>
						<?php
							$check1 = 0; 
							foreach ($userInfo2 as $data) {
								if($data['ManageTime']['created'] == $stop_date){
									echo $data['ManageTime']['end_time'];
									$check1 = $check1 + 1;
								}
							}
							if($check1 == 0) echo "chưa cập nhật"; 
						?>
					</td>
					<td>
						<?php
							$check2 = 0; 
							foreach ($userInfo2 as $data) {
								if($data['ManageTime']['created'] == $stop_date){
									echo $data['ManageTime']['total_time_of_day'];
									$check2 = $check2 + 1;
								}
							}
							if($check2 == 0) echo "chưa cập nhật"; 
						?>
					</td>
					<td>
						<?php
							$check3 = 0; 
							foreach ($userInfo2 as $data) {
							if($data['ManageTime']['created'] == $stop_date && $data['ManageTime']['status'] == 1){
								$check3 = $check3 + 1; 
							?>
								<button type="button" class="btn-success">Hoàn thành</button>
						<?php	}
							} ?>
						<?php if($check3 == 0){ ?>
							<?php
							if( date('Y-m-d') == $stop_date){
								echo $this->Html->link('cài đặt','/ManageTimes/setting/'.$stop_date,array('class'=>'starttime'));
							} 
							?>
							<button type="button" class="btn-default">Chưa hoàn thành</button>
							<?php } ?>
					</td>
					<td>	
						<?php if($stop_date >= date('Y-m-d')){ ?>
						<?php
							$check4 = 0;
							foreach ($holiday as $day) {
							 	if($day['ManageHoliday']['created'] == $stop_date){
							 		$check4 = $check4 + 1; ?>
									<button type="button" class="btn-default">Đã gửi yêu cầu nghỉ phép</button>
							<?php 	}
							 }
							 if($check4 == 0){
								echo $this->Html->link('Gửi yêu cầu nghỉ phép','/ManageHolidays/sendrequest/'.$stop_date,array('class'=>'btn-danger'));
							 } 
						 ?>
						<?php } ?>
					</td>
				</tr>
		<?php } ?>
	</table>

 	<!-- Bảng hiển thị số ngày nghỉ phép của nhân viên trong thang-->
	<h1 style="margin-top:20px;font-size: 20px;">
		Quản lý số ngày nghỉ của tháng 
		<?php 
		 if(!empty($monthCurrent)){
			 	echo $monthCurrent;
			 }else{
			 	echo date('m'); 
			 }
	 	?>
 	</h1>

	 <table>
		<tr>
			<th>Ngày nghỉ</th>
			<th>Thời gian nghỉ</th>
			<th>Lý do nghỉ</th>
			<th>Trạng thái</th>
		</tr>
		<?php $number2 = 1 ?>
		<?php foreach ($holiday as $data) { ?>

		<?php
	 		if(($number2++ % 2) == 0){
				echo "<tr class='special'>";
			}else{
				echo "<tr>";
				
			} 
		?>
				<td><?php echo $data['ManageHoliday']['created']; ?></td>
				<td>
					<?php 
						if($data['ManageHoliday']['number_day'] == 1){
							echo "Buổi sáng";
						} else if($data['ManageHoliday']['number_day'] == 2){
							echo "Buổi chiều";
						}else{
							echo "Cả ngày";
						}
			 		?>
			 	</td>
				<td><?php echo $data['ManageHoliday']['reason']; ?></td>
				<td><?php
				if($data['ManageHoliday']['status'] == 0){ ?>
				<button type="button" class="btn btn-default">Đang xử lý</button>
				<?php } else if($data['ManageHoliday']['status'] == 1){ ?>
					<button type="button" class="btn-success">Đã chấp nhận nghỉ phép</button>
				 <?php } else{ ?>
					<button type="button" class="btn-danger">Không chấp nhận cho nghỉ phép</button>
				<?php } ?>
				</td>
			</tr>
		<?php } ?>
	</table>

	<!-- Bảng hiển thị số ngày đi làm muộn trong tháng -->
	<h1 style="margin-top:20px;font-size: 20px;">
		Quản lý số ngày đi muộn của tháng 
		<?php 
		 if(!empty($monthCurrent)){
			 	echo $monthCurrent;
			 }else{
			 	echo date('m'); 
			 }
	 	?>
 	</h1>
	 <table border="1">
		<tr>
			<th>Ngày đi làm muộn </th>
			<th>Trạng thái</th>
		</tr>
		<?php $number3 = 1 ?>
		<?php foreach ($late as $data) { ?>
			<?php
		 		if(($number3++ % 2) == 0){
					echo "<tr class='special'>";
				}else{
					echo "<tr>";
					
				} 
			?>
				<td><?php echo $data['ManageTime']['created']; ?></td>
				<td><button type="button" class="btn-danger">Đi làm muộn</button></td>
			</tr>
		<?php } ?>
	</table>

	<!-- Bảng thống kê thời gian làm việc,số ngày làm việc,số ngày nghỉ phép,số ngày đi muộn,số ngày nghỉ không có lý do trong tháng -->
	<div class="statistic">
		 <div style="margin-top:20px;">
		 	Số thời gian làm việc:
		 	<?php
			 	//Tính tổng số giây của một ngày làm việc
			 	$second1 = 0;
			 	foreach ($userInfo as $time) {
			 		$total_time = $time['ManageTime']['total_time_of_day'];
			 		$parsed = date_parse($total_time);
					$second2 = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
					$second1 = $second1 + $second2;
			 	}

			 	//Hiển thị tổng thời gian làm việc ở dạng datetime
				echo gmdate("H:i:s", $second1)."<br/>";
		 	 ?>
		 </div>

		 <div>Số ngày làm việc:
			<?php 
				$dtF = new DateTime("@0");
				$dtT = new DateTime("@$second1");
				echo  $dtF->diff($dtT)->format('%a ngày, %h giờ, %i phút');
			?>
		 </div>

		 <div>Số ngày nghỉ:
			<?php 
				$day = 0;
				foreach ($holiday2 as $days) {
					if($days['ManageHoliday']['number_day'] == 1 || $days['ManageHoliday']['number_day'] == 2){
						$day = $day + 0.5;
					} else if($days['ManageHoliday']['number_day'] == 3){
						$day = $day + 1;
					}
				}
				echo $day; 
			?>
		 </div>
		 <div>Số ngày đi muộn:
		 	<?php 
				$l = 0;
				foreach ($late as $ld) {
					$l = $l + 1;
				}
				echo $l; 
		 	 ?>
		 </div>
	</div>
</div>

<!-- 	<div style="float:right;">
		<?php
			// $month = array(1=>'tháng 1',2=>'tháng 2',3=>'tháng 3',4=>'tháng 4',5=>'tháng 5',6=>'tháng 6',
			// 	7=>'tháng 7',8=>'tháng 8',9=>'tháng 9',10=>'tháng 10',11=>'tháng 11',12=>'tháng 12'
			// 	); 
			// echo $this->Form->create('ManageTime',array('id'=>'select-month'));
			// echo $this->Form->input('m',array(
			// 	'empty' => 'Lựa chọn tháng',
			// 	'options' => $month,
			// 	'label' => false,
			// 	'id' => 'getMonth'
			// 	));
			// echo $this->Form->end();
		 ?>
	</div>
	<script>
	$(document).ready(function(){
		$('#select-month').on('change', function(){
			var month = $('#getMonth').val();

			var url = '<?php //echo $this->request->base ?>/ManageTimes/index';
			console.log(url);
            $.ajax({
		        url: url,
		        type: 'POST',
		        dataType: 'html',
		        data: {
		            month: month
		        },
		        beforeSend: function(){},
		        success: function(response){},
		        error: function(response){},
		        complete: function(response){}
		    });
		});
	});
	</script> -->