<div class="container">
	<div class="board" id="broadcast">
		<div class="message_title">
				<input type="hidden" name="uid" value="<?php echo $data['ALL']['user_id'];?>" />
		</div>		
		<div class="message_board">
			<?php 
				if($current_user['role'] === 'ADMINISTRATORS'){ ?>
			<div class="message_board_head" id="edit-all">
				<?php echo $this->Html->image('editable.png', array('class'=> 'head_img', 'alt' => 'Edit', 'title' => 'Edit')); ?>
			</div>
			<?php } ?>
			<input type="hidden" name="type" value="2" />				
			<textarea readonly id="message" name="message" class="company" rows="1"><?php 
				$messageAll = $data['ALL']['DailyMessage']['message'];
				echo (isset($messageAll)) ? $messageAll :'Have a nice day!!!';?></textarea>
		</div>		
	</div>
	<div class="previous"><a id="previous" href="#">previous</a></div>
</div>

<br><br>

<div class="bom">
	<div class="namebom">&nbsp;&nbsp;&nbsp;<?php echo __('BOM')?></div>
	<div class="mainbom">
		<?php
			foreach($data['BOM'] as $vUid => $vUser){	
		?>
		<div class="board">
			<div class="message_title">
				<input type="hidden" name="uid" value="<?php echo $vUid;?>" />
				&nbsp; <?php echo $vUser['User']['fullname']; ?>
			</div>
			<div class="message_board">
				<?php 
					if(($current_user['role'] === 'ADMINISTRATORS') 
						|| ($current_user['role'] === 'MANAGERS' && $current_user['user_id'] === $vUid)){ ?>
				<div class="message_board_head">
					<?php echo $this->Html->image('editable.png', array('class'=> 'head_img', 'alt' => 'Edit', 'title' => 'Edit')); ?>
				</div>
				<?php } ?>
				<input type="hidden" name="type" value="2" />				
				<textarea readonly name="message" class="message_board_body" rows="1"><?php echo $vUser['DailyMessage']['message'];?></textarea>
			</div>
		</div>
		<?php
			}
		?>
	</div>
</div>
<br><br>


<div id="team">
	<?php 
		foreach($data['TEAM'] as $vTid => $vTeam){	
	?>
	<div class="nameteam">&nbsp;&nbsp;&nbsp;<?php echo __($vTeam['name']);?><?php echo $this->Html->image('banana.png') ?></div>
		<?php 
			if(isset($vTeam['LEADER'])){
		?>
		<div class="board">
			<div class="message_title">
				<input type="hidden" name="uid" value="<?php echo $vTeam['LEADER']['user_id'];?>" />
				&nbsp; <?php echo $vTeam['LEADER']['fullname']; ?>
			</div>
			<div class="message_board">
				<?php 
					if(($current_user['role'] === 'ADMINISTRATORS' || $current_user['role'] === 'MANAGERS') 
						|| ($current_user['user_id'] === $vTeam['LEADER']['user_id']) ){ 
				?>
				<div class="message_board_head">
					<?php echo $this->Html->image('editable.png', array('class'=> 'head_img', 'alt' => 'Edit', 'title' => 'Edit')); ?>
				</div>
				<?php } ?>
				<textarea readonly name="message" class="message_board_body" rows="1"><?php echo $vTeam['LEADER']['DailyMessage']['message'];?></textarea>
			</div>
		</div>		
		<br>
		<?php 
			}

			if(isset($vTeam['MEMBERS'])){
				foreach($vTeam['MEMBERS'] as $vTuid => $vTuser){
		?>		
		<div class="board">
			<div class="message_title">
				<input type="hidden" name="uid" value="<?php echo $vTuid;?>" />
				&nbsp; <?php echo $vTuser['User']['fullname']; ?>
			</div>
			<div class="message_board">
				<div class="message_board_head">
					<?php 
						if(($current_user['role'] === 'ADMINISTRATORS' || $current_user['role'] === 'MANAGERS') 
					        || ($current_user['user_id'] === $vTeam['LEADER']['user_id']) 
					        || ($current_user['role'] === 'MEMBERS' && $current_user['user_id'] === $vTuid)){ ?>
					<?php echo $this->Html->image('editable.png', array('class'=> 'head_img', 'alt' => 'Edit', 'title' => 'Edit')); ?>
					<?php } ?>
				</div>
				<textarea readonly name="message" class="message_board_body" rows="1"><?php echo $vTuser['DailyMessage']['message'];?></textarea>
			</div>
		</div>
		<br>
		<?php 
				}
			}
		?>
	<br>
	<?php 
		}
	?>

</div>

<script type="text/javascript">

	function refresh (){
		location.reload();
		setTimeout('refresh()', 100000);
	}

	$(document).ready(function(){
		var step = 0;
		$('textarea').each(function() {
            $(this).height($(this).prop('scrollHeight'));
        });

		$("#previous").click(function(){		
			var lpre = this;
			step = step + 1;
			console.log(step);
			$.ajax({
				url: "<?php echo $this->webroot;?>Message/previous",
				type: "POST",
				cache: false,	
				data: "step="+step,			
				success: function(responce){					
					$("#edit-all").hide();
					if(responce == ''){
						location.reload();
					}else{
						$("#message").text(responce);					
					}
				},
				error: function (){								
					step = step - 1;
					alert("Không cập nhật được message");
				}
			});
			/// end ajax
		});		

		setTimeout('refresh()', 100000);

		$(".head_img").click(function(){
			
			var head_mesg = $(this).parent().get(0);
			var mesg = $(head_mesg).parent().get(0);			
			var tarea = $(mesg).find('textarea');
			$(tarea).removeAttr("readonly");
			$(tarea).focus();			

			if($(mesg).children(".send").length === 0){
				$(mesg).append('<div class="send"><?=$this->Html->image('send.png', array('alt' => 'Send', 'title' => 'Send', 'class'=>'send_button')); ?></div>');

				$(".send_button").click(function(){
					var send = $(this).parent().get(0);
					var curMesg = $(send).parent().get(0);
					$("textarea").each(function(){
						var parTarea = $(this).parent().get(0);

						if(curMesg==parTarea){							
							var message_content = $(this).val();
							$(this).attr("readonly", "readonly");
							
							var board = $(mesg).parent().get(0);	
							var u = $(board).find("input").val();
							
							$.ajax({
								url: "<?php echo $this->webroot, $this->params['controller']; ?>/edit",
								type: "POST",
								cache: false,
								data: "u="+u+"&m="+message_content,
								success: function(responce){			
									$(send).remove();	
									console.log(responce);
									$('textarea').each(function() {
							            $(this).height($(this).prop('scrollHeight'));
							        });									
								},
								error: function (){								
									alert("Không cập nhật được message");
								}
							});
							/// end ajax
						}						
					});		
					// end textarea
				});
				// end send_button click
			}
			// end if : $(mesg).children(".send").length === 0

			
		});
		// end click
	});
	// end ready
</script>