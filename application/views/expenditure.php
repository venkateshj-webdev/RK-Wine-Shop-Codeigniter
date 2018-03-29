<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

	<h1>

		<i class="fa fa-plus-square" aria-hidden="true"></i> Expenditure

	</h1>
	
	<div class="col-sm-6 position" style="margin-top: -7px">
		<?php if($this->session->flashdata('data_insert_success')) { ?>
			<div class="alert alert-success" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong><?php echo $this->session->flashdata('data_insert_success'); ?></strong>
	        </div>
		<?php } ?>
		<?php if($this->session->flashdata('data_insert_failed')) { ?>
			<div class="alert alert-danger" role="alert">
	       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong><?php echo $this->session->flashdata('data_insert_failed'); ?></strong>
	        </div>
		<?php } ?>
	</div>
    </section>

    <section class="content">

    	<div class="row">

			<div class="col-xs-12">

              <div class="box box-primary">
              
	             <div class="clearfix" style="margin-bottom: 15px;"></div>

				  	<?php echo form_open_multipart('expenditure_controller/set_expenditure'); ?>

				  	<div class="form-group margin-btm-20 col-sm-4">

						<label for="" class="control-label col-sm-12 pad-right-0">Select Option</label>

						<div class="col-sm-12">

							<select name="expenditure_item" id="sel1" class="form-control">
								<option selected disabled value="">Select Option</option>
								<option value="rent" name="rent">Rent</option>
								<option value="power" name="power">Power</option>
								<option value="salaries" name="salaries">Salaries</option>
								<option value="stock_transport" name="stock_transport">Stock Transport</option>
								<option value="miscellaneous" name="miscellaneous">Miscellaneous</option>
							</select>
							<?php echo form_error('expenditure_item'); ?>
						</div>
					</div>

					<div class="form-group col-sm-4">
						<label for="" class="control-label col-sm-12 pad-right-0">Value</label>
						<div>
							<input type="text" class="form-control" name="expenditure_value">
							<?php echo form_error('expenditure_value'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-4">

						<label for="" class="control-label col-sm-12 pad-right-0">Comments</label>

						<div class="col-sm-12">

							<textarea name="comments" class="form-control" id="" cols="20" rows="4" value=""></textarea>
							<?php echo form_error('comments'); ?>
						</div>

					</div>				

					<div class="col-sm-12">

						<input type="submit" class="btn btn-primary btn-left-10" name="set_expenditure" value="Submit">

					</div>

					<?php echo form_close(); ?>		

	            </div>

            </div>

    	</div>

    </section>

</div>
<script>
	window.setTimeout(function() {
    $(".alert").fadeTo(500,0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2500);
</script>