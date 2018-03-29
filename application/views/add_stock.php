<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<div class="col-sm-6">
		<h4>
			<i class="fa fa-plus-square" aria-hidden="true"></i> Add New Stock
			<small>Add</small>
		</h4>
	</div>
	<div class="col-sm-6 position">
		<?php if($this->session->flashdata('stock_success')) { ?>
			<div class="alert alert-success" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong><?php echo $this->session->flashdata('stock_success'); ?></strong>
	        </div>
		<?php } ?>
		<?php if($this->session->flashdata('stock_fail')) { ?>
			<div class="alert alert-danger" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong><?php echo $this->session->flashdata('stock_fail'); ?></strong>
	        </div>
		<?php } ?>
	</div>
    </section>
    <section class="content">
    	<div class="row">
            <div class="clearfix" style="margin-bottom: 15px;"></div>
				<div class="col-lg-12">
				<?php echo form_open_multipart('stock_controller/add_stock',array('id' => 'add_stock_form')); ?>
				<div class="box box-primary">
					
					<!-- New Fileds -->
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Invoice Number</label>
						<div>
							<input type="text" class="form-control" id="" name="invoice_number">
							<?php echo form_error('invoice_number'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Invoice Date</label>
						<div class="input-group date">
							<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							<input type="text" class="form-control pull-right" name="invoice_date" id="datetimepicker2">
						</div>
						<?php echo form_error('invoice_date'); ?>
					</div>

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Name(For Reference)</label>
						<div>
							<input type="text" class="form-control" name="stock_name" value="<?php echo $stock_name_referance; ?>">
							<?php echo form_error('no_of_bottles'); ?>
						</div>
					</div>
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Brand Name</label>
						<select class="form-control chosen-select" id="brand_name_list" name="brand_name" data-placeholder="select brand Name">
							<option selected readonly>Select Brand Name</option>
							<?php if(!empty($brand_name_list)) { ?>
							<?php foreach ($brand_name_list as $key => $value): ?>
								<option  value="<?php echo $value->id;?>"><?php echo $value->brand_name;?></option>
							<?php endforeach ?>	
					    	<?php } ?>
					  	</select>
					  	<?php echo form_error('brand_name'); ?>
					</div>				
				
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">No of Cases</label>
						<div>
							<input type="text" class="form-control" id="no_of_cases" name="no_of_cases">
							<?php echo form_error('no_of_cases'); ?>
						</div>
					</div>

					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">No of Bottles</label>
						<div>
							<input type="text" class="form-control stock_key_1 numeric" id="stock_key_1" name="no_of_bottles" readonly>
							<?php echo form_error('no_of_bottles'); ?>
						</div>
					</div>

					<div class="from-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Unit Rate</label>
						<div>
							<input type="text" class="form-control stock_key_2 numeric" id="stock_key_2" name="unit_rate">
							<?php echo form_error('unit_rate'); ?>
						</div>
					</div>
				
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Total</label>
						<div>
							<input type="text" class="form-control stock_key_sum numeric" readonly="" id="stock_key_sum" name="total">
							<?php echo form_error('total'); ?>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group margin-btm-20 col-sm-3">
						<label for="" class="control-label pad-right-0">Sale Price</label>
						<div>
							<input type="text" class="form-control numeric"  name="sale_price">
							<?php echo form_error('sale_price'); ?>
						</div>
					</div>
					
					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" id="add-stock" name="add-stock" value="Submit" >
					</div>
				<?php echo form_close(); ?>		
              </div>
            </div>
            </div>
            </div>
    	</div>
    </section>
</div>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(1000,0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2500);

</script>