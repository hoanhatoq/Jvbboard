<div class="">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Thêm mới một dự án</h3>
	  </div>
	  <div class="panel-body">
			<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php echo $this->Form->create('Project',array('class'=>"form-horizontal")); ?>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php echo $this->Form->input('name',array('label'=>'Tên Dự Án','class'=>'form-control'));?>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php echo $this->Form->input('description',array('label'=>'Mô Tả','class'=>'form-control'));?>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php echo $this->Form->input('status',array('label'=>'Trạng Thái','class'=>'form-control'));?>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php	echo $this->Form->input('start_date', 
        			array(
           					 
           					'type'=>'text',
           					'id'=>'ProjectStartDate'
        			)
				);
			;?>
			
				<?php	echo $this->Form->input('end_date', 
        			array(
           					
           					'type'=>'text',
           					'id'=>'ProjectEndDate'
        			)
				);
			;?>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-3">
					<?php echo $this->Html->link('Quay Lại',array('controller' => 'Projects','action' => 'index'),array('class'=>'btn btn-default'));?>
					<?php echo $this->Form->button('Thêm mới',array('type'=>'submit','class'=>'btn btn-success')) ;?>
				</div>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>

		<script type="text/javascript">
	   		$(function() {
    			$( "#ProjectStartDate" ).datepicker({
		        dateFormat: "yy-mm-dd",                 
		        changeMonth: true,
		        changeYear: true
		    	});
			});
  			$(function() {
    			$( "#ProjectEndDate" ).datepicker({
		        dateFormat: "yy-mm-dd",                 
		        changeMonth: true,
		        changeYear: true
		    	});
			});
		</script>
		

	</div>
</div>
